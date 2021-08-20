<?php


use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/', 'HomeController@index')->name('home');


Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/categories{id}', 'CategoryController@detail')->name('categories-detail');

Route::get('/details/{id}', 'DetailsController@index')->name('details');
Route::post('/details/{id}', 'DetailsController@add')->name('details-add');

Route::get('/success', 'CartController@success')->name('success');
Route::get('/success-register', 'SuccessRegisterController@successRegister')->name('success-register');
Route::post('/checkout/callback', 'CheckoutController@callback')->name('midtrans-callback');
Route::get('/register/success', 'Auth\RegisterController@success')->name('register-success');



Route::group(['middleware' => ['auth']], function(){

   Route::get('/cart', 'CartController@index')->name('cart');
   Route::delete('/cart/{id}', 'CartController@delete')->name('cart-delete');

   Route::post('/checkout', 'CheckoutController@process')->name('checkout');
   
   Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
  
   Route::get('/dashboard/products', 'DashboardProductsController@index')->name('dashboard-products');
   Route::get('/dashboard/products/create', 'DashboardProductsController@create')->name('dashboard-products-create');
   Route::post('/dashboard/products', 'DashboardProductsController@store')->name('dashboard-products-store');
   Route::get('/dashboard/products/{id}', 'DashboardProductsController@details')->name('dashboard-products-details');
   Route::post('/dashboard/products/{id}', 'DashboardProductsController@update')->name('dashboard-products-update');

   Route::post('/dashboard/products/gallery/upload', 'DashboardProductsController@uploadGallery')->name('dashboard-products-gallery-upload');
   Route::get('/dashboard/products/gallery/delete/{id}', 'DashboardProductsController@deleteGallery')->name('dashboard-products-gallery-delete');


   Route::get('/dashboard/transactions', 'DashboardTransactionsController@index')->name('dashboard-transactions');
   Route::get('/dashboard/transaction/{id}', 'DashboardTransactionsController@details')->name('dashboard-transactions-details');
   Route::post('/dashboard/transactions/{id}', 'DashboardTransactionsController@update')->name('dashboard-transactions-update');


   Route::get('/dashboard/settings', 'DashboardSettingController@store')->name('dashboard-settings');
   Route::get('/dashboard/account', 'DashboardSettingController@account')->name('dashboard-accounts');
   Route::post('/dashboard/update/{redirect}', 'DashboardSettingController@update')->name('dashboard-settings-redirect'); 


});




Route::prefix('admin')
    ->namespace('Admin')
   ->middleware(['auth','admin']) // Only ADmin
    ->group(function() {
        Route::get('/', 'DashboardController@index')->name('admin-dashboard');
        Route::resource('category','CategoryController');
        Route::resource('user','UserController');
        Route::resource('product','ProductController');
        Route::resource('product-gallery','ProductGalleryController');
        Route::resource('transaction', 'TransactionController');

    });


Auth::routes(['verify' =>true ]);




