<?php

namespace App;

use App\Models\Group;
use App\Models\Site;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * 用户
 * Class User
 * @package App
 */
class User extends Authenticatable
{
  use Notifiable, HasApiTokens, HasRoles;
  // protected $guard_name = 'web';
  protected $fillable = [
    'name', 'email', 'mobile', 'real_name', 'password', 'home', 'avatar', 'weibo',
    'wechat', 'github', 'qq'
  ];

  protected $hidden = [
    'password', 'remember_token',
  ];

  protected $casts = [
    'email_verified_at' => 'datetime',
    'lock_to_time' => 'datetime'
  ];
  protected $appends = ['is_super_admin'];

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
