<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Group;
use App\Models\Site;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nickname', 'email', 'mobile', 'real_name', 'password', 'home', 'avatar', 'weibo',
        'wechat', 'github', 'qq'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'lock_to_time' => 'datetime',
        'is_super_admin' => 'boolean'
    ];
    /**
     * 用户头像
     * @return string
     */
    public function getAvatarAttribute($value)
    {
        return $value ?? '/images/avatar.jpg';
    }
    /**
     * passport帐号登录
     * @param $username
     * @return mixed
     */
    public function findForPassport($username)
    {
        $validate = [];
        filter_var($username, FILTER_VALIDATE_EMAIL) ? $validate['email'] = $username :
            $this['mobile'] = $username;

        return $this->where($validate)->first();
    }

    /**
     * 站点关联
     */
    public function site()
    {
        return $this->belongsToMany(Site::class, 'site_users')->withPivot('role');
    }

    /**
     * 超级管理员
     * @return bool
     */
    public function getIsSuperAdminAttribute(): bool
    {
        return $this['id'] === 1;
    }

    /**
     * 用户组多表关联
     */
    public function group()
    {
        return $this->belongsToMany(Group::class, 'user_group');
    }
}
