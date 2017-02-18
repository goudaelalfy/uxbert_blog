<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PostController@index');
Route::any('user/login', 'UserController@login');
Route::get('user/logout', 'UserController@logout');
Route::get('user/register', 'UserController@create');
Route::post('user/store', 'UserController@store');
Route::get('user/activate/{remember_token}', 'UserController@activate');
Route::get('user/forgetPassword', 'UserController@forgetPassword');
Route::post('user/sendPassword', 'UserController@sendPassword');
Route::get('user/resetPassword/{remember_token}', 'UserController@resetPassword');
Route::post('user/updatePassword', 'UserController@updatePassword');