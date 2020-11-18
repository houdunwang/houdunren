<?php

namespace App\Http\Controllers\Module;

use App\Http\Controllers\Controller;
use App\ModuleConfig;
use App\Services\ConfigService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * 模块配置管理
 * @package App\Http\Controllers\Module
 */
class ConfigController extends Controller
{
  /**
   * 模块配置
   * @return View|Factory
   * @throws BindingResolutionException
   */
  public function edit()
  {
    return view('module.config.edit');
  }

  /**
   * 保存配置
   * @param Request $request
   * @param ConfigService $configService
   * @return RedirectResponse
   * @throws BindingResolutionException
   * @throws HttpException
   * @throws NotFoundHttpException
   */
  public function store(Request $request, ConfigService $configService)
  {
    $configService->saveCurrentModuleConfig($request->input());

    return back()->with('success', '模块配置修改成功');
  }
}
