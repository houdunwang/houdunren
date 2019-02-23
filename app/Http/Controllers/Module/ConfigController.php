<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\Module;

use App\Http\Controllers\Controller;
use App\Repositories\ConfigRepository;
use Illuminate\Http\Request;

/**
 * 模块配置项
 * Class ConfigController
 * @package App\Http\Controllers\Admin
 */
class ConfigController extends Controller
{
    public function edit($name, ConfigRepository $repository)
    {
        $config = $repository->get($name, []);
        return view('config.edit', compact('config', 'name'));
    }

    public function update(Request $request, $name, ConfigRepository $repository)
    {
        $repository->save($request, $name);
        return back()->with('success', '配置项保存成功');
    }
}
