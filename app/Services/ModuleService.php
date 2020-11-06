<?php

namespace App\Services;

use App\Models\Module as Model;
use App\Models\Site;
use Illuminate\Contracts\Container\BindingResolutionException;
use Module;
use Nwidart\Modules\Collection;

/**
 * 模块管理服务
 * @package App\Services
 */
class ModuleService
{
  /**
   * 所有模块
   * @return Collection
   */
  public function all()
  {
    return Module::toCollection()->map(function ($module) {
      return $this->find($module->getName());
    });
  }

  /**
   * 所有已经安装的模块
   * @return Collection
   */
  public function allInstalled()
  {
    return $this->all()->filter(function ($module) {
      return $module['installed'];
    });
  }

  /**
   * 获取站点所有模块
   * @param Site $site
   * @return mixed
   */
  public function getSiteModules(Site $site)
  {
    return $site->master->group->modules->map(function ($module) {
      return $this->find($module['name']);
    });
  }

  /**
   * 获取当前用户可使用的所有模块
   * @param Site $site
   * @return mixed
   * @throws BindingResolutionException
   */
  public function getSiteModulesByPermission(Site $site)
  {
    $permissionService = app(PermissionService::class);

    return $this->getSiteModules($site)->filter(function ($module) use ($site, $permissionService) {
      return $permissionService->checkModulePermission($site, $module);
    });
  }

  /**
   * 根据模块标识获取模块
   * @param string $name
   * @return array
   */
  public function find(string $name)
  {
    $model = Module::findOrFail($name);
    $config = $this->config($name, 'config');
    $model = Model::where('name', $name)->first();

    return array_merge($config, [
      'id' => $model['id'] ?? 0,
      'name' => $name,
      'description' => $config['description'],
      'version' => $config['version'],
      'preview' => "/modules/{$name}/static/preview.jpg",
      'menus' => app(MenuService::class)->allMenus($name),
      'installed' => (bool) $model,
      'model' => $model,
    ]);
  }



  /**
   * 模块配置
   * @param string $name
   * @param string $fileName
   * @return mixed
   * @throws BindingResolutionException
   */
  protected function config(string $name, string $fileName)
  {
    $module = Module::findOrFail($name);
    $file = $module->getPath() . '/Config/' . $fileName . '.php';

    return is_file($file) ? include $file : [];
  }
}
