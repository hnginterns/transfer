<?php

use Illuminate\Http\Request;

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
Route::get('notify','WalletController@notifyme');
Route::get('freq',function(){
	return "Moved to finance.hotels.ng";
});

Route::get('/internet', 'WalletController@otpForInternetBanking');
// get default home pages
Route::get('/', 'pagesController@home')->name('home');
Route::get('/hometest', function () {
	return "Welcome";
});

Route::get('/logout', function () {
	//\LogUserActivity::addToLog(Auth::user()->username.' logged out successfully');
	Auth::logout();
	Session::flush();
	return redirect('/login');
});

Route::get('/balance', 'WalletController@balance');

// Please do not remove For testing purposes
Route::get('/adminnew', function () {
	$users = App\User::all();
	$restr = App\Restriction::all();
	$wallets = App\Wallet::all();
	$cardw = App\CardWallet::all();
	return view('layouts.admin-new', compact('users', 'restr', 'wallets', 'cardw'));
});

// Route::get('/testbanks', 'BanksController@getAllBanks');
// Route::get('makeadmin', 'WalletController@MakeUserAdmin'); 

//Content starts here
Route::get('/about', 'pagesController@about')->name('about');
Route::get('/contact', 'ContentController@contact')->name('contact');
Route::get('/features', 'ContentController@features')->name('features');
Route::get('/privacy', 'ContentController@privacy')->name('privacy');
Route::get('/how-it-works', 'ContentController@how')->name('how');
Route::get('/terms', 'ContentController@terms')->name('terms');
Route::get('/help', 'ContentController@help')->name('help');
//Content ends here

Route::get('/forgot', 'pagesController@forgot');

//Api calls to money wave starts here
Route::get('/card-to-wallet', 'User\UserWalletController@userWallet');
Route::get('/validate', 'ValidateAccountController@accountResolve');
Route::get('/walletBalance', 'WalletController@walletBalance');
Route::get('/walletCharge', 'WalletController@walletCharge');
Route::get('/createWallet', 'WalletController@createWallet');
Route::post('/walletTransfer', 'WalletController@transfer');
Route::get('/gettoken', 'WalletController@getToken');
Route::get('/transferWallet', 'WalletController@transfer');
Route::get('/404', 'pagesController@pagenotfound');
//Api calls to money wave ends here




// authentications
Route::group(['middleware' => 'auth'], function () {
	Route::get('/dashboard', 'pagesController@userdashboard')->name('user.dashboard');

	

	//Wallet operations start
	Route::get('/wallet/{wallet}', 'pagesController@walletdetail')->name('user.wallet.detail');
	Route::get('/transfer/beneficiary/validate/{wallet}', 'pagesController@validation')->name('transfer.validation');;
	Route::get('/transfer/beneficiary/{wallet}', 'pagesController@bank_transfer')->name('transfer.beneficiary');
	Route::get('/transfer/wallet/{wallet}', 'pagesController@wallet_transfer')->name('transfer.wallet');
	Route::post('/transfer/wallet/{wallet}', 'WalletController@transfer')->name('transfer.wallet.submit');
	Route::post('/transfer/validate/{wallet}', 'WalletController@ValidateTransferToAccount')->name('transfer.validate.submit');
	Route::post('/transfer/beneficiary/{wallet}', 'WalletController@transferAccount')->name('transfer.beneficiary.submit');
	//wallet operations end

	//state messages start
	Route::get('/success', 'pagesController@success');
	Route::get('/wallet-transfer-success', 'pagesController@walletSuccess');
	Route::get('/failed/{response}', 'pagesController@failed')->name('failed');
	//end of state messages

	//bank fetch and data persist starts
	Route::get('/banks', 'BanksController@banks');
	Route::get('/populatebank', 'BanksController@populateBanks');
	//bank fetch and data persist ends

	//phone top up
	Route::get('/phonetopup', 'pagesController@phoneTopupView')->name('user.phonetopup');
	Route::post('/phonetopup/otp', 'User\PhoneTopUpController@otp');
	Route::get('/phonetopup/star/{contact}', 'User\PhoneTopUpController@star');
	Route::post('/phonetopup/fund', 'User\PhoneTopUpController@fundTopupWallet');
	Route::post('/topup/wallet', 'User\PhoneTopUpController@phoneTopUp');
	Route::get('topup/phone/{id}', 'User\PhoneTopUpController@phoneshow');
	Route::post('topup/phone/', 'User\PhoneTopUpController@topuphonesubmit')->name('topup.phone.user');
	Route::post('topup/data/', 'User\PhoneTopUpController@topdatasubmit')->name('topup.data.user');
	Route::post('/fund/topup', 'User\PhoneTopUpController@fundTopup')->name('user.fund.phone.submit');
	Route::post('topup/topuphonemultiple/', 'User\PhoneTopUpController@topuphonemultiple')->name('topup.phone.multiple');
	Route::post('topup/topuphonegroup/', 'User\PhoneTopUpController@topuphonegroup')->name('topup.phone.group');
	
	//end of phone top

	Route::get('/transfer', 'pagesController@transfer');
	///Route::get('/balance', 'pagesController@balance');
	Route::get('/fund/{id}', 'RavepayController@index')->name('ravepay.pay');
	Route::post('/fund/{id}', 'RavepayController@cardWallet')->name('ravepay.pay');
	Route::post('/wallet/{wallet_code}/fund', 'WalletController@fundWalletWithCard');
	Route::post('/otp', 'WalletController@otp');
	Route::get('/integrity/{txRef}/{email}', 'RavepayController@checkSum');

	Route::get('/ravepaysuccess/{ref}/{amount}/{currency}', 'RavepayController@success');
	Route::get('/addbeneficiary', 'pagesController@addBeneficiary');
	Route::post('/addbeneficiary/insertBeneficiary', 'pagesController@insertBeneficiary')->name('beneficiaries.insert');


	Route::get('/ravepaysuccess/{ref}/{amount}/{currency}', 'RavepayController@success')->name('ravepay.success');
	Route::get('/addbeneficiary/{wallet}', 'pagesController@addBeneficiary');
	Route::post('/addbeneficiary/{wallet}', 'pagesController@insertBeneficiary')->name('beneficiaries.insert');
	Route::post('/updateBeneficiary/{wallet}', 'pagesController@addAccount')->name('beneficiaries.insert');



});




