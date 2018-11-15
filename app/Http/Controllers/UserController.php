<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Formatter\PassthroughFormatter;

class UserController extends Controller
{
//调用中间件，保护登录注册（已经登录用户不允许再访问登录注册）
    public function __construct()
    {
        $this->middleware('guest',[
           'only'=>['login','loginForm','register','store','passwordReset','passwordResetForm'],
        ]);
    }

    //登陆
    public function login(){
    return view('user.login');
    }

//    登录提交
    public function loginForm(Request $request){
        $this->validate($request,[
            'email'   =>'email' ,
            'password'=>'required|min:6' ,
            ],[
            'email.email'=>'请输入邮箱',
            'password.required'=>'请输入密码',
            'password.min'=>'密码不能少于6位'

        ]);

        $credentials = $request->only('email', 'password');

        if (\Auth::attempt($credentials)) {
            return redirect()->route('index')->with('success','登录成功');
        }
        return redirect()->back()->with('danger','用户名或密码错误');
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
        //模型事件，需要再注册之后，把email_verified_at字段事件自动处理
        $data['email_verified_at']=now();
        User::create($data);
//        提示跳转
        return redirect()->route('login')->with('success','注册成功');
    }


//退出登录
  public function logout(){
        \Auth::logout();
        return redirect()->route('index');
  }

  //修改密码
    public function passwordReset(){
            return view('user.password_reset');
    }
// 密码提交
    public function passwordResetForm(PasswordResetRequest $request){
        //根据用户提交来的邮箱去找数据
        $user = User::where('email',$request->email)->first();
        if ($user){
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('login')->with('success','密码修改成功');

        }
        return redirect()->back()->with('danger','邮箱没注册');
    }












}











