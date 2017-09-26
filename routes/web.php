<?php

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
/*
*Admin login route
*/
Route::get('/admin/login',function(){
	return view('admin.auth.login');
});
Route::post('/admin/auth/login',['as'=>'adminAuthLogin','uses'=>'Auth\LoginController@authenticateAdminUser']);

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});
//route for logout
Route::get('/logout','Auth\LoginController@logout')->name('logout');

//restricting the following routes to admin user only
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
    Route::resource('movies', 'MoviesController');
	/*Route::post('/movies/add-photos', 'PhotosController@store')->name('movies.photos.add');
	Route::post('/movies/add-videos', 'VideoController@store')->name('movies.videos.add');*/
    Route::resource('photos', 'PhotosController');
	Route::resource('person', 'PersonController');
	Route::resource('cast', 'CastController');
	Route::resource('crew', 'CrewController');
	Route::resource('jobs', 'JobController');
	Route::resource('genre', 'GenreController');
	Route::resource('genremovie', 'GenreMovieController');
	Route::resource('video', 'VideoController');
	Route::resource('movieperson', 'MoviePersonController');
	Route::resource('keyword', 'KeywordController');
	Route::resource('keywordmovie', 'KeywordMovieController');
	Route::resource('studio', 'StudioController');
	Route::resource('language', 'LanguageController');
	Route::resource('languagemovie', 'LanguageMovieController');
	Route::resource('posts', 'BlogController');
	Route::resource('categories', 'CategoryController');
	Route::get('/test', function(){
		\Illuminate\Support\Facades\DB::table('age_ratings')->insert([
		    ['age_rating' => 'G'],
		    ['age_rating' => 'PG'],
		    ['age_rating' => 'PG-13'],
		    ['age_rating' => 'R'],
		    ['age_rating' => 'NR'],
		    ['age_rating' => 'NC-17']
		]);
	});

});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//routes for logins
Route::get('/login/auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('/login/auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
//routes for registers
Route::get('/register/auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('/register/auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');




