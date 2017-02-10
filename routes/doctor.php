<?php 

/**************************************
 *	 Routes to Doctor 
 *	 all routes on the doctor adm
 **************************************/

Route::get('',['as' => 'home_doctor', function(){
	return view('doctor.home.index_home', ['page_title' => 'Home', 'guard' => 'web']);
}]);

# routes profile
Route::get('profile', [
    'as' => 'profile',
    'uses' => 'Doctor\DoctorController@index'
]);
Route::put('profile/{id}', [
    'as' => 'update_profile',
    'uses' => 'Doctor\DoctorController@update'
]);
Route::put('profile/{id}/upload', [
    'as' => 'upload',
    'uses' => 'UploadController@upload'
]);

#routes spealizations
Route::get('profile/spealizations', [
    'as' => 'spealizations',
    'uses' => 'Doctor\DoctorSpealizationsController@index'
]);
Route::post('profile/spealizations', [
    'as' => 'create_specializations',
    'uses' => 'Doctor\DoctorSpealizationsController@store'
]);
Route::delete('profile/spealizations/{id}/delete', [
    'as' => 'destroy_specializations',
    'uses' => 'Doctor\DoctorSpealizationsController@destroy'
]);

#routes convenant
Route::get('profile/convenant', [
    'as' => 'convenant',
    'uses' => 'Doctor\DoctorConvenantController@index'
]);
Route::post('profile/convenant', [
    'as' => 'create_convenant',
    'uses' => 'Doctor\DoctorConvenantController@store'
]);
Route::delete('profile/convenant/{id}/delete', [
    'as' => 'destroy_convenant',
    'uses' => 'Doctor\DoctorConvenantController@destroy'
]);

#routes complementary
Route::get('profile/complementaries', [
    'as' => 'complementary',
    'uses' => 'Doctor\DoctorComplementariesController@index'
]);
Route::post('profile/complementaries', [
    'as' => 'store_complementary',
    'uses' => 'Doctor\DoctorComplementariesController@store'
]);

# routes gallery
Route::get('gallery', [
    'as' => 'gallery',
    'uses' => 'Doctor\GalleryImageController@index'
]);
Route::get('gallery/create', [
    'as' => 'gallery_create',
    'uses' => 'Doctor\GalleryImageController@create'
]);
Route::post('gallery/{user_id}/upload', [
    'as' => 'gallery_upload',
    'uses' => 'Doctor\GalleryImageController@store'
]);
Route::delete('gallery/{user_id}/doctor/{img_id}/delete', [
    'as' => 'gallery_destroy',
    'uses' => 'Doctor\GalleryImageController@delete'
]);

# routes links uteis
Route::get('links', [
    'as' => 'links',
    'uses' => 'Doctor\LinksController@index'
]);
Route::get('links/create', [
    'as' => 'links_create',
    'uses' => 'Doctor\LinksController@create'
]);
Route::post('links/create', [
    'as' => 'links_stores',
    'uses' => 'Doctor\LinksController@store'
]);
Route::put('links/{id}', [
    'as' => 'links_update',
    'uses' => 'Doctor\LinksController@update'
]);
Route::get('links/{id}/edit', [
    'as' => 'links_show',
    'uses' => 'Doctor\LinksController@show'
]);
Route::delete('links/{id}/delete', [
    'as' => 'links_destroy',
    'uses' => 'Doctor\LinksController@destroy'
]);


