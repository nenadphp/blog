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

Route::get('/', 'PublicController@index');
Route::get('logout', 'PublicController@logout');
Route::get('about', 'PublicController@about');
Route::get('contact', 'PublicController@contact');
Route::get('post/{id}', 'PublicController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admin')->group(function (){
    Route::get('/dashboard', 'Admin\AdminDashboardController@dashboard')->name('adminDashboard');
    Route::get('/user-profile/{user}', 'Admin\AdminDashboardController@userProfile')->name('userProfile');
    Route::post('/user-profile-update-role', 'Admin\AdminDashboardController@updateUserRole');
    Route::get('/buttons', 'Admin\AdminController@buttons');
    Route::get('/get-all-users', 'Admin\AdminDashboardController@getAllUsers')->name('getAllUsers');
    Route::get('/search-users', 'Admin\AdminDashboardController@searchUsers');
});
