<?php

namespace App\Services;

use App\ModuleConfig;
use Illuminate\Contracts\Container\BindingResolutionException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ConfigService
{
    public function loadSiteConfig()
    {
        config(['site' => site()['config']]);

        //微信登录
        config(['services.weixinweb' => [
            'client_id' => config('site.user.wechatweb_client_id'),
            'client_secret' => config('site.user.wechatweb_client_secret'),
            'redirect' => route('auth.login.wechat.callback'),
        ]]);
    }

    /**
     * 加载模块配置
     * @return void
     * @throws BindingResolutionException
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    public function loadCurrentModuleConfig()
    {
        $model = ModuleConfig::where('site_id', site()['id'])->where('module_id', module()['id'])->first();
        config(['module' => $model['config'] ?? []]);
    }

    /**
     * 保存模块配置
     * @param array $config
     * @return mixed
     * @throws BindingResolutionException
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    public function saveCurrentModuleConfig(array $config)
    {
        $model = ModuleConfig::firstOrNew([
            'site_id' => site()['id'], 'module_id' => module()['id']
        ]);
        $model['config'] = $config + ($model['config'] ?? []);
        return $model->save();
    }
}
