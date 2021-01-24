<?php

namespace App\Services\Config;

use App\Models\ModuleConfig;
use App\Models\Site;
use SiteService;
use ModuleService;
use App\Models\Module;

/**
 * 配置管理服务
 * @package App\Services
 */
class ConfigService
{
    /**
     * 加载当前站点配置
     *
     * @param Site $site
     * @return void
     */
    public function site(Site $site)
    {
        config(['site' => $site['config']]);
        config(['app.name' => $site['title']]);
        config(['mail.default' => config('site.email.transport')]);
        config(['mail.mailers.smtp' =>  config('site.email')]);
        config(['mail.from' => [
            'address' => config('site.email.username'), 'name' => $site['title']
        ]]);
    }

    /**
     * 加载模块配置
     *
     * @param Site $site
     * @param Module $module
     * @return void
     */
    public function module(Site $site, Module $module)
    {
        $model = ModuleConfig::where('site_id', $site['id'])->where('module_id', $module['id'])->first();
        config(['module' => $model['config'] ?? null]);
    }

    /**
     * 保存模块配置
     *
     * @param array $config
     * @return void
     */
    public function saveModuleConfig(array $config)
    {
        $model = ModuleConfig::firstOrNew([
            'site_id' => site()['id'],
            'module_id' => module()['id'],
        ]);
        $model['config'] = $config + ($model['config'] ?? []);
        return $model->save();
    }
}
