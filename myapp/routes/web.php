<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthUserAdminMiddleware;
use App\Shop\Entity\Merchandise;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix'=> 'user'], function () {
    Route::group(['prefix' => 'auth'], function ()  {
        Route::get('login', 'App\Http\Controllers\UserAuthController@Login')->name('user.auth.login');
        Route::post('login','App\Http\Controllers\UserAuthController@LoginProcess');
        Route::get('signup', 'App\Http\Controllers\UserAuthController@Signup')->name('user.auth.signup');
        Route::post('signup','App\Http\Controllers\UserAuthController@SignupProcess');
        Route::get('signout','App\Http\Controllers\UserAuthController@SignOut')->name('user.auth.signout');
        Route::get('home','App\Http\Controllers\UserAuthController@Home');
        Route::post('home','App\Http\Controllers\UserAuthController@HomeProcess')->name('user.auth.home');
        
    });
});

Route::group(['prefix'=> 'merchandise'], function () {
    Route::get('manage', 'App\Http\Controllers\MerchandiseController@MerchandiseManage')->name('merchandise.manage')->middleware(AuthUserAdminMiddleware::class);
    Route::get('create', 'App\Http\Controllers\MerchandiseController@MerchandiseCreate')->name('merchandise.create')->middleware(AuthUserAdminMiddleware::class);
    Route::get('shop','App\Http\Controllers\MerchandiseController@MerchandiseShop')->name('merchandise.shop');
    Route::get('search', 'App\Http\Controllers\MerchandiseController@MerchandiseSearch')->name('merchandise.search');


    Route::group(['prefix' => '{merchandise_id}'], function () {
        Route::get('edit', 'App\Http\Controllers\MerchandiseController@MerchandiseEdit')->middleware(AuthUserAdminMiddleware::class);
        Route::post('/', 'App\Http\Controllers\MerchandiseController@MerchandiseEditProcess');
        Route::get('delete', 'App\Http\Controllers\MerchandiseController@MerchandiseDelete')->middleware(AuthUserAdminMiddleware::class);
        Route::get('thing', 'App\Http\Controllers\MerchandiseController@MerchandiseThing')->name('merchandise.thing');
        
    });
});