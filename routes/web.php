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
Route::get('/daa/index','Daa\IndexControllers@index')->name('daa.index');
Route::get('/admin/add','Admin\ArticleController@add')->name('admin.add');
Route::get('/admin/index','Admin\IntexController@index')->name('admin.index');
Route::resource('/admin/photo','Admin\PhotoController');