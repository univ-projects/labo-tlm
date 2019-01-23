<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\equipeRequest;
use App\Parametre;
use App\Equipe;
use App\These;
use App\Article;
use App\User;
use Auth;
use Carbon\Carbon; //for date comparaison

class EquipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
    $labo = $this->getCurrentLabo();
    $equipes = Equipe::all();
     // $nbr = DB::table('users')
     //            ->groupBy('equipe_id')
     //            ->count('equipe_id');

    $nbr = DB::table('users')
             ->select( DB::raw('count(*) as total,equipe_id'))
             ->groupBy('equipe_id')
             ->get();

        return view('equipe.index')->with([
            'equipes' => $equipes,
            'nbr' => $nbr,
            'labo'=>$labo,
        ]);;
    }

    public function create()
    {
        $labo = $this->getCurrentLabo();
        $labos= Parametre::all();

        if( Auth::user()->role->nom == 'admin')
            {
            	$membres = User::all();
              return view('equipe.create')->with([
                  'labos' => $labos,
                  'membres' => $membres,
                  'labo'=>$labo,
              ]);
            }
            else{
                return view('errors.403' ,['labo'=>$labo]);
            }
    }

    public function details($id)
    {
        $labo = $this->getCurrentLabo();
          $labos= Parametre::all();
        $equipe = Equipe::find($id);
        if($equipe){
        $membres = User::where('equipe_id', $id)->get();

        return view('equipe.details')->with([
            'equipe' => $equipe,
            'membres' => $membres,
            'labo'=>$labo,
            'labos'=>$labos
        ]);
      }
      else {
        return view('errors.404');
      }
    }

    public function store(equipeRequest $request)
    {
        $labo = $this->getCurrentLabo();

        $equipe = new equipe();

        if($request->hasFile('img')){
            $file = $request->file('img');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo/equipes'),$file_name);

        }
        else{
            $file_name="materielDefault.png";
        }

        $equipe->labo_id = $request->input('labo');
        $equipe->intitule = $request->input('intitule');
        $equipe->resume = $request->input('resume');
        $equipe->achronymes = $request->input('achronymes');
        $equipe->axes_recherche = $request->input('axes_recherche');
        $equipe->chef_id = $request->input('chef_id');
        $equipe->photo = 'uploads/photo/equipes/'.$file_name;

        $equipe->save();

        return redirect('equipes');

    }

    public function update(equipeRequest $request,$id)
    {
        $labo = $this->getCurrentLabo();
        $equipe = Equipe::find($id);
        if($equipe){
        if( Auth::user()->role->nom == 'admin')
            {

              if($request->hasFile('img')){
                  $file = $request->file('img');
                  $file_name = time().'.'.$file->getClientOriginalExtension();
                  $file->move(public_path('/uploads/photo/equipes'),$file_name);

              }
              else{
                  $file_name="materielDefault.png";
              }

            $equipe->labo_id = $request->input('labo');
            $equipe->intitule = $request->input('intitule');
            $equipe->resume = $request->input('resume');
            $equipe->achronymes = $request->input('achronymes');
            $equipe->axes_recherche = $request->input('axes_recherche');
            $equipe->chef_id = $request->input('chef_id');
            $equipe->photo = 'uploads/photo/equipes/'.$file_name;

            $equipe->save();

            return redirect('equipes/'.$id.'/details');
            }
        else{
                return view('errors.403',['labo'=>$labo]);
            }
          }
          else {
            return view('errors.404');
          }

    }

    public function destroy($id)
    {
        if( Auth::user()->role->nom == 'admin')
            {
        $equipe = Equipe::find($id);
        if($equipe){
          $equipe->delete();
          return redirect('equipes');
        }else {
          return view('errors.404');
        }
        }
    }




    function getAllYears(){

      $years=array();
      for ($i=0; $i < 10 ; $i++) {
        $year = date("Y");
        array_push($years, $year -$i);
      }
      return array_reverse($years);
    }


    function getYearlyTheseCount( $year ,$equipeId) {
      $yearly_these_count = These::whereYear( 'date_soutenance', $year )
                          ->where('date_soutenance','<',Carbon::now())
                          ->get()->count();
      return $yearly_these_count;
    }

    function getYearlyThesardCount( $year,$equipeId) {
        $yearly_thesard_count=  These::join('users','users.id','=','theses.user_id')
        ->where('users.equipe_id',$equipeId)
        ->where(function ($query) use($year) {
          if($year==Carbon::now()->year){
           $year=Carbon::now();
           $query->where('date_debut','<=',$year);
         }
         else{$query->whereYear('date_debut','<=',$year);}
            // $query->whereYear( 'date_debut','<=', $year );
            })->where(function ($query) use($year) {
              if($year==Carbon::now()->year){
               $year=Carbon::now();
               $query->where('date_soutenance','>',$year)
                     ->orWhereNull('date_soutenance');
             }
             else {
               $query->whereYear('date_soutenance','>',$year)
                     ->orWhereNull('date_soutenance');
             }
            })
            ->get()
            ->count();
        return $yearly_thesard_count;
    }

    function getYearlyArticleCount( $year,$equipeId,$type) {
      if($type!='Article' AND $type!='Livre'){
        $yearly_article_count = Article::join('article_user','article_user.article_id','=','articles.id')
        ->join('users','article_user.user_id','=','users.id')
        ->where('users.equipe_id',$equipeId)
        ->where('articles.type',$type)
        ->whereYear('date', $year )->get()->count();
      }
      else if($type=='Article'){
        $yearly_article_count=  Article::join('article_user','article_user.article_id','=','articles.id')
        ->join('users','article_user.user_id','=','users.id')
        ->where('users.equipe_id',$equipeId)
        ->whereYear('date', $year )
        ->where(function ($query) {
          $query->where('articles.type','Article court')
          ->orWhere('articles.type','Article long');
        })->get()->count();

      }
      else if($type=='Livre'){
        $yearly_article_count=  Article::join('article_user','article_user.article_id','=','articles.id')
        ->join('users','article_user.user_id','=','users.id')
        ->where('users.equipe_id',$equipeId)
        ->whereYear('date', $year )
        ->where(function ($query) {
          $query->where('articles.type','Livre')
          ->orWhere('articles.type','Chapitre d\'un livre');
        })->get()->count();

      }
      return $yearly_article_count;
    }






    function getMonthlyArticleData($equipeId) {

      $yearly_publication_count_array = array();
      $yearly_brevet_count_array = array();
      $yearly_poster_count_array = array();
      $yearly_article_count_array = array();
      $yearly_livre_count_array = array();



      $year_array = $this->getAllYears();

      if ( ! empty( $year_array ) ) {
        foreach ( $year_array as $year ){

          $yearly_article_count = $this->getYearlyArticleCount( $year,$equipeId,'Article');
          array_push( $yearly_article_count_array, $yearly_article_count );

          $yearly_publication_count = $this->getYearlyArticleCount( $year,$equipeId,'Publication(Revue)');
          array_push( $yearly_publication_count_array, $yearly_publication_count );

          $yearly_brevet_count = $this->getYearlyArticleCount( $year,$equipeId,'Brevet');
          array_push( $yearly_brevet_count_array, $yearly_brevet_count );

          $yearly_livre_count = $this->getYearlyArticleCount( $year,$equipeId,'Livre');
          array_push( $yearly_livre_count_array, $yearly_livre_count );

          $yearly_poster_count = $this->getYearlyArticleCount( $year,$equipeId,'Poster');
          array_push( $yearly_poster_count_array, $yearly_poster_count );

        }
      }

      $max_no =max( $yearly_article_count_array )  +max( $yearly_poster_count_array )+max( $yearly_brevet_count_array )  +max( $yearly_publication_count_array )+max( $yearly_livre_count_array );
      $max = round(( $max_no + 10/2 ) / 10 ) * 10;
      $yearly_article_these_data_array = array(
        'months' => $year_array,
        'article_count_data' => $yearly_article_count_array,
        'brevet_count_data' => $yearly_brevet_count_array,
        'publication_count_data' => $yearly_publication_count_array,
        'livre_count_data' => $yearly_livre_count_array,
        'poster_count_data' => $yearly_poster_count_array,
        'max' => $max,
      );

      return $yearly_article_these_data_array;

      }


      function getArticleTypeCount($equipeId) {

        $typeCount = array(
          'publications' => Article::join('article_user','article_user.article_id','=','articles.id')
                          ->join('users','article_user.user_id','=','users.id')
                          ->where('users.equipe_id',$equipeId)
                          ->where('articles.type','Publication(Revue)')->get()->count(),
          'brevets' => Article::join('article_user','article_user.article_id','=','articles.id')
                          ->join('users','article_user.user_id','=','users.id')
                          ->where('users.equipe_id',$equipeId)
                          ->where('articles.type','Brevet')->get()->count(),
          'posters'=>Article::join('article_user','article_user.article_id','=','articles.id')
                          ->join('users','article_user.user_id','=','users.id')
                          ->where('users.equipe_id',$equipeId)
                          ->where('articles.type','Poster')->get()->count(),
          'articles'=>Article::join('article_user','article_user.article_id','=','articles.id')
                          ->join('users','article_user.user_id','=','users.id')
                          ->where('users.equipe_id',$equipeId)
                          ->where(function ($query) {
                            $query->where('articles.type','Article court')
                              ->orWhere('articles.type','Article long');
                          })->get()->count(),
          'livres' =>Article::join('article_user','article_user.article_id','=','articles.id')
                          ->join('users','article_user.user_id','=','users.id')
                          ->where('users.equipe_id',$equipeId)
                          ->where(function ($query) {
                            $query->where('articles.type','Livre')
                              ->orWhere('articles.type','Chapitre d\'un livre');
                          })->get()->count(),


        );

        return $typeCount;

        }




    function getMonthlyTheseData($equipeId) {

      $yearly_article_count_array = array();
      $yearly_these_count_array = array();
      $yearly_thesard_count_array = array();

      $year_array = $this->getAllYears();

      if ( ! empty( $year_array ) ) {
        foreach ( $year_array as $year ){

          $yearly_these_count = $this->getYearlyTheseCount( $year,$equipeId );
          array_push( $yearly_these_count_array, $yearly_these_count );
          $yearly_thesard_count = $this->getYearlyThesardCount( $year,$equipeId );
          array_push( $yearly_thesard_count_array, $yearly_thesard_count );

        }
      }

      $max_no =max( $yearly_these_count_array )+max( $yearly_thesard_count_array );
      $max = round(( $max_no + 10/2 ) / 10 ) * 10;
      $yearly_article_these_data_array = array(
        'months' => $year_array,
        'these_count_data'=> $yearly_these_count_array,
        'thesard_count_data'=> $yearly_thesard_count_array,
        'max' => $max,
      );

      return $yearly_article_these_data_array;

      }



}
