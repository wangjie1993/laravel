<?php

namespace App\Http\Controllers\Util;

use App\Exceptions\UploadException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
//处理上传
public function uploader(Request $request){
//   $path = $request->file('file')->store('attachment','attachment');
//   return ['file'=>'php/'.$path, 'code' => 0 ];
    $file = $request->file('file');
    //对上传文件的大小以及类型拦截
    $this->checkSize($file);
    $this->checkType($file);

    if($file){
        $path = $file->store('attachment','attachment');
        //将上传数据存储到数据表
        //我们创建附件的模型与迁移文件
        //关联添加
        auth()->user()->attachment()->create([
            'name'=>$file->getClientOriginalName(),
            'path'=>url($path)
        ]);
    }
    //dd($path);
    //dd(url($path));
    return ['file' =>url($path), 'code' => 0];
}


private function checkSize($file){
    if ($file->getSize() > 200000){
        throw new UploadException('图片过大');
    }
}

    private function checkType($file){
        if (!in_array(strtolower($file->getClientOriginalExtension()),['jpg'])){
            throw new UploadException('格式不正确');
        }
    }

//获取图片大小
public function filesLists(){
   $files = auth()->user()->attachment()->paginate(3);
   $data = [];
   foreach ($files as $file){
       $data[]=[
           'url'=>$file['path'],
           'path'=>$file['path']
       ];
   }
   return [
       'data'=>$data,
       'page'=>$files->links() .'',
       'code'=>0
   ];
}

}















