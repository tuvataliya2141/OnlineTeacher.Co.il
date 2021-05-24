<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Route::get('/', 'FrontController@index'); 
 

Route::get('index', 'FrontController@index');

Auth::routes();

Route::get('myaccount', 'UserController@myaccount')->name('myaccount');
Route::get('myprofile', 'UserController@viewaccount')->name('myaccount');
Route::get('myaccount/update', 'UserController@updateaccount')->name('updateaccount');
Route::post('/update-password', 'UserController@updatepassword');

Route::get('home', 'FrontController@index');

Route::any('search','FrontController@search')->name('topsearch'); 
Route::get('/shop', 'FrontController@viewshop')->name('shop');
Route::get('/productdetail', 'FrontController@view_productHome')->name('productdetail');
Route::post('/product-review', 'FrontController@productReview');
Route::get('product-categories/{id}/{slug}','FrontController@view_products')->name('productbycategory');

// Route::get('category-product/{id}/products-detail/{slug}', 'FrontController@view_productDetail');

Route::get('products-detail/{id}/{slug}', 'FrontController@view_productDetail');

Route::get('/cart', 'FrontController@viewcart')->name('cart');
Route::get('/wishlist', 'FrontController@view_wishlist')->name('wishlist');
Route::post('/add-to-cart', 'FrontController@addToCart');
Route::post('/update-cart', 'FrontController@updateCart');
Route::post('/add-to-cart/{id}', 'FrontController@addToCartW');  



Route::post('/add-to-wishlist', 'FrontController@addToWishlist');
Route::get('remove-cart-product/{id}', 'FrontController@removeCartProduct');

Route::get('remove-wishlist-product/{id}', 'FrontController@removeWishlistProduct');
Route::post('remove-cart-product1/{id}', 'FrontController@removeCartItem');

Route::post('/apply-coupon', 'FrontController@applyCoupon');
Route::post('/confirm-order', 'FrontController@confirmOrder');

Route::get('/mywishlist', 'FrontController@wishlist')->name('mywishlist'); 
Route::get('/mycart', 'FrontController@mycart')->name('mycart');
Route::get('/myorder', 'FrontController@myorder')->name('myorder');
Route::get('/order-detail', 'FrontController@get_orderDetail')->name('orderdetail'); 
Route::get('cancel-order/{id}', 'FrontController@cancelOrder');


Route::get('/about', 'FrontController@viewabout')->name('about');
Route::get('/contact', 'FrontController@viewcontact')->name('contact');
Route::post('/contact-us', 'FrontController@add_contactus')->name('contact');
Route::post('/subscriber', 'FrontController@add_subscriber')->name('subscriber'); 

// Route::get('/subscriberAutoReply', 'FrontController@subscriberReply'); 




///  User Login and Register /////

// Route::get('/logout', 'UserController@logout');
// Route::get('register-form', 'UserController@register_form'); 
// Route::post('/register', 'UserController@register');

Route::get('/login', 'FrontController@login');
Route::post('/login', 'UserController@login'); 
Route::post('/register-user', 'UserController@register'); 
Route::get('/forget_password', 'UserController@forget_password'); 


Route::post('reset_password_without_token', 'UserController@validatePasswordRequest');
Route::get('/password/reset/{token}', 'UserController@reset_password'); 
Route::post('reset_password_with_token', 'UserController@resetPassword');

Route::get('/logout', 'UserController@logout')->name('index');

// Route::group(['middleware'=>['userAuth']], function () {
Route::get('/checkout', 'FrontController@checkout')->name('checkout');
Route::post('/checkout', 'FrontController@checkout')->name('checkout');
// });




