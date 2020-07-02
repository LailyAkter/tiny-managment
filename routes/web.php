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

Route::get('/','HomeController@index');
Route::get('/video/details/{id}','HomeController@video_show');
Route::get('/post/details/{id}','HomeController@post_show');

Auth::routes();

Route::middleware('auth')->namespace('Admin')->group(function(){
    Route::resource('post','PostController');
    Route::resource('video','VideoController');
    
    Route::get('/profile','SettingController@profile');
    Route::post('/profile/update','SettingController@profileUpdate');
    Route::get('/password/change','SettingController@passwordChange');
    Route::post('change/password','SettingController@changePassword');
});

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');