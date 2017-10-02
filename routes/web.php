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
Route::get('/', 'pagesController@home')->name('transferrules');

Route::get('/home', 'pagesController@home');
// get signin page
//Route::get('/signin', 'pagesController@signin');

Route::get('/logout', function(){
    Auth::logout();
    Session::flush();
    return redirect('/login');
});


Route::get('/about', 'pagesController@about');

Route::get('/forgot', 'pagesController@forgot');

Route::get('/manageWallet', 'pagesController@manageWallet');

Route::get('/validate', 'ValidateAccountController@accountResolve');

Route::get('/walletBalance', 'WalletController@walletBalance');

Route::get('/walletCharge', 'WalletController@walletCharge');

Route::get('/createWallet', 'WalletController@createWallet');

Route::get('/walletTransfer', 'WalletController@transfer');

Route::get('/gettoken', 'WalletController@getToken');

Route::get('/transferWallet', 'WalletController@transfer');

Route::post('/transferAccount', 'WalletController@transferAccount');

Route::get('/404', 'pagesController@pagenotfound');

// authentications
Route::group(['middleware' => 'auth'], function () {
	//User routes
	Route::get('/dashboard', 'pagesController@userdashboard');
	Route::get('/transfer-to-bank', 'pagesController@bank_transfer');
	Route::get('/transfer-to-wallet', 'pagesController@wallet_transfer');
	Route::get('/create-wallet', 'pagesController@createWallet');
	Route::get('/wallet-view', 'pagesController@viewWallet')->name('wallet');
	Route::get('/banks', 'BanksController@banks');
	Route::get('/populatebank', 'BanksController@populateBanks');
	Route::get('/success', 'pagesController@success');
	Route::get('/failed', 'pagesController@failed');
	Route::get('/transfer', 'pagesController@transfer');
	Route::get('/balance', 'pagesController@balance');
	Route::get('/ravepay', 'RavepayController@index');
	Route::get('/integrity/{txRef}/{email}', 'RavepayController@checkSum');
	Route::get('/ravepaysuccess/{ref}/{amount}/{currency}', 'RavepayController@success');

});

// auth admin
Route::get('/admin/login', 'AdminLoginController@showLoginForm');
Route::post('/admin/login', 'AdminLoginController@login')->name('admin.login');
Route::get('/admin/logout', 'AdminLoginController@logout')->name('admin.logout');

Route::group(['middleware' => ['admin']], function () {
	Route::get('/admin', 'AdminController@index');
	Route::get('/admin/managewallet', 'AdminController@managewallet');
	Route::get('/admin/managebeneficiary', 'AdminController@managebeneficiary');
	Route::get('/admin/adduser', 'AdminController@addaccount');
	// Set rules that users will transfer with
	Route::get('/admin/setrule', 'AdminController@setRule')->name('admin.setrule');
	Route::post('/admin/setrule', 'AdminController@saveRule')->name('admin.setrule.submit');

	// New Rule <Creati></Creati>on
	Route::get('/admin/createrule', 'AdminController@createRule')->name('admin.createrule');
	Route::post('/admin/createrule', 'AdminController@saveNewRule')->name('admin.setrule.submit');
	
	Route::get('admin/view-rules', 'AdminController@viewRules');
	Route::post('admin/update-rule', 'AdminController@updateRule')->name('update-rule');
	Route::get('admin/edit-rule/{ruleId}', 'AdminController@editRules')->name('edit-rule');
	Route::get('admin/delete-rule/{ruleId}', 'AdminController@deleteRule')->name('delete-rule');

  	Route::get('/admin/{id}/archivewallet', 'AdminController@archiveWallet');
  	Route::get('/admin/{id}/activatewallet', 'AdminController@activateWallet');

	// admin routes
	Route::get('/view-accounts', 'pagesController@viewAccounts');
	Route::get('/addaccount', 'AdminController@addaccount');
	Route::get('/usermanagement', 'AdminController@usermanagement');
	Route::get('admin/beneficiary', 'AdminController@ViewBeneficiary');
	Route::get('admin/addBeneficiary', 'AdminController@addBeneficiary');
	Route::get('admin/beneficiarydetails', 'AdminController@BeneficiaryDetails');
	Route::get('/web-analytics', 'pagesController@webAnalytics');
	Route::get('admin/createwallet', 'AdminController@wallet');
	Route::post('admin/createwallet', 'AdminController@addwallet');
	Route::get('admin/viewwallet/{walletId}', 'AdminController@show')->name('view-wallet');
	Route::resource('admin/users', 'Admin\UsersController');
	//Route::resource('admin/users', 'Admin\UsersController');
	Route::post('admin/users/store', 'Admin\UsersController@store');
	Route::post('admin/users/banUser/{id}', 'Admin\UsersController@banUser');
	Route::post('admin/users/unbanUser/{id}', 'Admin\UsersController@unbanUser');
	Route::post('admin/users/makeAdmin/{id}', 'Admin\UsersController@makeAdmin');
	Route::post('admin/users/removeAdmin/{id}', 'Admin\UsersController@removeAdmin');

	//Route::get('/manager/setting', 'AdminController@settings');

});

Route::get('/home', 'HomeController@index')->name('home');

// admin routes
Route::get('/view-accounts', 'pagesController@viewAccounts');
Route::get('/addaccount', 'AdminController@addaccount');
Route::get('/usermanagement', 'AdminController@usermanagement');
Route::get('admin/beneficiary', 'AdminController@ViewBeneficiary')->name('beneficiary');
Route::get('admin/addbeneficiary', 'AdminController@beneficiary');
Route::get('admin/editbeneficiary/{beneficiary}', 'AdminController@editbeneficiary'); //routE FOR EDITING BENEFICIARY
Route::get('admin/beneficiarydetails/{id}', 'AdminController@BeneficiaryDetails');
Route::get('admin/analytics', 'AdminController@webAnalytics');
Route::get('admin/createwallet', 'AdminController@wallet');
Route::get('admin/wallet-details', 'AdminController@walletdetails');
Route::post('admin/addbeneficiary', 'AdminController@addbeneficiary');
Route::post('admin/editbeneficiary/{beneficiary}', 'AdminController@postEditbeneficiary');
