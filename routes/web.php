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
      return view('acceuil');
  });
  Route::get('A-propos', function () {
      return view('about');
  });

  Route::get('actualites','frontController@acctualite');
  // Route::get('actualites', function () {
  //     return view('front/actualites');
  // });
  Route::get('Nos-laboratoires', function () {
      return view('labos');
  });
  Route::get('Evenements', function () {
      return view('events');
  });
  Route::get('Contact', function () {
      return view('contact');
  });

  Route::get('actualite/{id}','frontController@actualite');

  Route::get('profile/{id}','frontController@profile');

});


// Route::get('chartjs', 'dashController@chartjs');
Route::get('chartjs', 'dashController@getMonthlyArticleTheseData');
Route::get('chartjs2', 'dashController@getArticleTypeCount');
Route::get('chartjs3', 'dashController@getMonthlyMembre');
Route::get('dashboard','dashController@index');




// Route::get('parametre','ParametreController@create');
// Route::post('parametre','ParametreController@store');

Route::get('chartjs2', 'ParametreController@getArticleTypeCount');
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
