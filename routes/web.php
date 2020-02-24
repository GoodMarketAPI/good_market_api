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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::group(['namespace' => 'Admin'], function () {
    Route::get('/login', 'LoginController@login');
    Route::get('/register', 'RegisterController@register');
    Route::get('/forgot_password', 'ForgotPasswordController@forgot_password');
});

//Auth::routes();
