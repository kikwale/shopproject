<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
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

Route::get('/', function () {
    return redirect()->to('/login');
});


// Admin


Route::group(['middleware'=>'auth'], function () {
  Route::any('/adminUserForm', 'HomeController@showForm');
  Route::post('/saveTrader', 'HomeController@saveTrader');
  Route::get('/adminUsers', 'HomeController@adminUsers');
  Route::get('/admin_register_shop','HomeController@admin_register_shop');
  Route::post('/admin_save_shop','HomeController@admin_save_shop');
  Route::get('/admin_shops','HomeController@admin_shops');
});



// Shop Owner
Route::group(['middleware'=>'auth'], function () {

  Route::get('/owner_shop','MadukaController@owner_shop');
  Route::get('/shop_worker','MadukaController@shop_worker');
  Route::post('/create_worker','MadukaController@create_worker');
  Route::get('/owner_add_jumla_product','MadukaController@owner_add_jumla_product');
  Route::post('/saveJumlaProduct','MadukaController@saveJumlaProduct');
  Route::get('/owner_add_rejareja_product','MadukaController@owner_add_rejareja_product');
  Route::post('/saveRejarejaProduct','MadukaController@saveRejarejaProduct');
  Route::get('/owner_view_jumla_product','ProductController@owner_view_jumla_product');
  Route::get('/owner_view_rejareja_product','ProductController@owner_view_rejareja_product');
  Route::post('/owner_save_shop','HomeController@ownerSaveShop');
  Route::get('/owner-sold-product','ProductController@ownerSales')->name('owner.sold-products');
  Route::get('/owner-receipt','ReceiptController@ownerReceipt')->name('owner.owner-receipt');
  Route::post('/annual-receipt-form','ReceiptController@annualReceiptForm')->name('owner.annual-receipt');
  Route::post('/owner-annual-receipt-data','ReceiptController@annualReceiptData')->name('owner.annual-receipt-data');
  Route::post('/owner-monthly-receipt','ReceiptController@ownerMonthlyReceipt')->name('owner.monthly-receipt');
  Route::post('/owner-monthly-receipt-form-search','ReceiptController@ownerMonthlyReceiptFormSearch')->name('owner.monthly-receipt-form-search');
  Route::post('/owner-daily-receipt','ReceiptController@ownerDailyReceipt')->name('owner.owner-daily-receipt');
  Route::post('/owner-daily-receipt-form-search','ReceiptController@ownerDailyReceiptFormSearch')->name('owner.daily-receipt-form-search');
  Route::get('/owner-stock','ProductController@ownerStock')->name('owner.stock');
  Route::get('/owner-expired-products','ProductController@ownerExpiredProducts')->name('owner.expired-products');
  Route::get('/owner-expenses','ProfitsController@ownerExpenses')->name('owner.expenses');
  Route::get('/owner-net-profit','ProfitsController@ownerNetProfit')->name('owner.net-profit');
  Route::post('/ownerNetProfitForm','ProfitsController@ownerNetProfitForm')->name('owner.ownerNetProfitForm');
  Route::get('/owner-money','SettingController@ownerMoney')->name('owner.owner-money');
  Route::get('/owner-incoming-order','OrderController@ownerIncomingOrder')->name('owner.incoming-order');
  Route::get('/owner-delivered-order','OrderController@ownerDeliveredorder')->name('owner.delivered-order');
  Route::get('/owner-placed-order','OrderController@ownerPlacedOrder')->name('owner.placed-order');
     
});




//Seller Routes

Route::group(['middleware'=>'auth'], function () {
  

Route::post('/seller-import-products','ImportingController@sellerImportProducts')->name('seller.import-products');
Route::post('/rejarejaForm','ProductController@rejarejaForm');
Route::post('/jumlaForm','ProductController@jumlaForm');
Route::get('/seller_selling_product','ProductController@seller_selling_product');
Route::get('/seller_today_sales','ProductController@seller_today_sales')->name('seller_today_sales');
Route::get('/seller_add_jumla_product','ProductController@seller_add_jumla_product')->name('seller_add_jumla_product');
Route::post('/seller_saveJumlaProduct','ProductController@seller_saveJumlaProduct')->name('seller_saveJumlaProduct');
Route::get('/seller_view_jumla_product','ProductController@seller_view_jumla_product')->name('seller_view_jumla_product');
Route::get('/seller_add_rejareja_product','ProductController@seller_add_rejareja_product')->name('seller_add_rejareja_product');
Route::post('/seller_saveRejarejaProduct','ProductController@seller_saveRejarejaProduct')->name('seller_saveRejarejaProduct');
Route::get('/seller_view_rejareja_product','ProductController@seller_view_rejareja_product')->name('seller_view_rejareja_product');
Route::get('/seller_finished_product','ProductController@seller_finished_product')->name('seller_finished_product');
Route::get('/seller_store','ProductController@seller_store')->name('seller_store');
Route::get('/seller_shop_workers','HomeController@seller_shop_workers')->name('seller_shop_workers');
Route::get('/seller-receipt-data','ReceiptController@showReceiptData')->name('seller-receipt-data');
Route::get('/seller-print-receipt','ReceiptController@printReceipt')->name('seller-print-receipt');
Route::get('/seller_printed_receipt','ReceiptController@printedReceipt')->name('seller-printed-receipt');
Route::get('/seller-sold-product','ProductController@soldProducts')->name('seller.sold-product');
Route::post('/seller-annual-product-sold','ProductController@soldProductsYear')->name('seller.annual-product-sold');
Route::post('/seller-monthly-product-sold','ProductController@soldProductsMonth')->name('seller.monthly-product-sold');
Route::post('/seller-daily-product-sold','ProductController@soldProductsDay')->name('seller.daily-product-sold');
Route::get('/seller_expired_product','ProductController@expiredProducts')->name('seller.expired_product');
Route::get('/seller-place-order','OrderController@sellerPlaceOrder')->name('seller.place-order');
Route::post('/placeOrder','OrderController@sellerPutOrder')->name('seller.placeOrder');
Route::get('/seller-incoming-order','OrderController@sellerIncomingOrder')->name('seller.incoming-order');
Route::get('/seller-delivered-order','OrderController@sellerDeliveredorder')->name('seller.delivered-order');
Route::get('/seller-placed-order','OrderController@sellerPlacedOrder')->name('seller.placed-order');
Route::get('/seller-accept-order','OrderController@sellerAcceptOrder')->name('seller.accept-order');
Route::get('/seller-reject-order','OrderController@sellerRejectOrder')->name('seller.reject-order');
Route::get('/seller-confirm-delivery','OrderController@sellerConfirmDelivery')->name('seller.confirm-delivery');
Route::get('/seller-calendar', function() {
 return view('seller.calendar');
});

Route::get('/seller-notify-order', function(Request $request) {
  return $request->all();
 });

 Route::get('/seller-notify-expired', function(Request $request) {
  return $request->all();
 });

});








Auth::routes(['verify'=>true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/{lang}', function($lang){
  App::setLocale($lang);
  Session::put('locale', $lang);
  return back();

});