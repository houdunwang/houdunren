<?php

namespace App\Http\Controllers\Edu;

use App\Models\ModuleConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 配置管理
 * Class ConfigController
 * @package App\Http\Controllers\Edu
 */
class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:Edu-config');
    }

    public function edit()
    {
        $config = ModuleConfig::firstOrNew(['module' => 'content']);
        return view('edu.config_edit', compact('config'));
    }

    public function update(Request $request)
    {
        ModuleConfig::updateOrCreate(['module' => 'edu'], ['data' => $request->except('_token','_method')])->save();
        return redirect(route('edu.config.edit'))->with('success', '配置项修改成功');
    }
}
