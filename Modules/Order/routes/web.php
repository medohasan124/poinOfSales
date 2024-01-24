<?php

use Illuminate\Support\Facades\Route;
use Modules\Order\app\Http\Controllers\OrderController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        Route::group([], function () {
            Route::resource('order', OrderController::class)->names('order');
        });
});
