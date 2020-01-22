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


//Route::get('users', 'UsersController@index');
//Route::get('users/{id}', 'UsersController@show');
//Route::post('users', 'UsersController@store');
//Route::put('users/{id}', 'UsersController@update');
//Route::delete('users/{id}', 'UsersController@delete');

Route::group(['middleware' => 'debug-api'], function () {

    Route::get('checklist', 'ChecklistController@index');
    Route::post('checklist', 'ChecklistController@store');

    //Route::get('/checklist2/{id}/items','checklist2Controller@getItems');
    //Route::get('/checklist/{id}','checklistController@getItems');
    //Route::get('/checklist/bySeries/{series_fk}','checklistController@getBySeries');

});



