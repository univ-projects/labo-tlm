<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\projetRequest;
use App\Projet;
use App\User;
use App\Partenaire;
use App\Contact;
use Auth;
use App\ProjetUser;
use App\ProjectContact;
use App\Parametre;
use Illuminate\Http\UploadedFile;

class ProjetController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

	//permet de lister les articles
    public function index(){
    	$projets = Projet::all();
      $labo = $this->getCurrentLabo();
        // $membres = Projet::find($id)->users()->orderBy('name')->get();

    	return view('projet.index' , ['projets' => $projets] ,['labo'=>$labo]);

    }

    public function details($id)
    {
        $labo = $this->getCurrentLabo();
        $projet = Projet::find($id);
        if($projet){
        $membres = Projet::find($id)->users()->orderBy('name')->get();
        $membres_ext =DB::table('projets')
              ->leftjoin('project_contact', 'projets.id', '=', 'project_contact.project_id')
              ->join('contacts', 'contacts.id', '=', 'project_contact.contact_id')
              ->join('partenaires', 'partenaires.id', '=', 'contacts.partenaire_id')
              ->select('*', DB::raw('contacts.nom as contactNom'))
              ->where('projets.id',$id)
              ->get();
              // print_r($membres_ext);

        return view('projet.details')->with([
            'projet' => $projet,
            'membres'=>$membres,
            'labo'=>$labo,
            'membres_ext'=>$membres_ext
        ]);;
      }
      else {
          return view('errors.404');
        }
    }

    //affichage de formulaire de creation d'articles
	 public function create()
     {
        $labo = $this->getCurrentLabo();
        $partenaires=Partenaire::all();

        if( Auth::user()->role->nom == 'admin')
            {
    	 	 $membres = User::all();
             $projet = Projet::all();
             return view('projet.create')->with([
                 'partenaires' => $partenaires,
                 'membres'=>$membres,
                 'labo'=>$labo,
             ]);;
            }
             else{
                return view('errors.403',['labo'=>$labo]);
            }
    }


	 public function store(projetRequest $request){

	 	$projet = new Projet();
      $labo = $this->getCurrentLabo();

	 	if($request->hasFile('detail')){

            $file = $request->file('detail');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/projet'),$file_name);
            $projet->detail = '/uploads/projet/'.$file_name;
        }
        if($request->hasFile('img')){
            $file = $request->file('img');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo/projets'),$file_name);

        }
        else{
            $file_name="projetDefault.png";
        }

	 	$projet->intitule = $request->input('intitule');
	 	$projet->resume = $request->input('resume');
	 	$projet->type = $request->input('type');

    $projet->photo = 'uploads/photo/projets/'.$file_name;
	 	// $projet->partenaires = $request->input('partenaires');
	 	$projet->lien = $request->input('lien');
        $projet->chef_id = $request->input('chef_id');

        $projet->date_debut = $request->input('date_debut');
        $projet->date_fin = $request->input('date_fin');


	 	$projet->save();

        $members =  $request->input('membre');
        foreach ($members as $key => $value) {
            $projet_user = new ProjetUser();
            $projet_user->projet_id = $projet->id;
            $projet_user->user_id = $value;
            $projet_user->save();

         }
         $membres_ext=$request->input('membres_ext');

         if (isset($membres_ext)) {

           foreach ($membres_ext as $key => $value) {
            $projet_contact = new ProjectContact();
            $projet_contact->project_id = $projet->id;
            $projet_contact->contact_id = $value;

            $projet_contact->save();
              }

         }

	 	return redirect('projets');


	 }

    //récuperer un article puis le mettre dans le formulaire
	 public function edit($id){

	 	$projet = Projet::find($id);
    if($projet){
	 	 $membres = User::all();
    $labo = $this->getCurrentLabo();
    $contacts = Contact::all();
		$partenaires = Partenaire::all();


         $this->authorize('update', $projet);

	 	return view('projet.edit')->with([
            'projet' => $projet,
            'membres' => $membres,
            'labo'=>$labo,
            'partenaires'=>$partenaires,
            'contacts'=>$contacts
        ]);;
      }
      else {
          return view('errors.404');
        }
    }

    //modifier et inserer
    public function update(projetRequest $request , $id){

    	$projet = Projet::find($id);
      if($projet){
      $labo = $this->getCurrentLabo();

    	if($request->hasFile('detail')){

            $file = $request->file('detail');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/projet'),$file_name);
	 	     $projet->detail = '/uploads/projet/'.$file_name;

        }

        if($request->hasFile('img')){
            $file = $request->file('img');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo/projets'),$file_name);

        }
        else{
            $file_name="projetDefault.png";
        }

        $projet->intitule = $request->input('intitule');
        $projet->resume = $request->input('resume');
        $projet->type = $request->input('type');
        // $projet->partenaires = $request->input('partenaires');
        $projet->photo = 'uploads/photo/projets/'.$file_name;
        $projet->lien = $request->input('lien');
        $projet->chef_id = $request->input('chef_id');
        $projet->date_debut = $request->input('date_debut');
        $projet->date_fin = $request->input('date_fin');

	 	$projet->save();

        $members =  $request->input('membre');
        $projet_user = ProjetUser::where('projet_id',$id);
        $projet_user->delete();

        foreach ($members as $key => $value) {
            $projet_user = new ProjetUser();
            $projet_user->projet_id = $projet->id;
            $projet_user->user_id = $value;
            $projet_user->save();

         }


         $membres_ext=$request->input('membres_ext');
         $project_contact = ProjectContact::where('project_id',$id);
         $project_contact->delete();

         if (isset($membres_ext)) {

           foreach ($membres_ext as $key => $value) {
            $project_contact = new ProjectContact();
            $project_contact->project_id = $projet->id;
            $project_contact->contact_id = $value;
            $project_contact->save();
              }
            }


	 	return redirect('projets');
    }
    else {
        return view('errors.404');
      }
    }
    //supprimer un article
    public function destroy($id){

    	$projet = Projet::find($id);
      if($projet){
        $this->authorize('delete', $projet);

        $projet->delete();
        return redirect('projets');
      }
      else {
          return view('errors.404');
        }
    }


    public function postType(Request $request)
    {

         $partenaires_ext = $request->type_partenaire;

           if (isset($partenaires_ext)) {

                 $cpt=0;
                 $contacts=array();
              foreach ($partenaires_ext as $key => $value) {
                $contactsPartenaire=DB::table('contacts')
                            ->where('partenaire_id',$value)
                            ->get();
                array_push($contacts,$contactsPartenaire);
              }
              $contacts=reset($contacts);

           }


          $output='';
         if(isset($contacts)){

                 foreach ($contacts as $contact) {
                   $output.=" <option value=\"$contact->id\">$contact->nom $contact->prenom</option>";
                 }

         }

         return response()->json($output);
    }




}
