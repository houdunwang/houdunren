<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App;

use App\Models\Attachment;
use App\Models\EduUserVideo;
use App\Models\EduVideo;
use App\Models\Zan;
use App\Observers\UserObserver;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'icon',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected static function boot()
    {
        parent::boot();
        User::observe(UserObserver::class);
    }

    public function attachment()
    {
        return $this->hasMany(Attachment::class);
    }

    public function getIconAttribute($value)
    {
        return $value ?? asset('images/user.jpg');
    }

    //我的粉丝
    public function fans()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    //我关注册的人
    public function follower()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    //指定用户是否为我的粉丝
    public function hasFans(User $user)
    {
        return $this->fans->contains($user);
    }

    //我是否关注指定用户
    public function following(User $user)
    {
        return $this->follower->contains($user);
    }

    //用户点赞
    public function zan()
    {
        return $this->morphMany(Zan::class, 'zan');
    }

    public function scopeByEmail($query, $email)
    {
        return $email ? $query->where('email', $email) : $query;
    }

    public function scopeByMobile($query, $mobile)
    {
        return $mobile ? $query->where('mobile', $mobile) : $query;
    }
}
