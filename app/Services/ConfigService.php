<?php

namespace App\Services;

use App\Models\ModuleConfig;
use App\Models\Site;

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
    public function loadSiteConfig(Site $site = null)
    {
        $site = $site ?? site();
        config(['site' => site()['config']]);
        config('app.name', site()['title']);

        config(['mail.default' => config('site.email.transport')]);
        config(['mail.mailers.smtp' =>  config('site.email')]);
        config(['mail.from' => [
            'address' => config('site.email.username'),
            'name' => site()['title']
        ]]);
    }

    /**
     * 加载模块配置
     *
     * @return void
     */
    public function loadCurrentModuleConfig()
    {
        $model = ModuleConfig::where('site_id', site_id())->where('module_id', module()['id'])->first();
        config(['module' => $model['config'] ?? []]);
    }

    /**
     * 保存模块配置
     *
     * @param array $config
     * @return void
     */
    public function saveCurrentModuleConfig(array $config)
    {
        $model = ModuleConfig::firstOrNew([
            'site_id' => site()['id'],
            'module_id' => module()['id'],
        ]);
        $model['config'] = $config + ($model['config'] ?? []);
        return $model->save();
    }
}
