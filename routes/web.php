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

// Route::get('/', function () {
//     return view('welcome');
// });

// page index 
Route::get('/', 'FrontController@index')->name('home');


// http://127.0.0.1:8000/test
// Route::get('test', function(){
//     return "je suis un test";
// });
