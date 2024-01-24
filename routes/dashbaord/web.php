<?php

use App\Http\Controllers\test;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

//  Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
//     ], function(){ //...




//     });
Auth::routes();
Route::get('/', function () {
    return view('welcome');
 });

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'auth', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){


        Route::get('/home',function(){
            return view('dashboard.app');
        });



    });


?>
