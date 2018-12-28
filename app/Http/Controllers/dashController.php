<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Parametre;
use App\Article;
use App\These;
use Carbon\Carbon; //for date comparaison

class dashController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $labo = $this->getCurrentLabo();
        // $membres = User::get()->cont();
        // $membres = User::select(DB::raw('count(DISTINCT name) as name_count'))->get();
        $membres = DB::table('users')->distinct('id')->count();
        $equipes = DB::table('equipes')->distinct('id')->count();
        $articles = DB::table('articles')->distinct('id')->count();
        $theses = DB::table('theses')->distinct('id')->where('date_soutenance',null)->count();
        $laboratoires=Parametre::all();


        return view('dashboard')->with([
        	'membres' => $membres,
        	'equipes' => $equipes,
        	'articles' => $articles,
        	'theses' => $theses,
          'labo'=>$labo,
          'laboratoires'=>$laboratoires
        ]);
    }



    	function getAllYears(){

        $years=array();
        for ($i=0; $i < 10 ; $i++) {
          $year = date("Y");
          array_push($years, $year -$i);
        }
        return array_reverse($years);
    	}

      function getYearlyArticleCount( $year) {
    		$yearly_article_count = Article::whereYear('date', $year )->get()->count();
    		return $yearly_article_count;
    	}
      function getYearlyTheseCount( $year) {
        $yearly_these_count = These::whereYear( 'date_debut', $year )
                            ->where('date_soutenance','<',Carbon::now())
                            ->get()->count();
        return $yearly_these_count;
      }

      function getYearlyThesardCount( $year) {
          $yearly_thesard_count=  These::where(function ($query) use($year) {
              $query->whereYear( 'date_debut', $year );
              })->where(function ($query) {
                  $query->where('date_soutenance','>',Carbon::now())
                        ->orWhereNull('date_soutenance');
              })
              ->get()
              ->count();
          return $yearly_thesard_count;
      }

    	function getMonthlyArticleTheseData() {

    		$yearly_article_count_array = array();
        $yearly_these_count_array = array();
        $yearly_thesard_count_array = array();

    		$year_array = $this->getAllYears();

    		if ( ! empty( $year_array ) ) {
    			foreach ( $year_array as $year ){

    				$yearly_article_count = $this->getYearlyArticleCount( $year );
    				array_push( $yearly_article_count_array, $yearly_article_count );
            $yearly_these_count = $this->getYearlyTheseCount( $year );
            array_push( $yearly_these_count_array, $yearly_these_count );
            $yearly_thesard_count = $this->getYearlyThesardCount( $year );
            array_push( $yearly_thesard_count_array, $yearly_thesard_count );

    			}
    		}

    		$max_no = max( $yearly_article_count_array )+max( $yearly_these_count_array )+max( $yearly_thesard_count_array );
    		$max = round(( $max_no + 10/2 ) / 10 ) * 10;
    		$yearly_article_these_data_array = array(
    			'months' => $year_array,
    			'article_count_data' => $yearly_article_count_array,
          'these_count_data'=> $yearly_these_count_array,
          'thesard_count_data'=> $yearly_thesard_count_array,
    			'max' => $max,
    		);

    		return $yearly_article_these_data_array;

        }

        //Stats

      function getArticleTypeCount() {

          $typeCount = array(
            'publications' => Article::where('type','Publication(Revue)')->get()->count(),
            'brevets' => Article::where('type','Brevet')
                                ->get()->count(),
            'posters'=>Article::where('type','Poster')
                                ->get()->count(),
            'articles'=>Article::where('type','Article court')
                                ->orWhere('type','Article long')
                                ->get()->count(),
            'livres' =>Article::where('type','Chapitre d\'un livre')
                                ->orWhere('type','Livre')
                                ->get()->count(),
          );

          return $typeCount;

          }




          function getYearlyMembreCount( $year,$grade) {
            $yearly_membre_count = User::whereYear('created_at','=', $year )
                                  ->where('grade',$grade)
                                  ->get()->count();
            return $yearly_membre_count;
          }


      function getMonthlyMembre() {

            $yearly_maa_count_array = array();
            $yearly_mab_count_array = array();
            $yearly_mca_count_array = array();
            $yearly_mcb_count_array = array();
            $yearly_doctorant_count_array = array();
            $yearly_professeur_count_array = array();

            $year_array = $this->getAllYears();

            if ( ! empty( $year_array ) ) {
              foreach ( $year_array as $year ){

                $yearly_maa_count = $this->getYearlyMembreCount( $year ,'MAA');
                array_push($yearly_maa_count_array, $yearly_maa_count );

                $yearly_mab_count = $this->getYearlyMembreCount( $year ,'MAB');
                array_push($yearly_mab_count_array, $yearly_mab_count );
                $yearly_mca_count = $this->getYearlyMembreCount( $year ,'MCA');
                array_push($yearly_mca_count_array, $yearly_mca_count );
                $yearly_mcb_count = $this->getYearlyMembreCount( $year ,'MCB');
                array_push($yearly_mcb_count_array, $yearly_mcb_count );
                $yearly_doctorant_count = $this->getYearlyMembreCount( $year ,'Doctorant');
                array_push($yearly_doctorant_count_array, $yearly_doctorant_count );
                $yearly_professeur_count = $this->getYearlyMembreCount( $year ,'Professeur');
                array_push($yearly_professeur_count_array, $yearly_professeur_count );


              }
            }

            $max_no = max( $yearly_maa_count_array )+max( $yearly_mab_count_array )+max( $yearly_mca_count_array )
            + max( $yearly_mcb_count_array )+max( $yearly_doctorant_count_array )+max( $yearly_professeur_count_array );
            $max = round(( $max_no + 10/2 ) / 10 ) * 10;
            $yearly_membre_count = array(
              'months' => $year_array,
              'maa_count_data' => $yearly_maa_count_array,
              'mab_count_data'=> $yearly_mab_count_array,
              'mca_count_data'=> $yearly_mca_count_array,
              'mcb_count_data'=> $yearly_mcb_count_array,
              'doctorant_count_data'=> $yearly_doctorant_count_array,
              'professeur_count_data'=> $yearly_professeur_count_array,
              'max' => $max,
            );

            return   $yearly_membre_count;

            }

}
