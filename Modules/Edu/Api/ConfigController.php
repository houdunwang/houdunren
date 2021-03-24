<?php

namespace Modules\Edu\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use ModuleService;
use App\Models\Site;

/**
 * 模块配置
 * @package Modules\Edu\Http\Controllers
 */
class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function show()
    {
        $this->authorize('config', module());
        return config('module');
    }

    /**
     * 保存配置
     * @param Request $request
     * @param Site $site
     * @return void
     */
    public function update(Request $request)
    {
        $this->authorize('config', module());
        ModuleService::saveConfig($request->input());
        return $this->message('配置文件修改成功');
    }
}
