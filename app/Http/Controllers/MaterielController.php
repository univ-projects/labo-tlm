<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\materielRequest;
use App\Http\Requests\exemplaireRequest;
use App\Parametre;
use App\Materiel;
use App\Category;
use App\User;
use App\Affecter;


use Auth;


class MaterielController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

   public function index()
  {
      // $materiels = Materiel::all();
      $labo = Parametre::find('1');
      $materiels = Category::all();
      // print_r($materiels);die();

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
      // $materiel = Materiel::find($id);
      $materiel = Category::find($id);
      $labo = Parametre::find('1');
      $proprietaires = User::all();
      $exemplaires = Materiel::where('category_id', $id)->get();
      // print_r($materiel->category);die();
      $affectations = DB::table('affecter')
            ->join('users', 'users.id', '=', 'affecter.user_id')
            ->join('materiels', 'materiels.id', '=', 'affecter.materiel_id')
            ->join('categories', 'categories.id', '=', 'materiels.category_id')
            ->where('categories.id',$id)
            ->get();
      // $affectations = Affecter::where($materiel->category, $id)->get();
      // print_r($affectations);die();

      if(Auth::user()->role->nom == 'admin' ){
        return view('materiel.details')->with([
            'materiel' => $materiel,
            'proprietaires'=>$proprietaires,
            'labo'=>$labo,
            'exemplaires'=>$exemplaires,
            'affectations'=>$affectations,
            'catId'=>$id

        ]);;
      }
      else{
        return view('errors.403',['labo'=>$labo]);
      }
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
      $materiel = new Category();
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
          $materiel->quantity = $request->input('quantite');
          $qte=$materiel->quantity;
          $materiel->description = $request->input('description');
          // $materiel->proprietaire = $request->input('proprietaire');

          $materiel->photo = 'uploads/photo/materiels/'.$file_name;

          if($materiel->save()){//si category inséré
            for($i=0;$i<$qte;$i++){ //inserer dans materiel
              $materiels=new Materiel();
              $materiels->category_id=$materiel->id; //category id
              $materiels->numero=time().$i;
              $materiels->save();
            }
          }


      return redirect('materiels');

  }

  public function edit($id)
  {

      // $materiel = Materiel::find($id);
      $proprietaires = User::all();
      $labo = Parametre::find('1');
      $materiel = Category::find($id);

      if(Auth::user()->role->nom == 'admin' ){
        return view('materiel.edit')->with([
            'materiel' => $materiel,
            'proprietaires' => $proprietaires,
            'labo'=>$labo,

        ]);;
      }
      else{
        return view('errors.403',['labo'=>$labo]);
      }

  }

  public function update(materielRequest $request , $id)
  {

      // $materiel = Materiel::find($id);
      $labo = Parametre::find('1');
      $materiel = Category::find($id);

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
      // $materiel = Materiel::find($id);
      $materiel = Category::find($id);
      $materiel->delete();
      return redirect('materiels');
          }
  }

  public function editExemplaire(exemplaireRequest $request , $id,$catId)
  {

      $materiel = Materiel::find($id);
      $labo = Parametre::find('1');


        $oldProprietaire=  $materiel->proprietaire;


        $materiel->numero = $request->input('numero');
        $materiel->proprietaire = $request->input('proprietaire');




    if(  $materiel->save()){
        if($oldProprietaire!=$materiel->proprietaire){
            if(isset($materiel->proprietaire)){
              $affect = new Affecter();
              $affect->materiel_id=$materiel->id;
              $affect->user_id=$materiel->proprietaire;
              $affect->from=$materiel->created_at;
              $affect->save();
            }
          $affectUpdate=Affecter::where('materiel_id', $id)
          ->where('user_id',$oldProprietaire)
          ->get();
          foreach ($affectUpdate as $affected) {
            $affected->to=$materiel->updated_at;
            $affected->save();
          }
        }
    }

    return redirect('materiels/'.$catId.'/details');

  }

  public function addExemplaire(exemplaireRequest $request ,$catId)
  {

        $materiel = new Materiel();
      $labo = Parametre::find('1');

        $materiel->numero = $request->input('numero');
         $materiel->proprietaire = $request->input('proprietaire');
         $materiel->category_id = $catId;


    if(  $materiel->save()){
      $category = Category::find($catId);
      $qte=$category->quantity;
      $qte++;
      $category->quantity=$qte;
      $category->save();
      if(isset($materiel->proprietaire)){
        $affect = new Affecter();
        $affect->materiel_id=$materiel->id;
        $affect->user_id=$materiel->proprietaire;
        $affect->from=$materiel->created_at;
        $affect->save();
      }
    }



    return redirect('materiels/'.$catId.'/details');
    // return redirect('materiels');

  }


  public function deleteExemplaire($id,$catId)
  {
      if( Auth::user()->role->nom == 'admin')
          {
            $category = Category::find($catId);
            $qte=$category->quantity;
            $qte--;
            $category->quantity=$qte;
            $category->save();

            $materiel = Materiel::find($id);
            $materiel->delete();
            return redirect('materiels/'.$catId.'/details');
          }
  }



}
