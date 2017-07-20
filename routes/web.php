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

Route::get('/', function () {
    return view('dashboard.dashboard');
});
Route::resource('movies', 'MoviesController');
Route::resource('person', 'PersonController');
Route::resource('job', 'JobController');
Route::resource('genre', 'GenreController');
Route::resource('genremovie', 'GenreMovieController');
Route::resource('video', 'VideoController');
Route::resource('movieperson', 'MoviePersonController');
Route::resource('keyword', 'KeywordController');
Route::resource('keywordmovie', 'KeywordMovieController');
Route::resource('studio', 'StudioController');
Route::resource('language', 'LanguageController');
Route::resource('languagemovie', 'LanguageMovieController');
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
