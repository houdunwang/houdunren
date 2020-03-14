<?php

namespace App\Services;

use App\Models\Site;
use App\User;
use Illuminate\Support\Facades\Route;

/**
 * 站点服务
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
  public function getSiteByDomain()
  {
    return Site::where('domain', $_SERVER['HTTP_HOST'])->first();
  }

  /**
   * 是否为站长
   * @param Site $site
   * @param User $user
   *
   * @return bool
   */
  public function isAdmin(Site $site, User $user)
  {
    return $site->admin->contains($user);
  }

  /**
   * 是否为操作员
   * @param Site $site
   * @param User $user
   *
   * @return bool
   */
  public function isOperator(Site $site, User $user)
  {
    return $site->operator->contains($user);
  }
}
