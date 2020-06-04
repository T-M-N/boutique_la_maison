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


Route::get('/', 'FrontController@index')->name('home');

Route::get('show/{id}', 'FrontController@showProduct')->name('show_product');

Route::get('category/{id}', 'FrontController@showCategory')->name('show_product_category');

Route::get('solde', 'FrontController@showSolde')->name('show_product_solde');

Route::get('create', 'ProductController@create')->name('product.create');
Route::get('edit', 'ProductController@edit')->name('product.edit');
Route::get('update', 'ProductController@update')->name('product.update');
// Route::resource('admin', 'BookController')->middleware('auth');

Route::resource('admin', 'ProductController');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
