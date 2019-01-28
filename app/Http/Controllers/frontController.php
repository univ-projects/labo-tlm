<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\actualiteRequest;
use App\Parametre;
use App\Actualite;
use App\Evenement;
use App\article;
use App\these;
use App\User;
use App\ArticleUser;
use App\Equipe;
use App\Projet;

class frontController extends Controller
{

    public function acctualite($lab){
      $actualites = DB::table('actualites')
            ->join('users', 'users.id', '=', 'actualites.auteur')
            ->join('equipes', 'users.equipe_id', '=', 'equipes.id')
            ->where('equipes.labo_id',$lab)
            ->select('actualites.*')
            ->orderByDesc('created_at')
            ->get();

      $labo = Parametre::find($lab);

      return view('front.actualites')->with([
        'actualites' => $actualites,
        'labo'=>$labo,
        'lab'=>$lab,

                ]);;
    }
    public function actualite($lab,$id)
    {
      $labo = Parametre::find($lab);
	 	   $actualite = Actualite::find($id);
	 //	$membres = Article::find($id)->users()->orderBy('name')->get();

	 	return view('front.actualite')->with([
	 		'actualite' => $actualite,
	 	//	'membres'=>$membres,
	 		'labo'=>$labo,
      'lab'=>$lab,
	 	]);;
    }

    public function profile($lab,$id){
      $labo = Parametre::find($lab);
      $membre = User::find($id);
      $article = DB::table('articles')
            ->join('article_user', 'articles.id', '=', 'article_user.article_id')
            ->where('article_user.user_id',$id)
          //  ->select('articles.*')
            ->get();

      $projet = DB::table('projets')
              ->join('projet_user', 'projets.id', '=', 'projet_user.projet_id')
              ->where('projet_user.user_id',$id)
              ->select('projets.*')
              ->get();

     $avecs=  DB::select("SELECT * FROM users WHERE id IN (SELECT user_id FROM projet_user where projet_id in (SELECT projet_id FROM projet_user WHERE user_id = (SELECT id from users where id = $id)))");
     $these = DB::table('theses')
           ->where('theses.user_id',$id)
           ->select('theses.*')
           ->get();
    $ens1 = DB::select("SELECT * from users where id in (SELECT coencadreur_int from theses where user_id = $id)");
    $ens2 = DB::select("SELECT * from users where id in (SELECT encadreur_int from theses where user_id = $id)");
     return view('front.profile')->with([
          'membre' =>$membre,
          'labo'=>$labo,
          'article'=>$article,
          'projets'=>$projet,
          'avecs'=>$avecs,
          'lab'=>$lab,
          'these'=>$these,
          'ens1'=>$ens1,
          'ens2'=>$ens2,
      ]);
    }

      public function apropo($lab){

       $membre =DB::table('users')
             ->join('equipes', 'users.equipe_id', '=', 'equipes.id')
             ->where('equipes.labo_id',$lab)
             ->select('users.*')
             ->get();
       $membre = $membre->count();
       $labosum = DB::table('equipes')
             ->where('equipes.labo_id',$lab)
             ->select('equipes.*')
             ->get();
       $labosum = $labosum->count();

       $article = DB::table('articles')
             ->join('users', 'users.id', '=', 'articles.publicateur')
             ->join('equipes', 'users.equipe_id', '=', 'equipes.id')
             ->where('equipes.labo_id',$lab)
             ->select('articles.*')
             ->get();
       $these = DB::table('theses')
             ->join('users', 'users.id', '=', 'theses.user_id')
             ->join('equipes', 'users.equipe_id', '=', 'equipes.id')
             ->where('equipes.labo_id',$lab)
             ->select('theses.*')
             ->get();
       $article = $article->count();
       $these = $these->count();
       $pub = $article + $these ;

        $labo = Parametre::find($lab);
          return view('front.apropo')->with([
              'labo'=>$labo,
              'labosum'=>$labosum,
              'pub'=>$pub,
              'membre'=>$membre,
              'lab'=>$lab,
          ]);
      }

      public function equipe($lab){

        $equipes = Equipe::where('labo_id',$lab)->get();
        $chef = DB::table('users')
                ->join('equipes', 'users.id', '=', 'equipes.chef_id')
                ->where('equipes.labo_id',$lab)
                ->select('users.*')
                ->get();
        $membres = DB::table('users')
                ->join('equipes', 'users.equipe_id', '=', 'equipes.id')
                ->where('equipes.labo_id',$lab)
                ->select('users.*')
              //  ->groupBy('equipe_id')
                ->get();

        return view('front.equipe')->with([
          'equipes'=>$equipes,
          'chef'=>$chef,
          'membres'=>$membres,
          'lab'=>$lab,
        ]);
      }

