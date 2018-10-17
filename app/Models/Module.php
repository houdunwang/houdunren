<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Models;

use App\Http\Controllers\Content\HomeController;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['name', 'system', 'title', 'permission', 'domain'];

    protected $casts = [
        'permission' => 'array',
    ];

    /**
     * 根据域名获取可访问模块
     * @return string
     */
    public function getEntranceByDomain()
    {
        $domain = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'];
        $module = self::where('domain', $domain)->first();
        if ($module) {
            $class = ($module['system'] ? 'App\Http\Controllers' : 'Addons') . '\\' . $module['name'] . '\\HomeController';
            if (class_exists($class) && method_exists($class, 'index')) {
                return $class . '@index';
            }
        }
        return HomeController::class . '@index';
    }

    public function menus()
    {
        $menus = [];
        foreach (self::get() as $module) {
            $menus[] = [
                'title' => $module['title'],
                'url' => route(strtolower($module['name'] . '.admin')),
                'permissions' => $module->getModulePermission(),
            ];
        }
        return $menus;
    }

    /**
     * 获取模块权限
     * @return array
     */
    public function getModulePermission()
    {
        $data = [];
        foreach ($this['permission'] as $permission) {
            $data[] = $this['name'] . '-' . $permission['name'];
        }
        return $data;
    }
}
