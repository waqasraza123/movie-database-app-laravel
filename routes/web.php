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
    return view('welcome');
});
Route::get('/test', function(){
    /*\App\User::create([
        'name' => 'waqas',
        'email' => 'waqas@gmail.com',
        'password' => bcrypt('123456')
    ]);*/
    \App\User::find(1)->delete();
});
