<?php 
use Illuminate\Http\Request;
/**************************************
 *	 Routes to Site
 *	 all routes on the site
 **************************************/

# Itens Menu
$this->get('/', 'Site\SiteController@home')->name('home');
$this->get('sobre', 'Site\SiteController@about')->name('about');
$this->get('contato', 'Site\ContactController@index')->name('contact');
$this->post('contato', 'Site\ContactController@store')->name('contact_store');

# Search doctor
$this->get('search', 'Site\SearchController@search')->name('search_doctor');
$this->get('dentista/{state}/{city}/{dentist}', 'Site\SearchController@single')->name('single_doctor');

$this->get('zip_code/{zip_code}', 'Site\SiteController@zip_code')->name('zip_code');
$this->get('cities/{state}', 'Site\SiteController@cities')->name('cities');

# Register new doctor
$this->get('assinar','Site\RegisterDoctorController@sign')->name('sign');
$this->get('registrar','Site\RegisterDoctorController@register')->name('register');
$this->post('register','Site\RegisterDoctorController@store')->name('doctor.store');

# Search cro
// Route::post('search/cro', [
//     'as' => 'doctor.search_cro',
//     'uses' => 'Site\SiteController@searchCRO'
// ]);