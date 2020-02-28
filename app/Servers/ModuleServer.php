<?php

namespace App\Servers;

use App\Models\Module;
use App\Models\Site;
use App\User;
use Illuminate\Support\Arr;

/**
 * 模块服务
 * Class ModuleServer
 * @package App\Servers
 */
class ModuleServer
{
  /**
   * 所有模块包括未安装模块
   * @return array
   */
  public function all(): array
  {
    $data = [];
    foreach (\Module::all() as $module) {
      $data[] = $this->getModuleInfo($module->getName());
    }
    return $data;
  }

  /**
   * 所有已经安装的模块
   * @return array
   */
  public function allInstalledModule(): array
  {
    $modules =  array_filter($this->all(), function ($module) {
      return $module['model'];
    });
    sort($modules);
    return $modules;
  }

  /**
   * 获取模块资料
   * @param string $name
   * @return array
   */
  public function getModuleInfo(string $name): array
  {
    $module = \Module::find($name);
    $config = include $module->getPath() . '/Config/config.php';
    $config['name'] = $name;
    $config['preview'] = config('app.url') . "/modules/{$name}/preview.jpg";

    return [
      'config' => $config,
      'menu' => include $module->getPath() . '/Config/menu.php',
      'model' => Module::where('name', $name)->first()
    ];
  }

  /**
   * 获取站点所有模块
   * @param Site $site
   */
  public function getSiteModule(Site $site)
  {
    $modules = [];
    foreach ($site->admin()->first()->group as $group) {
      foreach ($group->package as $package) {
        foreach ($package->module as $module) {
          $modules[] = $this->getModuleInfo($module['name']);
        }
      }
    }
    return $modules;
  }


  /**
   * 获取用户在站点可使用的模块
   * @param Site $site
   * @param User $user
   *
   * @return void
   */
  public function getModuleByUser(Site $site, User $user)
  {
    //超管站长获取所有模块
    if (isSuperAdmin() || $site->admin[0]['id'] == $user['id']) {
      return $this->getSiteModule($site);
    }

    //操作员处理
    $modules = [];
    $moduleIds = $user->permissions()->where('site_id', $site['id'])->pluck('module_id');
    foreach ($this->getSiteModule($site) as $module) {
      if (in_array($module['model']['id'], $moduleIds->toArray())) {
        $modules[] = $module;
      }
    }
    return $modules;
  }
}
