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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/cookie', function () {
    return Cookie::forget('referral_id');
});


Route::get('/register/{param}', 'HomeController@registration')->name('registration');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**Route::get('patients', 'PatientController@index')->name('patients');
Route::get('patients/create', 'PatientController@create')->name('patients/create');
Route::post('patients/add', 'PatientController@store')->name('patients/add');
Route::get('patients/{id}', 'PatientController@edit')->name('patient/edit');
Route::post('patients/', 'PatientController@update')->name('patients/edit'); **/

Route::get('patients', 'PatientController@index')->name('patients');
Route::get('/create', 'PatientController@create')->name('patients.create');
Route::post('/create', 'PatientController@store')->name('patients.store');
Route::get('/{patient}/show', 'PatientController@show')->name('patients.show');
Route::get('/{patient}/edit', 'PatientController@edit')->name('patients.edit');
Route::patch('/{patient}/update', 'PatientController@update')->name('patients.update');
Route::delete('/{patient}/delete', 'PatientController@destroy')->name('patients.destroy');



Route::get('dashboard', 'UserController@index')->name('dashboard');
Route::get('profile', 'UserController@profile')->name('profile');
Route::post('profile', 'UserController@update_avatar')->name('update-avatar');
Route::post('update-profile', 'UserController@update_profile')->name('update-profile');
Route::post('encash', 'UserController@update_encash')->name('encash');

Route::get('earn', 'UserController@earn')->name('earn');
Route::get('monoline', 'UserController@monoline')->name('monoline');
Route::get('downline/{id}', 'UserController@downline')->name('downline');
Route::get('transactions', 'UserController@transactions')->name('transactions');
Route::get('withdraw', 'UserController@withdraw')->name('withdraw');
Route::get('travel-portal', 'UserController@travel_portal')->name('travel-portal');
Route::get('travel-tours', 'UserController@travel_tours')->name('travel-tours');
Route::get('e-loading', 'UserController@eloading')->name('e-loading');
Route::get('products', 'UserController@products')->name('products');
Route::get('social', 'UserController@social')->name('social');
Route::get('incentives', 'UserController@incentives')->name('incentives');
Route::get('gadget-incentive', 'UserController@gadget_incentives')->name('gadget-incentive');
Route::get('car-incentive', 'UserController@car_incentives')->name('car-incentive');
Route::get('travel-incentive', 'UserController@travel_incentives')->name('travel-incentive');
Route::get('video-tutorial', 'UserController@video_tutorial')->name('video-tutorial');
Route::get('vip-trainings', 'UserController@vip_trainings')->name('vip-trainings');
Route::post('save-incentive', 'UserController@save_incentives')->name('save-incentive');
Route::post('upgrade-vip', 'UserController@upgrade_vip')->name('upgrade-vip');


Route::post('product-order', 'UserController@product_order')->name('product-order');
Route::get('cart', 'UserController@cart');
Route::post('add-to-cart', 'UserController@add_to_cart')->name('add-to-cart');
Route::get('add-to-cart/{id}', 'UserController@product_delete')->name('product-delete');
Route::get('add-to-cart/{id}', 'UserController@add_to_cart');
Route::patch('update-cart', 'UserController@update_cart');
Route::delete('remove-from-cart', 'UserController@remove_product');


Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/income-settings', 'AdminController@income_settings')->name('income-settings');
	Route::get('/users', 'AdminController@users')->name('users');
	Route::get('/payouts', 'AdminController@payouts')->name('payouts');
	Route::get('/payment-methods', 'AdminController@payment_methods')->name('payment-methods');
    Route::post('/payment-method-add', 'AdminController@add_payment_method')->name('payment-method-add');
    Route::post('/payment-methods', 'AdminController@update_payment_method')->name('payment-methods-edit');
    Route::get('/payment-method-delete/{id}', 'AdminController@delete_payment_method')->name('payment-method-delete');
    Route::post('/deactivate-user', 'AdminController@deactivate_user')->name('deactivate-user');
    Route::post('/delete-user', 'AdminController@delete_user')->name('delete-user');
    Route::get('/announcements', 'AdminController@announcement')->name('announcements');
    Route::post('/announcement-add', 'AdminController@add_announcement')->name('announcement-add');
    Route::post('/announcements', 'AdminController@update_announcement')->name('announcements-edit');
    Route::get('/announcement-delete/{id}', 'AdminController@delete_announcement')->name('announcement-delete');
 
});