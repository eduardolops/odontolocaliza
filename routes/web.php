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

# Auth doctor
Auth::routes();

# Site
$this->group([], function(){
	require base_path('routes/site.php');
});

# Admin
$this->group(['prefix' => 'admin', 'as' => 'admin::', 'middleware' => ['web']], function(){
	require base_path('routes/admin.php');
});

# Area of Doctor
$this->group(['prefix' => 'doctor', 'as' => 'doctor::', 'middleware' => ['web', 'auth', 'subscribed']], function(){
	require base_path('routes/doctor.php');
});

# routes for billings
$this->get('/doctor/billings', 'Doctor\PaymentController@billing')->name('billings');
$this->post('/doctor/billings', 'Doctor\PaymentController@store')->name('billings.subscription');
$this->put('/doctor/billings/{user_id}', 'Doctor\PaymentController@update')->name('subscription.update');



