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
Route::get('/getFilterSpotForMap', 'SpotController@getFilterSpotForMap');

Route::post('/submitSpot', 'SpotController@create');

Route::get('/createPost', function() {
    return Response::view('spot/createPost');
});

Auth::routes();



