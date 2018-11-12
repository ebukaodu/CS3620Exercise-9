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
Route::get('items', 'ItemsController@index');
Route::get('items/{id}', 'ItemsController@show');
Route::post('items', 'ItemsController@shop');
Route::put('items/{item}', 'ItemsController@update');
Route::delete('items/{item}', 'ItemsController@delete');
Route::any('errors', 'ItemsController@errors');
Route::apiResource('questions', 'QuestionsController');
Route::get('items/{item}/questions', 'ItemsController@questions');

