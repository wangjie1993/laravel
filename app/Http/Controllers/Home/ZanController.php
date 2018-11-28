<?php

namespace App\Http\Controllers\Home;

use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ZanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
           'only'=>['make']
        ]);
    }


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
        if ($zan = $model->zan->where('user_id',auth()->id())->first()){
            //执行删除
            $zan->delete();
        }else{
            //执行添加
//            dd($model->zan()->create());
            $model->zan()->create(['user_id'=>auth()->id()]);
        }
        //判断是否为异步
        if ($request->ajax()){
            $model = $class::find($id);
            return['code'=>1,'message'=>'','zan_num'=>$model->zan->count()];
        }
        return back();
    }























}
