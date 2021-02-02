<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SystemConfigResource;
use Illuminate\Http\Request;
use Auth;
use App\Models\SystemConfig;

/**
 * 系统配置
 * @package App\Api
 */
class SystemConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    /**
     * 获取系统配置
     *
     * @param SystemConfig $config
     * @return void
     */
    public function show(SystemConfig $config)
    {
        return new SystemConfigResource($config);
    }

    /**
     * 更新配置
     *
     * @param Request $request
     * @param SystemConfig $config
     * @return void
     */
    public function update(Request $request, SystemConfig $config)
    {
        $config['config'] = $request->input();
        $config->save();
        return ['message' => '系统配置修改成功'];
    }
}
