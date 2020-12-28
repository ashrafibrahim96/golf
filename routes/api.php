<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Register and login controller APIs
Route::post('/login' , 'ClientAuth\LoginController@login') ;
Route::post('/register' , 'ClientAuth\RegisterController@register') ;
Route::post('/logout' , 'ClientAuth\LoginController@logout')->middleware('auth:api') ;

//User controller APIs
Route::put('/update' , 'Utilisateurs\UserController@modifierProfil' )->middleware('auth:api') ;
Route::post('/updateImage' , 'Utilisateurs\UserController@modifierImage' )->middleware('auth:api') ;
Route::get('/show' , 'Utilisateurs\UserController@show' )->middleware('auth:api') ;


// sacController APIs -----

Route::post('sac/ajout_baton' , 'SacController@ajout_baton_au_sac' )->middleware('auth:api') ;
Route::get('sac/voir_sac' , 'SacController@voir_sac' )->middleware('auth:api') ;
Route::delete('sac/supprimer_baton' , 'SacController@supprimer_baton_du_sac' )->middleware('auth:api') ;
Route::delete('sac/modifier_sac' , 'SacController@modifier_sac' )->middleware('auth:api') ;

//MessageController APIs

Route::post('message/store' , 'MessageController@store' ) ;
//BatonController
Route::get('baton/index' , 'contenu_sac\BatonController@index' )->middleware('auth:api') ;

//actualité controllers APIs
Route::get('actualite/index' , 'ActualiteController@index' )->middleware('auth:api') ;

//Voir les types de matches a jouer
Route::get('matches/index' , 'MatchController@index' )->middleware('auth:api') ;

//ReservationController APIs

Route::post('reservation/creer_une_reservation' , 'ReservationController@creer_une_reservation' )->middleware('auth:api') ;
Route::delete('reservation/supprimer_la_reservation' , 'ReservationController@supprimer_la_reservation')->middleware('auth:api') ;
Route::get('resermavation/voir_tarif_total' , 'ReservationController@voir_tarif_total')->middleware('auth:api') ;
//locationCOntroller APIs
Route::delete('location/supprimer_location_du_panier' , 'LocationController@supprimer_location_du_panier' )->middleware('auth:api') ;
Route::post('location/ajouter_location_au_panier' , 'LocationController@ajouter_location_au_panier' )->middleware('auth:api') ;
Route::get('location/index' , 'LocationController@index')->middleware('auth:api') ;
Route::get('location/check_reservation' , 'LocationController@check_reservation')->middleware('auth:api') ;


//parties controller APIs
Route::get('parties/voir_parties' , 'Score\PartieController@voir_derniere_partie')->middleware('auth:api') ;
Route::get('parties/voir_joueurs' , 'Score\PartieController@voir_joueurs')->middleware('auth:api') ;
Route::post('parties/lancer_partie' , 'Score\PartieController@lancer_partie')->middleware('auth:api') ;
Route::get('parties/voir_parcours' , 'Score\PartieController@voir_parcours')->middleware('auth:api') ;
Route::get('parties/voir_trous' , 'Score\PartieController@voir_trous')->middleware('auth:api') ;
Route::get('parties/index_trous' , 'Score\PartieController@index_trous')->middleware('auth:api') ;

//score controllers
Route::post('scores/jouer_trou' , 'Score\ScoreController@jouer_trou')->middleware('auth:api') ;
Route::put('scores/calculer_valeur' , 'Score\ScoreController@calculer_valeur')->middleware('auth:api') ;
Route::get('scores/voir_score_apres_trou' , 'Score\ScoreController@voir_score_apres_trou')->middleware('auth:api') ;
Route::get('scores/voir_score_apres_match' , 'Score\ScoreController@voir_score_apres_match')->middleware('auth:api') ;

//scoreUnitaires controllers
Route::post('scores/jouer_coup' , 'Score\ScoreUnitaireController@jouer_coup')->middleware('auth:api') ;
Route::put('scores/update_coup' , 'Score\ScoreUnitaireController@update_coup')->middleware('auth:api') ;
//Statistiques Controllers
Route::put('statistiques/calculer_statistiques' , 'StatistiqueController@calculer_statistiques')->middleware('auth:api') ;
Route::get('statistiques/afficher_statistiques_generales' , 'StatistiqueController@afficher_statistiques_generales')->middleware('auth:api') ;
Route::get('statistiques/afficher_statistiques_par_match' , 'StatistiqueController@afficher_statistiques_par_match')->middleware('auth:api') ;
Route::get('statistiques/voir_most_played_club' , 'StatistiqueController@voir_most_played_club')->middleware('auth:api') ;

//methodes controller
Route::get('methodes/index' , 'MethodeController@index')->middleware('auth:api') ;
