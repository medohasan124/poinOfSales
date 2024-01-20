<?php

use Illuminate\Support\Facades\Route;
use Modules\Users\app\Http\Controllers\UsersController;

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




use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Users\app\Http\Controllers\UserController;

  Route::group(
      [
          'prefix' => LaravelLocalization::setLocale(),
          'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
      ], function(){


              Route::resource('users', UserController::class)->names('users');
        


      });
