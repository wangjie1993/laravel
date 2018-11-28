<?php

namespace App;

use App\Models\Attachment;
use App\Models\Collect;
use App\Models\Zan;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','email_verified_at','icon'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

   public function getIconAttribute($key)
   {
       return $key?:asset('');
   }
   //附件关联
    public function attachment(){
       return $this->hasMany(Attachment::class);
    }
    //获取指定用户粉丝
    public function fans(){
//
//        return $this->belongsToMany(User::class,'followers','user_id','following_id');
        return $this->belongsToMany(User::class,'followers','user_id','following_id');
    }

    //获取关注的人
    public function following(){
        return $this->belongsToMany(User::class,'followers','following_id','user_id');
    }
    //用户关联zan
    public function zan(){
       return $this->hasMany(Zan::class);
    }

    //用户关联zan
    public function collect(){
        return $this->hasMany(Collect::class);
    }
}
