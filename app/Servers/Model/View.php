<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Servers\Model;

use Illuminate\Support\Facades\Storage;

/**
 * 模板操作
 * Trait View
 * @package App\Servers\Model
 */
trait View
{
    protected function createView()
    {
        foreach (glob(__DIR__ . '/views/*.php') as $file) {
            $content = $this->replaceVars($file);
            $file = \Storage::drive('module')
                ->path("{$this->module['name']}/Resources/views/admin/"
                    . strtolower($this->config['name']) . '/' . basename($file));
            file_put_contents($file, $content);
        }
    }
}
