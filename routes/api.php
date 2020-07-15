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

Route::resource('people', 'PeopleController');

Route::get('groups','GroupController@index');
Route::get('group/{id}', 'GroupController@show');
Route::post('groups', 'GroupController@store');
Route::put('group/{id}', 'GroupController@update');
Route::delete('group/{id}', 'GroupController@delete');