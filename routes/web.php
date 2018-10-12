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

// Route frontend
Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/product', 'HomeController@product')->name('home.product');
Route::get('/contact', 'HomeController@contact')->name('home.contact');

// Route::resource('admin/products', 'Admin\ProductController');
// Route::resource('orders', 'OrderController');
//Route::get('/', 'HomeController@index')->name('home.index');



// Auth::routes();

Route::group(['prefix' => 'admin','namespace' => 'Admin', 'middleware' => 'admin-login'], function(){
	Route::get('/', 'PageController@index')->name('admin.index');
	Route::resource('/categories', 'CategoryController');
	Route::get('/search', [
		'as' => "category.search",
		'uses' => "SearchController@search"
	]);	
	Route::resource('/products', 'ProductController');
	Route::get('/orders/{order}/active', [
			'as' => "orders.active",
			'uses' => "OrderController@active"
		]);
	Route::get('/orders/{order}/payment', [
			'as' => "orders.payment",
			'uses' => "OrderController@payment"
		]);
	Route::resource('/orders', 'OrderController');
	Route::resource('/users', 'UserController');
	// Route::get('/users/search', 'UserController@search')->name('users.search');
	Route::get('/dashboard','PageController@dashboard')->name('admin.dashboard');
	Route::group(['prefix' => 'comments', 'as' => 'comments.'], function(){
		Route::get('/', 'CommentController@index')->name('index');
		Route::get('/approve/{id}', 'CommentController@approve')->name('approve');
		Route::get('/remove/{id}', 'CommentController@remove')->name('remove');
		Route::get('/show/{id}', 'CommentController@show')->name('show');
		Route::post('create-comment','CommentController@create')->name('create');
		Route::get('/search', 'CommentController@search')->name('search');
	});
	Route::resource('/slides', 'SlideController');
});

// Route login Admin
Route::group(['prefix' => 'admin', 'namespace' => 'Loginadmin', 'as' => 'admin.'], function(){
	Route::get('/login', 'LoginController@login')->name('login');
	Route::post('/login', 'LoginController@showLogin')->name('showlogin');
	Route::get('/logout', 'LoginController@logout')->name('logout');
});

// Route login user
Route::group(['prefix' => '/', 'namespace' => 'Loginuser', 'as' => 'users.'], function(){
	Route::get('/login', 'LoginController@login')->name('login');
	Route::post('/login', 'LoginController@showLogin')->name('showlogin');
	Route::get('/logout', 'LoginController@logout')->name('logout');
	Route::get('/register', 'LoginController@register')->name('register');
	Route::post('/register', 'LoginController@showRegister')->name('showregister');
});

// Fix loi
Route::get('users/search', 'Admin\UserController@search')->name('users.search');