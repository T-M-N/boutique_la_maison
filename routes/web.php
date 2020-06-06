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

Route::get('produit/{id}', 'FrontController@showProduct')->name('show_product');

Route::get('categorie/{id}', 'FrontController@showCategory')->name('show_product_category');

Route::get('solde', 'FrontController@showSolde')->name('show_product_solde');

Route::resource('admin', 'ProductController');
Route::get('/admin/edit/{id}', 'ProductController@edit')->name('admin.edit');
Route::get('/admin/update/{id}', 'ProductController@update')->name('admin.update');
Route::get('/admin.destroy/{id}', 'ProductController@destroy')->name('admin.destroy');

