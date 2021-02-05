<?php

namespace App\Services\Module;

use App\Models\Module;
use App\Models\Site;
use Nwidart\Modules\Facades\Module as ModulePlugin;
use Illuminate\Support\Collection;
use PermissionService;
use App\Models\User;

/**
 * 模块管理服务
 * @package App\Services
 */
class ModuleService
{
    /**
     * 缓存或读取当前模块
     * @param Module $module
     * @return Module|null
     */
    public function cache(Module $module = null): ?Module
    {
        static $cache = null;
        if (is_null($module)) return $cache;
        return $cache = $module;
    }

    /**
     * 系统中所有模块
     * 包括安装与未安装的
     *
     * @return Collection|null
     */
    public function all(): ?Collection
    {
        return ModulePlugin::toCollection()->map(function ($module) {
            $name = $module->getName();
            $id = Module::where('name', $name)->value('id');
            return
                $this->config($name, 'config')
                + [
                    'id' => $id,
                    'preview' => url("/modules/{$name}/static/preview.jpeg"),
                    'isInstall' => (bool)$id
                ];
        })->values();
    }

    /**
     * 站点模块列表
     * @param Site $site
     * @return Collection
     */
    public function siteModules(Site $site): Collection
    {
        return $site->master->group->modules->map(function ($module) use ($site) {
            $module['permissions'] =
                PermissionService::formatSiteModulePermissions($site, $module);
            return $module;
        });
    }

    /**
     * 用户可用的站点模块
     * @param Site $site
     * @param User $user
     * @return Collection
     */
    public function userSiteModules(Site $site, User $user): Collection
    {
        return $this->siteModules($site)->filter(function ($module) use ($site, $user) {
            return PermissionService::checkUserModuleAccess($site, $module, $user);
        });
    }

    /**
     * 模块配置
     * @param string $name 模块标识
     * @param string $filename 文件名
     * @return array
     */
    public function config(string $name, string $filename): array
    {
        $module = ModulePlugin::findOrFail($name);
        $file = $module->getPath() . '/Config/' . $filename . '.php';

        return is_file($file) ? include $file : [];
    }
}
