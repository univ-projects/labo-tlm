<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\contactRequest;
use App\Parametre;
use App\Partenaire;
use App\User;
use App\Contact;
use Auth;

class ContactController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }


  public function index()
  {
$labo = $this->getCurrentLabo();
  $contacts = Contact::all();

      return view('contact.index')->with([
          'contacts' => $contacts,
          'labo'=>$labo
      ]);;
  }


  public function details($id)
  {
    $contact = Contact::find($id);
    if($contact){
    $partenaires = Partenaire::all();
    $labo = $this->getCurrentLabo();

    $first = DB::table('project_contact')
              ->select(DB::raw('\'Projet\' as type,project_id,projets.intitule as titre,resume,projets.id as id'))
               ->leftJoin('projets', 'projets.id', '=', 'project_contact.project_id')
               ->where('contact_id',$id);

    $participants = DB::table('article_contact')


                ->select(DB::raw('\'Article\' as type,article_id ,articles.titre as titre,resume,articles.id as id'))
                ->leftJoin('articles', 'articles.id', '=', 'article_id')
                ->unionAll($first)
                ->where('contact_id',$id)
                ->get();



                 // print_r($participants);die();
    // $participants = DB::table('project_contact')
    //
    //           ->fulljoin('contacts', 'contacts.id', '=', 'project_contact.contact_id')
    //           ->fulljoin('article_contact', 'contacts.id', '=', 'article_contact.contact_id')
    //           ->get();


    return view('contact.details')->with([
        'contact' => $contact,
        'partenaires' => $partenaires,
        'labo'=>$labo,
        'participants'=>$participants

    ]);;
  }
  else {
    return view('errors.404');
  }


  }



  public function create()
  {
  $labo = $this->getCurrentLabo();
        $partenaires = Partenaire::all();

            return view('contact.create')->with([
                'labo'=>$labo,
                'partenaires'=>$partenaires
            ]);

  }


  public function store(contactRequest $request)
  {
    $labo = $this->getCurrentLabo();
      $contact = new Contact();


      if($request->hasFile('img')){
              $file = $request->file('img');
              $file_name = time().'.'.$file->getClientOriginalExtension();
              $file->move(public_path('/uploads/photo/contacts'),$file_name);

          }
          else{
              $file_name="userDefault.png";
          }
          $contact->nom = $request->input('name');
          $contact->prenom = $request->input('prenom');
          $contact->partenaire_id = $request->input('partenaire_id');
          $contact->fonction= $request->input('fonction');
          $contact->email = $request->input('email');
          $contact->num_tel= $request->input('num_tel');
          $contact->photo = 'uploads/photo/contacts/'.$file_name;
          $contact->created_by = Auth::user()->id;

          $contact->save();

          return redirect('contacts');


  }



  public function edit($id)
  {
    $contact = Contact::find($id);
    if($contact){
    $partenaires = Partenaire::all();
    $labo = $this->getCurrentLabo();

    $first = DB::table('project_contact')
              ->select('*',DB::raw('\'Projet\' as type'))
               ->leftJoin('contacts', 'contacts.id', '=', 'project_contact.contact_id');

    $participants = DB::table('article_contact')
                ->select('*',DB::raw('\'Article\' as type'))
                ->leftJoin('contacts', 'contacts.id', '=', 'article_contact.contact_id')
                ->unionAll($first)
                ->get();




    return view('contact.edit')->with([
        'contact' => $contact,
        'partenaires' => $partenaires,
        'labo'=>$labo,
        'participants'=>$participants

    ]);;
  }
  else {
    return view('errors.404');
  }


  }

  public function update(contactRequest $request,$id)
  {
  $labo = $this->getCurrentLabo();
      $contact = Contact::find($id);
      if($contact){

      if($request->hasFile('img')){
              $file = $request->file('img');
              $file_name = time().'.'.$file->getClientOriginalExtension();
              $file->move(public_path('/uploads/photo/contacts'),$file_name);

          }
          else{
              $file_name="userDefault.png";
          }
          $contact->nom = $request->input('name');
          $contact->prenom = $request->input('prenom');
          $contact->partenaire_id = $request->input('partenaire_id');
          $contact->fonction= $request->input('fonction');
          $contact->email = $request->input('email');
          $contact->num_tel= $request->input('num_tel');
          $contact->photo = 'uploads/photo/contacts/'.$file_name;

          $contact->save();

          return redirect('contacts/'.$id.'/details');
        }
        else {
          return view('errors.404');
        }

  }


  public function destroy($id)
  {

      $contact = Contact::find($id);
      if($contact){
      $contact->delete();
      return redirect('contacts');
    }else {
      return view('errors.404');
    }

  }


}
