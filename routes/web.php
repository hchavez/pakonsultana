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
    return view('welcome');
});

Route::get('/cookie', function () {
    return Cookie::forget('referral_id');
});


Route::get('/register/{param}', 'HomeController@registration')->name('registration');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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
 
	Route::get('/product-orders', 'AdminController@product_orders')->name('product-orders');
    //Route::get('/product-orders/{id}', 'AdminController@product_orders_edit')->name('product-orders-edit');
    Route::post('/product-orders', 'AdminController@update_product_orders')->name('product-orders-edit');
    Route::get('/product-orders-add', 'AdminController@add_product_orders')->name('product-orders-add');
    Route::post('/product-orders-add', 'AdminController@store_product_orders')->name('product-orders-store');
    Route::get('/product-orders-delete/{id}', 'AdminController@delete_product_orders')->name('product-orders-delete');
    Route::get('/product-orders-details/{id}', 'AdminController@product_orders_details')->name('product-orders-details');
    Route::post('/approve-order', 'AdminController@approve_order')->name('approve-order');
    Route::post('/delete-order', 'AdminController@delete_order')->name('delete-order');
    Route::post('/delete-payout', 'AdminController@delete_payout')->name('delete-payout');

	Route::get('/products', 'AdminController@products')->name('products');
    Route::get('/products/{id}', 'AdminController@product_edit')->name('product-edit');
    Route::post('/products', 'AdminController@update_product')->name('product-edit');
    Route::get('/product-add', 'AdminController@add_product')->name('product-add');
    Route::post('/product-add', 'AdminController@store_product')->name('product-add');
    Route::get('/product-delete/{id}', 'AdminController@delete_product')->name('product-delete');
    Route::post('/delete-product', 'AdminController@delete_product')->name('delete-product');


	Route::get('/incentive-qualifier', 'AdminController@incentive_qualifier')->name('incentive-qualifier');
    Route::post('/release-incentive', 'AdminController@release_incentive')->name('release-incentive');
    Route::post('/release-payout', 'AdminController@release_payout')->name('release-payout');
    Route::post('/archive-payout', 'AdminController@archive_payout')->name('archive-payout');
    Route::post('/approve-user', 'AdminController@approve_user')->name('approve-user');
    Route::post('/upgrade-user', 'AdminController@upgrade_user')->name('upgrade-user');

	Route::get('/incentive-settings', 'AdminController@incentive_settings')->name('incentive-settings');
    Route::get('/incentive-settings-add', 'AdminController@add_incentive_settings')->name('incentive-settings-add');
    Route::post('/incentive-settings-add', 'AdminController@store_incentive_settings')->name('incentive-settings-store');

    Route::get('/incentive-settings/{id}', 'AdminController@incentive_settings_edit')->name('incentive-settings-edit');
    Route::post('/incentive-settings', 'AdminController@update_incentive_settings')->name('incentive-settings-edit');
    Route::get('/incentive-settings-delete/{id}', 'AdminController@delete_incentive_settings')->name('incentive-settings-delete');

    /******/
    Route::get('/videos', 'AdminController@videos')->name('videos');
    Route::get('/videos-add', 'AdminController@add_videos')->name('videos-add');
    Route::post('/videos-add', 'AdminController@store_videos')->name('videos-store');

    Route::get('/videos/{id}', 'AdminController@videos_edit')->name('videos-edit');
    Route::post('/videos', 'AdminController@update_videos')->name('videos-edit');
    Route::get('/videos-delete/{id}', 'AdminController@delete_videos')->name('videos-delete');
    /******/

	Route::get('/account-upgrade', 'AdminController@account_upgrade')->name('account-upgrade');
	Route::get('/video-tutorial', 'AdminController@video_tutorial')->name('video-tutorial');
    Route::get('/video-training', 'AdminController@video_training')->name('video-training');

	Route::get('/vip-training', 'AdminController@vip_training')->name('vip-training');
    Route::get('/vip-training/{id}', 'AdminController@vip_edit')->name('vip-edit');
    Route::post('/vip-training', 'AdminController@update_vip')->name('vip-edit');
    Route::get('/vip-add', 'AdminController@add_vip')->name('vip-add');
    Route::post('/vip-add', 'AdminController@store_vip')->name('vip-store');
    Route::get('/vip-delete/{id}', 'AdminController@delete_vip')->name('vip-delete');
    

	Route::get('/video-presentation', 'AdminController@video_presentation')->name('video-presentation');
    Route::get('/video-presentation/{id}', 'AdminController@video_presentation_edit')->name('video-presentation-edit');
    Route::post('/video-presentation', 'AdminController@update_video_presentation')->name('video-presentation-edit');
    Route::get('/video-presentation-add', 'AdminController@add_video_presentation')->name('video-presentation-add');
    Route::post('/video-presentation-add', 'AdminController@store_video_presentation')->name('video-presentation-store');
    Route::get('/video-presentation-delete/{id}', 'AdminController@delete_video_presentation')->name('video-presentation-delete');    

        Route::post('/update-site-settings', 'AdminController@update_site_settings')->name('update-site-settings');
        Route::post('/update-premium-referral', 'AdminController@update_premium_referral')->name('update-premium-referral');
        Route::post('/update-vip-referral', 'AdminController@update_vip_referral')->name('update-vip-referral');
});

use App\GadgetIncentive;

//--CREATE a gadget--//
Route::post('/admin/gadget', function (Request $request) {
    $gadget = GadgetIncentive::create($request->all());
    return Response::json($link);
});
 
//--GET LINK TO EDIT--//
Route::get('/admin/gadget/{link_id?}', function ($link_id) {
    $gadget = GadgetIncentive::find($link_id);
    return Response::json($link);
});
 
//--UPDATE a link--//
Route::put('/admin/gadget/{link_id?}', function (Request $request, $link_id) {
    $gadget = GadgetIncentive::find($link_id);
    $gadget->name = $request->url;
    $gadget->drp = $request->drp;
    $gadget->image = $request->image;
    $gadget->save();
    return Response::json($gadget);
});
 
//--DELETE a link--//
Route::delete('/admin/gadget/{link_id?}', function ($link_id) {
    $gadget = Link::destroy($link_id);
    return Response::json($gadget);
});