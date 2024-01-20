<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Users\app\Http\Controllers\UserController;

  Route::group(
      [
          'prefix' => LaravelLocalization::setLocale(),
          'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
      ], function(){


              Route::resource('users', UserController::class)->names('users');



      });
