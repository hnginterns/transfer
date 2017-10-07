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

Route::get('/logout', function () {
	Auth::logout();
	Session::flush();
	return redirect('/login');
});

//Route::get('/fundWallet', 'WalletController@fundWallet');


Route::get('/welcome', function () {
	return view('welcome');
});

Route::get('/otp', 'pagesController@otp');

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

Route::post('/transfer-to-bank/{wallet}', 'WalletController@transferAccount');

Route::get('/404', 'pagesController@pagenotfound');

// authentications
Route::group(['middleware' => 'auth'], function () {
	//User routes
	Route::get('/dashboard', 'pagesController@userdashboard');
	Route::get('/wallet/{wallet}', 'pagesController@walletdetail')->name('user.wallet.detail');
	Route::get('/transfer-to-bank/{wallet}', 'pagesController@bank_transfer');
	Route::get('/transfer-to-wallet', 'pagesController@wallet_transfer');
	Route::get('/create-wallet', 'pagesController@createWallet');
	Route::get('/banks', 'BanksController@banks');
	Route::get('/populatebank', 'BanksController@populateBanks');
	Route::get('/success', 'pagesController@success');
	Route::get('/failed/{response}', 'pagesController@failed')->name('failed');

	Route::get('/transfer', 'pagesController@transfer');
	Route::get('/balance', 'pagesController@balance');
	Route::get('/ravepay/{id}', 'RavepayController@index')->name('ravepay.pay');
	Route::get('/integrity/{txRef}/{email}', 'RavepayController@checkSum');
	Route::get('/ravepaysuccess/{ref}/{amount}/{currency}', 'RavepayController@success')->name('ravepay.success');	
	Route::get('/addbeneficiary/{wallet}', 'pagesController@addBeneficiary');
	Route::post('/addbeneficiary/{wallet}', 'pagesController@insertBeneficiary')->name('beneficiaries.insert');

});

// auth admin
Route::get('/admin/login', 'AdminLoginController@showLoginForm');
Route::post('/admin/login', 'AdminLoginController@login')->name('admin.login');
Route::get('/admin/logout', 'AdminLoginController@logout')->name('admin.logout');