      public function equipedetail($lab,$id){
        $equipe = Equipe::find($id);
        $chef = DB::table('users')
                ->join('equipes', 'users.id', '=', 'equipes.chef_id')
                ->where('equipes.id',$id)
                ->select('users.*')
                ->get();
        $membres = DB::table('users')
                ->join('equipes', 'users.equipe_id', '=', 'equipes.id')
                ->where('equipes.id',$id)
                ->select('users.*')
                ->get();

        $projets = DB::table('projets')
                ->join('users', 'users.id', '=', 'projets.chef_id')
                ->where('users.equipe_id',$id)
                ->select('projets.*')
                ->get();
        $contacts = DB::SELECT("SELECT * from partenaires where id in (select partenaire_id from contacts where id in (select contact_id from project_contact where project_id in (select projet_id from projet_user where user_id in (select id from users where equipe_id = $id))))");
        return view('front.equipedetail')->with([
          'equipe'=>$equipe,
          'chef'=>$chef,
          'membres'=>$membres,
          'lab'=>$lab,
          'projets'=>$projets,
          'contacts'=>$contacts,
        ]);
      }

      public function projet($lab){


          $projets = DB::table('projets')
                ->join('users', 'users.id', '=', 'projets.chef_id')
                ->join('equipes', 'users.equipe_id', '=', 'equipes.id')
                ->where('equipes.labo_id',$lab)
                ->whereNull('projets.deleted_at')
                ->select('projets.*')
                ->get();

        return view('front.projet')->with([
          'projets'=>$projets,
          'lab'=>$lab,

        ]);

      }

      public function projetdetail($lab,$id){

        $projet = Projet::find($id);
        $equipe = DB::select("SELECT * from equipes where id in (select equipe_id from users where id in (select user_id from projet_user where projet_id = $id))");
        $membres = DB::table('users')
                ->join('projet_user', 'users.id', '=', 'projet_user.user_id')
                ->where('projet_user.projet_id',$id)
                ->select('users.*')
                ->get();
        return view('front.projetdetail')->with([
          'membres'=>$membres,
          'projet'=>$projet,
          'equipe'=>$equipe,
          'lab'=>$lab,
        ]);
      }

      public function contact($lab){
        $labo = Parametre::find($lab);

        return view('front.contact')->with([
          'labo'=>$labo,
          'lab'=>$lab,
        ]);
      }

      public function article($lab){


          $articles = DB::table('articles')
                ->join('article_user', 'article_user.article_id', '=', 'articles.id')
                ->join('users', 'users.id', '=', 'article_user.user_id')
                ->join('equipes', 'users.equipe_id', '=', 'equipes.id')
                ->where('equipes.labo_id',$lab)
                ->whereNull('articles.deleted_at')
                ->select('articles.*')
                ->distinct('id')
                ->get();

        return view('front.articles')->with([
          'articles'=>$articles,
          'lab'=>$lab,

        ]);

      }

      public function articledetail($lab,$id){
        $article = Article::find($id);
        $labo = Parametre::find($lab);
        $par = DB::select("SELECT * from users where id = (select publicateur from articles where id = $id)");


        return view('front.articledetail')->with([
          'article'=>$article,
          'labo'=>$labo,
          'par'=>$par,
          'lab'=>$lab,
                  ]);
      }


      public function events($lab){
          $events = Evenement::all();
        return view('front.events')->with([
          'events'=>$events,
          'lab'=>$lab
        ]);
      }

      public function event($id,$lab){
        $evenement = Evenement::find($id);
        $participants = Evenement::find($id)->users()->orderBy('name')->get();
        if($evenement){

          return view('front.event')->with([
            'evenement' => $evenement,
            'participants'=>$participants,
            'lab'=>$lab
          ]);;
        }
      }

      public function getEvents($lab){
        //  $events = Evenement::all();
        $events=  DB::table('evenements')
            ->join('users', 'users.id', '=', 'evenements.auteur')
            ->join('equipes', 'users.equipe_id', '=', 'equipes.id')
             ->select( array('evenements.id', 'titre as title', 'from as start','to as end',DB::raw('LEFT(contenu, 20) as details')) )
             ->where('labo_id',$lab)
             ->get();
      return $events;

      }



}
