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

Route::get('/register', [
    'as' => 'doctor.index',
    'uses' => 'DoctorController@index'
]);
Route::post('/register', [
    'as' => 'doctor.store',
    'uses' => 'DoctorController@store'
]);

Route::get('/doctor/login', [
    'as' => 'doctor.login',
    'uses' => 'DoctorController@login'
]);
Route::post('/doctorlogin', [
    'as' => 'doctor.loginStore',
    'uses' => 'DoctorController@postLogin'
]);



Route::group(['prefix' => 'doctor', 'as' => 'doctor::', 'middleware' => ['web', 'auth']], function(){

	// Route::get('/',['as' => 'home_doctor', function(){
	// 	return view('structures.admin_template');
	// }]);

	Route::get('',['as' => 'home_doctor', function(){
		return view('doctor.home.index_home', ['page_title' => 'Home']);
	}]);

	Route::get('profile',['as' => 'profile', function(){
		return view('doctor.my_data.mydata', ['page_title' => 'Meus Dados']);
	}]);

});

// Route::group(['prefix' => 'admin', 'as' => 'doctor::', 'middleware' => ['web', 'auth']], function(){

// 	// Route::get('/',['as' => 'home_doctor', function(){
// 	// 	return view('structures.admin_template');
// 	// }]);

// 	Route::get('',['as' => 'home_doctor', function(){
// 		return view('doctor.home.index_home', ['page_title' => 'Home']);
// 	}]);

// 	Route::get('profile',['as' => 'profile', function(){
// 		return view('doctor.my_data.mydata', ['page_title' => 'Meus Dados']);
// 	}]);

// });

Route::get('/home', 'HomeController@index');
