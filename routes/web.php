<?php
use App\User;
use App\These;
use App\Projet;
use App\Article;
use App\Equipe;
use App\Parametre;
use Illuminate\Support\Facades\Input;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::prefix('front')->group(function () {
  Route::get('/', function () {
      return view('front.multilab');
  });


  Route::get('/{lab}', function ($lab) {
      return view('front.acceuil')->with([
        'lab'=>$lab,

    ]);
  });
Route::get('{lab}/A-propos','frontController@apropo');

  Route::get('{lab}/actualites','frontController@acctualite');
  // Route::get('actualites', function () {
  //     return view('front/actualites');
  // });
Route::get('{lab}/equipes','frontController@equipe');

Route::get('{lab}/projets','frontController@projet');

Route::get('{lab}/projets/{id}','frontController@projetdetail');

Route::get('{lab}/articles/{id}','frontController@articledetail');


  Route::get('Evenements', function () {
      return view('events');
  });
  Route::get('{lab}/Contact', function () {
      return view('contact');
  });

  Route::get('test', function () {
      return view('front.test');
  });

  Route::get('lrit', function () {
      return view('front.lrit');
  });

  Route::get('{lab}/actualites/{id}','frontController@actualite');

  Route::get('{lab}/profile/{id}','frontController@profile');
  Route::get('{lab}/equipes/{id}','frontController@equipedetail');

  Route::get('{lab}/Contact','frontController@contact');
  Route::get('{lab}/search',function($lab){
    $q = Input::get ( 'search' );
    $articles = DB::select("SELECT * from articles where titre LIKE '%$q%' and deleted_at IS NULL ");
    $projets = DB::select("SELECT * from projets where intitule LIKE '%$q%' and deleted_at IS NULL");
    $users = DB::select("SELECT * from users where name LIKE '%$q%'  OR prenom LIKE '%$q%'");
        return view('front.search')->with([
          'q'=>$q,
          'articles'=>$articles,
          'projets'=>$projets,
          'users'=>$users,
          'lab'=>$lab,

      ]);

});

});


// Route::get('chartjs', 'dashController@chartjs');
Route::get('chartjs', 'dashController@getMonthlyArticleTheseData');
Route::get('dashboard','dashController@index');




// Route::get('parametre','ParametreController@create');
// Route::post('parametre','ParametreController@store');

Route::get('laboratoires/{id}/details','ParametreController@details');
Route::get('labos-trombinoscope','ParametreController@trombi');
Route::resource('laboratoires', 'ParametreController',[
    'only' => ['index', 'create','store','edit','update','destroy']
]);



Route::post('theses','TheseController@store')->middleware('thesecond');
Route::get('theses/{id}/details','TheseController@details');
Route::resource('theses', 'TheseController',[
    'only' => ['index', 'create','edit','update','destroy']
]);
Route::post('/postajaxPartenaireContact3','TheseController@postType');
Route::post('/postajaxTheses','TheseController@postTheses');





Route::get('articles/{id}/details','ArticleController@details');
Route::resource('articles', 'ArticleController',[
    'only' => ['index', 'create','store','edit','update','destroy']
]);
Route::post('/postajaxPartenaireContact','ArticleController@postType');





Route::get('membres/{id}/details','UserController@details');
Route::get('trombinoscope','UserController@trombi');
Route::resource('membres', 'UserController',[
    'only' => ['index', 'create','store','edit','update','destroy']
]);
Route::post('/postajaxMembres1','UserController@postMembres1');
Route::post('/postajaxMembres2','UserController@postMembres2');





Route::get('equipes/{id}/details','EquipeController@details');
Route::resource('equipes', 'EquipeController',[
    'only' => ['index', 'create','store','update','destroy']
]);




Route::get('projets/{id}/details','ProjetController@details');
Route::resource('projets', 'ProjetController',[
    'only' => ['index', 'create','store','edit','update','destroy']
]);
Route::post('/postajaxPartenaireContact2','ProjetController@postType');




