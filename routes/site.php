<?php 
use Illuminate\Http\Request;
/**************************************
 *	 Routes to Site
 *	 all routes on the site
 **************************************/

# Itens Menu
Route::get('/', 'Site\SiteController@home')->name('home');
Route::get('sobre', 'Site\SiteController@about')->name('about');
Route::get('contato', 'Site\ContactController@index')->name('contact');
Route::post('contato', 'Site\ContactController@store')->name('contact_store');

# Search doctor
Route::get('search', 'Site\SearchController@search')->name('search_doctor');
Route::get('dentista/{state}/{city}/{dentist}', 'Site\SearchController@single')->name('single_doctor');

Route::get('zip_code/{zip_code}', 'Site\SiteController@zip_code')->name('zip_code');
Route::get('cities/{state}', 'Site\SiteController@cities')->name('cities');

# Register new doctor
Route::get('assinar','Site\RegisterDoctorController@sign')->name('sign');
Route::get('registrar','Site\RegisterDoctorController@register')->name('register');
Route::post('register','Site\RegisterDoctorController@store')->name('doctor.store');

# Search cro
Route::post('search/cro', [
    'as' => 'doctor.search_cro',
    'uses' => 'Site\SiteController@searchCRO'
]);