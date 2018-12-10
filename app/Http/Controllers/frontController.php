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
use App\User;
use App\ArticleUser;

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
}
