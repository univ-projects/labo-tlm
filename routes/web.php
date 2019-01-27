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
    return redirect('front/');
  });
Route::prefix('front')->group(function () {
  Route::get('/', function () {
    $labs= DB::select("SELECT * from parametres");
    $ups =  DB::select("SELECT * from evenements where evenements.to >= now() ");
    $last = DB::select("SELECT * from evenements where evenements.to < now() ");
    $accs = DB::select("SELECT * from actualites order by updated_at desc");
    $labss =  DB::select("SELECT * FROM equipes WHERE id IN (SELECT equipe_id FROM users WHERE id IN (SELECT auteur FROM actualites ORDER BY updated_at DESC))");
    $stat_equipes  = DB::select("SELECT count(*) as c from equipes");
    $stat_membre= DB::select("SELECT count(*) as c from users");
    $stat_projet= DB::select("SELECT count(*) as c from projets");
    $stat_article= DB::select("SELECT count(*) as c from articles");
    $stat_these= DB::select("SELECT count(*) as c from theses");
      return view('front.multilab')->with([
        'labs'=>$labs,
        'ups'=>$ups,
        'last'=>$last,
        'accs'=>$accs,
        'labss'=>$labss,
        'stat_eq'=>$stat_equipes,
        'stat_m'=>$stat_membre,
        'stat_p'=>$stat_projet,
        'stat_ar'=>$stat_article,
        'stat_th'=>$stat_these,
    ]);
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

  Route::get('{lab}/Evenements/{id}','frontController@event');
  Route::get('{lab}/Evenements','frontController@events');
  Route::get('{lab}/getEvents','frontController@getEvents');

  Route::get('Evenements', function () {
      return view('events');
  });
  Route::get('{lab}/Contact', function () {
      return view('contact');
  });


    Route::get('Contact', function () {
        return view('contact');
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
          'lab'=>$lab,  ]); });

    Route::get('profile/{id}','frontController@profile');
    Route::get('equipes/{id}','frontController@equipedetail');

    Route::get('Contact','frontController@contact');
    Route::get('search',function(){
      $q = Input::get ( 'search' );
      $articles = DB::select("SELECT * from articles where titre LIKE '%$q%' and deleted_at IS NULL ");
      $projets = DB::select("SELECT * from projets where intitule LIKE '%$q%' and deleted_at IS NULL");
      $users = DB::select("SELECT * from users where name LIKE '%$q%'  OR prenom LIKE '%$q%'");
          return view('front.search')->with([
            'q'=>$q,
            'articles'=>$articles,
            'projets'=>$projets,
            'users'=>$users,

        ]);

});


Route::get('/{lab}/connexion', function ($lab) {
    return view('auth/login')->with([
      'lab'=>$lab,  ]);
});

});




// Route::get('chartjs', 'dashController@chartjs');
Route::get('theses-dash', 'dashController@getMonthlyTheseData');
Route::get('typeArticle-dash', 'dashController@getArticleTypeCount');
Route::get('gradeMember-dash', 'dashController@getMonthlyMembre');
Route::get('laboMember-dash', 'dashController@getMembersLaboCount');


Route::get('dashboard','dashController@index');

Route::get('roles','ParametreController@role');
Route::get('parametres','ParametreController@parametre');
Route::put('parametres/{id}','ParametreController@updateApp');



// Route::get('parametre','ParametreController@create');
// Route::post('parametre','ParametreController@store');
Route::get('laboMemberEquipe-pie-chart/{id}', 'ParametreController@getMembersLaboEquipeCount');
Route::get('laboTypeArticle-pie-chart/{id}', 'ParametreController@getArticleTypeCount');
Route::get('laboGradeMember-line-chart/{id}', 'ParametreController@getMonthlyMembre');
Route::get('laboArticleEquipe-bar-chart/{id}', 'ParametreController@getMonthlyArticle');
Route::get('laboProjetEquipe-bar-chart/{id}', 'ParametreController@getMonthlyProjet');

Route::get('laboratoires/{id}/details','ParametreController@details');
Route::get('labos-trombinoscope','ParametreController@trombi');
Route::resource('laboratoires', 'ParametreController',[
    'only' => ['index', 'create','store','edit','update','destroy']
]);




Route::post('theses','TheseController@store')->middleware('thesecond');
Route::get('theses/{id}/details','TheseController@details');
Route::resource('theses', 'TheseController',[
    'only' => ['index', 'create','store','edit','update','destroy']
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
Route::post('/postajaxMembres3','UserController@postMembres3');




Route::get('equipeThese-bar-chart/{id}', 'EquipeController@getMonthlyTheseData');
Route::get('equipeTypeArticle-stacked-chart/{id}', 'EquipeController@getMonthlyArticleData');
Route::get('equipeTypeArticle-pie-chart/{id}', 'EquipeController@getArticleTypeCount');
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


Route::resource('stages', 'StageController',[
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

Route::get('/home', 'dashController@index')->name('home');



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
