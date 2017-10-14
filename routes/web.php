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

use App\CardWallet;

Auth::routes();

// get default home pages
Route::get('/', 'pagesController@home')->name('home');

//Route::get('/home', 'pagesController@home');
// get signin page
//Route::get('/signin', 'pagesController@signin');
Route::get('/home', 'HomeController@index')->name('home.index');

Route::get('/logout', function () {
	Auth::logout();
	Session::flush();
	return redirect('/login');
});

//Route::get('/fundWallet', 'WalletController@fundWallet');
Route::get('/testbanks', 'BanksController@getAllBanks');
Route::get('makeadmin', 'WalletController@MakeUserAdmin');




Route::get('/welcome', function () {
$cardWallet = CardWallet::all();
	dd($cardWallet);

	//return view('welcome');
});

Route::get('/testo', 'Admin\AdminController@Test');
Route::get('/card-to-wallet', 'User\UserWalletController@userWallet');


Route::get('/about', 'pagesController@about')->name('about');
Route::get('/contact', 'ContentController@contact')->name('contact');
Route::get('/features', 'ContentController@features')->name('features');
Route::get('/privacy', 'ContentController@privacy')->name('privacy');
Route::get('/how-it-works', 'ContentController@how')->name('how');
Route::get('/terms', 'ContentController@terms')->name('terms');
Route::get('/help', 'ContentController@help')->name('help');


Route::get('/forgot', 'pagesController@forgot');

Route::get('/manageWallet', 'pagesController@manageWallet');

Route::get('/validate', 'ValidateAccountController@accountResolve');

Route::get('/walletBalance', 'WalletController@walletBalance');

Route::get('/walletCharge', 'WalletController@walletCharge');

Route::get('/createWallet', 'WalletController@createWallet');

Route::post('/walletTransfer', 'WalletController@transfer');

Route::get('/gettoken', 'WalletController@getToken');

Route::get('/transferWallet', 'WalletController@transfer');

Route::get('/404', 'pagesController@pagenotfound');

// authentications
Route::group(['middleware' => 'auth'], function () {
	//User routes
	Route::get('/dashboard', 'pagesController@userdashboard');
	Route::get('/wallet/{wallet}', 'pagesController@walletdetail')->name('user.wallet.detail');
	
	Route::get('/transfer-to-bank/{wallet}', 'pagesController@bank_transfer');
	Route::post('/transfer-to-bank/{wallet}', 'WalletController@transferAccount');
	
	Route::get('/transfer-to-wallet/{id}', 'pagesController@wallet_transfer');
	Route::post('/transfer-to-wallet/{wallet}', 'WalletController@transfer');
	
	Route::get('/create-wallet', 'pagesController@createWallet');
	Route::get('/banks', 'BanksController@banks');
	Route::get('/populatebank', 'BanksController@populateBanks');
	Route::get('/success', 'pagesController@success');
	Route::get('/wallet-transfer-success', 'pagesController@walletSuccess');
	Route::get('/failed/{response}', 'pagesController@failed')->name('failed');
        Route::get('/phone-topup', 'pagesController@phoneTopup');
	Route::get('/phonetopup', 'pagesController@phoneTopupView');
	Route::get('/transfer', 'pagesController@transfer');
	Route::get('/balance', 'pagesController@balance');
	Route::get('/fund/{id}', 'RavepayController@index')->name('ravepay.pay');
	Route::post('/fund/{id}', 'RavepayController@cardWallet')->name('ravepay.pay');
	Route::post('/otp', 'RavepayController@otp')->name('ravepay.pay');
	Route::post('/wallet/{wallet_code}/fund', 'WalletController@cardWallet');
	Route::get('/integrity/{txRef}/{email}', 'RavepayController@checkSum');

	Route::get('/ravepaysuccess/{ref}/{amount}/{currency}', 'RavepayController@success');
	Route::get('/addbeneficiary', 'pagesController@addBeneficiary');
	Route::post('/addbeneficiary/insertBeneficiary', 'pagesController@insertBeneficiary')->name('beneficiaries.insert');

	Route::get('/ravepaysuccess/{ref}/{amount}/{currency}', 'RavepayController@success')->name('ravepay.success');
	Route::get('/addbeneficiary/{wallet}', 'pagesController@addBeneficiary');
	Route::post('/addbeneficiary/{wallet}', 'pagesController@insertBeneficiary')->name('beneficiaries.insert');

});

