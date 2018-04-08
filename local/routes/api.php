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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => '/support/tickets', 'middleware' => 'auth:api'], function() {
    Route::get('/', 'TicketController@index');
    Route::post('/', 'TicketController@store');
    Route::get('/{id}', 'TicketController@show')->where('id', '[0-9]+');
    Route::put('/{id}', 'TicketController@update')->where('id', '[0-9]+');
    Route::post('/{id}/messages', 'MessageController@store')->where('id', '[0-9]+');
});