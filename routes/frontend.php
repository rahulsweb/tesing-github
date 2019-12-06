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
Route::get('/', 'frontend\FrontendController@index');

    Route::group(['middleware' => ['web']], function () {
        //routes here

      
        
        Route::get('login', function () {
            return view('frontend.login.login',['formMode' => 'create']);
        });
        Route::get('email', function () {
            return view('frontend.login.email');
        });
        Route::get('register','frontend\RegisterController@create')->name('frontend.register.create');

        Route::post('/register', 'frontend\RegisterController@store')->name('frontend.register.store');
        Route::post('/login', 'frontend\LoginController@login')->name('frontend.login');
        Route::post('/logout', 'frontend\LoginController@logout')->name('frontend.logout');
        
    Route::resource('address', 'frontend\\AddressController');

    Route::resource('cart', 'frontend\\CartController');
    Route::resource('profile', 'frontend\\CartController');
    Route::resource('checkout', 'frontend\\CheckoutController');
    Route::get('checkout/address/{id}', 'frontend\\CheckoutController@getAddress');
    Route::post('cart/delete/{id}', 'frontend\\CartController@removeProduct')->name('cart.delete');
    // Route::post('process/paypal','frontend\\CheckoutController@processPaypal')->name('process.paypal');   
    //  Route::post('paypal','frontend\\PaymentController@payWithpaypal')->name('paypal');     
    // Route::get('process/cancel','frontend\\CheckoutController@cancelPaypal')->name('process.cancel'); 



    Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'frontend\\AddMoneyController@payWithPaypal',));
    Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'frontend\\AddMoneyController@postPaymentWithpaypal',));
    Route::get('paypal', array('as' => 'payment.status','uses' => 'frontend\\AddMoneyController@getPaymentStatus',));





    Route::get('cart/add/{id}', 'frontend\CartController@addCart')->name('cart.add');
    Route::get('cart/minus/{id}', 'frontend\CartController@minusCart')->name('cart.minus');
    Route::get('cart/detail/{id}', 'frontend\CartController@cart')->name('cart');
    Route::get('/shopping/cart/', 'frontend\CartController@shoppingCart')->name('shoppingCart');
    Route::get('categories/subcategory/{id}', 'frontend\FrontendController@subcategory')->name('frontend.subcategory');

   
    Route::get('auth/google','Auth\LoginController@redirectToGoogle');
    Route::get('google/callback','Auth\LoginController@handleGoogleCallback');
   
//wishlist 
Route::post('wishlist/add', 'frontend\WishListController@store')->name('wishlist.add');
Route::get('wishlist', 'frontend\WishListController@index')->name('wishlist');
Route::get('wishlist/delete/{id}', 'frontend\WishListController@deleteWish')->name('wishlist.delete');

// order
Route::get('order', 'frontend\OrderController@index')->name('order');
Route::resource('profile', 'frontend\\ProfileController');

Route::post('cod', 'frontend\\AddMoneyController@cod')->name('cod');

});
