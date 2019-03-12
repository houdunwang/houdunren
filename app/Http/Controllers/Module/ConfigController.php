<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
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
    public function create(ConfigRepository $repository)
    {
        $config = $repository->get(module()['name'], []);
        return view('module.config.create', compact('config'));
    }

    public function store(Request $request, ConfigRepository $repository)
    {
        $repository->save(module()['name'], $request->except(['_token', '_method']));
        return back()->with('success', '配置项保存成功');
    }
}
