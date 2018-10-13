<?php

namespace App\Http\Controllers\Content;

use Illuminate\Http\Request;
use App\Models\ModuleConfig;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function edit()
    {
        $config = ModuleConfig::firstOrNew(['module' => 'content']);
        return view('content.config_edit', compact('config'));
    }

    public function update(Request $request)
    {
        ModuleConfig::updateOrCreate(['module' => 'content'], ['data' => $request->except('_token','_method')])->save();
        return redirect(route('content.config.edit'))->with('success', '配置项修改成功');
    }
}
