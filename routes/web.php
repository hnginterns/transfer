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

Route::get('/manageWallet', 'pagesController@manageWallet');

Route::get('/validate', 'ValidateAccountController@accountResolve');

Route::get('/walletBalance', 'WalletController@walletBalance');

Route::get('/walletCharge', 'WalletController@walletCharge');

Route::get('/createWallet', 'WalletController@createWallet');

Route::get('/walletTransfer', 'WalletController@transfer');

Route::get('/gettoken', 'WalletController@getToken');

Route::get('/transferAccount', 'WalletController@transferAccount');

Route::get('/404', 'pagesController@pagenotfound');

// authentications
Route::group(['middleware' => 'auth'], function() {
	//User routes
	Route::get('/dashboard', 'pagesController@userdashboard');
	Route::get('/transfer-to-bank', 'pagesController@bank_transfer');
	Route::get('/transfer-to-wallet', 'pagesController@wallet_transfer');
	Route::get('/create-wallet', 'pagesController@createWallet');
	Route::get('/wallet-view', 'pagesController@viewWallet')->name('wallet');
	Route::get('/banks', 'BanksController@banks');
	Route::get('/success', 'pagesController@success');
	Route::get('/failed', 'pagesController@failed');
	Route::get('/transfer', 'pagesController@transfer');
	Route::get('/balance', 'pagesController@balance');
	Route::get('/ravepay', 'RavepayController@index');
        Route::get('/integrity/{txRef}/{email}', 'RavepayController@checkSum');
        Route::get('/ravepaysuccess/{ref}/{amount}/{currency}', 'RavepayController@success');

});

// auth admin
Route::group(['middleware' => ['auth', 'admin']], function() {
	Route::get('/admin', 'AdminController@index');
	Route::get('/admin/managewallet', 'AdminController@managewallet');
	Route::get('/admin/adduser', 'AdminController@addaccount');
	// Set rules that users will transfer with
	Route::get('/admin/setrule', 'AdminController@setRule')->name('admin.setrule');
	Route::post('/admin/setrule', 'AdminController@saveRule')->name('admin.setrule.submit');

	// New Rule <Creati></Creati>on
	Route::get('/admin/createrule', 'AdminController@createRule')->name('admin.createrule');
	Route::post('/admin/createrule', 'AdminController@saveNewRule')->name('admin.setrule.submit');

	//Route::get('/manager/setting', 'AdminController@settings');

	// admin routes
	Route::get('/view-accounts', 'pagesController@viewAccounts');
	Route::get('/addaccount', 'AdminController@addaccount');
	Route::get('/usermanagement', 'AdminController@usermanagement');
	Route::get('/web-analytics', 'pagesController@webAnalytics');
	Route::get('/addwallet', 'pagesController@wallet');
	Route::resource('admin/users', 'Admin\UsersController');
	Route::post('admin/users/store', 'Admin\UsersController@store');
	Route::post('admin/users/banUser/{id}', 'Admin\UsersController@banUser');
	Route::post('admin/users/unbanUser/{id}', 'Admin\UsersController@unbanUser');
	Route::post('admin/users/makeAdmin/{id}', 'Admin\UsersController@makeAdmin');
	Route::post('admin/users/removeAdmin/{id}', 'Admin\UsersController@removeAdmin');
});

// Testing routes
Route::get('/test', 'HomeController@randomFunc');
