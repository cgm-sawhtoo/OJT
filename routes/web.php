<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'NewsController@index')->name('index');

//registration
Route::get('/register', 'RegisterController@index')->name('register');
Route::post('/register', 'RegisterController@registerUser')->name('register#user');
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@loginUser')->name('login#user');
Route::get('/logout', 'LoginController@logout')->name('logout');

//is login Okay
Route::group(['middleware' => 'auth'], function () {
    //user
    Route::get('/details/{id}', 'UserController@showusernews')->name('user#details');
    Route::get('/edit/{id}', 'UserController@showUserEdit')->name('user#edit');
    Route::post('/update/{id}', 'UserController@updateUser')->name('user#update');
    //news
    Route::group(['prefix' => 'news'], function () {
        Route::get('/add', 'NewsController@addUpload')->name('news#add');
        Route::post('/upload', 'NewsController@newsUpload')->name('news#upload');
        Route::get('/list', 'NewsController@showNewsUser')->name('newslist#user');
        Route::get('/search', 'NewsController@searchNews')->name('news#search');
    });
    //change password
    Route::get('/change/password', 'ResetPasswordController@index')->name('change#password');
    Route::post('/change/password', 'ResetPasswordController@storePassword')->name('change#passwordok');

    //is admin only
    Route::group(['middleware' => 'is_admin'], function () {
        //admin user control
        Route::group(['prefix' => 'admin'], function () {
            Route::get('/search', 'UserController@searchUser')->name('user#search');
            Route::get('/delete/{id}', 'UserController@deleteUser')->name('user#delete');
            Route::get('/newslist', 'NewsController@showAllNews')->name('news#list');
            Route::get('/user/list', 'UserController@showAllUsers')->name('all#users');
            Route::get('/useradd','UserController@addUser')->name('add#user');
        });
        //news
        Route::group(['prefix' => 'news'], function () {

            Route::get('/delete/{id}', 'NewsController@deleteNews')->name('news#delete');
            Route::get('/edit/{id}', 'NewsController@newsEdit')->name('news#edit');
            Route::post('/flag-edit/{id}', 'NewsController@flagEdit')->name('flag#edit');
        });
    });
});

//forgot password by mail
Route::group(['prefix' => 'mail'], function () {
    Route::get('/forget/password', 'ResetPasswordController@getEmail')->name('get#email');
    Route::post('/forget/password', 'ResetPasswordController@postEmail')->name('post#email');
    Route::get('/reset/password/{token}', 'ResetPasswordController@getPassword')->name('reset#password');
    Route::post('/reset/password', 'ResetPasswordController@updatePassword')->name('reset#passwordok');
});