Route::get('materiels/{id}/details','MaterielController@details');
Route::resource('materiels', 'MaterielController',[
    'only' => ['index', 'create','store','edit','update','destroy']
]);
Route::post('exemplaires/{catId}','MaterielController@addExemplaire');
Route::delete('exemplaires/{id}/{catId}','MaterielController@deleteExemplaire');
Route::put('exemplaires/{id}/{catId}','MaterielController@editExemplaire');

Route::post('/postajaxTypeProprietaire','MaterielController@postType');
Route::post('/postajaxMateriels','MaterielController@postMateriels');




Route::get('actualites/{id}/details','ActualiteController@details');
Route::resource('actualites', 'ActualiteController',[
    'only' => ['index', 'create','store','edit','update','destroy']
]);




Route::get('evenements/{id}/details','EvenementController@details');
Route::get('evenements/{id}/participe','EvenementController@participe');
Route::get('evenements/{id}/pasParticipe','EvenementController@pasParticipe');
Route::resource('evenements', 'EvenementController',[
    'only' => ['index', 'create','store','edit','update','destroy']
]);




Route::get('partenaires/{id}/details','PartenaireController@details');
Route::resource('partenaires', 'PartenaireController',[
    'only' => ['index', 'create','store','edit','update','destroy']
]);



Route::get('contacts/{id}/details','ContactController@details');
Route::resource('contacts', 'ContactController',[
    'only' => ['index', 'create','store','edit','update','destroy']
]);





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/statistics',function(){

	$year = date('Y');
	 $a1 = DB::table('articles')->distinct('id')->where('annee',$year)->count();
	 $a2 = DB::table('articles')->distinct('id')->where('annee',$year-1)->count();
	 $a3 = DB::table('articles')->distinct('id')->where('annee',$year-2)->count();
	 $a4 = DB::table('articles')->distinct('id')->where('annee',$year-3)->count();
	 $a5 = DB::table('articles')->distinct('id')->where('annee',$year-4)->count();
	 $a6 = DB::table('articles')->distinct('id')->where('annee',$year-5)->count();
	 $a7 = DB::table('articles')->distinct('id')->where('annee',$year-6)->count();

	 $b1 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year)->count();
	 $b2 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-1)->count();
	 $b3 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-2)->count();
	 $b4 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-3)->count();
	 $b5 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-4)->count();
	 $b6 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-5)->count();
	 $b7 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-6)->count();

	 //$date = new Carbon( $these->date_debut );

	 //$t1 = DB::table('theses')->distinct('id')->where(,$year)->count();

    $annee = [$year-6,$year-5,$year-4,$year-3,$year-2,$year-1,$year];
    $article = [$a7, $a6, $a5,$a4,$a3,$a2,$a1];
    $these = [$b7, $b6, $b5,$b4,$b3,$b2,$b1];

	return response()->json(["annee"=>$annee,
							 "article"=> $article,
							 "these"=> $these
							]);
});

Route::any('/search',function(){

	$labo = Parametre::find('1');
    $q = Input::get ( 'q' );
    $membres = User::where('name','LIKE','%'.$q.'%')->orWhere('prenom','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
    $theses = These::where('titre','LIKE','%'.$q.'%')->orWhere('sujet','LIKE','%'.$q.'%')->get();
    $articles = Article::where('titre','LIKE','%'.$q.'%')->orWhere('resume','LIKE','%'.$q.'%')->orWhere('type','LIKE','%'.$q.'%')->get();
    $projets = Projet::where('intitule','LIKE','%'.$q.'%')->orWhere('resume','LIKE','%'.$q.'%')->orWhere('type','LIKE','%'.$q.'%')->get();
    $equipes = Equipe::where('intitule','LIKE','%'.$q.'%')->orWhere('resume','LIKE','%'.$q.'%')->orWhere('achronymes','LIKE','%'.$q.'%')->get();

        // return view('search')->withDetails($user)->withQuery ( $q );
        return view('search')->with([
            'membres' => $membres,
            'theses' => $theses,
            'articles' => $articles,
            'projets' => $projets,
            'equipes' => $equipes,
            'labo'=>$labo,

        ]);;

});
