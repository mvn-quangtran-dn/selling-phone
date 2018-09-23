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
    return view('welcome');
});
Route::resource('admin/categories', 'Admin\CategoryController');
Route::resource('admin/products', 'Admin\ProductController');
Route::resource('admin/orders', 'Admin\OrderController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
