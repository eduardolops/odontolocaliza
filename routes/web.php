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
    return view('welcome');
});

Auth::routes();

Route::get('register', [
    'as' => 'doctor.index',
    'uses' => 'DoctorController@index'
]);
Route::post('register', [
    'as' => 'doctor.store',
    'uses' => 'DoctorController@store'
]);

Route::group(['prefix' => 'doctor', 'as' => 'doctor::', 'middleware' => ['web', 'auth']], function(){

	Route::get('',['as' => 'home_doctor', function(){
		return view('doctor.home.index_home', ['page_title' => 'Home']);
	}]);

	Route::get('profile', [
	    'as' => 'edit_profile',
	    'uses' => 'DoctorController@profile'
	]);
	Route::post('profile/', [
	    'as' => 'edit_profile',
	    'uses' => 'DoctorController@profilepost'
	]);

});

Route::group(['prefix' => 'admin', 'as' => 'admin::', 'middleware' => ['web']], function(){

	// Route::get('/',['as' => 'home_doctor', function(){
	// 	return view('structures.admin_template');
	// }]);

	Route::get('',['as' => 'home_admin', function(){
		return view('admin.home.index_home', ['page_title' => 'Homes']);
	}]);

	Route::get('cities', [
	    'as' => 'cities',
	    'uses' => 'CitiesController@index'
	]);
	Route::get('cities/create', [
	    'as' => 'cities.create',
	    'uses' => 'CitiesController@create'
	]);
	Route::post('cities/create', [
	    'as' => 'cities.stores',
	    'uses' => 'CitiesController@store'
	]);
	Route::put('cities/{id}', [
	    'as' => 'cities.update',
	    'uses' => 'CitiesController@update'
	]);
	Route::get('cities/{id}/edit', [
	    'as' => 'cities.show',
	    'uses' => 'CitiesController@show'
	]);
	Route::delete('cities/{id}/delete', [
	    'as' => 'cities.destroy',
	    'uses' => 'CitiesController@destroy'
	]);

	Route::get('specializations', [
	    'as' => 'specializations',
	    'uses' => 'SpecializationController@index'
	]);
	Route::get('specializations/create', [
	    'as' => 'specializations.create',
	    'uses' => 'SpecializationController@create'
	]);
	Route::post('specializations/create', [
	    'as' => 'specializations.stores',
	    'uses' => 'SpecializationController@store'
	]);
	Route::put('specializations/{id}', [
	    'as' => 'specializations.update',
	    'uses' => 'SpecializationController@update'
	]);
	Route::get('specializations/{id}/edit', [
	    'as' => 'specializations.show',
	    'uses' => 'SpecializationController@show'
	]);
	Route::delete('specializations/{id}/delete', [
	    'as' => 'specializations.destroy',
	    'uses' => 'SpecializationController@destroy'
	]);
	

	Route::get('health-insurance',['as' => 'health_insurance', function(){
		return view('doctor.my_data.mydata', ['page_title' => 'Planos de Saúdes']);
	}]);

});

Route::get('/home', 'HomeController@index');
