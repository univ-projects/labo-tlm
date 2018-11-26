<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Http\Requests\parametreRequest;
use App\Parametre;
use App\User;
use App\Equipe;
use Auth;

class ParametreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
   {
       $membres = User::all();
       $labo = Parametre::find('1');
       $labos = Parametre::all();
       $equipes=Equipe::all();

       $nbrEquipes = DB::table('equipes')
                ->select( DB::raw('count(*) as total,labo_id'))
                ->groupBy('labo_id')
                ->get();
      $nbrMembres = DB::table('users')
                ->select( DB::raw('count(*) as total,equipe_id'))
                ->groupBy('equipe_id')
                ->get();

      return view('laboratoire.index')->with([
                    'labos' => $labos,
                    'nbrEquipes' => $nbrEquipes,
                    'nbrMembres'=>$nbrMembres,
                    'equipes'=>$equipes,
                    'labo'=>$labo,
                ]);;

   }

   public function trombi()
   {
       // $membres = User::all()->orderBy('name');
       $labo = Parametre::find('1');
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
                  ->select( DB::raw('count(*) as total,equipe_id'))
                  ->groupBy('equipe_id')
                  ->get();

           return view('laboratoire.trombinoscope')->with([
               'labos' => $labos,
               'nbrEquipes' => $nbrEquipes,
               'nbrMembres'=>$nbrMembres,
               'equipes' =>$equipes,
               'labo'=>$labo,
           ]);;

   }


   public function details($id)
   {
       $labo = Parametre::find('1');
       $equipe = Equipe::find($id);
       $membres = User::where('equipe_id', $id)->get();
       $laboDetail = Parametre::find($id);

       return view('laboratoire.details')->with([
           'equipe' => $equipe,
           'membres' => $membres,
           'labo'=>$labo,
          'laboDetail'=> $laboDetail,
       ]);
   }

    public function create()
    {
      $labo = Parametre::find('1');
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
      $labo = Parametre::find('1');

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
              $file_name_img="laboImgDefault.png";
          }
          if($request->hasFile('logo')){
              $file = $request->file('logo');
              $file_name_logo = time().'.'.$file->getClientOriginalExtension();
              $file->move(public_path('/uploads/photo/labos'),$file_name_logo);
          }
          else{
              $file_name_logo="laboLogoDefault.png";
          }

        $newLab->photo = 'uploads/photo/labos/'.$file_name_img;
        $newLab->logo = 'uploads/photo/labos/'.$file_name_logo;

        $newLab->save();

        return redirect('laboratoires');

    }
}
