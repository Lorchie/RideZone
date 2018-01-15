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

  if (Auth::guest()){
     return view('welcome');
  }
  else {
    return redirect('/home');
  }

});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/creerSpot', function() {
    return Response::view('spot/createSpot');
});

Route::get('/getSpotForMap', 'SpotController@getSpotForMap');

Route::post('/submitSpot', 'SpotController@create');

Route::post('/submitPost', 'PostController@create');

Route::get('/creerPost', function() {
    return Response::view('spot/createPost', [
      'sport_id' => $x,
      'spot_id' => $y,
      'discipline_id' => $y
    ]);
});

Auth::routes();



