<?php

namespace App\Http\Controllers\Module;

use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use App\Http\Controllers\Controller;

/**
 * 模块菜单管理
 * Class MenuController
 * @package App\Http\Controllers\Module
 */
class MenuController extends Controller
{
    public function lists(Menu $menu)
    {
        $menus = $menu->type(request('type'))->get();
        return view('module.menu.lists', compact('menus'));
    }

    public function create()
    {
        return view('module.menu.create', ['type' => request()->query('type')]);
    }

    public function store(MenuRequest $request)
    {
        $data = $request->input();
        $data['site_id'] = site()['id'];
        $data['module_id'] = module()['id'];
        Menu::create($data);
        return redirect()->route('module.menu.lists', ['type' => $request->query('type')]);
    }

    public function show($id)
    {
    }

    public function edit(Menu $menu)
    {
        return view('module.menu.edit', compact('menu'));
    }

    public function update(Menu $menu, MenuRequest $request)
    {
        $menu->update($request->input());
        return redirect()->route('module.menu.lists', ['type' => $menu['type']]);
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return back()->with('success', '菜单删除成功');
    }
}
