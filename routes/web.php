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
#ROUTES FRONTEND

Route::get('/', array('as' => 'index', 'uses' => 'FrontController@index'));
Route::post('search', array('as' => 'search', 'uses' => 'FrontController@search'));
Route::get('SearchCities', array('as' => 'SearchCities', 'uses' => 'FrontController@SearchCities'));
Route::get('SearchCategories', array('as' => 'SearchCategories', 'uses' => 'FrontController@SearchCategories'));



# ROUTES ADMIN PANEL
 // Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm' );
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

Route::group(['prefix'=>'admin'], function(){

	Route::get('/', 'HomeController@index');
	Route::resource('person', 'PersonController');
	Route::resource('company', 'CompanyController');

});


#Imports
#$router->get('importDepartments', 'ImportController@departments');
#$router->get('importCities', 'ImportController@cities');