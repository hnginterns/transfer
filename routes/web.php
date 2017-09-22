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

// get default home pages
Route::get('/', 'pagesController@home');
// get signin page
Route::get('/signin', 'pagesController@signin');
// get password forget pages
Route::get('/forgot', function () {
	return view('forgot');
});

Route::get('/confirmation', 'ValidateAccountController@confirm');

// get dashboard
Route::get('/userdashboard', 'pagesController@userdashboard');

//View accounts page
Route::get('/view-accounts', 'pagesController@viewAccounts');

// get add account page (this page will be move to the admin middleware)
Route::get('/addaccount', function () {
	return view('/admin/addaccount');
});

//user management page
Route::get('/usermanagement', function(){
	return view('usermanagement');
});

//admin dashboard
Route::get('/admin', function () {
		return view('/admin/home');
})->middleware('admin'); //Enable Admin middleware by removing comment around "->middleware('admin')"

// return error 404 page
Route::get('/404', function(){
	return view('404');
});

//return wallet-view
Route::get('/wallet-view', 'pagesController@viewWallet')->name('wallet');

// get information about site
Route::get('/about', function(){
	return view('about');
});
// get bank route
Route::get('/banks', 'BanksController@banks');

Route::get('/success', 'pagesController@success');

Route::get('/failed', 'pagesController@failed');

// get transfer 
Route::get('/transfer', 'pagesController@transfer');

// get bank balance
Route::get('/balance', 'pagesController@balance');

// authentications
Auth::routes();
Route::group(['middleware' => 'auth'], function() {
	// Handles Transfers
	Route::get('/dashboard', 'UsersController@index')->name('dashboard');
	Route::get('/dashboard/transfer', 'UsersController@transfer')->name('transfer');
	Route::post('/dashboard/transfer', 'UsersController@processTransfer');

	// Transaction histories
	Route::get('/dashboard/history', 'UsersController@history');

	// Wallet Funding
	Route::post('/dashboard/fundwallet', 'UsersController@processFundWallet');
	Route::get('/dashboard/fundwallet', 'UsersController@fundWallet')->name('fundwallet');
});


// admin dashboard
Route::get('/admin', function () {
		return view('/admin/home');
});

// auth admin
Route::group(['middleware' => ['auth', 'admin']], function() {

	// get manager
	Route::get('/manager', 'AdminController@index');

	Route::group(['middleware' => ['auth', 'admin']], function() {

		Route::get('/admin', 'AdminController@index');

		// Set rules that users will transfer with
		Route::get('/admin/setrule', 'AdminController@setRule');
		Route::post('/admin/setrule', 'AdminController@saveRule');

		// New Rule Creation
		Route::get('/admin/createrule', 'AdminController@createRule');
		Route::post('/admin/createrule', 'AdminController@saveNewRule');

	});

	//Route::get('/manager/setting', 'AdminController@settings');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
