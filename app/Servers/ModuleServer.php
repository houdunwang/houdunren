<?php

namespace App\Servers;

use App\Models\Module;

/**
 * 模块服务
 * Class ModuleServer
 * @package App\Servers
 */
class ModuleServer
{
  /**
   * 获取所有模块资料
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
      'installed' => (bool)$model
    ];
  }
}
