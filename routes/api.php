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

Route::get('/profile/{user_id}', 'MembresController@infos');
Route::get('/annonces/{type}/{user_id}', 'AnnoncesController@annoncesJson')->name('annonces-json');
Route::get('/like-annonce/{id_annonce}/{user_id}', 'AnnoncesController@likeJson')->name('like-annonce');
Route::get('/my-annonces/{user_id}', 'AnnoncesController@myAnnoncesJson');
Route::get('/termes-conditions', 'HomeController@termes');
Route::get('/categories', 'HomeController@categories');

Route::get('/delete-annonce/{id}','AnnoncesController@deleteJson');