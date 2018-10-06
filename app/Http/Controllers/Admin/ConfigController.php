<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
namespace App\Http\Controllers\Admin;

use App\Models\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    public function edit($name)
    {
        access('Admin-config');
        $config = Config::firstOrNew(['name' => $name]);
        return view('admin.config_' . $name, compact('config'));
    }

    public function update(Request $request, $name)
    {
        access('Admin-config');
        Config::updateOrCreate(['name' => $name], ['name' => $name, 'data' => $request->all()]);
        hd_edit_env($request->all());
        return back()->with('success', '保存成功');
    }
}
