<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    //登陆
    public function login(){
    return view('user.logins');
    }

    //注册
    public function register(){
         return view('user.register');
    }

    //用户提交注册
    public function store(UserRequest $request){
        //将数据存储到数据表
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        User::create($data);
//        提示跳转
        return redirect()->route('login')->with('success','注册成功');
    }
}


























