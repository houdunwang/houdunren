<?php

namespace App\Servers;

use App\Models\Site;
use App\User;

/**
 * 站点管理服务
 * Class SiteServer
 * @package App\Servers
 */
class SiteServer
{
  /**
   * 获取或设置站点
   * @param mixed $site
   *
   * @return Site
   */
  public function site($site = null): Site
  {
    static $cache = null;
    if (is_null($site)) {
      return $cache;
    }
    $site = is_numeric($site) ? Site::find($site) : $site;
    if ($site instanceof Site)
      return $cache = $site;

    abort(403, '站点不存在');
  }

  /**
   * 根据网址获取站点
   * @return void
   */
  public function getByUrl()
  {
    $host = \Request::server('HTTP_HOST');
    return  Site::where('domain', 'like', "%{$host}%")->firstOrFail();
  }

  /**
   * 根据关键词获取用户
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
  //是否为站长
  public function isAdmin(Site $site, User $user)
  {
    return $site->admin->contains($user);
  }

  //是否为操作员
  public function isOperator(Site $site, User $user)
  {
    return $site->operator->contains($user);
  }
}
