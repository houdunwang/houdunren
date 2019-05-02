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
 * 创建模型迁移文件
 * Trait Migration
 * @package App\Servers\Model
 */
trait Migration
{
    protected function createMigration()
    {
        $table = "_create_{$this->config['table']}_table";
        $has = false;
        $files = \Storage::drive('module')->files("{$this->module['name']}/Database/Migrations");
        foreach ($files as $file) {
            if (strpos($file, $table) !== false) {
                $has = true;
            }
        }
        if ($has === false) {
            $file = \Storage::drive('module')
            ->path("{$this->module['name']}/Database/Migrations/".date('Y_m_d_His') . "{$table}.php");
            file_put_contents(
                $file,
                $this->replaceVars(__DIR__ . '/app/migration.tpl')
            );
        }
    }
}
