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
use App\Repositories\ConfigRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 系统配置项
 * Class ConfigController
 * @package App\Http\Controllers\Admin
 */
class ConfigController extends Controller
{
    public function edit($name)
    {
        return view('admin.config.' . $name);
    }

    public function update(Request $request, $name, ConfigRepository $configRepository)
    {
        $config = config_get('admin', []);
        $config[$name] = $request->except(['_token', '_method']);
        config_save($config);
        return back()->with('success', '保存成功');
    }
         
}
