<?php

use Illuminate\Support\Facades\Route;

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
    return view('dashboard.home');
});
/* Route::get('/users', function () {
    return view('dashboard.users');
});*/
Route::get('/users', 'Utilisateurs\UserController@getAllContacts');
//Route::get('/user/{id}/show', 'StatistiqueController@index');

Route::get('/user/{id}/show', [ 'as' => 'user.display', 'uses' => 'Utilisateurs\UserController@display']);
Route::resource('user','Utilisateurs\UserController');
/* Message */

Route::resource('message','MessageController');

/* actualite */

Route::resource('actualites','ActualiteController');
Route::get('/actualites', 'ActualiteController@displayAll');
/* club house */
Route::resource('clubhouse','ClubHouseController');
/* Parcours */
Route::resource('parcour','ParcoursController');
/* Tarifs */
Route::resource('tarif','LocationController');
Route::get('/tarif', 'LocationController@displayAll');

/* Equipments */
 Route::get('/equipment', function () {
    return view('dashboard.equipments.equipment');
});
Route::post('/equipment/baton/create', [ 'as' => 'baton.add_to_db', 'uses' => 'contenu_sac\BatonController@add_to_db']);
Route::resource('equipment/balle','contenu_sac\BalleController');
Route::resource('equipment/baton','contenu_sac\BatonController');
Route::resource('equipment/tee','contenu_sac\TeeController');
Route::get('/equipment/baton', 'contenu_sac\BatonController@displayAll');

/* Reservation */
Route::resource('reservation','ReservationController');

/* Trous */
Route::resource('trou','TrousController');

/* Parties */
Route::resource('partie','Score\PartieController');
/*Route::get('affectation/create', function(){

    $partie_id = Input::get('partie_id');
    print_r($partie_id);
    exit();

    return Redirect::back();
});*/
/* affectation des joueurs */
Route::resource('affectation','AffectationController');

/* test */
//Route::resource('test','ReservationController');




//Route::get('/user/{id}/show', 'StatistiqueController@index');
//Route::get('/user/{$id}/show', [ 'as' => 'user.display', 'uses' => 'Utilisateurs\UserController@display']);
//Route::get('/user/{id}/show', [ 'as' => 'user.display', 'uses' => 'Utilisateurs\UserController@display']);
//Route::resource('statistiques','StatistiqueController');
//Route::get('statistiques','StatistiqueController@index');
//Route::post('/CreateContact', 'UserController@storeContact');

//Route::get('/user/{$id}', [ 'as' => 'user.display', 'uses' => 'Utilisateurs\UserController@display']);

/*Route::get('/edituser', function () {
    return view('dashboard.edituser');
});*/
