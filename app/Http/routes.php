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

$app->get('/', function () use ($app) {
  return view('index');
});


$app->get('/team/{id}', 'Team@display');

//$app->get('/team/{id}', function($id) use ($app) {
//  return view('team', ['id' => $id]);
//});

$app->get('/player/{id}', function($id) use ($app) {
  return view('player', ['id' => $id]);
});

$app->get('/fa', function () use ($app) {
  return view('fa');
});

$app->get('/fa/{id}', function($id) use ($app) {
  return view('fa_offer', ['id' => $id]);
});