Route::group(['middleware' => ['admin']], function () {

	//Wallets Routes

  	Route::get('admin/wallets', 'Admin\WalletController@index')->name('wallets.index');
  	Route::get('admin/wallets/details/{id}', 'Admin\WalletController@details')->name('wallets.details');
  	Route::get('admin/wallets/add', 'Admin\WalletController@add')->name('wallets.add');
  	Route::post('admin/wallets/insert', 'Admin\WalletController@insert')->name('wallets.insert');
  	Route::get('admin/wallets/edit/{id}', 'Admin\WalletController@edit')->name('wallets.edit');
  	Route::post('admin/wallets/update/{id}', 'Admin\WalletController@update')->name('wallets.update');
  	Route::get('admin/wallets/delete/{id}', 'Admin\WalletController@delete')->name('wallets.delete');

  	Route::get('admin/wallets/manualfund/{id}', 'Admin\WalletController@manualfund')->name('wallets.manualfund');
  	Route::post('admin/wallets/manualfund/{id}', 'Admin\WalletController@manualfundstore')->name('wallets.manualfund.store');

  	Route::get('admin/wallets/ravefund/{id}', 'Admin\WalletController@ravefund')->name('wallets.ravefund');
  	Route::post('admin/wallets/ravefund/{id}', 'Admin\WalletController@ravefundstore')->name('wallets.ravefund.store');

  	//Beneficiaries Routes

  	Route::get('admin/beneficiaries', 'Admin\BeneficiaryController@index')->name('beneficiaries.index');
  	Route::get('admin/beneficiaries/details/{id}', 'Admin\BeneficiaryController@details')->name('beneficiaries.details');
  	Route::get('admin/beneficiaries/add', 'Admin\BeneficiaryController@add')->name('beneficiaries.add');
  	Route::post('admin/beneficiaries/insert', 'Admin\BeneficiaryController@insert')->name('beneficiaries.insert');
  	Route::get('admin/beneficiaries/edit/{id}', 'Admin\BeneficiaryController@edit')->name('beneficiaries.edit');
  	Route::post('admin/beneficiaries/update/{id}', 'Admin\BeneficiaryController@update')->name('beneficiaries.update');
  	Route::get('admin/beneficiaries/delete/{id}', 'Admin\BeneficiaryController@delete')->name('beneficiaries.delete');

	Route::get('/admin/managePermission', 'AdminController@managePermission');
	Route::get('/admin/addpermission', 'Admin\WalletController@addPermission');
	Route::post('/admin/addpermission', 'Admin\WalletController@PostAddPermission');
	Route::get('/admin/editpermission/{restriction}', 'Admin\WalletController@editPermission');
	Route::post('/admin/editpermission/{restriction}', 'Admin\WalletController@PostEditPermission');
	Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
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

	//fund wallet
	Route::get('/admin/fundwallet', 'AdminController@fundwallet');
	Route::post('/admin/fundWallet', 'WalletController@cardWallet');
	Route::post('/admin/otp', 'WalletController@otp');
	Route::get('/admin/transaction-history', 'AdminController@cardTransaction');

	// admin routes
	Route::get('/view-accounts', 'pagesController@viewAccounts');
	//Route::get('/usermanagement', 'AdminController@usermanagement');

	Route::get('/addaccount', 'AdminController@addaccount');


	//beneficiary
	Route::get('admin/addBeneficiary', 'AdminController@addBeneficiary');
	Route::get('admin/beneficiary', 'AdminController@ViewBeneficiary')->name('beneficiary');
	Route::get('admin/addbeneficiary', 'AdminController@beneficiary');
	Route::get('admin/editbeneficiary/{beneficiary}', 'AdminController@editbeneficiary');
	Route::get('admin/deletebeneficiary/{beneficiary}', 'AdminController@deletebeneficiary');
	Route::get('admin/beneficiarydetails/{id}', 'AdminController@BeneficiaryDetails');
	Route::post('admin/addbeneficiary', 'AdminController@addbeneficiary');
	Route::post('admin/editbeneficiary/{beneficiary}', 'AdminController@postEditbeneficiary');

	Route::get('/web-analytics', 'pagesController@webAnalytics');

	Route::get('admin/createwallet', 'AdminController@wallet');
	Route::post('admin/createwallet', 'AdminController@addwallet');
	Route::get('admin/viewwallet/{walletId}', 'AdminController@show')->name('view-wallet');
	Route::get('admin/wallet-details', 'AdminController@walletdetails');


	Route::resource('admin/users', 'UsermgtController');
	Route::post('admin/users/banUser/{id}', 'UsermgtController@banUser');
	Route::post('admin/users/unbanUser/{id}', 'UsermgtController@unbanUser');
	Route::post('admin/users/makeAdmin/{id}', 'UsermgtController@makeAdmin');
	Route::post('admin/users/removeAdmin/{id}', 'UsermgtController@removeAdmin');

	//Route::get('/manager/setting', 'AdminController@settings');

	Route::get('/admin/smswallet', 'SmsWalletController@smsWalletBalance');
	Route::post('/admin/smswallet-topup', 'SmsWalletController@smsWalletTopup');	
	Route::post('/admin/get-user-details', 'SmsWalletController@getUserDetails');

	// admin routes
	Route::get('/view-accounts', 'pagesController@viewAccounts');
	Route::get('/addaccount', 'AdminController@addaccount');
	Route::get('/userwalment', 'AdminController@usermanagement');
	Route::get('admin/analytics', 'AdminController@webAnalytics');

});

Route::get('/home', 'HomeController@index')->name('home');


