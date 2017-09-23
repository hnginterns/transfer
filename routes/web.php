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

// get password forget pages
Route::get('/forgot', function () {
	return view('forgot');
});

Route::get('/confirmation', 'ValidateAccountController@confirm');

// get dashboard
Route::get('/userdashboard', 'pagesController@userdashboard');

// get add account page (this page will be move to the admin middleware)
Route::get('/addaccount', function () {
	return view('/admin/addaccount');
});

//admin dashboard
Route::get('/admin', function () {
		return view('/admin/home');
})->middleware('admin'); //Enable Admin middleware by removing comment around "->middleware('admin')"

// return error 404 page
Route::get('/404', function(){
	return view('404');
});
// get information about site
Route::get('/about', function(){
	return view('about');
});
// get bank route
Route::get('/banks', 'BanksController@banks');

// get transfer 
Route::get('/transfer', 'pagesController@transfer');

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
	Route::get('/admin', 'AdminController@index');
	Route::get('/view-accounts', 'pagesController@viewAccounts');
	Route::get('/addaccount', 'AdminController@addaccount');
	Route::get('/usermanagement', 'AdminController@usermanagement');
	Route::get('/web-analytics', 'pagesController@webAnalytics');
});
