<?php

namespace App\Http\Controllers\Member;

use App\Models\Article;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class UserController extends Controller
{
public function __construct()
{
    $this->middleware('auth',[
       'only'=>['edit','update','attention']
    ]);
}

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //获取当前用户发表的文章
        $articles = Article::latest()->where('user_id',$user->id)->paginate(10);
        return view('member.user.show',compact('user','articles'));
    }


    public function edit(User $user,Request $request)
    {
        //调用策略
        $this->authorize('isMine',$user);
        $type = $request->query('type');
        return view('member.user.edit_'.$type,compact('user'));
    }


    public function update(Request $request, User $user)
    {
      $data = $request->all();
      //调用策略
        $this->authorize('isMine',$user);
        $this->validate($request,[
            'password' =>'sometimes|required|min:3|confirmed',
            'name'=>'sometimes|required',
        ],[
            'password.required'=>'请输入密码',
            'password.min'=>'密码不得小于3位',
            'password.confirmed'=>'两次密码不一致',
            'name.required'=>'请输入昵称'
        ]);
        //密码加密
        if ($request->password){
            $data['password'] = bcrypt($data['password']);
        }
        //执行更新
        $user->update($data);
        return back()->with('success','操作成功');
    }



//关注 取消关注
 //这里user 被关注着
    public function attention(User $user){
       //dd($user->fans()->toggle(1));
//        自己不能关注自己
//        $this->authorize('isNotMine',$user);
    $user->fans()->toggle(auth()->user());

        return back();
    }

//我的粉丝
    public function myFans(User $user){
        $fans = $user->fans()->paginate(2);
        return view('member.user.my_fans',compact('user','fans'));
    }
//    我关注的人
    public function myFollowing(User $user){
        //获取用户关注的人
        $followings = $user->following()->paginate(3);
        return view('member.user.my_following',compact('user','followings'));
    }
}
