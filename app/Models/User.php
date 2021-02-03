<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use UserService;
use App\Models\Site;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasRoles;

    protected $guard_name = ['sanctum'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'mobile', 'real_name', 'home', 'avatar', 'weibo', 'wechat', 'qq', 'github', 'wakatime', 'group_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 附加字段
     * @var array
     */
    protected $appends = [
        'icon',
        'isSuperAdmin',
        'nickname'
    ];

    /**
     * 超级管理员
     *
     * @return void
     */
    public function getIsSuperAdminAttribute()
    {
        return $this->id == 1;
    }

    /**
     * 用户头像
     *
     * @return void
     */
    public function getIconAttribute()
    {
        return empty($this->avatar) ? url('/images/avatar.jpg') : $this->avatar;
    }

    /**
     * 昵称计算属性
     *
     * @return void
     */
    public function getNicknameAttribute()
    {
        return empty($this->name) ? '小海豚' : $this->name;
    }
    /**
     * 会员组
     *
     * @return void
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * 年有站长身份的站点集合
     *
     * @return void
     */
    public function masterSites()
    {
        return $this->hasMany(Site::class, 'user_id');
    }

    /**
     * 站点管理员身份的站点列表
     *
     * @return void
     */
    public function sites()
    {
        return $this->belongsToMany(Site::class, 'admin_site')->withTimestamps();
    }

    /**
     * 所有可管理的站点
     * 包括身份是管理员和站长
     *
     * @return void
     */
    public function getAllSitesAttribute()
    {
        return UserService::isSuperAdmin($this) ? Site::all() :
            $this->sites->merge($this->masterSites);
    }

    /**
     * 根据关键词搜索用户
     *
     * @param [type] $query
     * @param [type] $name
     * @return void
     */
    public function scopeSearch($query, $name)
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
     *
     * @return void
     */
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    /**
     * 粉丝列表
     *
     * @return void
     */
    public function fans()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    /**
     * 是否关注检测
     *
     * @return void
     */
    public function getIsFollowerAttribute()
    {
        return $this->followers()
            ->where('users.id', Auth::id())
            ->exists();
    }

    /**
     * 是否为粉丝检测
     *
     * @return void
     */
    public function getIsFansAttribute()
    {
        return $this->fans()
            ->where('users.id', Auth::id())
            ->exists();
    }


    /**
     * 返回模块的用户模型实例
     *
     * @param integer $id
     * @return void
     */
    public static function make(int $id = null)
    {
        $class = 'Modules\\' . module()['name'] . '\Entities\User';
        return $class::find($id ?? auth()->id());
    }

    /**
     * 微信信息
     *
     * @return void
     */
    public function wechatUser()
    {
        return $this->hasOne(WeChatUser::class, 'user_id');
    }
}
