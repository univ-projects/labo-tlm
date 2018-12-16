<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Hash;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\ArticleUser;
use App\ArticleContact;
use App\Parametre;
use App\Partenaire;
use App\Contact;
use Auth;
use App\Http\Requests\articleRequest;
use Illuminate\Http\UploadedFile;



class ArticleController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }


	//permet de lister les articles
    public function index(){

		$labo = $this->getCurrentLabo();

    	$listarticle = Article::all();
    	return view('article.index' , ['articles' => $listarticle] ,['labo'=>$labo]);

    }

    public function details($id)
    {
			$labo = $this->getCurrentLabo();

	 	$article = Article::find($id);
	 	$membres = Article::find($id)->users()->orderBy('name')->get();
		$membres_ext =DB::table('articles')
					->leftjoin('article_contact', 'articles.id', '=', 'article_contact.article_id')
					->join('contacts', 'contacts.id', '=', 'article_contact.contact_id')
					->join('partenaires', 'partenaires.id', '=', 'contacts.partenaire_id')
					->select('*', DB::raw('contacts.nom as contactNom'))
					->where('articles.id',$id)
					->get();

					// print_r(reset($membres_ext));die();

	 	return view('article.details')->with([
	 		'article' => $article,
	 		'membres'=>$membres,
	 		'labo'=>$labo,
			'membres_ext'=>$membres_ext
	 	]);;
    }

    //affichage de formulaire de creation d'articles
	 public function create()
	 {
		 $labo = $this->getCurrentLabo();
	 	// if( Auth::user()->role->nom == 'admin')
            {
	 	$membres = User::all();
	 	$article = Article::all();
		$contacts = Contact::all();
		$partenaires = Partenaire::all();

		return view('article.create')->with([
				'membres' => $membres,
				'labo'=>$labo,
				'contacts'=>$contacts,
				'partenaires'=>$partenaires

		]);;

			 }
            // else{
            //     return view('errors.403');
            // }

    }

    //enregistrer un article
	 public function store(articleRequest $request){

	 	$article = new Article();
		$labo = $this->getCurrentLabo();

	 	if($request->hasFile('detail')){

            $file = $request->file('detail');

            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/article'),$file_name);
            $article->detail = '/uploads/article/'.$file_name;

        }

				if($request->hasFile('img')){
						$file = $request->file('img');
						$file_name = time().'.'.$file->getClientOriginalExtension();
						$file->move(public_path('/uploads/photo/articles'),$file_name);

				}
				else{
						$file_name="articleDefault.png";
				}

	 	$article->type = $request->input('type');
	 	$article->titre = $request->input('titre');
	 	$article->resume = $request->input('resume');
	 	$article->lieu_ville = $request->input('ville');
	 	$article->lieu_pays = $request->input('pays');
	 	$article->conference = $request->input('conference');
	 	$article->journal = $request->input('journal');
	 	$article->ISSN = $request->input('issn');
	 	$article->ISBN = $request->input('isbn');
	 	$article->mois = $request->input('mois');
	 	$article->annee = $request->input('annee');
		$article->photo = 'uploads/photo/articles/'.$file_name;
	 	$article->doi = $request->input('doi');
		// $membres_ext =  $request->input('membres_ext');
	 	// $article->membres_ext = $request->input('membres_ext');
	 	$article->deposer = Auth::user()->id;


	 	$article->save();

        $members =  $request->input('membre');
        foreach ($members as $key => $value) {
	 		$article_user = new ArticleUser();
		 	$article_user->article_id = $article->id;
		 	$article_user->user_id = $value;
	 	    $article_user->save();
         }
				 $membres_ext=$request->input('membres_ext');

				 if (isset($membres_ext)) {


					 foreach ($membres_ext as $key => $value) {
						$article_contact = new ArticleContact();
						$article_contact->article_id = $article->id;
						$article_contact->contact_id = $value;
						$article_contact->save();
							}

				 }
	 	return redirect('articles');

	 	//return response()->json(["arr"=>$request->input('membre')]);

    }

    //récuperer un article puis le mettre dans le formulaire
	 public function edit($id){

	 	$article = Article::find($id);
	 	$membres = User::all();
$labo = $this->getCurrentLabo();
		$contacts = Contact::all();
		$partenaires = Partenaire::all();

	 	$this->authorize('update', $article);

	 	return view('article.edit')->with([
	 		'article' => $article,
	 		'membres'=>$membres,
	 		'labo'=>$labo,
			'contacts'=>$contacts,
			'partenaires'=>$partenaires
	 	]);;
    }

    //modifier et inserer
    public function update(articleRequest $request ,$id){

    	$article = Article::find($id);
		$labo = $this->getCurrentLabo();

    	$article->type = $request->input('type');
	 	$article->titre = $request->input('titre');
	 	$article->resume = $request->input('resume');
	 	$article->lieu_ville = $request->input('ville');
	 	$article->lieu_pays = $request->input('pays');
	 	$article->conference = $request->input('conference');
	 	$article->journal = $request->input('journal');
	 	$article->ISSN = $request->input('issn');
	 	$article->ISBN = $request->input('isbn');
	 	$article->mois = $request->input('mois');
	 	$article->annee = $request->input('annee');
	 	$article->doi = $request->input('doi');

	 	if($request->hasFile('detail')){

            $file = $request->file('detail');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/article'),$file_name);

        $article->detail = '/uploads/article/'.$file_name;

        }
				if($request->hasFile('img')){
						$file = $request->file('img');
						$file_name = time().'.'.$file->getClientOriginalExtension();
						$file->move(public_path('/uploads/photo/articles'),$file_name);

				}
				else{
						$file_name="articleDefault.png";
				}


		$article->photo = 'uploads/photo/articles/'.$file_name;

	 	$article->save();

	 	$members =  $request->input('membre');
        $article_user = ArticleUser::where('article_id',$id);
        $article_user->delete();

        foreach ($members as $key => $value) {
            $article_user = new ArticleUser();
            $article_user->article_id = $article->id;
            $article_user->user_id = $value;
            $article_user->save();

         }
				 $membres_ext=$request->input('membres_ext');
				 $article_contact = ArticleContact::where('article_id',$id);
				 $article_contact->delete();

				 if (isset($membres_ext)) {

					 foreach ($membres_ext as $key => $value) {
						$article_contact = new ArticleContact();
						$article_contact->article_id = $article->id;
						$article_contact->contact_id = $value;
						$article_contact->save();
							}
						}



	 	return redirect('articles');
    }

    //supprimer un article
    public function destroy($id){

    	$article = Article::find($id);

	 	$this->authorize('delete', $article);

        $article->delete();
        return redirect('articles');

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
