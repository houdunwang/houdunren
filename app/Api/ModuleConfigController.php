<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Models\ModuleConfig;
use App\Models\Site;
use Illuminate\Database\Eloquent\InvalidCastException;
use LogicException;
use InvalidArgumentException;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * 模块配置
 * @package App\Http\Controllers\Admin
 */
class ModuleConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'site']);
    }

    /**
     * 模块配置
     * @return mixed
     */
    public function show(Site $site, Module $module)
    {
        $this->authorize('update', $module);
        $config = ModuleConfig::where('site_id', $site['id'])->where('module_id', $module['id'])->first();
        return $config['config'];
    }

    /**
     * 更新配置
     * @param Request $request
     * @param Site $site
     * @param ModuleConfig $config
     * @return void
     * @throws InvalidCastException
     * @throws LogicException
     * @throws InvalidArgumentException
     * @throws BindingResolutionException
     */
    public function update(Request $request, Site $site, Module $module)
    {
        $this->authorize('update', $module);
        $config = ModuleConfig::where('site_id', $site['id'])->where('module_id', $module['id'])->first();
        $config['config'] = $request->config;
        $config->save();
        return $this->message('模块配置保存成功');
    }
}
