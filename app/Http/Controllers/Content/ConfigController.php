<?php

namespace App\Http\Controllers\Content;

use Illuminate\Http\Request;
use App\Models\ModuleConfig;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:Content-config');
    }

    public function edit()
    {
        return view('content.config_edit');
    }

    public function update(Request $request)
    {
        config_save($request->except('_token', '_method'));
        return redirect(route('content.config.edit'))->with('success', '配置项修改成功');
    }
}
