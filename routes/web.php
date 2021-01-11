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


Route::get('/', 'HomeController@index')->name('index');

Route::group(['middleware' => 'guest'], function() {
    Route::get('/reg', 'HomeController@reg')->name('reg');
    Route::get('/login', 'HomeController@login')->name('login');

    Route::post('/create', 'CreateController@create');
    Route::post('/in', 'UserController@in');


});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/profile/{id}', 'HomeController@profile');
    Route::post('/profile/{id}', 'UserController@profile');

    Route::get('/changepas/{id}', 'HomeController@changePas');
    Route::post('/changepas/{id}', 'UserController@updatePas');

    Route::get('/logout', 'UserController@logout');

    Route::group([
        'middleware' => 'admin',
        'prefix'     => 'admin'
    ], function() {
        Route::get('/users', 'AdminController@index');
        Route::get('/delete/{id}', 'AdminController@delete');
        Route::get('/roleuser/{id}', 'AdminController@roleUser');
        Route::get('/roleadmin/{id}', 'AdminController@roleAdmin');
    });
});

Route::get('/user/{id}', 'HomeController@user');






