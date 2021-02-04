<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Site;
use Auth;
use Spatie\Permission\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasRoles;

    protected $guard_name = ['sanctum'];

    protected $fillable = ['name', 'email', 'mobile', 'real_name', 'home', 'avatar', 'weibo', 'wechat', 'qq', 'github', 'wakatime', 'group_id'];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'isSuperAdmin',
        'permissions'
    ];

    public function getPermissionsAttribute()
    {
        return [
            'view' =>  Auth::user()->can('view', $this),
            'update' => Auth::user()->can('update', $this),
        ];
    }

    /**
     * 超级管理员
     * @return void
     */
    public function getIsSuperAdminAttribute()
    {
        return $this->id === 1;
    }

    /**
     * 会员组
     * @return void
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function roles()
    {
        return $this->morphToMany(Role::class, 'model', 'model_has_roles');
    }

    /**
     * 站长身份的站点集合
     * @return mixed
     */
    public function masterSites()
    {
        return $this->hasMany(Site::class, 'user_id');
    }

    /**
     * 管理员身份的站点集合
     * @return belongsToMany
     */
    public function adminSites()
    {
        return $this->belongsToMany(Site::class, 'admin_site')->withTimestamps();
    }

    /**
     * 用户可管理的所有站点
     * @return void
     */
    public function getSitesAttribute()
    {
        return $this->isSuperAdmin ? Site::all() : $this->masterSites->merge($this->adminSites);
    }

    /**
     * 根据关键词搜索用户
     * @param [type] $query
     * @param string $name
     * @return void
     */
    public function scopeSearch($query, string $name)
    {
        if (empty($name)) {
            return $query;
        }
        $name = "%{$name}%";
        return $query
            ->orWhere('name', 'like', $name)
            ->orWhere('id', 'like', $name)
            ->orWhere('email', 'like', $name)
            ->orWhere('mobile', 'like', $name);
    }

    /**
     * 关注列表
     * @return void
     */
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    /**
     * 粉丝列表
     * @return void
     */
    public function fans()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    /**
     * 是否关注检测
     * @param User $user
     * @return boolean
     */
    public function isFollower(User $user)
    {
        return $this->followers()->where('users.id', $user)->exists();
    }

    /**
     * 是否为粉丝检测
     * @param User $user
     * @return void
     */
    public function getIsFansAttribute(User $user)
    {
        return $this->fans()->where('users.id', $user)->exists();
    }

    /**
     * 微信信息
     * @return void
     */
    public function wechatUser()
    {
        return $this->hasOne(WeChatUser::class, 'user_id');
    }
}
