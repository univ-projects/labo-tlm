<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\materielRequest;
use App\Parametre;
use App\Materiel;
use App\User;


use Auth;


class MaterielController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

   public function index()
  {
      $materiels = Materiel::all();
      $labo = Parametre::find('1');

      if( Auth::user()->role->nom == 'admin')
          {
            //  return view('materiel.index', ['materiels' => $materiels],['labo'=>$labo]);
              return view('materiel.index')->with([
                  'materiels' => $materiels,
                  'labo'=>$labo,
              ]);;
          }
          else{
              return view('errors.403',['labo'=>$labo]);
          }

  }



  public function details($id)
  {
      $materiel = Materiel::find($id);
      $labo = Parametre::find('1');
      $proprietaires = User::all();


      return view('materiel.details')->with([
          'materiel' => $materiel,
          'proprietaires'=>$proprietaires,
          'labo'=>$labo,

      ]);;
  }

  public function create()
  {
      $labo = Parametre::find('1');
      if( Auth::user()->role->nom == 'admin')
          {
              $proprietaires = User::all();
              return view('materiel.create' , ['proprietaires' => $proprietaires],['labo'=>$labo]);
          }
          else{
              return view('errors.403',['labo'=>$labo]);
          }
  }

  public function store(materielRequest $request)
  {
      $materiel = new Materiel();
      $labo = Parametre::find('1');
      if($request->hasFile('img')){
          $file = $request->file('img');
          $file_name = time().'.'.$file->getClientOriginalExtension();
          $file->move(public_path('/uploads/photo/materiels'),$file_name);

      }
      else{
          $file_name="materielDefault.png";
      }


          $materiel->libelle = $request->input('libelle');
          $materiel->description = $request->input('description');
          $materiel->numero = $request->input('numero');
          $materiel->proprietaire = $request->input('proprietaire');

          $materiel->photo = 'uploads/photo/materiels/'.$file_name;

          $materiel->save();
      return redirect('materiels');

  }

  public function edit($id)
  {

      $materiel = Materiel::find($id);
      $proprietaires = User::all();
      $labo = Parametre::find('1');


      return view('materiel.edit')->with([
          'materiel' => $materiel,
          'proprietaires' => $proprietaires,
          'labo'=>$labo,

      ]);;

  }

  public function update(materielRequest $request , $id)
  {

      $materiel = Materiel::find($id);
      $labo = Parametre::find('1');

      if($request->hasFile('img')){
          $file = $request->file('img');
          $file_name = time().'.'.$file->getClientOriginalExtension();
          $file->move(public_path('/uploads/photo/materiels'),$file_name);
        }
        else{
          if(!isset($materiel->photo))
            $file_name="materielDefault.png";
        }


      $materiel->libelle = $request->input('libelle');
      $materiel->description = $request->input('description');
      $materiel->numero = $request->input('numero');
      $materiel->proprietaire = $request->input('proprietaire');
      if (isset($file_name)) {
          $materiel->photo = 'uploads/photo/materiels/'.$file_name;
      }




      $materiel->save();

    //  return redirect('materiels/'.$id.'/details');
    return redirect('materiels');

  }


  public function destroy($id)
  {
      if( Auth::user()->role->nom == 'admin')
          {
      $materiel = Materiel::find($id);
      $materiel->delete();
      return redirect('materiels');
          }
  }
}
