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
	// $response = Curl::to('http://www.consultacrm.com.br/api/')
 //                            ->withData([
 //                                'tipo'    => 'cro',
 //                                'q'       => 'SILVANI CAMPOS',
 //                                'uf'      => 'BA',
 //                                'chave'   => '4086218239',
 //                                'destino' => 'json' 
 //                            ])->get();
    $response = Curl::to('http://cfo.org.br/servicos-e-consultas/Profissionais/?nome=&inscricao=15294&cro=BA&categoria=CD&codigo=&enviar=Enviar')->get(); 
	echo '<pre>';
	dd($response);
	
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
Route::post('search/cro', [
    'as' => 'doctor.search_cro',
    'uses' => 'DoctorController@searchCRO'
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
	    'uses' => 'Admin\CitiesController@index'
	]);
	Route::get('cities/create', [
	    'as' => 'cities.create',
	    'uses' => 'Admin\CitiesController@create'
	]);
	Route::post('cities/create', [
	    'as' => 'cities.stores',
	    'uses' => 'Admin\CitiesController@store'
	]);
	Route::put('cities/{id}', [
	    'as' => 'cities.update',
	    'uses' => 'Admin\CitiesController@update'
	]);
	Route::get('cities/{id}/edit', [
	    'as' => 'cities.show',
	    'uses' => 'Admin\CitiesController@show'
	]);
	Route::delete('cities/{id}/delete', [
	    'as' => 'cities.destroy',
	    'uses' => 'Admin\CitiesController@destroy'
	]);

	Route::get('specializations', [
	    'as' => 'specializations',
	    'uses' => 'Admin\SpecializationController@index'
	]);
	Route::get('specializations/create', [
	    'as' => 'specializations.create',
	    'uses' => 'Admin\SpecializationController@create'
	]);
	Route::post('specializations/create', [
	    'as' => 'specializations.stores',
	    'uses' => 'Admin\SpecializationController@store'
	]);
	Route::put('specializations/{id}', [
	    'as' => 'specializations.update',
	    'uses' => 'Admin\SpecializationController@update'
	]);
	Route::get('specializations/{id}/edit', [
	    'as' => 'specializations.show',
	    'uses' => 'Admin\SpecializationController@show'
	]);
	Route::delete('specializations/{id}/delete', [
	    'as' => 'specializations.destroy',
	    'uses' => 'Admin\SpecializationController@destroy'
	]);

	Route::get('health-insurance', [
	    'as' => 'health_insurance',
	    'uses' => 'Admin\HealthInsuranceController@index'
	]);
	Route::get('health-insurance/create', [
	    'as' => 'health_insurance.create',
	    'uses' => 'Admin\HealthInsuranceController@create'
	]);
	Route::post('health-insurance/create', [
	    'as' => 'health_insurance.stores',
	    'uses' => 'Admin\HealthInsuranceController@store'
	]);
	Route::put('health-insurance/{id}', [
	    'as' => 'health_insurance.update',
	    'uses' => 'Admin\HealthInsuranceController@update'
	]);
	Route::get('health-insurance/{id}/edit', [
	    'as' => 'health_insurance.show',
	    'uses' => 'Admin\HealthInsuranceController@show'
	]);
	Route::delete('health-insurance/{id}/delete', [
	    'as' => 'health_insurance.destroy',
	    'uses' => 'Admin\HealthInsuranceController@destroy'
	]);
	
});

Route::get('/home', 'HomeController@index');
