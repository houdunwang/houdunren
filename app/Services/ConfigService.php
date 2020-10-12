<?php

namespace App\Services;

use App\ModuleConfig;
use Illuminate\Contracts\Container\BindingResolutionException;
use LogicException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * 配置管理服务
 * @package App\Services
 */
class ConfigService
{

  /**
   * 加载当前站点配置
   * @return void
   * @throws BindingResolutionException
   * @throws LogicException
   */
  public function loadSiteConfig()
  {
    config(['site' => site()['config']]);
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
    $model = ModuleConfig::where('site_id', site()['id'])
      ->where('module_id', module()['id'])
      ->first();
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
      'site_id' => site()['id'],
      'module_id' => module()['id'],
    ]);
    $model['config'] = $config + ($model['config'] ?? []);
    return $model->save();
  }
}
