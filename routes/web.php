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
//首页
Route::get('/','Home\HomeController@index')->name('index');
//前台
Route::group(['prefix'=>'home','namespace'=>'Home','as'=>'home.'],function (){
   //文章管理
    Route::resource('article','ArticleController');
    //评论
    Route::resource('comment','CommentController');
    //点赞/取消
    Route::get('zan/make','ZanController@make')->name('zan.make');

});


//会员中心
Route::group(['prefix'=>'member','namespace'=>'Member','as'=>'member.'],function (){
    //用户管理
    Route::resource('user','UserController');
    //定义关注与取消关注
    Route::get('attention/{user}','UserController@attention')->name('attention');
    //粉丝列表
    //我的粉丝
    Route::get('get_fans/{user}','UserController@myFans')->name('my_fans');
    Route::get('get_following/{user}','UserController@myFollowing')->name('my_following');
//    我的收藏
    //收藏
    Route::get('collect/make','CollectController@make')->name('collect.make');
    Route::get('collect/index/{user}','CollectController@index')->name('collect.index');
//    我的点赞
    Route::get('get_zan/{user}','UserController@myZan')->name('my_zan');
//    我的通知
    Route::get('notify/{user}','NotifyController@index')->name('notify');
    Route::get('notify/show/{notify}','NotifyController@show')->name('notify.show');
});

Route::get('/user/register','UserController@register')->name('register');
Route::post('/user/register','UserController@store')->name('store');
Route::get('/user/login','UserController@login')->name('login');
Route::post('user/login','UserController@loginForm')->name('login');
Route::get('user/logout','UserController@logout')->name('logout');
Route::get('user/password_reset','UserController@passwordReset')->name('password_reset');
Route::post('user/password_reset','UserController@passwordResetForm')->name('password_reset');

//工具类
Route::group(['prefix'=>'util','namespace'=>'Util','as'=>'util.'],function(){
    //发送验证码
    Route::any('/code/send','CodeController@send')->name('code.send');
    //上传
    Route::any('/upload','UploadController@uploader')->name('upload');
    Route::any('/filesLists','UploadController@filesLists')->name('filesLists');
});




//Route::get('admin/index','Admin\IndexController@index')->name('admin.index');
//后台路由
Route::group(['middleware' => ['admin.auth'],'prefix'=>'admin','namespace'=>'Admin','as'=>'admin.'],function(){
    Route::get('index','IndexController@index')->name('index');
    Route::resource('category','CategoryController');
});













