<?php

use App\Http\Middleware\isAdmin;

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
/* Routes to "view all" popular and newest vouchers */
Route::get('/popular_all', 'VoucherPageController@popular_all');
Route::get('/newest_all', 'VoucherPageController@newest_all');
Route::get('/expiry_all', 'VoucherPageController@expiry_all');

/* Home controller functions */
Route::get('/removefavourite', 'HomeController@removefavourite');
Route::get('/search', 'HomeController@search');
Route::get('/filter', 'HomeController@filter');

/* Other Web Pages */
Route::view('/advertise', 'advertise')->name('advertise');
Route::view('/download_app', 'download_app')->name('download_app');
Route::view('/privacy', 'privacy')->name('privacy');
Route::view('/terms', 'terms')->name('terms');
Route::get('/vouchers', 'VoucherPageController@index')->name('vouchers');
Route::post('/search', 'VoucherPageController@searchBusiness');
Route::get('/favourites', 'FavouriteController@index')->name('favourites');
Route::get('/account', 'AccountController@index')->name('account');
Route::get('/home', 'HomeController@index')->name('home');

/* Contact */
Route::get('/contact', 'ContactController@create')->name('contact');
Route::post('/contact', 'ContactController@store')->name('contact.store');

//Route::get('/{any}', 'HomeController@index')->where('any', '.*');

Route::put('/updateaccount/{id}', 'AccountController@update');

/* Admin */
Route::group(['middleware' => isAdmin::class], function (){
    Route::get('/adminhome', 'AdminHomeController@index')->name('adminhome');
    Route::get('/business_email', 'BusinessEmailController@index')->name('business_email');
    Route::post('/business_email', 'BusinessEmailController@store')->name('business.store');
});
Route::view('/success', 'success')->name('success');
Route::view('/advertiser_about', 'advertiser_about')->name('advertiser_about');
Route::view('/for_locals', 'for_locals')->name('for_locals');
Route::view('/for_business', 'for_business')->name('for_business');
Route::view('/for_businessnetwork', 'for_businessnetwork')->name('for_businessnetwork');
Route::view('/for_casestudy', 'for_casestudy')->name('for_casestudy');
Route::view('/about', 'about')->name('about');