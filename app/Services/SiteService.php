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
    if (is_null($cache)) {
      $model = is_numeric($site) ? Site::find($site) : $site;
      if ($model instanceof Site) $cache = $model;
    }
    if ($cache) {
      $this->config($cache);
      return $cache;
    }
    abort(403, '站点不存在');
  }

  /**
   * 根据域名获取站点
   * @return App\Models\Site
   */
  public function getSiteByDomain()
  {
    $regexp = "^https?:\/\/{$_SERVER['HTTP_HOST']}";
    return  Site::where('domain', 'REGEXP', $regexp)->first();
  }

  /**
   * 设置站点配置
   * @param Site $site
   * @return void
   */
  protected function config(Site $site)
  {
    config(['site' => $site['config']]);
    config(['app.name' => $site['name']]);
    config(['app.url' => $site['domain']]);
    config(['mail' => [
      'driver' => config('site.email.driver.value'),
      'host' => config('site.email.host.value'),
      'port' => config('site.email.port.value'),
      'from' => [
        'address' =>  config('site.email.username.value'),
        'name' =>  config('app.name'),
      ],
      'encryption' =>  config('site.email.encryption.value'),
      'username' =>  config('site.email.username.value'),
      'password' =>  config('site.email.password.value'),
    ]]);
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
