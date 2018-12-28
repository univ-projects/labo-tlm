<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\actualiteRequest;
use App\Parametre;
use App\Actualite;
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
      $labo = Parametre::find('1');



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
      $labo = Parametre::find('1');
      $membre = User::find($id);
      $article = DB::table('articles')
            ->join('article_user', 'articles.id', '=', 'article_user.article_id')
            ->where('article_user.user_id',$id)
            ->get();

      $projet = DB::table('projets')
              ->join('projet_user', 'projets.id', '=', 'projet_user.projet_id')
              ->where('projet_user.user_id',$id)
              ->get();
              $arrayName = array();
              foreach ($projet as $p) {
                  array_push($arra,$p['project_id']);
              }

      $with_projet =  DB::table('users')
              ->join('projet_user', 'users.id', '=', 'projet_user.user_id')
              ->where('projet_user.user_id',$id)

              ->get();


      $res=array();
      array_push($res,$with_projet);
      array_push($res,$with_article);



      return view('front.profile')->with([

          'membre' => $membre,
          'labo'=>$labo,
          'article'=>$article,
          'projets'=>$projet,
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
        return view('front.projetdetail')->with([
          'projet'=>$projet,
        ]);
      }

}
