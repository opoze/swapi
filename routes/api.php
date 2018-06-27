<?php

use Illuminate\Http\Request;

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

Route::middleware(['cors', 'auth'])->group(function () {
  Route::get('user', ['uses' => 'UserController@index']);
  Route::post('user/{id}', ['uses' => 'UserController@update']);
  Route::post('user', ['uses' => 'UserController@store']);
  Route::get('user/{id}', ['uses' => 'UserController@show']);
  Route::get('userfind/{term}', ['uses' => 'UserController@search']);
  Route::delete('user/{id}', ['uses' => 'UserController@destroy']);

  Route::get('category', ['uses' => 'CategoryController@index']);
  Route::post('category/{id}', ['uses' => 'CategoryController@update']);
  Route::post('category', ['uses' => 'CategoryController@store']);
  Route::get('category/{id}', ['uses' => 'CategoryController@show']);
  Route::get('categoryfind/{term}', ['uses' => 'CategoryController@search']);
  Route::delete('category/{id}', ['uses' => 'CategoryController@destroy']);

  Route::get('suplier', ['uses' => 'SuplierController@index']);
  Route::post('suplier/{id}', ['uses' => 'SuplierController@update']);
  Route::post('suplier', ['uses' => 'SuplierController@store']);
  Route::get('suplier/{id}', ['uses' => 'SuplierController@show']);
  Route::get('suplierfind/{term}', ['uses' => 'SuplierController@search']);
  Route::delete('suplier/{id}', ['uses' => 'SuplierController@destroy']);

  Route::get('proposals/{id}', ['uses' => 'ProposalController@index']);
  Route::get('proposal', ['uses' => 'ProposalController@index']);
  Route::post('proposal/{id}', ['uses' => 'ProposalController@update']);
  Route::post('proposal', ['uses' => 'ProposalController@store']);
  Route::get('proposal/{id}', ['uses' => 'ProposalController@show']);
  Route::delete('proposal/{id}', ['uses' => 'ProposalController@destroy']);
  Route::get('proposalfind/{term}', ['uses' => 'ProposalController@search']);

  //ProposalTime
  Route::get('proposaltime', ['uses' => 'ProposalController@getProposalTime']);
  Route::post('proposaltime', ['uses' => 'ProposalController@updateProposalTime']);
  Route::get('proposalstatushistory/{id}', ['uses' => 'ProposalController@getProposalStatusHistory']);
  Route::post('proposalstatushistory/{id}', ['uses' => 'ProposalController@updateProposalStatusHistory']);
  Route::post('logout', ['uses' => 'UserController@logout']);

});

// Options
//Login
Route::middleware(['cors'])->group(function () {
  Route::options('/{any}', function(){ return ''; })->where('any', '.*');
  Route::post('login', ['uses' => 'UserController@authenticate']);
  Route::post('proposaluploadfile/{id}', ['uses' => 'ProposalController@uploadFile']);
});

//File upload
// File Download
Route::get('proposaldownloadfile/{id}', ['uses' => 'ProposalController@downloadFile']);
