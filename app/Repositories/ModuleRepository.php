<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018/11/14
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Exceptions\InvalidParamException;
use App\Http\Controllers\Content\HomeController;
use App\Models\Module;

class ModuleRepository extends Repository implements RepositoryInterface
{
    protected $name = Module::class;

    /**
     * 根据域名获取可访问模块
     * @return string
     */
    public function getModuleEntryAction()
    {
        $domain = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : config('app.url');
        $module = Module::where('domain', $domain)->first();
        if ($module) {
            $class = ($module['system'] ? 'App\Http\Controllers' : 'Addons') . '\\' . $module['name'] . '\\HomeController';
            if (class_exists($class) && method_exists($class, 'index')) {
                return $class . '@index';
            }
        }
        return HomeController::class . '@index';
    }

    /**
     * 根据模块名检测
     * @param string $name
     * @return bool
     */
    public function has(string $name): bool
    {
        return (bool)$this->model->where('name', $name)->first();
    }

    /**
     * 模块菜单
     * @param string $menu 菜单类型:center_menu
     * @return mixed
     */
    public function allModuleMenus(string $menu)
    {
        return $this->model->whereNotNull($menu)->pluck('name')->map(function ($module) {
            return $this->menu($module);
        })->filter();
    }

    /**
     * 模块菜单
     * @param string $name 模块标识
     * @param string $menuType 菜单类型
     * @return array
     */
    public function menu(string $name, $menuType = 'admin_menu')
    {
        $module = $this->model->where(['name' => $name])->first();
        if ($module && !empty($module[$menuType])) {
            return [
                'title' => $module['title'],
                'module' => $module['name'],
                //'name' => $module[$menuType]['name'],
                'system' => $module['system'],
                'icon' => $module[$menuType]['icon'],
                'menus' => $module[$menuType]['menus'],
                'permission' => array_map(function ($menu) {
                    return $menu['permission'];
                }, $module[$menuType]['menus']),
            ];
        }
    }

    /**
     * 获取模块命令空间
     * @param string $module
     * @return string
     */
    public function getNamespace(string $module)
    {
        $system = $this->model->where('name', $module)->value('system');
        if ($system) {
            return '\App\Http\Controllers\\' . $module;
        }
    }

    /**
     * 根据查询参数获取模块名
     * @return mixed
     * @throws InvalidParamException
     */
    public function getNameFromUrl()
    {
        $info = explode('/', \Route::getCurrentRoute()->uri);
        if (!isset($info[0]) || !$this->has($info[0])) {
            throw new InvalidParamException('module does not module');
        }
        return $this->model->where('name', $info[0])->value('name');
    }
}