<?php 

/**************************************
 *	 Routes to Admin 
 *	 all routes on the admin
 **************************************/

# Auth Admin
Route::get('/login', 'Admin\AdminController@login');
Route::post('/login', 'Admin\AdminController@store');
Route::post('/login/logout', 'Admin\AdminController@logout');

Route::group(['middleware' => ['auth:admin']], function(){
	# Home Admin
	Route::get('',['as' => 'home_admin', function(){
		return view('admin.home.index_home', ['page_title' => 'Homes', 'guard' => 'admin']);
	}]);		

	# routes cities
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

	# routes specializations
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

	# routes health insurance
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

	# routes order payment
	Route::get('order', [
	    'as' => 'order',
	    'uses' => 'Admin\OrderController@index'
	]);

	#routes plan 
	Route::get('plan', [
		'uses' => 'Admin\PlansController@index'
	])->name('plan');

	Route::get('plan/create', [
		'uses' => 'Admin\PlansController@create'
	])->name('plan.create');

	Route::post('plan/create', [
		'uses' => 'Admin\PlansController@store'
	])->name('plan.store');

	Route::put('plan/{id}', [
	    'uses' => 'Admin\PlansController@update'
	])->name('plan.update');

	Route::get('plan/{id}/edit', [
	    'uses' => 'Admin\PlansController@show'
	])->name('plan.show');
	
	Route::delete('plan/{id}/delete', [
	    'uses' => 'Admin\PlansController@destroy'
	])->name('plan.destroy');

	#routes doctor's
	Route::get('doctors', [
		'uses' => 'Admin\DoctorsController@index'
	])->name('doctors');

	Route::get('doctors/{user_id}/logar', [
		'uses' => 'Admin\DoctorsController@logar'
	])->name('doctors.logar')->where('user_id', '[0-9]+');

	Route::put('doctors/{id}', [
	    'uses' => 'Admin\DoctorsController@update'
	])->name('doctors.update');

	Route::get('doctors/{id}/edit', [
	    'uses' => 'Admin\DoctorsController@show'
	])->name('doctors.show');

	Route::put('doctors/{id}/upload', [
	    'uses' => 'UploadController@upload'
	])->name('doctors.upload');
	
}); # end route group auth.admin