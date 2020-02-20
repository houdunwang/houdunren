<?php

namespace App\Servers;

use App\Models\Module;
use App\Models\Site;
use Illuminate\Support\Collection;

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
    $modules = $this->all();
    return array_filter($modules, function ($module) {
      return $module['model'];
    });
  }

  /**
   * 获取模块资料
   * @param string $name
   * @return array
   */
  public function getModuleInfo(string $name): array
  {
    $module = \Module::find($name);
    $model = Module::where('name', $name)->first();
    return [
      'name' => $name,
      'package' => include $module->getPath() . '/package.php',
      'permissions' => include $module->getPath() . '/Config/permissions.php',
      'menus' => [
        'admin' => include $module->getPath() . '/Menu/admin.php',
        'member' => include $module->getPath() . '/Menu/member.php',
      ],
      'model' => $model
    ];
  }

  /**
   * 获取站点所有模块
   * @param Site $site
   * @return array
   */
  public function getSiteModule(Site $site): array
  {
    $modules = [];
    foreach ($site->user->group->package as $package) {
      foreach ($package->module as $module) {
        $modules[] = $this->getModuleInfo($module['name']);
      }
    }
    return $modules;
  }
}
