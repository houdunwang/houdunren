<?php

namespace App\Services\Module;

use App\Models\Module as Model;
use App\Models\Site;
use Nwidart\Modules\Facades\Module;
use Illuminate\Support\Collection;
use PermissionService;
use MenuService;

/**
 * 模块管理服务
 * @package App\Services
 */
class ModuleService
{
    /**
     * 缓存或读取当前模块数据
     *
     * @param array $module
     * @return array|null
     */
    public function module(Model $module = null): ?array
    {
        static $cache = null;
        if (is_null($module)) return $cache;
        $cache = $this->find($module['name']);
        return $cache;
    }

    /**
     * 所有存在的模块
     * 包括安装与未安装的
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
     *
     * @return Collection|null
     */
    public function allInstalled(): ?Collection
    {
        return $this->all()->filter(function ($module) {
            return $module['installed'];
        });
    }

    /**
     * 获取站点所有模块
     *
     * @param Site $site
     * @return Collection
     */
    public function getSiteModules(Site $site): Collection
    {
        return $site->modules->map(function ($module) use ($site) {
            //添加完整权限标识
            return PermissionService::formatModulePermission($site, $this->find($module['name']));
        });
    }

    /**
     * 获取当前用户可使用的所有模块
     *
     * @param Site $site
     * @return Collection
     */
    public function getSiteModulesByPermission(Site $site): Collection
    {
        return $this->getSiteModules($site)->filter(function ($module) use ($site) {
            return PermissionService::checkModulePermission($site, $module);
        });
    }

    /**
     * 根据模块标识获取模块
     *
     * @param string $name 模块标识
     * @return array
     */
    public function find(string $name): array
    {
        static $cache = [];
        if (isset($cache[$name])) {
            return $cache[$name];
        }
        $model = Module::findOrFail($name);
        $config = $this->config($name, 'config');
        $model = Model::where('name', $name)->first();

        return $cache[$name] = array_merge($config, [
            'id' => $model['id'] ?? null,
            'name' => $name,
            'preview' => "/modules/{$name}/static/preview.jpg",
            'menus' => $this->config($name, 'menus'),
            'installed' => (bool) $model,
            'model' => $model,
            'permissions' => $this->config($name, 'permissions')
        ]);
    }

    /**
     * 模块配置文件
     * 在config目录下
     * @param string $name
     * @param string $fileName
     * @return array
     */
    protected function config(string $name, string $fileName): array
    {
        $module = Module::findOrFail($name);
        $file = $module->getPath() . '/Config/' . $fileName . '.php';

        return is_file($file) ? include $file : [];
    }
}
