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

Route::middleware(['auth'])->group(function () {
  Route::get('/getPostSport', 'PostController@postSport');


  Route::get('/creerSpot', 'SpotController@create')->name("creerSpot");
  Route::get('/getSpotForMap', 'SpotController@getSpotForMap');
  Route::get('/getFilterSpotForMap', 'SpotController@getFilterSpotForMap');
  Route::get('/showUserAccount', 'UserController@index');
  Route::get('/showUpdateUserAccount', 'UserController@showUpdate');

  Route::get('/getSpotForMap', 'SpotController@getSpotForMap');
  Route::post('/submitSpot', 'SpotController@submit');
  Route::get('/getSpot/{id}','SpotController@getSpot');

  Route::get('/creerPost/{spot_id}', "PostController@create")->name("creerPost");

  //Post route
  Route::post('/submitPost', 'PostController@submit');
  Route::post('/submitUpdateUserAccount', 'UserController@update');
  Route::post('/submitUserSport', 'UserController@updateSport');
  Route::post('/submitSpot', 'SpotController@submit');
  Route::get('/getSpot/{id}','SpotController@getSpot');





    Route::post('/submitPost', 'PostController@submit');

  Route::get('/creerPost/{x}',"PostController@create")->name("creerPost");
});





Auth::routes();
