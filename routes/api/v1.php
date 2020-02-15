<?php


Route::group(['prefix' => 'v1', 'namespace' => 'Api\v1'], function () {
    // Info
    Route::get('company', 'InfoController@company');
    Route::get('banner', 'InfoController@listBanners');
    Route::get('category', 'InfoController@listCategories');
    Route::get('province', 'InfoController@listProvinces');
    Route::get('voucher-code', 'InfoController@listVoucherCodes');
    Route::get('discount-code', 'InfoController@listDiscountCodes');
    Route::get('section', 'InfoController@getSection');

    // User
    Route::group(['prefix' => 'user'], function () {
        Route::post('register', 'Auth\AuthController@register');
        Route::post('login', 'Auth\AuthController@login');
        Route::post('forgot-password', 'UserController@forgotPassword');
        Route::get('reset-password/{id}/{token}', 'UserController@resetPassword');
    });

    // Product
    Route::resource('product', 'ProductController')->only('index');
    Route::group(['prefix' => 'product'], function () {
        Route::get('{id}', 'ProductController@show')->where('id', '[0-9]+');
        Route::get('sale', 'ProductController@getSale');
        Route::get('best-selling', 'ProductController@getBestSelling');
        Route::get('hot-today', 'ProductController@getHotToday');
    });

    // Supplier
    Route::resource('supplier', 'SupplierController')->only('index');
    Route::group(['prefix' => 'supplier'], function () {
        Route::get('{id}', 'SupplierController@show')->where('id', '[0-9]+');
        Route::resource('sale', 'SaleController')->only('index');
        Route::group(['prefix' => 'sale'], function () {
            Route::get('{id}', 'SaleController@show')->where('id', '[0-9]+');
        });
    });

    Route::group(['middleware' => 'auth:api'], function () {
        // User
        Route::group(['prefix' => 'user'], function () {
            Route::post('profile', 'UserController@profile');
            Route::post('update', 'UserController@update');
            Route::post('change-password', 'UserController@changePassword');
            Route::post('logout', 'Auth\AuthController@logout');

            Route::post('notification/list', 'UserController@getListNotification');
        });

        // Product
        Route::resource('product', 'ProductController')->except('index', 'show');

        // Supplier
        Route::resource('supplier', 'SupplierController')->except('index', 'show');

        // Order
        Route::resource('order', 'OrderController');
    });
});