<?php 

/**************************************
 *	 Routes to Doctor 
 *	 all routes on the doctor adm
 **************************************/

# Home Doctor
$this->get('',[
    'as' => 'home_doctor', 
    'uses' => 'Doctor\DoctorHomeController@index'
]); 

# routes profile
$this->get('profile', [
    'as' => 'profile',
    'uses' => 'Doctor\DoctorController@index'
]);
$this->put('profile/{id}', [
    'as' => 'update_profile',
    'uses' => 'Doctor\DoctorController@update'
]);
$this->put('profile/{id}/upload', [
    'as' => 'upload',
    'uses' => 'UploadController@upload'
]);

#routes spealizations
$this->get('profile/spealizations', [
    'as' => 'spealizations',
    'uses' => 'Doctor\DoctorSpealizationsController@index'
]);
$this->post('profile/spealizations', [
    'as' => 'create_specializations',
    'uses' => 'Doctor\DoctorSpealizationsController@store'
]);
$this->delete('profile/spealizations/{id}/delete', [
    'as' => 'destroy_specializations',
    'uses' => 'Doctor\DoctorSpealizationsController@destroy'
]);

#routes convenant
$this->get('profile/convenant', [
    'as' => 'convenant',
    'uses' => 'Doctor\DoctorConvenantController@index'
]);
$this->post('profile/convenant', [
    'as' => 'create_convenant',
    'uses' => 'Doctor\DoctorConvenantController@store'
]);
$this->delete('profile/convenant/{id}/delete', [
    'as' => 'destroy_convenant',
    'uses' => 'Doctor\DoctorConvenantController@destroy'
]);

#routes complementary
$this->get('profile/complementaries', [
    'as' => 'complementary',
    'uses' => 'Doctor\DoctorComplementariesController@index'
]);
$this->post('profile/complementaries', [
    'as' => 'store_complementary',
    'uses' => 'Doctor\DoctorComplementariesController@store'
]);

# routes gallery
$this->get('gallery', [
    'as' => 'gallery',
    'uses' => 'Doctor\GalleryImageController@index'
]);
$this->get('gallery/create', [
    'as' => 'gallery_create',
    'uses' => 'Doctor\GalleryImageController@create'
]);
$this->post('gallery/{user_id}/upload', [
    'as' => 'gallery_upload',
    'uses' => 'Doctor\GalleryImageController@store'
]);
$this->delete('gallery/{user_id}/doctor/{img_id}/delete', [
    'as' => 'gallery_destroy',
    'uses' => 'Doctor\GalleryImageController@delete'
]);

# routes links uteis
$this->get('links', [
    'as' => 'links',
    'uses' => 'Doctor\LinksController@index'
]);
$this->get('links/create', [
    'as' => 'links_create',
    'uses' => 'Doctor\LinksController@create'
]);
$this->post('links/create', [
    'as' => 'links_stores',
    'uses' => 'Doctor\LinksController@store'
]);
$this->put('links/{id}', [
    'as' => 'links_update',
    'uses' => 'Doctor\LinksController@update'
]);
$this->get('links/{id}/edit', [
    'as' => 'links_show',
    'uses' => 'Doctor\LinksController@show'
]);
$this->delete('links/{id}/delete', [
    'as' => 'links_destroy',
    'uses' => 'Doctor\LinksController@destroy'
]);


