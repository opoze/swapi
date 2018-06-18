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
  Route::match(['post', 'options'], 'user/{id}', ['uses' => 'UserController@update']);
});





// GET	/photos	index	photos.index
// GET	/photos/create	create	photos.create
// POST	/photos	store	photos.store
// GET	/photos/{photo}	show	photos.show
// GET	/photos/{photo}/edit	edit	photos.edit
// PUT/PATCH	/photos/{photo}	update	photos.update
// DELETE	/photos/{photo}	destroy	photos.destroy