// auth admin
Route::get('/admin/login', 'Admin\AdminLoginController@showLoginForm');
Route::post('/admin/login', 'Admin\AdminLoginController@login')->name('admin.login');
Route::get('/admin/logout', 'Admin\AdminLoginController@logout')->name('admin.logout');

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

	Route::get('/admin/managePermission', 'Admin\AdminController@managePermission')->name('permission.manage');
	Route::get('/admin/addpermission', 'Admin\WalletController@addPermission')->name('permission.create');
	Route::post('/admin/addpermission', 'Admin\WalletController@PostAddPermission')->name('permission.store');
	Route::get('/admin/editpermission/{restriction}', 'Admin\WalletController@editPermission')->name('permission.edit');
	Route::post('/admin/editpermission/{restriction}', 'Admin\WalletController@PostEditPermission')->name('permission.update');
	Route::get('/admin', 'Admin\AdminController@index')->name('admin.dashboard');
	Route::get('/admin/managewallet', 'Admin\AdminController@managewallet');
	Route::get('/admin/managebeneficiary', 'Admin\AdminController@managebeneficiary');
	Route::get('/admin/adduser', 'Admin\AdminController@addaccount');
	// Set rules that users will transfer with
	Route::get('/admin/setrule', 'Admin\AdminController@setRule')->name('admin.setrule');
	Route::post('/admin/setrule', 'Admin\AdminController@saveRule')->name('admin.setrule.submit');

	// New Rule <Creati></Creati>on
	Route::get('/admin/createrule', 'Admin\AdminController@createRule')->name('admin.createrule');
	Route::post('/admin/createrule', 'Admin\AdminController@saveNewRule')->name('admin.setrule.submit');

	Route::get('admin/view-rules', 'Admin\AdminController@viewRules');
	Route::post('admin/update-rule', 'Admin\AdminController@updateRule')->name('update-rule');
	Route::get('admin/edit-rule/{ruleId}', 'Admin\AdminController@editRules')->name('edit-rule');
	Route::get('admin/delete-rule/{ruleId}', 'Admin\AdminController@deleteRule')->name('delete-rule');

	Route::get('/admin/{id}/archivewallet', 'Admin\AdminController@archiveWallet');
	Route::get('/admin/{id}/activatewallet', 'Admin\AdminController@activateWallet');

	//fund wallet
	Route::get('/admin/fundwallet', 'Admin\AdminController@fundwallet');
	Route::post('/admin/{wallet_code}/fund', 'WalletController@cardWallet');
	Route::post('/admin/otp', 'WalletController@otp');
	Route::get('/admin/transaction-history', 'Admin\AdminController@cardTransaction');

	// admin routes
	Route::get('/view-accounts', 'pagesController@viewAccounts');
	//Route::get('/usermanagement', 'Admin\AdminController@usermanagement');

	Route::get('/addaccount', 'Admin\AdminController@addaccount');


	//beneficiary
	Route::get('admin/addBeneficiary', 'Admin\AdminController@addBeneficiary');
	Route::get('admin/beneficiary', 'Admin\AdminController@ViewBeneficiary')->name('beneficiary');
	Route::get('admin/addbeneficiary', 'Admin\AdminController@beneficiary');
	Route::get('admin/editbeneficiary/{beneficiary}', 'Admin\AdminController@editbeneficiary');
	Route::get('admin/deletebeneficiary/{beneficiary}', 'Admin\AdminController@deletebeneficiary');
	Route::get('admin/beneficiarydetails/{id}', 'Admin\AdminController@BeneficiaryDetails');
	Route::post('admin/addbeneficiary', 'Admin\AdminController@addbeneficiary');
	Route::post('admin/editbeneficiary/{beneficiary}', 'Admin\AdminController@postEditbeneficiary');

	Route::get('/web-analytics', 'pagesController@webAnalytics');

	Route::get('admin/createwallet', 'Admin\AdminController@wallet');
	Route::post('admin/createwallet', 'Admin\AdminController@addwallet');
	Route::get('admin/viewwallet/{walletId}', 'Admin\AdminController@show')->name('view-wallet');
	Route::get('admin/wallet-details', 'Admin\AdminController@walletdetails');


	Route::resource('admin/users', 'User\UsermgtController');
	Route::post('admin/users/banUser/{id}', 'User\UsermgtController@banUser');
	Route::post('admin/users/unbanUser/{id}', 'User\UsermgtController@unbanUser');
	Route::post('admin/users/makeAdmin/{id}', 'User\UsermgtController@makeAdmin');
	Route::post('admin/users/removeAdmin/{id}', 'User\UsermgtController@removeAdmin');

	//Route::get('/manager/setting', 'Admin\AdminController@settings');

	Route::get('/admin/smswallet', 'SmsWalletController@smsWalletBalance');
	Route::post('/admin/sms', 'SmsWalletController@smsWallet');
	Route::post('/admin/Otp', 'SmsWalletController@Otp');
	Route::post('/admin/smswallet', 'SmsWalletController@smsWallet');
	Route::post('/admin/smswallet-topup', 'SmsWalletController@smsWalletTopup');
	Route::post('/admin/get-user-details', 'SmsWalletController@getUserDetails');

	// admin routes
	Route::get('/view-accounts', 'pagesController@viewAccounts');
	Route::get('/addaccount', 'Admin\AdminController@addaccount');
	Route::get('/userwalment', 'Admin\AdminController@usermanagement');
	Route::get('admin/analytics', 'Admin\AdminController@webAnalytics');

});

//Route::get('/home', 'HomeController@index')->name('home');
