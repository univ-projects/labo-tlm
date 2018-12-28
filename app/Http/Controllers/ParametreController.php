<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Http\Requests\parametreRequest;
use App\Parametre;
use App\User;
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
             ->select(DB::raw('*,equipes.photo as team_photo'))
            ->where('labo_id',$id)
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
            ->get();
     $laboDetail = Parametre::find($id);
     if($laboDetail){

     $equipes = DB::table('parametres')

          ->leftjoin('equipes', 'equipes.labo_id', '=', 'parametres.id')
          ->leftjoin('users', 'users.id', '=', 'equipes.chef_id')
           ->select(DB::raw('*,equipes.photo as team_photo'))
          ->where('labo_id',$id)
          ->get();


         if(Auth::user()->role->nom == 'admin' || (Auth::user()->role->nom == 'directeur' && Auth::user()->id==$laboratoire->directeur))
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

         }
         else{
             $file_name_img="laboImgDefault.png";
         }
         if($request->hasFile('logo')){
             $file = $request->file('logo');
             $file_name_logo = time().'.'.$file->getClientOriginalExtension();
             $file->move(public_path('/uploads/photo/labos'),$file_name_logo);
         }
         else{
             $file_name_logo="laboImgDefault.png";
         }

       $labo->photo = '/uploads/photo/labos/'.$file_name_img;
       $labo->logo = '/uploads/photo/labos/'.$file_name_logo;


       if($labo->save()){
         $user = User::find($request->input('directeur'));
         $user->role_id=3;//directeur
         $user->save();
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
          $user->role_id=3;//directeur
          $user->save();
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

}
