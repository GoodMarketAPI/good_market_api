<?php


Route::group(['prefix' => 'v1', 'namespace' => 'Api\v1'], function () {

    Route::group(['prefix' => 'user'], function () {
        Route::post('register', 'Auth\AuthController@register');
        Route::post('login', 'Auth\AuthController@login');
        Route::post('forgot-password', 'UserController@forgotPassword');
        Route::get('reset-password/{id}/{token}', 'UserController@resetPassword');
    });

    Route::group(['middleware' => 'auth:api'], function () {

    });
});