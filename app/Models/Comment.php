<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
   public function user(){
       return $this->belongsTo(User::class);
   }

    //定义zan多态关联
    public function zan(){
        return $this->morphMany(Zan::class,'zan');
    }
    //评论关联通知
    public function article(){
       return $this->belongsTo(Article::class);
    }

}
