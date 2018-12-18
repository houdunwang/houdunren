<?php

namespace App;

use App\Models\Attachment;
use App\Foundations\CommonRelation;
use App\Models\Zan;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles, CommonRelation;

    public $activity = ['create' => '关注了'];

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'mobile',
        'email_verified_at',
        'token',
        'mobile_verified_at',
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

    /**
     * 根据手机号获取用户
     * @param $query
     * @param $mobile
     * @return mixed
     */
    public function scopeByMobile($query, $mobile)
    {
        return $mobile ? $query->where('mobile', $mobile) : $query;
    }

    /**
     * 根据邮箱或手机获取帐号
     * @param $account
     * @return mixed
     */
    public function getUserByAccount($account)
    {
        return $this->where('email', $account)->orWhere('mobile', $account)->first();
    }

    /**
     * 获取会员头像
     * @return string
     */
    public function getAvatarAttribute()
    {
        return $this->icon ? $this->icon : asset('images/user.jpg');
    }

    /**
     * 活跃用户
     * @param int $row
     * @return mixed
     */
    public function active($row = 6)
    {
        return User::limit($row)->latest('updated_at')->get();
    }

    public function link()
    {
        return route('member.user.show', $this);
    }

    public function title()
    {
        return $this['name'];
    }
}
