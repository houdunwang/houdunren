<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Servers\Model;

/**
 * 模型创建
 * Class Model
 * @package App\Servers\Model
 */
trait Controller
{
    protected function createController()
    {
        $this->createControllerDir();
        $file = \Storage::drive('module')
            ->path("{$this->module['name']}/Http/Controllers/Admin/{$this->config['name']}Controller.php");
        if (!is_file($file)) {
            file_put_contents($file, $this->replaceVars(__DIR__ . '/app/controller.tpl'));
        }
    }

    protected function createControllerDir()
    {
        $storage = \Storage::drive('module');
        $storage->makeDirectory($this->module['name'] . '/Http/Controllers/Admin');
    }
}