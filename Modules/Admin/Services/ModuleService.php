<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com  www.houdunren.com
 * |      Date: 2018/7/15 下午10:24
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/

namespace Modules\Admin\Services;

use Modules\Admin\Entities\Module;
use Modules\Article\Http\Controllers\HomeController;

class ModuleService
{
    public function updateCache(): bool
    {
        \DB::table('modules')->truncate();
        $modules = \HDModule::getModulesLists();
        foreach ($modules as $module) {
            $data = [
                'title'        => $module['title'],
                'name'         => $module['name'],
                'is_default'   => 0,
                'enabled'      => 1,
                'front_access' => $this->frontAccess($module),
            ];
            Module::create($data);
        }

        return true;
    }

    protected function frontAccess($module): bool
    {
        $class = 'Modules\\'.$module['name'].'\Http\Controllers\HomeController';

        return class_exists($class) && method_exists($class, 'index');
    }
}
