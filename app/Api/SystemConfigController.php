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

    public function show(SystemConfig $config)
    {
        $this->authorize('view', $config);
        return new SystemConfigResource($config);
    }


    public function update(Request $request, SystemConfig $config)
    {
        // dd($request->all());
        $config['config'] = $request->input();
        $config->save();
        return ['message' => '系统配置修改成功'];
    }
}
