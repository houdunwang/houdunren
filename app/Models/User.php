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
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
        'wechat',
        'mobile',
        'email',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
        'credit1', 'credit2', 'credit3', 'credit4', 'credit5', 'credit6'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'isSuperAdmin',
        'permissions',
        'gender'
    ];

    public function getPermissionsAttribute()
    {
        return [
            'view' => Auth::check() && Auth::user()->can('view', $this),
            'update' => Auth::check() && Auth::user()->can('update', $this),
            'delete' => Auth::check() && Auth::user()->can('delete', $this),
        ];
    }
    /**
     * 性别
     * @return void
     */
    public function getGenderAttribute()
    {
        return [1 => '男', 2 => '女'][$this->sex ?? 1];
    }

    /**
     * 头像
     * @return void
     */
    public function getIconAttribute()
    {
        $sex = ($this->sex == 1 ? 'boy' : 'girl');
        return $this->avatar ?: url("/images/{$sex}.png");
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

    /**
     * 角色关联
     * @return BelongsToMany
     */
    public function roles()
    {
        return $this->morphToMany(Role::class, 'model', 'model_has_roles')->where('site_id', site()['id']);
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
