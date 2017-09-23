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
Auth::routes();
// get default home pages
Route::get('/', 'pagesController@home');

Route::get('/home', 'pagesController@home');
// get signin page
Route::get('/signin', 'pagesController@signin');

Route::get('/about', 'pagesController@about');

Route::get('/forgot', 'pagesController@forgot');

Route::get('/confirmation', 'ValidateAccountController@confirm');

Route::get('/404', 'pagesController@pagenotfound');

// authentications
Route::group(['middleware' => 'auth'], function() {
	//User routes
	Route::get('/userdashboard', 'pagesController@userdashboard');
	Route::get('/transfer-to-bank', 'pagesController@bank_transfer');
	Route::get('/transfer-to-wallet', 'pagesController@wallet_transfer');
	Route::get('/wallet-view', 'pagesController@viewWallet')->name('wallet');
	Route::get('/banks', 'BanksController@banks');
	Route::get('/success', 'pagesController@success');
	Route::get('/failed', 'pagesController@failed');
	Route::get('/transfer', 'pagesController@transfer');
	Route::get('/balance', 'pagesController@balance');
});

// auth admin
Route::group(['middleware' => ['auth', 'admin']], function() {
	// get manager
	// Set rules that users will transfer with
	Route::get('/admin/setrule', 'AdminController@setRule')->name('admin.setrule');
	Route::post('/admin/setrule', 'AdminController@saveRule')->name('admin.setrule.submit');

	// New Rule <Creati></Creati>on
	Route::get('/admin/createrule', 'AdminController@createRule')->name('admin.createrule');
	Route::post('/admin/createrule', 'AdminController@saveNewRule')->name('admin.setrule.submit');

	//Route::get('/manager/setting', 'AdminController@settings');

	// admin routes
	Route::get('/manager', 'AdminController@index');
	Route::get('/view-accounts', 'pagesController@viewAccounts');
	Route::get('/addaccount', 'AdminController@addaccount');
	Route::get('/usermanagement', 'AdminController@usermanagement');
	Route::get('/web-analytics', 'pagesController@webAnalytics');
});
