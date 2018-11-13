<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018/11/14
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Http\Controllers\Content\HomeController;
use App\Models\Module;

class ModuleRepository  extends Repository implements RepositoryInterface
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
    public function hasName(string $name): bool
    {
        return (bool)$this->model()->where('name', $name)->first();
    }
}