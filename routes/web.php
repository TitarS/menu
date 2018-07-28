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


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::resource('/category', 'CategoryController', ['except' => 'show']);
    Route::get('/category/sort', 'CategoryController@sort')->name('sort');
    Route::post('/category/categorySortAjax', 'CategoryController@sortAjax')->name('categorySortAjax');
});

Route::get('/category', 'CategoryController@index');