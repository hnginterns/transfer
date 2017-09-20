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

Route::group(['middleware' => 'auth'], function() {
	// Handles Transfers
	Route::get('/dashboard/transfer', 'UsersController@transfer')->name('transfer');
	Route::post('/dashboard/transfer', 'UsersController@processTransfer');

	// Transaction histories
	Route::get('/dashboard/history', 'UsersController@history');

	// Wallet Funding
	Route::post('/dashboard/fundwallet', 'UsersController@processFundWallet');
	Route::get('/dashboard/fundwallet', 'UsersController@fundWallet')->name('fundwallet');
});


Route::group(['middleware' => ['auth', 'admin']], function() {
	Route::get('/manager', 'AdminController@index');

	// Set rules that users will transfer with
	Route::get('/manager/setrule', 'AdminController@setRule');
	Route::post('/manager/setrule', 'AdminController@saveRule');

	// New Rule Creation
	Route::get('/manager/createrule', 'AdminController@createRule');
	Route::post('/manager/createrule', 'AdminController@saveNewRule');

	// Edit Company Details
	Route::get('/manager/setting', 'AdminController@settings');
});
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ba', function() {

});