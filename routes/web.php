<?php

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

Route::get('/', function () {
    if(Auth::check())
    {
        return view ('welcome');
    }
    else{
        return view('auth.register');
    }
})->name('welcome');

Auth::routes();

Route::group(["middleware" =>  ["auth"]], function() {
    Route::get('/profile', 'HomeController@profile')->name('get-profile');
    Route::post('/save/profile', 'HomeController@postSaveProfile')->name('save-profile-data');
    Route::post('/add/link', 'HomeController@postAddLinks')->name('add-link');
    Route::post('/change/setting', 'HomeController@postChangeSetting')->name('change-profile-setting');
    Route::post('/update/users/link', 'HomeController@postUpdateLink')->name('update-users-link');
    Route::get('/delete/link/{id}', 'HomeController@deleteLink')->name('delete-link');
});

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'HomeController@users')->name('get-users');
//search users
Route::get('/search', 'HomeController@getSearchUser')->name('search-users');

Route::get('/pricing', 'HomeController@price')->name('show-price');
Route::get('/{name}', 'HomeController@getUserProfile')->name('get-this-user-profile');
Route::post('/redirect','HomeController@getRedirect')->name('go-to-the-url');
// Route::get('/location/{id}/{country}/{flag}', 'HomeController@getLocation')->name('location');
// Route::post('/redirect','HomeController@getRedirect')->name('go-to-the-url');

Route::get('/verify/email/{token}', 'VerifyEmail@isEmailVerify')->name('verify-your-email');



// facebook socilite
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

//paypal
Route::get('/make/payment', 'paymentController@payment')->name('payment');
Route::post('/create-payment', 'paymentController@create')->name('create-payment');
Route::get('/execute-payment', 'paymentController@ExecutePayment')->name('execute-payment');

//Admin
Route::group(['prefix'=>'admin', "middleware" =>  ["auth"]], function() {
    Route::get('/dashboard','adminController@index')->name('admin-dashboard');
    Route::post('/change/user/access', 'adminController@postAccess')->name('change-user-access');
});

