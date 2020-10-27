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

use Illuminate\Support\Facades\Route;
Route::get('/',function(){
    return view('welcome');
});
Route::get('register','Auth\RegisterController@show');
Route::post('register','Auth\RegisterController@register');

Route::get('logout','Auth\LoginController@logout');

Route::get('login','Auth\LoginController@showLoginForm');
Route::post('login','Auth\LoginController@login');

Route::group(array('middleware'=>'auth'),function(){
    Route::get('/dashboard','HomeController@index');
});
Route::group(array('prefix'=>'admin','namespace'=>'admin','middleware'=>'manager'),function(){
    Route::get('/panel','AdminController@index');

    Route::get('user','UserController@index');
    
    Route::get('user/{id}/edit','UserController@edit');
    Route::post('user/{id}/edit','UserController@store');

    Route::get('user/{id}/permit','UserController@edit_permit');
    Route::post('user/{id}/permit','UserController@store_permit');

    Route::get('role','RoleController@index');
    Route::get('role/create','RoleController@create');
    Route::post('role/create','RoleController@store');

    Route::get('category','CategoryController@index');
    Route::get('category/create','CategoryController@create');
    Route::post('category/create','CategoryController@store');
    Route::get('category/{id}/edit','CategoryController@edit');
    Route::post('category/{id}/edit','CategoryController@update');

    Route::get('product','ProductController@index');
    Route::get('product/create','ProductController@create');
    Route::post('product/create','ProductController@store');
    Route::get('product/{id}/edit','ProductController@edit');
    Route::post('product/{id}/edit','ProductController@update');

    Route::get('package','PackageController@index');
    Route::get('package/create','PackageController@create');
    Route::post('package/create','PackageController@store');
    Route::get('package/{id}/edit','PackageController@edit');
    Route::post('package/{id}/edit','PackageController@update');

    Route::get('foc','FocController@index');
    Route::get('foc/create','FocController@create');
    Route::post('foc/create','FocController@store');
    Route::get('foc/{id}/edit','FocController@edit');
    Route::post('foc/{id}/edit','FocController@update');

    Route::get('customer','CustomerController@index');
    Route::get('customer/create','CustomerController@create');
    Route::post('customer/create','CustomerController@store');
    Route::get('customer/{id}/edit','CustomerController@edit');
    Route::post('customer/{id}/edit','CustomerController@update');

    Route::get('stock','StockController@index');
    Route::get('stock/create','StockController@create');
    Route::post('stock/create','StockController@store');
    Route::get('stock/{id}/edit','StockController@refill');
    Route::post('stock/{id}/edit','StockController@refilled');

    Route::get('sale/create','SaleController@create');
    Route::post('sale/create','SaleController@store');
    Route::get('sale','SaleController@index');
    Route::get('sale/{id}/show','SaleController@invoice');
    
    //to appear product selection box when selecting a category
    Route::post('get/product/name','SaleController@getProductName')->name('get.product.name');
    Route::post('get/product/price','SaleController@getProductPrice')->name('get.product.price');
    Route::post('get/product/list','SaleController@getProductList')->name('get.product.list');
});