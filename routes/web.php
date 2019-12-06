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
    return view('frontend_theme.index');
});

Route::get('error', function () {
    return view('error.403');
})->name('error.403');


Route::post('/login/custom', [
'uses'=>'LoginController@login',
'as'=>'login.custom'
]);

Auth::routes();

 Route::get('admin/dashboard', 'Admin\\AdminUserController@dashboard')->name('home')->middleware('role:admin');
 Route::post('admin/logout', 'LoginController@adminLogout')->name('admin.logout')->middleware('role:admin');


 Route::get('admin/subcategory/{id}', 'Admin\\AdminUserController@getSubcategory')->middleware('role:admin');


Route::get('/admin', 'Auth\LoginController@showLoginForm')->name('login');

Route::resource('admin/user', 'Admin\\AdminUserController')->middleware('role:admin');


Route::resource('admin/banner', 'banner\\BannerController')->middleware('role:admin');
Route::resource('admin/configuration', 'configuration\\ConfigurationController')->middleware('role:admin');

Route::resource('admin/category', 'admin\\CategoryController')->middleware('role:admin');
Route::resource('admin/product', 'admin\\ProductController')->middleware('role:admin');
Route::resource('admin/coupon', 'Category\\CouponController')->middleware('role:admin');
Route::resource('admin/coupon', 'admin\\CouponController')->middleware('role:admin');
Route::resource('admin/role', 'admin\\RoleController')->middleware('role:admin');
Route::resource('admin/order', 'admin\\OrderController')->middleware('role:admin');

// Route::get('google', function () {

//     return view('googleAuth');

// });

Route::get('auth/google', 'Auth\LoginController@redirectToGoogle')->middleware('role:customer');
    
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback')->middleware('role:customer');


Route::get('login/github', 'Auth\LoginController@redirectToProvider')->middleware('role:customer');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback')->middleware('role:customer');

//image delete on click
Route::get('image/delete/{id}', 'admin\\ProductController@imageDelete')->name('image.delete');

