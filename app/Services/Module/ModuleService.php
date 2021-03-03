<?php

namespace App\Services\Module;

use App\Models\Module;
use App\Models\Site;
use Nwidart\Modules\Facades\Module as ModulePlugin;
use Illuminate\Support\Collection;
use PermissionService;
use App\Models\User;
use App\Models\ModuleConfig;

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
        defined("MID") or define("MID", $module['id']);
        $this->initConfig(site(), $module);
        return $cache = $module;
    }

    /**
     * 加载模块配置
     * @param Site $site
     * @param Module $module
     * @return void
     */
    public function initConfig(Site $site, Module $module)
    {
        $model = ModuleConfig::where('site_id', $site['id'])->where('module_id', $module['id'])->first();
        config(['module' => $model['config'] ?? null]);
    }

    /**
     * 根据域名获取模块
     * @return Module
     */
    public function getByDomain(): ?Module
    {
        $path = parse_url(request()->url())['path'] ?? '';
        $path = preg_replace('/\/api/', '', $path);
        preg_match('/^\/(.*?)\/.+?/i', $path, $matches);
        return Module::where('name', $matches[1] ?? '')->first();
    }

    /**
     * 模块配置
     * @param string $name 模块标识
     * @param string $filename 文件名
     * @return array
     */
    public function config(string $name, string $filename): array
    {
        static $cache = [];
        $cacheName = $name . $filename;
        if (isset($cache[$cacheName])) {
            return $cache[$cacheName];
        }

        $module = ModulePlugin::findOrFail($name);
        $file = $module->getPath() . '/Config/' . $filename . '.php';

        return $cache[$cacheName] = is_file($file) ? include $file : [];
    }

    /**
     * 站点模块检测
     * @param Site $site
     * @param Module $module
     * @return boolean
     */
    public function siteHasModule(Site $site, Module $module): bool
    {
        static $cache = [];
        $cacheName = $site['id'] . $module['id'];
        if (isset($cache[$cacheName])) {
            return $cache[$cacheName];
        }
        return $cache[$cacheName] = (bool)$this->siteModules($site)->contains('name', $module['name']);
    }

    /**
     * 系统中所有模块
     * 包括安装与未安装的
     *
     * @return Collection|null
     */
    public function all(): ?Collection
    {
        static $cache = null;
        if (is_null($cache)) {
            return $cache = ModulePlugin::toCollection()->map(function ($module) {
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
        return $cache;
    }

    /**
     * 站点模块列表
     * @param Site $site
     * @return Collection
     */
    public function siteModules(Site $site): Collection
    {
        static $cache = [];
        if (isset($cache[$site['id']])) {
            return $cache[$site['id']];
        }
        return $cache[$site['id']] = $site->master->group->modules->map(function ($module) use ($site) {
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
        static $cache = [];
        $cacheName = $site['id'] . $user['id'];
        if (isset($cache[$cacheName])) {
            return $cache[$cacheName];;
        }
        return $cache[$cacheName] = $this->siteModules($site)->filter(function ($module) use ($site, $user) {
            return PermissionService::checkUserModuleAccess($site, $module, $user);
        });
    }
}
