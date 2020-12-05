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

// Route::get('/products/test_create',        'ProductController@test_create');
// Route::post('/products/test_store',       'ProductController@test_insert')->name('products.insert');
// Route::get('/products/test_index',         'ProductController@test_index')->name('products.index');
// Route::get('/products/test_show/{id}',     'ProductController@test_show');
// Route::get('/products/test_delete/{id}',   'ProductController@test_delete');


Route::get('/admin/login',                  'Auth\LoginController@showLoginForm')->name('login.form'); // route('login.form')
Route::post('/admin/login',                 'Auth\LoginController@login')->name('login');
Route::post('/admin/logout',                'Auth\LoginController@logout')->name('logout');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/',                                  'DashboardController@index')->name('dashboard');
    Route::resource('/products',                     'ProductController');
    Route::resource('/product_categories',           'ProductCategoryController');
});



Route::get('/',                             'PageController@index')->name('home');