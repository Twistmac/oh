<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', 'AdminController@index');

Auth::routes();

///************************** SYNDIC **********************************///
Route::prefix('syndic')->group(function(){
    Route::get('/', 'SyndicsController@index')->name('syndic.index')->middleware('auth');
    Route::get('/gestion-residence', 'SyndicsController@gestionResidence')->name('syndic.gestion-residence')->middleware('auth');
    Route::get('/add-residence', 'SyndicsController@addResidence')->name('syndic.add-residence')->middleware('auth');
    Route::post('/add-residence', 'SyndicsController@newResidence')->name('syndic.add-residence')->middleware('auth');
    Route::post('/new-resident/{id}', 'SyndicsController@newResident')->name('syndic.add-resident')->middleware('auth');
    Route::get('/details-residence/{id}', 'SyndicsController@detailsResidence')->name('syndic.details-residence')->middleware('auth');
    Route::post('/edit-residence/{id}', 'ResidenceController@editResidence')->name('syndic.edit-residence')->middleware('auth');

    Route::any('/add-resident', 'SyndicsController@addResident')->name('syndic.add-resident')->middleware('auth');
    Route::delete('/delete-resident/{id}', 'SyndicsController@deleteResident')->name('syndic.delete-resident')->middleware('auth');


    Route::get('/gestion-annonces-syndic', 'SyndicsController@gestionAnnoncesSyndic')->name('syndic.gestion-annonces-syndic');
    Route::post('/add-annonce-syndic', 'AnnoncesController@addAnnonceSyndic')->name('syndic.add-annonce-syndic')->middleware('auth');
    Route::delete('/delete-annonce-syndic/{id}','AnnoncesController@deleteAnnonceSyndic')->name('syndic.delete-annonce-syndic')->middleware('auth');

    //messagerie
    Route::get('/gestion-messagerie', 'MessagerieController@messageSyndic')->name('syndic.messagerie')->middleware('auth');
    Route::get('/new-message', 'MessagerieController@getNewMessageSyndic')->name('syndic.newMessage')->middleware('auth');
    Route::post('/read-message', 'MessagerieController@readMessageSyndic')->name('syndic.read-message')->middleware('auth');
    Route::get('/read-message', 'MessagerieController@readMessageSyndic')->name('syndic.read-message')->middleware('auth');
    Route::get('/readMp/{id_message}', 'MessagerieController@readMp')->name('syndic.readMp')->middleware('auth');
});

///********* ADMIN ********************///
Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/gestion-syndics', 'AdminController@gestionSyndics')->name('admin.gestion-syndics');
    Route::get('/details-syndic/{id}', 'SyndicsController@details')->name('admin.details-syndic')->middleware('auth:admin');
    Route::post('/details-syndic/{id}', 'SyndicsController@details')->name('admin.details-syndic')->middleware('auth:admin'); 
    //liste les résidents 
    Route::get('/gestion-residents', 'AdminController@gestionResidents')->name('admin.gestion-residents');
    //route pour ajouter résidence
    Route::get('/gestion-residents-ajout', 'AdminController@gestionResidentsajout')->name('admin.gestion-residents-ajout');
    //route pour gestionrésidences
    Route::get('/gestion-residences', 'AdminController@gestionResidences')->name('admin.gestion-residences');
    //route pour gestion résidences ajout 
    Route::get('/gestion-residences-ajout', 'AdminController@gestionResidencesajout')->name('admin.gestion-residences-ajout');

    Route::get('/gestion-partenaires', 'AdminController@gestionPartenaires')->name('admin.gestion-partenaires');
    Route::get('/gestion-annonces', 'AdminController@gestionAnnonces')->name('admin.gestion-annonces');
    Route::get('/gestion-categories', 'CategorieController@gestionCategories')->name('admin.gestion-categories')->middleware('auth:admin');
    Route::post('/add-categorie', 'CategorieController@addCategorie')->name('admin.add-categorie')->middleware('auth:admin');

    // Ici se trouve l'ajout des routes pour import/export
    /* residence */
    //Route::post('/gestion-residences/import/{type}','ResidencesController@import');
    Route::get('/gestion-residences/export','AdminController@gestionResidencesexport');
    //Route::get('/gestion-residences/exportpdf','AdminController@gestionResidencesexportpdf');
    Route::get('/gestion-residences/exportcsv','AdminController@gestionResidencesexportcsv');
    Route::get('/gestion-residents/export','AdminController@gestionResidentsexport');
    Route::get('/gestion-residents/exportcsv','AdminController@gestionResidentsexportcsv');

    // new add
    Route::delete('/delete-categorie/{id}', 'CategorieController@deleteCategorie')->name('admin.delete-categorie')->middleware('auth:admin');

    Route::post('/add-annonce', 'AnnoncesController@addAnnonce')->name('admin.add-annonce')->middleware('auth:admin');
    Route::delete('/delete-annonce/{id}','AnnoncesController@deleteAnnonce')->name('admin.delete-annonce')->middleware('auth:admin');
    Route::post('/add-syndic', 'SyndicsController@addSyndic')->name('admin.add-syndic')->middleware('auth:admin');
    Route::post('/add-resident', 'ResidentsController@addResident')->name('admin.add-resident')->middleware('auth:admin');


    //
    Route::post('/add-residence', 'AdminController@addResidence')->name('admin.add-residence');
    Route::get('/edit-residence/{id}', 'AdminController@editResidence')->name('admin.edit-residence');
    Route::post('/add-partenaire', 'PartenairesController@addPartenaire')->name('admin.add-partenaire')->middleware('auth:admin');
    Route::delete('/delete-resident/{id}','ResidentsController@delete')->name('admin.delete-resident')->middleware('auth:admin');
    //
    Route::get('/susp-resident/{id}', 'ResidentsController@suspendre')->name('admin.susp-resident')->middleware('auth:admin');
    Route::get('/active-resident/{id}', 'ResidentsController@active')->name('admin.active-resident')->middleware('auth:admin');
    //
    Route::delete('/delete-syndic/{id}','SyndicsController@deleteSyndic')->name('admin.delete-syndic')->middleware('auth:admin');
    Route::delete('/delete-residence/{id}','ResidenceController@deleteResidence')->name('admin.delete-residence')->middleware('auth:admin');
    Route::get('/gestion-contenu', 'AdminController@gestionContenu')->name('admin.gestion-contenu');
    Route::post('/edit-termes/{id}', 'AdminController@editTermes')->name('admin.edit-termes');

    Route::get('/details-resident/{id}', 'ResidentsController@detailsResident')->name('admin.details-resident')->middleware('auth:admin');
});
