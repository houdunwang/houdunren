<?php

namespace App\Services;

use App\Models\Site;
use App\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/**
 * 站点服务
 * Class SiteService
 * @package App\Services
 */
class SiteService
{
  /**
   * 缓存当前访问站点
   * @param mixed|null $site
   * @return Site
   * @throws HttpResponseException
   */
  public function site($site = null): Site
  {
    static $cache = null;
    if ($cache) return $cache;

    $model = is_numeric($site) ? Site::find($site) : $site;
    if ($model instanceof Site) {
      $this->config($cache = $model);
      define('SITEID', $model['id']);
      return $model;
    };

    abort(404, '站点不存在');
  }

  /**
   * 根据域名获取站点
   * @return App\Models\Site
   */
  public function getSiteByDomain()
  {
    $regexp = "^https?:\/\/{$_SERVER['HTTP_HOST']}";
    return Site::where('domain', 'REGEXP', $regexp)->first();
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
}
