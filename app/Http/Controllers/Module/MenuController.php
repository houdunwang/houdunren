<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\Module;

use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use App\Http\Controllers\Controller;
use App\Models\Site;

/**
 * 模块菜单管理
 * Class MenuController
 * @package App\Http\Controllers\Module
 */
class MenuController extends Controller
{
    public function index(Menu $menu, $type)
    {
        $menus = $menu->type($type)->get();
        $typeName = $menu->getTypeName($type);
        return view('module.menu.index', compact('menus', 'type', 'typeName'));
    }

    public function create($type, Menu $menu)
    {
        $typeName = $menu->getTypeName($type);
        return view('module.menu.create', compact('type', 'typeName'));
    }

    public function store(MenuRequest $request, $type)
    {
        $data = $request->input();
        $data['site_id'] = site()['id'];
        $data['module_id'] = module()['id'];
        Menu::create($data);

        return redirect(module_link('module.menu.index', $type))->with('success', '菜单添加成功');;
    }

    public function edit($type, Menu $menu)
    {
        $typeName = $menu->getTypeName($type);
        return view('module.menu.edit', compact('menu', 'type', 'typeName'));
    }

    public function update($type, Menu $menu, MenuRequest $request)
    {
        $menu->update($request->input());
        return redirect(module_link('module.menu.index', $type))->with('success', '菜单修改成功');
    }

    public function destroy($type, Menu $menu)
    {
        $menu->delete();
        return back()->with('success', '菜单删除成功');
    }
}
