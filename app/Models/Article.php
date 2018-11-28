<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //定义文章关联
    public function user(){
        return $this->belongsTo(User::class);
    }
    //定义栏目关联
    public  function category(){
        return $this->belongsTo(Category::class);
    }
    //定义zan多态关联
    public function zan(){
        return $this->morphMany(Zan::class,'zan');
    }

    public function collect(){
        return $this->morphMany(Collect::class,'collect');
    }

}
