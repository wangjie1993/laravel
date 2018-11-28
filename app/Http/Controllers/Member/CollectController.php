<?php

namespace App\Http\Controllers\Member;

use App\Models\Article;
use App\Models\Collect;
use App\User;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectController extends Controller
{
    //点赞与取消
    public function make(Request $request){
        $type = $request->query('type');
//       dd($type);
        $id = $request->query('id');
//       dd($id);

        $class = 'App\Models\\'.ucfirst($type);
//        dd($class);
        $model = $class::find($id);
//        dd($model);
        if ($collect = $model->collect()->where('user_id',auth()->id())->first()){
            //执行删除
            $collect->delete();
        }else{
            //执行添加
//            dd($model->zan()->create());
            $model->collect()->create(['user_id'=>auth()->id()]);
        }
        return back();
    }

    public function index(User $user,Request $request){
        $type = $request->query('type');
        $collects = $user->collect()->paginate(2);
        return view('member.collect.index_'.$type,compact('user','collects'));
    }

}
