<?php

namespace App\Services;

use App\Models\Site;
use App\User;

class UserService
{
  /**
   * 邮箱手机号登录
   * @param array $data
   * @param boolean $remember
   *
   * @return void
   */
  public function login(array $data)
  {
    $credentials = [];
    $type = filter_var($data['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
    $credentials['password'] = $data['password'];
    $credentials[$type] = $data['username'];

    return auth()->attempt($credentials, $data['remember'] ?? false);
  }
  /**
   * 超级管理员检测
   * @return bool
   */
  public function isSuperAdmin(): bool
  {
    return auth()->check() && auth()->id() === 1;
  }
  /**
   * 判断用户是否为站点的指定角色
   * @param Site $site
   * @param User $user
   *
   * @return bool
   */
  public function isRole(Site $site, User $user, array $role = [])
  {
    $role = $role ? $role : ['admin', 'operator'];
    return $user && $user->site()->wherePivotIn('role', $role)
      ->where('site_id', $site['id'])->first() ? true : false;
  }
}