// auth admin
Route::get('/admin/login', 'Admin\AdminLoginController@showLoginForm');
Route::post('/admin/login', 'Admin\AdminLoginController@login')->name('admin.login');
Route::get('/admin/logout', 'Admin\AdminLoginController@logout')->name('admin.logout');


//end of admin auth


Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function () {
	
	//Admin wallet operation starts
	Route::get('/transaction-history', 'Admin\AdminController@cardTransaction');
	Route::get('createwallet', 'Admin\AdminController@wallet')->name('wallets.add');
	Route::post('createwallet', 'Admin\AdminController@addwallet');
	Route::get('viewwallet/{walletId}', 'Admin\AdminController@show')->name('view-wallet');
	Route::get('wallet-details', 'Admin\AdminController@walletdetails');
  	Route::get('wallets', 'Admin\WalletController@index')->name('wallets.index');
  	Route::get('wallets/details/{id}', 'Admin\WalletController@details')->name('wallets.details');
  	Route::get('wallets/manualfund/{id}', 'Admin\WalletController@manualfund')->name('wallets.manualfund');
  	Route::post('wallets/manualfund/{id}', 'Admin\WalletController@manualfundstore')->name('wallets.manualfund.store');
  	Route::post('wallets/otp', 'Admin\WalletController@otpForWalletFunding')->name('wallets.otp.store');
	Route::get('wallets/manualfundint/{id}', 'Admin\WalletController@manualfundint')->name('wallets.manualfundint');
  	Route::post('wallets/manualfundint/{wallet}', 'WalletController@payWithInternetBanking')->name('wallets.manualfund.storeint');
	Route::get('wallets/ravefund/{id}', 'Admin\WalletController@ravefund')->name('wallets.ravefund');
  	Route::post('wallets/ravefund/{id}', 'Admin\WalletController@ravefundstore')->name('wallets.ravefund.store');
	Route::get('/managewallet', 'Admin\AdminController@managewallet');
	Route::get('/{id}/archivewallet', 'Admin\AdminController@archiveWallet');
	Route::get('/{id}/activatewallet', 'Admin\AdminController@activateWallet');

	//wallet fund starts
	Route::get('/fundwallet', 'Admin\AdminController@fundwallet');
	Route::post('/{wallet_code}/fund', 'WalletController@cardWallet');
	// Route::post('/otp', 'WalletController@otp');
	//Wallet fund ends

	Route::get('logActivity', 'Admin\AdminController@logActivity');

	Route::get('/fundwallet', 'Admin\AdminController@fundwallet');
	Route::post('/{wallet_code}/fund', 'WalletController@cardWallet');
	//Route::post('/otp', 'WalletController@otp');
	//Admin wallet operations ends


  	//Beneficiaries Route starts
  	Route::get('beneficiaries', 'Admin\BeneficiaryController@index')->name('beneficiaries.index');
  	Route::get('beneficiaries/details/{id}', 'Admin\BeneficiaryController@details')->name('beneficiaries.details');
  	Route::get('beneficiaries/add', 'Admin\BeneficiaryController@add')->name('beneficiaries.add');
  	Route::post('beneficiaries/insert', 'Admin\BeneficiaryController@insert')->name('beneficiaries.insert');
  	Route::get('beneficiaries/edit/{id}', 'Admin\BeneficiaryController@edit')->name('beneficiaries.edit');
  	Route::post('beneficiaries/update/{id}', 'Admin\BeneficiaryController@update')->name('beneficiaries.update');
  	Route::get('beneficiaries/delete/{id}', 'Admin\BeneficiaryController@delete')->name('beneficiaries.delete');
	Route::get('/managebeneficiary', 'Admin\AdminController@managebeneficiary');
	// Beneficiary route ends


	//Permissions start
	Route::get('/managePermission', 'Admin\AdminController@managePermission')->name('permission.manage');
	Route::get('/addpermission', 'Admin\WalletController@addPermission')->name('permission.create');
	Route::get('/editpermission/{restriction}', 'Admin\WalletController@editPermission')->name('permission.edit');
	Route::delete('/deletepermission/{restriction}', 'Admin\WalletController@deletePermission')->name('permission.delete');
	Route::post('/addpermission', 'Admin\WalletController@PostAddPermission')->name('permission.store');
	Route::post('/editpermission/{restriction}', 'Admin\WalletController@PostEditPermission')->name('permission.update');
	//Permission ends
	
	Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
	//admin user management starts
	Route::resource('users', 'User\UsermgtController');
	Route::post('users/banUser/{id}', 'User\UsermgtController@banUser');
	Route::post('users/unbanUser/{id}', 'User\UsermgtController@unbanUser');
	Route::post('users/makeAdmin/{id}', 'User\UsermgtController@makeAdmin');
	Route::post('users/removeAdmin/{id}', 'User\UsermgtController@removeAdmin');
	// Route::post('users/delete/{user}', 'User\UsermgtController@forceDeleteUser');
	//admin user management ends


	//admin sms transaction starts
	Route::get('/smswallet', 'SmsWalletController@smsWalletBalance');
	Route::post('/sms', 'SmsWalletController@smsWallet')->name('fund.smswallet.submit');
	Route::post('sms/otp', 'SmsWalletController@Otp');
	Route::post('transfer', 'SmsWalletController@transferAccount');
	Route::post('/addSmsAccount', 'SmsWalletController@addSmsAccount');
	Route::post('/smswallet-topup', 'SmsWalletController@smsWalletTopup');
	Route::post('/get-user-details', 'SmsWalletController@getUserDetails');
	Route::delete('/delete_sms/{id}', 'SmsWalletController@delete_sms');
	
	//admin sms transaction ends here

	Route::get('analytics', 'Admin\AdminController@webAnalytics');
	
	//Phone topup starts here
	Route::get('/phonetopup', 'Admin\AdminController@phoneTopupView')->name('topup.index');
	Route::post('/addphone', 'Admin\PhoneTopUpController@addPhone');
	Route::post('/editphone', 'Admin\PhoneTopUpController@editPhone');
	Route::post('/addtag', 'Admin\PhoneTopUpController@addTag');
	Route::get('/deletetag/{id}', 'Admin\PhoneTopUpController@deleteTag');
	Route::post('/edittag/{id}', 'Admin\PhoneTopUpController@editTag');
	Route::post('/transfer/topup', 'Admin\PhoneTopUpController@postTopup')->name('topup.phone.submit');
	Route::post('/transfer/topupUser', 'Admin\PhoneTopUpController@postTopupUser');
	Route::post('/fund/topup', 'Admin\PhoneTopUpController@fundTopup')->name('fund.phone.submit');
	Route::post('/otp', 'Admin\PhoneTopUpController@otp')->name('fund.otp.submit');
	Route::post('/delete-phone', 'Admin\PhoneTopUpController@delete_phone');

	Route::resource('contacts', 'Admin\ContactContoller');


	//Test page for @jonesky
	Route::get('/getTopupWalletBalance', 'Admin\AdminController@getTopupWalletBalance')->name('topupwallet.balance');
	
	

});

