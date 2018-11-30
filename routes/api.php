<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login-appli', 'MembresController@loginAppli');
Route::post('/complete-profil', 'ResidentsController@completeProfil');
Route::post('/post-annonce', 'AnnoncesController@saveAnnonceJson');
Route::post('/post-annonce-not-image', 'AnnoncesController@saveAnnonceJsonNotImage');

Route::get('/profile/{user_id}', 'MembresController@infos');
Route::get('/annonces/{type}/{user_id}/{syndic_id}', 'AnnoncesController@annoncesJson')->name('annonces-json');
//annonce
Route::get('/like-annonce/{id_annonce}/{user_id}', 'AnnoncesController@likeJson')->name('like-annonce');
Route::get('/my-annonces/{user_id}', 'AnnoncesController@myAnnoncesJson');
Route::get('/annonces-syndic/{user_id}', 'AnnoncesController@annonceSyndic');
Route::get('/get-annonce-syndic/{id_annonce}/{id_user}', 'AnnoncesController@getAnnonceSyndic');

//commentaire
Route::get('/coms-annonce/{id_annonce}', 'AnnoncesController@showComs');
Route::post('/post-coms/{id_annonce}/{id_user}', 'AnnoncesController@postComs');



Route::get('/termes-conditions', 'HomeController@termes');
Route::get('/categories', 'HomeController@categories');

Route::get('/delete-annonce/{id}','AnnoncesController@deleteJson');

//------------- PARTENAIRE -----------------//
Route::post('/login-partenaire','MembresController@loginPartenaire');
Route::post('/update-partenaire','MembresController@updatePartenaire');
Route::get('/annonce-partenaire/{id_categorie}/{syndic_id}','AnnoncesController@annoncePartenaire');
Route::get('/annonce-syndic-partenaire/{id_categorie}/{syndic_id}','AnnoncesController@annonceSyndicPartenaire');

////
//------------- api get -----------------//
Route::get('/residence-by-id/{id}','MembresController@getResidenceById');
Route::get('/resident-by-id/{id}','MembresController@getResidentById');
Route::get('/partenaire-by-id/{id}','MembresController@getPartenaireById');


///// ----- FORGET PASSWORD MAIL --------
Route::post('/forget-password/{email}','HomeController@forgotPassword');


Route::get('/tcp-module/{port}', "SocketController@build");
Route::get('/get-appartement/{id_resident}', "AppartementController@getAppartByResident");
