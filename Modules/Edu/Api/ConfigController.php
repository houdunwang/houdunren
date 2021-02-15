<?php

namespace Modules\Edu\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use ConfigService;
use App\Models\Site;

/**
 * 模块配置
 * @package Modules\Edu\Http\Controllers
 */
class ConfigController extends Controller
{
    public function __construct()
    {
    }

    public function show()
    {
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
        ConfigService::saveModuleConfig($request->input());
        return ['message' => '配置文件修改成功'];
    }
}
