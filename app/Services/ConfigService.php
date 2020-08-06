<?php

namespace App\Services;

use App\ModuleConfig;
use Illuminate\Contracts\Container\BindingResolutionException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ConfigService
{
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
}
