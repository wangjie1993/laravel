<?php

namespace App\Http\Controllers\Util;

use App\Notifications\RegisterControllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CodeController extends Controller
{
    public function send(Request $request){
//        随机验证码
        $code = $this->random();
//        发送验证
        $user=User::firstOrNew(['email'=>$request->username]);
//        创建通知类
        $user->notify(new RegisterControllers($code));
        //将验证码存入到session中
        session()->put('code',$code);
        //返回数据
        return ['code'=>1, 'message'=>'验证码发送成功'];
    }

    public function random($len=4){
        $str = '';
        for($i=0;$i<$len;$i++){
            $str .= mt_rand(0,9);
        }
        return $str;

    }
}
