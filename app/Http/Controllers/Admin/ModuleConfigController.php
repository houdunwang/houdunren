<?php

namespace App\Http\Controllers;

use App\Models\ModuleConfig;
use Illuminate\Http\Request;

class ModuleConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function update(Request $request, $module)
    {
        ModuleConfig::updateOrCreate(['module' => $module], ['name' => $module, 'config' => $request->all()]);
        return back()->with('success', '配置项设置成功');
    }
}
