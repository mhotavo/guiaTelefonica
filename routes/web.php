<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */

Route::get('/', function () {
	return view('home');
});


Route::get('search', array('as' => 'search', 'uses' => 'SearchController@search'));
Route::get('autocomplete', array('as' => 'autocomplete', 'uses' => 'SearchController@autocomplete'));


 // Auth::routes();
Route::get('/login', 'Auth\LoginController@showLoginForm' );
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');