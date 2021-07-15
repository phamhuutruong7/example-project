<?php

use Illuminate\Http\Request;
use App\Http\UserController;
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

Route::get('/getUsers','UserController@index');

Route::get('/getUser/{id}','UserController@show');

Route::post('/addUser','UserController@store');

Route::put('/updateUser/{id}','UserController@update');

Route::delete('/deleteUser/{id}','UserController@destroy');