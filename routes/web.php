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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::get('user/{username}','ProfileController@getUsername')
    ->where('username', '[A-Za-z0-9]+')
    ->name('profilePage');
Route::get('Messages', 'HomeController@index')->name('messages');
Route::get('/profile','ProfileController@index')->name('profile');
Route::post('/updatePicture', 'ProfileController@updatePicture')->name('updatePicture');
Route::post('/updateProfile', 'ProfileController@updateProfile')->name('updateProfile');
Route::post('/storeTestimonial', 'ProfileController@storeTestimonial')->name('storeTestimonial');
