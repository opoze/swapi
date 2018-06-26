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

  Route::get('category', ['uses' => 'CategoryController@index']);
  Route::post('category/{id}', ['uses' => 'CategoryController@update']);
  Route::post('category', ['uses' => 'CategoryController@store']);
  Route::get('category/{id}', ['uses' => 'CategoryController@show']);
  Route::get('categoryfind/{term}', ['uses' => 'CategoryController@search']);

  Route::get('suplier', ['uses' => 'SuplierController@index']);
  Route::post('suplier/{id}', ['uses' => 'SuplierController@update']);
  Route::post('suplier', ['uses' => 'SuplierController@store']);
  Route::get('suplier/{id}', ['uses' => 'SuplierController@show']);
  Route::get('suplierfind/{term}', ['uses' => 'SuplierController@search']);

  Route::get('proposals/{id}', ['uses' => 'ProposalController@index']);
  Route::get('proposal', ['uses' => 'ProposalController@index']);
  Route::post('proposal/{id}', ['uses' => 'ProposalController@update']);
  Route::post('proposal', ['uses' => 'ProposalController@store']);
  Route::get('proposal/{id}', ['uses' => 'ProposalController@show']);
  // Route::get('proposalfind/{term}', ['uses' => 'ProposalController@search']);


  //ProposalTime
  Route::get('proposaltime', ['uses' => 'ProposalController@getProposalTime']);
  Route::post('proposaltime', ['uses' => 'ProposalController@updateProposalTime']);
  Route::get('proposalstatushistory/{id}', ['uses' => 'ProposalController@getProposalStatusHistory']);
  Route::post('proposalstatushistory/{id}', ['uses' => 'ProposalController@updateProposalStatusHistory']);
  Route::post('proposaluploadfile/{id}', ['uses' => 'ProposalController@uploadFile']);

  Route::options('/{any}', function(){ return ''; })->where('any', '.*');
});
