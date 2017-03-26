<?php 

/**************************************
 *	 Routes to Admin 
 *	 all routes on the admin
 **************************************/

# Auth Admin
$this->get('/login', 'Admin\AdminController@login');
$this->post('/login', 'Admin\AdminController@store');
$this->post('/login/logout', 'Admin\AdminController@logout');
$this->get('/cities/{state}', 'Admin\AdminHomeController@cities');

$this->group(['middleware' => ['auth:admin']], function(){
	# Home Admin
	$this->get('',[
		'as' => 'home_admin', 
	    'uses' => 'Admin\AdminHomeController@index'
	]);	

	#routes profile	
	$this->get('profile', [
	    'as' => 'profile',
	    'uses' => 'Admin\ProfileController@index'
	]);
	$this->put('profile', [
	    'as' => 'profile.update',
	    'uses' => 'Admin\ProfileController@update'
	]);
	# routes cities
	$this->get('cities', [
	    'as' => 'cities',
	    'uses' => 'Admin\CitiesController@index'
	]);
	$this->get('cities/create', [
	    'as' => 'cities.create',
	    'uses' => 'Admin\CitiesController@create'
	]);
	$this->post('cities/create', [
	    'as' => 'cities.stores',
	    'uses' => 'Admin\CitiesController@store'
	]);
	$this->put('cities/{id}', [
	    'as' => 'cities.update',
	    'uses' => 'Admin\CitiesController@update'
	]);
	$this->get('cities/{id}/edit', [
	    'as' => 'cities.show',
	    'uses' => 'Admin\CitiesController@show'
	]);
	$this->delete('cities/{id}/delete', [
	    'as' => 'cities.destroy',
	    'uses' => 'Admin\CitiesController@destroy'
	]);

	# routes specializations
	$this->get('specializations', [
	    'as' => 'specializations',
	    'uses' => 'Admin\SpecializationController@index'
	]);
	$this->get('specializations/create', [
	    'as' => 'specializations.create',
	    'uses' => 'Admin\SpecializationController@create'
	]);
	$this->post('specializations/create', [
	    'as' => 'specializations.stores',
	    'uses' => 'Admin\SpecializationController@store'
	]);
	$this->put('specializations/{id}', [
	    'as' => 'specializations.update',
	    'uses' => 'Admin\SpecializationController@update'
	]);
	$this->get('specializations/{id}/edit', [
	    'as' => 'specializations.show',
	    'uses' => 'Admin\SpecializationController@show'
	]);
	$this->delete('specializations/{id}/delete', [
	    'as' => 'specializations.destroy',
	    'uses' => 'Admin\SpecializationController@destroy'
	]);

	# routes health insurance
	$this->get('health-insurance', [
	    'as' => 'health_insurance',
	    'uses' => 'Admin\HealthInsuranceController@index'
	]);
	$this->get('health-insurance/create', [
	    'as' => 'health_insurance.create',
	    'uses' => 'Admin\HealthInsuranceController@create'
	]);
	$this->post('health-insurance/create', [
	    'as' => 'health_insurance.stores',
	    'uses' => 'Admin\HealthInsuranceController@store'
	]);
	$this->put('health-insurance/{id}', [
	    'as' => 'health_insurance.update',
	    'uses' => 'Admin\HealthInsuranceController@update'
	]);
	$this->get('health-insurance/{id}/edit', [
	    'as' => 'health_insurance.show',
	    'uses' => 'Admin\HealthInsuranceController@show'
	]);
	$this->delete('health-insurance/{id}/delete', [
	    'as' => 'health_insurance.destroy',
	    'uses' => 'Admin\HealthInsuranceController@destroy'
	]);

	# routes order payment
	$this->get('order', [
	    'as' => 'order',
	    'uses' => 'Admin\OrderController@index'
	]);

	#routes plan 
	$this->get('plan', [
		'uses' => 'Admin\PlansController@index'
	])->name('plan');

	$this->get('plan/create', [
		'uses' => 'Admin\PlansController@create'
	])->name('plan.create');

	$this->post('plan/create', [
		'uses' => 'Admin\PlansController@store'
	])->name('plan.store');

	$this->put('plan/{id}', [
	    'uses' => 'Admin\PlansController@update'
	])->name('plan.update');

	$this->get('plan/{id}/edit', [
	    'uses' => 'Admin\PlansController@show'
	])->name('plan.show');
	
	$this->delete('plan/{id}/delete', [
	    'uses' => 'Admin\PlansController@destroy'
	])->name('plan.destroy');

	#routes doctor's
	$this->get('doctors', [
		'uses' => 'Admin\DoctorsController@index'
	])->name('doctors');

	$this->get('doctors/{user_id}/logar', [
		'uses' => 'Admin\DoctorsController@logar'
	])->name('doctors.logar')->where('user_id', '[0-9]+');

	$this->put('doctors/{id}', [
	    'uses' => 'Admin\DoctorsController@update'
	])->name('doctors.update');

	$this->get('doctors/{id}/edit', [
	    'uses' => 'Admin\DoctorsController@show'
	])->name('doctors.show');

	#routes admins
	$this->get('manager/admin', [
		'uses' => 'Admin\ManagerAdminController@index'
	])->name('admin');
	
	$this->get('manager/admin/create', [
	    'uses' => 'Admin\ManagerAdminController@create'
	])->name('admin.create');
	$this->post('manager/admin/create', [
	    'uses' => 'Admin\ManagerAdminController@store'
	])->name('admin.store');

	$this->put('manager/admin/{id}', [
	    'uses' => 'Admin\ManagerAdminController@update'
	])->name('admin.update');

	$this->get('manager/admin/{id}/edit', [
	    'uses' => 'Admin\ManagerAdminController@show'
	])->name('admin.show');

	$this->delete('manager/admin/{id}/delete', [
	    'uses' => 'Admin\ManagerAdminController@destroy'
	])->name('admin.destroy');

	
}); # end route group auth.admin