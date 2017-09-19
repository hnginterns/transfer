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

Route::get('/', 'pagesController@home');

//Route::view('/balance', 'get-wallet');

Route::get('/transfer', 'pagesController@transfer');

Route::get('/balance', 'pagesController@balance');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
