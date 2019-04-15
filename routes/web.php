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

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' =>['auth','admin']],function () {
    Route::namespace('Admin')->prefix('admin')->group(function () {

        Route::get('/', 'AdminController@index')->name('a.index');
         ////////////////////Category\\\\\\\\\\\\\\\\\\\\\
        Route::prefix('category')->group(function(){
            Route::get('/', 'CategoryController@index')->name('c.index');
            Route::post('store', 'CategoryController@store')->name('c.store');
            Route::get('{id}', 'CategoryController@edit')->name('c.edit');
            Route::put('{id}', 'CategoryController@update')->name('c.update');
            Route::delete('{id}', 'CategoryController@destroy')->name('c.destroy');
        });
        Route::prefix('product')->group(function(){
            Route::get('/', 'ProductController@index')->name('p.index');
            Route::get('/create', 'ProductController@create')->name('p.create');
            Route::post('/store', 'ProductController@store')->name('p.store');
            Route::get('{id}', 'ProductController@edit')->name('p.edit');
            Route::put('{id}', 'ProductController@update')->name('p.update');
            Route::delete('{id}', 'ProductController@destroy')->name('p.destroy');
        });




    });
    Route::get('/admin/order', 'OrderController@index')->name('o.index');
    Route::get('/admin/order/{id}', 'OrderController@show')->name('order.show');
    Route::delete('/admin/order/{id}', 'OrderController@destroy')->name('o.destroy');


});

Route::get('/', 'FrontController@index')->name('home');
Route::get('/contact', 'FrontController@contact')->name('contact');
Route::get('/about', 'FrontController@about')->name('about');
Route::get('/category/{slug}', 'FrontController@product')->name('product');
Route::get('/category', 'FrontController@category')->name('cats');
Route::get('/product/view/{id}/{slug}', 'FrontController@more')->name('product.more');
Route::get('/cooperation', 'FrontController@cooperation')->name('cooperation');
Route::post('/order', 'OrderController@store')->name('order');



Route::prefix('locale')->group(function () {
    Route::get('/{locale}', function ($locale) {

        Session::put('locale', $locale);

        return back();

    })->where('locale', 'ru|uz');
});