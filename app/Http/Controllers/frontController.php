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
    public function acctualite(){
      $actualites = Actualite::all();
      $labo = Parametre::find('3');



      return view('front.actualites')->with([
        'actualites' => $actualites,
        'labo'=>$labo,

                ]);;
    }
    public function actualite($id)
    {
      $labo = Parametre::find('1');
	 	   $actualite = Actualite::find($id);
	 //	$membres = Article::find($id)->users()->orderBy('name')->get();

	 	return view('front.actualite')->with([
	 		'actualite' => $actualite,
	 	//	'membres'=>$membres,
	 		'labo'=>$labo,
	 	]);;
    }

    public function profile($id){
      $labo = Parametre::find('3');
      $membre = User::find($id);
      $article = DB::table('articles')
            ->join('article_user', 'articles.id', '=', 'article_user.article_id')
            ->where('article_user.user_id',$id)
            ->get();

      $projet = DB::table('projets')
              ->join('projet_user', 'projets.id', '=', 'projet_user.projet_id')
              ->where('projet_user.user_id',$id)
              ->get();

     $avecs=  DB::select("SELECT * FROM users WHERE id IN (SELECT user_id FROM projet_user where projet_id in (SELECT projet_id FROM projet_user WHERE user_id = (SELECT id from users where id = $id)))");



      return view('front.profile')->with([

          'membre' =>$membre,
          'labo'=>$labo,
          'article'=>$article,
          'projets'=>$projet,
          'avecs'=>$avecs,
      ]);
    }

      public function apropo(){
       $actualites = Actualite::all();
       $membre = User::all();
       $membre = $membre->count();
       $labosum = Parametre::all();
       $labosum = $labosum->count();

       $article = Article::all();
       $these = These::all();
       $article = $article->count();
       $these = $these->count();
       $pub = $article + $these ;

        $labo = Parametre::find('3');
          return view('front.apropo')->with([
              'labo'=>$labo,
              'labosum'=>$labosum,
              'pub'=>$pub,
              'membre'=>$membre,
          ]);
      }

      public function equipe(){
        $equipes = Equipe::where('labo_id',3)->get();
        $chef = DB::table('users')
                ->join('equipes', 'users.id', '=', 'equipes.chef_id')
                ->where('equipes.labo_id',3)
                ->select('users.*')
                ->get();
        $membres = DB::table('users')
                ->join('equipes', 'users.equipe_id', '=', 'equipes.id')
                ->where('equipes.labo_id',3)
                ->select('users.*')
              //  ->groupBy('equipe_id')
                ->get();



        return view('front.equipe')->with([
          'equipes'=>$equipes,
          'chef'=>$chef,
          'membres'=>$membres,
        ]);
      }

      public function equipedetail($id){
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

        return view('front.equipedetail')->with([
          'equipe'=>$equipe,
          'chef'=>$chef,
          'membres'=>$membres,
        ]);
      }

      public function projet(){
          $projets = Projet::all();
        return view('front.projet')->with([
          'projets'=>$projets,

        ]);

      }

      public function projetdetail($id){
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
        ]);
      }

      public function contact(){
        $labo = Parametre::find(3);

        return view('front.contact')->with([
          'labo'=>$labo,
        ]);
      }

      public function articledetail($id){
        $projet = Article::find($id);
        $labo = Parametre::find('3');
        $par = DB::select("SELECT * from users where id = (select publicateur from articles where id = $id)");


        return view('front.articledetail')->with([
          'projet'=>$projet,
          'labo'=>$labo,
          'par'=>$par,
                  ]);
      }


      public function events(){
          $events = Evenement::all();
        return view('front.events')->with([
          'events'=>$events,

        ]);
      }

      public function event($id){
        $evenement = Evenement::find($id);
        $participants = Evenement::find($id)->users()->orderBy('name')->get();
        if($evenement){

          return view('front.event')->with([
            'evenement' => $evenement,
            'participants'=>$participants,

          ]);;
        }
      }

      public function getEvents(){
        //  $events = Evenement::all();
        $events=  DB::table('evenements')
           ->select( array('id', 'titre as title', 'from as start','to as end',DB::raw('LEFT(contenu, 20) as details')) )
           ->get();
      return $events;

      }



}
