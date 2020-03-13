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
    $credentials = $this->credentials($data['username']);
    $credentials['password'] = $data['password'];
    return auth()->attempt($credentials, $data['remember'] ?? false);
  }

  /**
   * 帐号类型
   * @param string $username
   *
   * @return array
   */
  public function credentials(string $username)
  {
    $credentials = [];
    if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
      $credentials['email'] = $username;
    } else if (preg_match('/^[a-z]+$/i', $username)) {
      $credentials['name'] = $username;
    } else {
      $credentials['mobile'] = $username;
    }
    return $credentials;
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

  /**
   * 根据关键词获取用户
   * @param Site $site
   * @param ?string $content
   * @param undefined $role
   * @param mixed 'operator'
   * @param mixed 'user']
   *
   * @return App\Model\User
   */
  public function getByKeyword(Site $site, ?string $content, $role = ['admin', 'operator', 'user'])
  {
    return $site->user()
      ->wherePivotIn('role', $role)
      ->where(function ($query) use ($content) {
        if ($content)
          array_map(
            function ($field) use ($query, $content) {
              $query->orWhere($field, 'like', "%{$content}%");
            },
            ['name', 'email', 'mobile', 'users.id'],
          );
      })->get();
  }
}
