<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Http\Requests\parametreRequest;
use App\Http\Requests\applicationRequest;
use App\Parametre;
use App\Application;
use App\User;
use App\Projet;
use App\Equipe;
use Auth;


use App\These;
use App\Article;
use Carbon\Carbon; //for date comparaison

class ParametreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
   {
       $membres = User::all();


       $labo = $this->getCurrentLabo();

       $labos = Parametre::all();
       $equipes=Equipe::all();


       $nbrEquipes = DB::table('equipes')
                ->select( DB::raw('count(*) as total,labo_id'))
                ->groupBy('labo_id')
                ->get();

      $nbrMembres = DB::table('users')
                ->select( DB::raw('count(*) as total,labo_id'))
                ->leftjoin('equipes', 'equipes.id', '=', 'users.equipe_id')
                ->groupBy('labo_id')
                ->get();

      return view('laboratoire.index')->with([
                    'laboratoires' => $labos,
                    'nbrEquipes' => $nbrEquipes,
                    'nbrMembres'=>$nbrMembres,
                    'equipes'=>$equipes,
                    'labo'=>$labo,
                ]);;

   }


   public function trombi()
   {
       // $membres = User::all()->orderBy('name');
       $labo = $this->getCurrentLabo();

       $labos = Parametre::all();
       $equipes=Equipe::all();

        // $nbr = DB::table('users')
        //            ->groupBy('equipe_id')
        //            ->count('equipe_id');

        $nbrEquipes = DB::table('equipes')
                 ->select( DB::raw('count(*) as total,labo_id'))
                 ->groupBy('labo_id')
                 ->get();

        $nbrMembres = DB::table('users')
                           ->select( DB::raw('count(*) as total,labo_id'))
                           ->leftjoin('equipes', 'equipes.id', '=', 'users.equipe_id')
                           ->groupBy('labo_id')
                           ->get();

           return view('laboratoire.trombinoscope')->with([
               'labos' => $labos,
               'nbrEquipes' => $nbrEquipes,
               'nbrMembres'=>$nbrMembres,
               'equipes' =>$equipes,
               'labo'=>$labo

           ]);;

   }


   public function parametre()
   {

       $app = Application::find('1');

     $labo = $this->getCurrentLabo();

     if($app){
       if(Auth::user()->role->nom == 'admin'  ){
         return view('parametre.parametre')->with([
             'app' => $app,
             'labo'=>$labo,

         ]);;
       }
       else{
          return view('errors.403',['labo'=>$labo]);
       }
     }
     else {
         return view('errors.404');
       }
   }

   public function updateApp(applicationRequest $request,$id )
   {

       $app = Application::find($id);
 if($app){
 $labo = $this->getCurrentLabo();

       if($request->hasFile('img')){
           $file = $request->file('img');
           $file_name = time().'.'.$file->getClientOriginalExtension();
           $file->move(public_path('/uploads/photo/actualites'),$file_name);
         }



         $app->titre = $request->input('titre');
         $app->apropos = $request->input('apropos');


       if (isset($file_name)) {
           $app->photo = 'uploads/photo/parametres/'.$file_name;
       }
       $app->save();

     //  return redirect('actualites/'.$id.'/details');
     return redirect('dashboard');
   }
   else {
     return view('errors.404');
   }

   }


   public function role()
  {
      $membres = User::all();


      $labo = $this->getCurrentLabo();

      $labos = Parametre::all();
      $equipes=Equipe::all();


      $nbrEquipes = DB::table('equipes')
               ->select( DB::raw('count(*) as total,labo_id'))
               ->groupBy('labo_id')
               ->get();

     $nbrMembres = DB::table('users')
               ->select( DB::raw('count(*) as total,labo_id'))
               ->leftjoin('equipes', 'equipes.id', '=', 'users.equipe_id')
               ->groupBy('labo_id')
               ->get();

               if(Auth::user()->role->nom == 'admin' )
                 {
                   return view('parametre.role')->with([
                                 'laboratoires' => $labos,
                                 'nbrEquipes' => $nbrEquipes,
                                 'nbrMembres'=>$nbrMembres,
                                 'equipes'=>$equipes,
                                 'labo'=>$labo,
                             ]);;

                   }
                   else{
                       return view('errors.403',['labo'=>$labo]);
                   }

  }



   public function details($id)
   {

     $labo = $this->getCurrentLabo();

       $equipe = Equipe::find($id);
       $membres = DB::table('users')
            ->select( DB::raw('*,users.id as user_id,equipes.id,users.equipe_id,equipes.labo_id,equipes.intitule as team,parametres.id,name,prenom,users.photo as photo_user'))
             ->leftjoin('equipes', 'equipes.id', '=', 'users.equipe_id')
              ->leftjoin('parametres', 'parametres.id', '=', 'equipes.labo_id')
              ->where('labo_id', $id)
              ->get();
       $laboDetail = Parametre::find($id);
       if($laboDetail){

       $equipes = DB::table('parametres')

            ->leftjoin('equipes', 'equipes.labo_id', '=', 'parametres.id')
            ->leftjoin('users', 'users.id', '=', 'equipes.chef_id')
             ->select(DB::raw('*,equipes.photo as team_photo,equipes.id as equipe_id'))
            ->where('labo_id',$id)
            ->whereNull('equipes.deleted_at')
            ->get();

            // $equipes=Equipe::all();


       return view('laboratoire.details')->with([
           'equipes' => $equipes,
           'membres' => $membres,
           'labo'=>$labo,
          'laboDetail'=> $laboDetail,
       ]);
     }
   else {
       return view('errors.404');
     }
   }

   public function edit($id)
   {
     $labo = $this->getCurrentLabo();

     $equipe = Equipe::find($id);
     $membres = DB::table('users')
          ->select( DB::raw('*,users.id as user_id,equipes.id,users.equipe_id,equipes.labo_id,equipes.intitule as team,parametres.id,name,prenom,users.photo as photo_user'))
           ->leftjoin('equipes', 'equipes.id', '=', 'users.equipe_id')
            ->leftjoin('parametres', 'parametres.id', '=', 'equipes.labo_id')
            ->where('labo_id', $id)
            ->whereNull('equipes.deleted_at')
            ->get();
     $laboDetail = Parametre::find($id);
     if($laboDetail){

     $equipes = DB::table('parametres')

          ->leftjoin('equipes', 'equipes.labo_id', '=', 'parametres.id')
          ->leftjoin('users', 'users.id', '=', 'equipes.chef_id')
           ->select(DB::raw('*,equipes.photo as team_photo'))
          ->where('labo_id',$id)
          ->get();


         if(Auth::user()->role->nom == 'admin' || (isset($laboDetail->directeur) && Auth::user()->role->nom == 'directeur' && Auth::user()->id==$laboDetail->directeur))
           {
               return view('laboratoire.edit')->with([
                   'equipes' => $equipes,
                   'membres' => $membres,
                   'labo'=>$labo,
                  'laboDetail'=> $laboDetail,
               ]);
             }
             else{
                 return view('errors.403',['labo'=>$labo]);
             }
           }
           else {
               return view('errors.404');
             }
   }

   public function update(Request $request,$id)
   {

     $labo = Parametre::find($id);

     if($labo){
         $labo->nom = $request->input('nom');
        $labo->achronymes = $request->input('achronymes');
        $labo->directeur = $request->input('directeur');
         $labo->apropos = $request->input('apropos');


         if($request->hasFile('img')){
             $file = $request->file('img');
             $file_name_img = time().'.'.$file->getClientOriginalExtension();
             $file->move(public_path('/uploads/photo/labos'),$file_name_img);
              $labo->photo = '/uploads/photo/labos/'.$file_name_img;
         }

         if($request->hasFile('logo')){
             $file = $request->file('logo');
             $file_name_logo = time().'.'.$file->getClientOriginalExtension();
             $file->move(public_path('/uploads/photo/labos'),$file_name_logo);
              $labo->logo = '/uploads/photo/labos/'.$file_name_logo;
         }






       if($labo->save()){
         $user = User::find($request->input('directeur'));
          if(isset($user)){
         $user->role_id=3;//directeur

          $user->save();
        }
       }

       return redirect('laboratoires/'.$id.'/details');
     }
     else {
         return view('errors.404');
       }
   }

    public function create()
    {
    $labo = $this->getCurrentLabo();

      if( Auth::user()->role->nom == 'admin')
          {
              $membres = User::all();
              return view('laboratoire.create' , ['membres' => $membres],['labo'=>$labo]);
          }
          else{
              return view('errors.403',['labo'=>$labo]);
          }
    }

    public function store(Request $request)
    {

      $newLab = new Parametre();


      $labo = $this->getCurrentLabo();


          $newLab->nom = $request->input('nom');
          $newLab->achronymes = $request->input('achronymes');
          $newLab->directeur = $request->input('directeur');
          $newLab->apropos = $request->input('apropos');


          if($request->hasFile('img')){
              $file = $request->file('img');
              $file_name_img = time().'.'.$file->getClientOriginalExtension();
              $file->move(public_path('/uploads/photo/labos'),$file_name_img);

          }
          else{
              $file_name_img="laboLogoDefault.png";
          }
          if($request->hasFile('logo')){
              $file = $request->file('logo');
              $file_name_logo = time().'.'.$file->getClientOriginalExtension();
              $file->move(public_path('/uploads/photo/labos'),$file_name_logo);
          }
          else{
              $file_name_logo="laboImgDefault.png";
          }

        $newLab->photo = '/uploads/photo/labos/'.$file_name_img;
        $newLab->logo = '/uploads/photo/labos/'.$file_name_logo;

        if($newLab->save()){
          $user = User::find($request->input('directeur'));
          if(isset($user)){
          $user->role_id=3;//directeur

            $user->save();
          }
        }

        return redirect('laboratoires');

    }

    public function destroy($id)
    {

              $laboratoire = Parametre::find($id);
              if($laboratoire){
              $laboratoire->delete();
              return redirect('laboratoires');
            }
            else {
                return view('errors.404');
              }

    }






    //Stats

    function getArticleTypeCount($id) {

      $labo_membres = Equipe::join('users','equipes.id','=','users.equipe_id')
                            ->join('article_user','users.id','=','article_user.user_id')
                            ->join('articles','articles.id','=','article_user.article_id')
                            ->where('labo_id',$id)
                            ->where('articles.type','Publication(Revue)')->get()->count();


      $typeCount = array(
        'publications' => Equipe::select(DB::raw('DISTINCT article_user.article_id'))->join('users','equipes.id','=','users.equipe_id')
                              ->join('article_user','users.id','=','article_user.user_id')
                              ->join('articles','articles.id','=','article_user.article_id')
                              ->where('labo_id',$id)
                              ->where('articles.type','Publication(Revue)')
                              ->distinct('article_user.article_id')
                              ->get()->count(),
        'brevets' => Equipe::select(DB::raw('DISTINCT article_user.article_id'))->join('users','equipes.id','=','users.equipe_id')
                              ->join('article_user','users.id','=','article_user.user_id')
                              ->join('articles','articles.id','=','article_user.article_id')
                              ->where('labo_id',$id)
                              ->where('type','Brevet')
                              ->distinct('article_user.article_id')
                            ->get()->count(),
        'posters'=>Equipe::select(DB::raw('DISTINCT article_user.article_id'))->join('users','equipes.id','=','users.equipe_id')
                              ->join('article_user','users.id','=','article_user.user_id')
                              ->join('articles','articles.id','=','article_user.article_id')
                              ->where('labo_id',$id)
                            ->where('type','Poster')
                            ->distinct('article_user.article_id')
                            ->get()->count(),
        'articles'=>Equipe::select(DB::raw('DISTINCT article_user.article_id'))->join('users','equipes.id','=','users.equipe_id')
                              ->join('article_user','users.id','=','article_user.user_id')
                              ->join('articles','articles.id','=','article_user.article_id')
                              ->where('labo_id',$id)
                              ->where(function ($query) {
                                $query->where('articles.type','Article court')
                                  ->orWhere('articles.type','Article long');
                              })
                              ->get()->count(),
        'livres' =>Equipe::select(DB::raw('DISTINCT article_user.article_id'))->join('users','equipes.id','=','users.equipe_id')
                              ->join('article_user','users.id','=','article_user.user_id')
                              ->join('articles','articles.id','=','article_user.article_id')
                              ->where('labo_id',$id)
                              ->where(function ($query) {
                                $query->where('articles.type','Livre')
                                  ->orWhere('articles.type','Chapitre d\'un livre');
                              })->distinct('article_user.article_id')
                              ->get()->count(),
      );

      return $typeCount;

      }


      function getAllYears(){

        $years=array();
        for ($i=0; $i < 10 ; $i++) {
          $year = date("Y");
          array_push($years, $year -$i);
        }
        return array_reverse($years);
      }

      function getYearlyMembreCount( $year,$grade,$id) {
        $yearly_membre_count = User::join('equipes','equipes.id','=','users.equipe_id')
                              ->whereYear('users.created_at','<=', $year )
                              ->where('grade',$grade)
                              ->where('labo_id',$id)

                              ->get()->count();
        return $yearly_membre_count;
      }


    function getMonthlyMembre($id) {

        $yearly_maa_count_array = array();
        $yearly_mab_count_array = array();
        $yearly_mca_count_array = array();
        $yearly_mcb_count_array = array();
        $yearly_doctorant_count_array = array();
        $yearly_professeur_count_array = array();

        $year_array = $this->getAllYears();

        if ( ! empty( $year_array ) ) {
          foreach ( $year_array as $year ){

            $yearly_maa_count = $this->getYearlyMembreCount( $year ,'MAA',$id);
            array_push($yearly_maa_count_array, $yearly_maa_count );

            $yearly_mab_count = $this->getYearlyMembreCount( $year ,'MAB',$id);
            array_push($yearly_mab_count_array, $yearly_mab_count );
            $yearly_mca_count = $this->getYearlyMembreCount( $year ,'MCA',$id);
            array_push($yearly_mca_count_array, $yearly_mca_count );
            $yearly_mcb_count = $this->getYearlyMembreCount( $year ,'MCB',$id);
            array_push($yearly_mcb_count_array, $yearly_mcb_count );
            $yearly_doctorant_count = $this->getYearlyMembreCount( $year ,'Doctorant',$id);
            array_push($yearly_doctorant_count_array, $yearly_doctorant_count );
            $yearly_professeur_count = $this->getYearlyMembreCount( $year ,'Professeur',$id);
            array_push($yearly_professeur_count_array, $yearly_professeur_count );


          }
        }

        // $max_no = max( $yearly_maa_count_array )+max( $yearly_mab_count_array )+max( $yearly_mca_count_array )
        // + max( $yearly_mcb_count_array )+max( $yearly_doctorant_count_array )+max( $yearly_professeur_count_array );
        // $max = round(( $max_no + 10/2 ) / 10 ) * 10;
      $max=round(max(array(max( $yearly_maa_count_array ),max( $yearly_mab_count_array ),max( $yearly_mca_count_array )
      , max( $yearly_mcb_count_array ),max( $yearly_doctorant_count_array ),max( $yearly_professeur_count_array ))));
      if($max==0)
        $max=5;
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

        function getMembersLaboEquipeCount($labId) {

            $laboMembersCount = array();
            $equipes=Equipe::where('labo_id',$labId)->get();

            foreach ($equipes as $e) {
              $lMembersCount=User::where('equipe_id',$e['id'])->get()->count();
              $laboMembersCount[$e['achronymes']] = $lMembersCount;

            }

            return $laboMembersCount;

          }


        function getYearlyArticleCount( $year,$equipeId) {

          $yearly_article_count = Article::select(DB::raw('DISTINCT articles.id'))->join('article_user','article_user.article_id','=','articles.id')
          ->join('users','article_user.user_id','=','users.id')
          ->where('equipe_id',$equipeId)
          ->whereYear('date', $year )->get()->count();
          return $yearly_article_count;
        }

        function getYearlyProjetCount( $year,$equipeId) {

          $yearly_article_count = Projet::select(DB::raw('DISTINCT projets.id'))
          ->join('projet_user','projet_user.projet_id','=','projets.id')
          ->join('users','projet_user.user_id','=','users.id')
          ->where('equipe_id',$equipeId)
          ->whereYear( 'date_debut','<=', $year )
          ->where(function ($query) use($year) {
               if($year==Carbon::now()->year){
                $year=Carbon::now();
                $query->where('date_fin','>',$year)
                      ->orWhereNull('date_fin');
              }
              else {
                $query->whereYear('date_fin','>',$year)
                      ->orWhereNull('date_fin');
              }
              })
          ->get()->count();
          return $yearly_article_count;
        }



        function getMonthlyArticle($labId) {

          $yearly_article_count_array = array();

          $year_array = $this->getAllYears();
          $equipes=Equipe::where('labo_id',$labId)->get();//get All equipes of lab

            $articleEquipeCount=array();
            $max_no=0;

          if ( !empty( $year_array ) AND !empty( $equipes )) {
            foreach ($equipes as $e) {
              $yearly_article_count_array=array();
              foreach ( $year_array as $year ){


                $yearly_article_count = $this->getYearlyArticleCount( $year,$e->id );
                // array_push($articleEquipeCount,array($e->achronymes=>$yearly_article_count));
                  array_push($yearly_article_count_array,$yearly_article_count);
                // $laboMembersCount[$e->equipe] = $lMembersCount;
              }
               $articleEquipeCount[$e->achronymes]= $yearly_article_count_array;
               $max_no += max( $articleEquipeCount[$e->achronymes] );
            }
          }


          $max = round(( $max_no + 10/2 ) / 10 ) * 10;

          $yearly_article_data_array = array(
            'months' => $year_array,
             'article_count_data'=>$articleEquipeCount,
          //  'article_count_data' => $yearly_article_count_array,
            'max' => $max,
          );

          return $yearly_article_data_array;

          }



          function getMonthlyProjet($labId) {

            $yearly_article_count_array = array();

            $year_array = $this->getAllYears();
            $equipes=Equipe::where('labo_id',$labId)->get();//get All equipes of lab

              $articleEquipeCount=array();
              $max_no=0;

            if ( !empty( $year_array ) AND !empty( $equipes )) {
              foreach ($equipes as $e) {
                $yearly_article_count_array=array();
                foreach ( $year_array as $year ){


                  $yearly_article_count = $this->getYearlyProjetCount( $year,$e->id );
                  // array_push($articleEquipeCount,array($e->achronymes=>$yearly_article_count));
                    array_push($yearly_article_count_array,$yearly_article_count);
                  // $laboMembersCount[$e->equipe] = $lMembersCount;
                }
                 $articleEquipeCount[$e->achronymes]= $yearly_article_count_array;
                 $max_no += max( $articleEquipeCount[$e->achronymes] );
              }
            }


            $max = round(( $max_no + 10/2 ) / 10 ) * 10;

            $yearly_article_data_array = array(
              'months' => $year_array,
               'projet_count_data'=>$articleEquipeCount,
              'max' => $max,
            );

            return $yearly_article_data_array;

            }








}
