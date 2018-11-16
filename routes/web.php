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

Route::get('/','Home\HomeController@index')->name('index');
Route::get('/user/register','UserController@register')->name('register');
Route::post('/user/register','UserController@store')->name('store');
Route::get('/user/login','UserController@login')->name('login');
Route::post('user/login','UserController@loginForm')->name('login');
Route::get('user/logout','UserController@logout')->name('logout');
Route::get('user/password_reset','UserController@passwordReset')->name('password_reset');
Route::post('user/password_reset','UserController@passwordResetForm')->name('password_reset');


Route::any('/code/send','Util\CodeController@send')->name('code.send');



//Route::get('admin/index','Admin\IndexController@index')->name('admin.index');
//后台路由
Route::group(['middleware' => ['admin.auth'],'prefix'=>'admin','namespace'=>'Admin','as'=>'admin.'],function(){
    Route::get('index','IndexController@index')->name('index');
Route::resource('category','CategoryController');
});













