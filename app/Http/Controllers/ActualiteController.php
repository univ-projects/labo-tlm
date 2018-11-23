<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\actualiteRequest;
use App\Parametre;
use App\Actualite;
use App\User;


use Auth;


class ActualiteController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

   public function index()
  {
      $actualites = Actualite::all();
      $labo = Parametre::find('1');

      // if( Auth::user()->role->nom == 'admin')
      //     {
            //  return view('actualite.index', ['actualites' => $actualites],['labo'=>$labo]);
              return view('actualite.index')->with([
                  'actualites' => $actualites,
                  'labo'=>$labo,
              ]);;
          // }
          // else{
          //     return view('errors.403',['labo'=>$labo]);
          // }

  }



  public function details($id)
  {
      $actualite = Actualite::find($id);
      $labo = Parametre::find('1');



      return view('actualite.details')->with([
          'actualite' => $actualite,
          'labo'=>$labo,

      ]);;
  }

  public function create()
  {
      $labo = Parametre::find('1');
      // if( Auth::user()->role->nom == 'admin')
      //     {

              return view('actualite.create' , ['labo'=>$labo]);
          //}
          // else{
          //     return view('errors.403',['labo'=>$labo]);
          // }
  }

  public function store(actualiteRequest $request)
  {
      $actualite = new actualite();
      $labo = Parametre::find('1');
      if($request->hasFile('img')){
          $file = $request->file('img');
          $file_name = time().'.'.$file->getClientOriginalExtension();
          $file->move(public_path('/uploads/photo/actualites'),$file_name);

      }
      else{
          $file_name="actualiteDefault.jpg";
      }

          $actualite->titre = $request->input('titre');
          $actualite->contenu = $request->input('contenu');
          $actualite->photo = $request->input('photo');
          $actualite->auteur = Auth::user()->id;
          $actualite->status = $request->input('status');

          $actualite->photo = 'uploads/photo/actualites/'.$file_name;

          $actualite->save();
      return redirect('actualites');

  }

  public function edit($id)
  {

      $actualite = Actualite::find($id);
      $labo = Parametre::find('1');

      if(Auth::user()->role->nom == 'admin' || Auth::user()->id===$actualite->auteurUser->id ){
        return view('actualite.edit')->with([
            'actualite' => $actualite,
            'labo'=>$labo,

        ]);;
      }
      else{
         return view('errors.403',['labo'=>$labo]);
      }


  }

  public function update(actualiteRequest $request , $id)
  {

      $actualite = Actualite::find($id);
      $labo = Parametre::find('1');

      if($request->hasFile('img')){
          $file = $request->file('img');
          $file_name = time().'.'.$file->getClientOriginalExtension();
          $file->move(public_path('/uploads/photo/actualites'),$file_name);
        }
        else{
          if(!isset($actualite->photo))
            $file_name="actualiteDefault.jpg";
        }


        $actualite->titre = $request->input('titre');
        $actualite->contenu = $request->input('contenu');
        $actualite->status = $request->input('status');
        $actualite->auteur = Auth::user()->id;

      if (isset($file_name)) {
          $actualite->photo = 'uploads/photo/actualites/'.$file_name;
      }




      $actualite->save();

    //  return redirect('actualites/'.$id.'/details');
    return redirect('actualites');

  }


  public function destroy($id)
  {
      if( Auth::user()->role->nom == 'admin')
          {
      $actualite = Actualite::find($id);
      $actualite->delete();
      return redirect('actualites');
          }
  }
}
