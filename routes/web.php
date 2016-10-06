<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

Route::get('/', function () {
  return view('index');
});

Route::get('/ufa_offers', 'UfaOffers@index');
Route::get('/enter_offer', 'UfaOffers@enter');
Route::post('enter_offer', 'UfaOffers@store');

Route::get('/team/{id}', 'Team@display');

Route::get('/player/{id}', function($id) {
  return view('player', ['id' => $id]);
});

Route::get('/fa', function () {
  return view('fa');
});

Route::get('/fa/{id}', function($id) {
  return view('fa_offer', ['id' => $id]);
});

