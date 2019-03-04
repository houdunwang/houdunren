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
use App\Http\Requests\DomainRequest;
use Modules\Shop\Http\Controllers\SystemController;

/**
 * 模块域名管理
 * Class DomainController
 * @package App\Http\Controllers
 */
class DomainController extends Controller
{
    /**
     * 模块域名访问
     * @return mixed
     */
    public function index()
    {
        $route = strtolower(module()['name']) . '.front.home';
        return \Route::respondWithRoute($route);
    }

    public function create()
    {
        $domain = module()->domain;
        return view('module.domain.create', compact('domain'));
    }

    /**
     * 保存域名
     * @param DomainRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DomainRequest $request)
    {
        module()->domain()->updateOrCreate(['module_id' => module()['id'], 'site_id' => site()['id']],
            ['name' => $request->input('name')]);
        return back()->with('success', '模块域名设置成功');
    }
}
