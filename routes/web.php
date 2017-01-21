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


Route::post('search', array('as' => 'search', 'uses' => 'SearchController@search'));
Route::get('SearchCities', array('as' => 'SearchCities', 'uses' => 'SearchController@SearchCities'));
Route::get('SearchCategories', array('as' => 'SearchCategories', 'uses' => 'SearchController@SearchCategories'));


 // Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm' );
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');



Route::group(['prefix'=>'admin'], function(){

	Route::get('/', 'HomeController@index');
	Route::resource('person', 'PersonController');

});


#Imports
#$router->get('importDepartments', 'ImportController@departments');
#$router->get('importCities', 'ImportController@cities');