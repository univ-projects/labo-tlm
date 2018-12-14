<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Parametre;
use App\Article;
use App\These;

class dashController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $labo = Parametre::find('1');
        // $membres = User::get()->cont();
        // $membres = User::select(DB::raw('count(DISTINCT name) as name_count'))->get();
        $membres = DB::table('users')->distinct('id')->count();
        $equipes = DB::table('equipes')->distinct('id')->count();
        $articles = DB::table('articles')->distinct('id')->count();
        $theses = DB::table('theses')->distinct('id')->where('date_soutenance',null)->count();


        return view('dashboard')->with([
        	'membres' => $membres,
        	'equipes' => $equipes,
        	'articles' => $articles,
        	'theses' => $theses,
            'labo'=>$labo,
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

      function getYearlyarticleCount( $year) {
    		$yearly_article_count = Article::where( 'annee', $year )->get()->count();
    		return $yearly_article_count;
    	}
      function getYearlyTheseCount( $year) {
        $yearly_these_count = These::whereYear( 'date_debut', $year )->get()->count();
        return $yearly_these_count;
      }

    	function getMonthlyArticleTheseData() {

    		$yearly_article_count_array = array();
        $yearly_these_count_array = array();

    		$year_array = $this->getAllYears();

    		if ( ! empty( $year_array ) ) {
    			foreach ( $year_array as $year ){

    				$yearly_article_count = $this->getYearlyarticleCount( $year );
    				array_push( $yearly_article_count_array, $yearly_article_count );
            $yearly_these_count = $this->getYearlyTheseCount( $year );
            array_push( $yearly_these_count_array, $yearly_these_count );

    			}
    		}

    		$max_no = max( $yearly_article_count_array )+max( $yearly_these_count_array );
    		$max = round(( $max_no + 10/2 ) / 10 ) * 10;
    		$yearly_article_these_data_array = array(
    			'months' => $year_array,
    			'article_count_data' => $yearly_article_count_array,
          'these_count_data'=> $yearly_these_count_array,
    			'max' => $max,
    		);

    		return $yearly_article_these_data_array;

        }

}
