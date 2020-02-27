<?php

namespace App\Servers;

use App\Models\Module;
use App\Models\Site;
use App\User;
use Spatie\Permission\Contracts\Permission;

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
    $package = include $module->getPath() . '/package.php';
    $package['name'] = $name;
    $package['thumb'] = config('app.url') . "/modules/{$name}/preview.jpg";

    return [
      'name' => $name,
      'package' => $package,
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
    if (isSuperAdmin() || $site->admin[0]['id'] == $user['id']) {
      $moduleIds = $site->permissions->pluck('module_id');
    } else {
      $moduleIds = $user->permissions()->pluck('module_id');
    }

    $modules =  Module::whereIn('id', $moduleIds->unique())->get();
    return $modules->map(function ($module) {
      return $this->getModuleInfo($module['name']);
    });
  }
}
