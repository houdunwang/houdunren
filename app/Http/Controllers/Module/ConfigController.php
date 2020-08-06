<?php

namespace App\Http\Controllers\Module;

use App\Http\Controllers\Controller;
use App\ModuleConfig;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function edit()
    {
        return view('module_config.edit');
    }

    public function store(Request $request)
    {
        $model = ModuleConfig::firstOrNew([
            'site_id' => site()['id'], 'module_id' => module()['id']
        ]);
        $model['config'] = $request->input() + ($model['config'] ?? []);
        $model->save();
        return back()->with('success', '模块配置修改成功');
    }
}
