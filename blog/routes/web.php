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

Route::get('/','PagesController@getHome')->name('home');
Route::get('/contact','PagesController@getContact')->name('contact');
Route::get('/about','PagesController@getAbout')->name('about');
Route::get('/show_post/{id}','PagesController@getShowPost')->name('show_post');
Route::get('/user_blog','PagesController@getUserPost')->name('user_blog');

Route::resource('posts','PostController');



Auth::routes();





//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/login', 'AdminLoginController@showLoginForm')->name('admin.show.login');
Route::post('/admin/login', 'AdminLoginController@login')->name('admin.submit.login');
Route::get('/admin', 'AdminController@index')->name('admin_home');
