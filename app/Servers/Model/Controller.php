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
            file_put_contents($file, $this->replaceControllerVars());
        }
    }

    protected function createControllerDir()
    {
        $storage = \Storage::drive('module');
        $storage->makeDirectory($this->module['name'] . '/Http/Controllers/Admin');
    }

    protected function replaceControllerVars()
    {
        $vars = [
            '{MODULE_NAME}' => $this->module['name'],
            '{MODEL}' => $this->config['model'],
            '{NAME}' => $this->config['name'],
            '{NAME_LOWER}' => strtolower($this->config['name']),
            '{MODULE_NAME_LOWER}' => strtolower($this->module['name']),
        ];
        $content = file_get_contents(__DIR__ . '/Tpls/controller.tpl');
        foreach ($vars as $k => $v) {
            $content = str_replace($k, $v, $content);
        }
        return $content;
    }
}