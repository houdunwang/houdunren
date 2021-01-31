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
     *
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
        return $this->format(ModulePlugin::toCollection())->values();
    }

    /**
     * 所有已经安装的模块
     * @return Collection|null
     */
    public function allInstalled(): ?Collection
    {
        return $this->all()->filter(fn ($module) => $module['isInstall']);
    }

    /**
     * 格式化模块数据
     *
     * @param Collection $modules
     * @return Collection
     */
    protected function format(Collection $modules): Collection
    {
        return $modules->map(function ($module) {
            $name = $module->getName();
            $id = Module::where('name', $name)->value('id');
            return
                $this->config($name, 'config')
                + [
                    'id' => $id,
                    'preview' => url("/modules/{$name}/static/preview.jpg"),
                    'isInstall' => (bool)$id
                ];
        });
    }
    /**
     * 用户可用模块
     *
     * @param Site $site
     * @param User $user
     * @return Collection
     */
    public function userSiteModules(Site $site, User $user): Collection
    {
        return $site->modules->filter(function ($module) use ($site, $user) {
            return PermissionService::checkModule($site, $module, $user);
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
