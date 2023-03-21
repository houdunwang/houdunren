<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateConfigRequest;
use App\Http\Resources\ConfigResource;
use App\Models\Config;

//系统配置
class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['base']);
    }

    //前台获取配置项
    public function base()
    {
        return $this->respondWithSuccess(new ConfigResource([
            'base' => config('hd.base'),
            'copyright' => config('hd.copyright'),
        ]));
    }

    //管理员获取所有配置项
    public function all()
    {
        $this->authorize('viewAny', Config::class);
        return $this->respondWithSuccess(new ConfigResource(config('hd')));
    }


    //更新配置
    public function update(UpdateConfigRequest $request, Config $config)
    {
        $this->authorize('update', $config);

        Config::updateOrCreate(['id' => 1], ['data' => $request->input()]);
        return $this->respondOk('配置项保存成功');
    }
}