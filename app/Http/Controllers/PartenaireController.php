<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\partenaireRequest;
use App\Parametre;
use App\Partenaire;
use App\User;
use App\Contact;

use Auth;

class PartenaireController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }


  public function index()
  {
  $labo = $this->getCurrentLabo();
  $partenaires = Partenaire::all();
   // $nbr = DB::table('users')
   //            ->groupBy('equipe_id')
   //            ->count('equipe_id');


        $nbr = DB::table('contacts')
                 ->select( DB::raw('count(*) as total,partenaire_id'))
                 ->groupBy('partenaire_id')
                 ->get();

      $nbr_particip_proj = DB::table('contacts')
                ->select( DB::raw('count(*) as total,partenaire_id'))
                ->join('project_contact', 'contacts.id', '=', 'project_contact.contact_id')
                ->groupBy('partenaire_id')
                ->get();

          $nbr_particip_article = DB::table('contacts')
                    ->select( DB::raw('count(*) as total,partenaire_id'))
                    ->join('article_contact', 'contacts.id', '=', 'article_contact.contact_id')
                    ->groupBy('partenaire_id')
                    ->get();


      return view('partenaire.index')->with([
          'partenaires' => $partenaires,
          'nbr' => $nbr,
          'labo'=>$labo,
          'nbr_particip_proj'=>$nbr_particip_proj,
          'nbr_particip_article'=>$nbr_particip_article
      ]);;
  }

  public function create()
  {
    $labo = $this->getCurrentLabo();



            return view('partenaire.create')->with([
                'labo'=>$labo,
            ]);

  }

  public function details($id)
  {
      $labo = $this->getCurrentLabo();
      $labos= Parametre::all();
      $partenaire = Partenaire::find($id);
      if($partenaire){
      $contacts= Contact::where('partenaire_id', $id)->get();

      return view('partenaire.details')->with([
          'partenaire' => $partenaire,
          'contacts' => $contacts,
          'labo'=>$labo,
          'labos'=>$labos
      ]);
    }
    else {
      return view('errors.404');
    }
  }

  public function store(partenaireRequest $request)
  {
      $labo = $this->getCurrentLabo();

      $partenaire = new Partenaire();

      if($request->hasFile('img')){
          $file = $request->file('img');
          $file_name = time().'.'.$file->getClientOriginalExtension();
          $file->move(public_path('/uploads/photo/partenaires'),$file_name);

      }
      else{
          $file_name="materielDefault.png";
      }

      $partenaire->nom = $request->input('intitule');
      $partenaire->description = $request->input('resume');
      $partenaire->type= $request->input('type');
      $partenaire->pays = $request->input('pays');
      $partenaire->ville = $request->input('ville');
      $partenaire->lien = $request->input('lien');
      $partenaire->logo = 'uploads/photo/partenaires/'.$file_name;
      $partenaire->created_by = Auth::user()->id;

      $partenaire->save();

      return redirect('partenaires');

  }

  public function update(partenaireRequest $request,$id)
  {
      $labo = $this->getCurrentLabo();
      $partenaire = Partenaire::find($id);
      if($partenaire){

      if($request->hasFile('img')){
              $file = $request->file('img');
              $file_name = time().'.'.$file->getClientOriginalExtension();
              $file->move(public_path('/uploads/photo/partenaires'),$file_name);

          }
          else{
              $file_name="materielDefault.png";
          }
          $partenaire->nom = $request->input('intitule');
          $partenaire->description = $request->input('resume');
          $partenaire->type= $request->input('type');
          $partenaire->pays = $request->input('pays');
          $partenaire->ville = $request->input('ville');
          $partenaire->lien = $request->input('lien');
          $partenaire->logo = 'uploads/photo/partenaires/'.$file_name;


          $partenaire->save();

          return redirect('partenaires/'.$id.'/details');
        }
        else {
          return view('errors.404');
        }

  }

  public function destroy($id)
  {

      $partenaire = Partenaire::find($id);
      if($partenaire){
        $partenaire->delete();
        return redirect('partenaires');
    }
    else {
      return view('errors.404');
    }
  }
}
