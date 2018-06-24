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

// Route::get('/', function () {
    //dd(DB::table('users')->get());
    //return view('welcome');
// });

// Route::resources([
//   'user' => 'UserController'
// ]);


Route::middleware(['cors'])->group(function () {
  Route::get('user', ['uses' => 'UserController@index']);
  Route::post('user/{id}', ['uses' => 'UserController@update']);
  Route::post('user', ['uses' => 'UserController@store']);
  Route::get('user/{id}', ['uses' => 'UserController@show']);
  Route::get('userfind/{term}', ['uses' => 'UserController@search']);
  Route::options('/{any}', function(){ return ''; })->where('any', '.*');

  Route::get('category', ['uses' => 'CategoryController@index']);
  Route::post('category/{id}', ['uses' => 'CategoryController@update']);
  Route::post('category', ['uses' => 'CategoryController@store']);
  Route::get('category/{id}', ['uses' => 'CategoryController@show']);
  Route::get('categoryfind/{term}', ['uses' => 'CategoryController@search']);
  Route::options('/{any}', function(){ return ''; })->where('any', '.*');
});



// GET	/photos	index	photos.index
// GET	/photos/create	create	photos.create
// POST	/photos	store	photos.store
// GET	/photos/{photo}	show	photos.show
// GET	/photos/{photo}/edit	edit	photos.edit
// PUT/PATCH	/photos/{photo}	update	photos.update
// DELETE	/photos/{photo}	destroy	photos.destroy
