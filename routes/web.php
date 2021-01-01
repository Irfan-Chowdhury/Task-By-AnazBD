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


Route::get('/api/products',"DataController@showAllProducts")->name('products');

Route::get('/api/fetch-data',"DataController@fetchData")->name('fetch.data');

Route::get('/api/fetch-data-show',"DataController@fetchDataShow")->name('fetch.data.show');

Route::post('/api/fetch-data-store',"DataController@fetchDataStore")->name('fetch.data.store');
