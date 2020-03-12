<?php

namespace App\Services;

use App\Models\Site;
use App\User;

/**
 * 站点管理服务
 * Class SiteService
 * @package App\Services
 */
class SiteService
{
  /**
   * 获取或设置站点
   * @param int | App\Models\Site $site
   *
   * @return Site
   */
  public function site($site = null): Site
  {
    static $cache = null;
    if (!is_null($cache)) {
      return $cache;
    }
    $model = is_numeric($site) ? Site::find($site) : $site;
    if ($model instanceof Site) {
      return $cache = $model;
    }
    abort(403, '站点不存在');
  }

  /**
   * 根据域名获取站点
   * @return App\Models\Site
   */
  public function getByDomain()
  {
    $site = Site::where('domain', 'like', "%{$_SERVER['HTTP_HOST']}%")->first();
    if ($site == false) {
      abort(403, '站点不存在33');
    }
    return $this->site($site);
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
