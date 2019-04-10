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
        $file = date('Y_m_d_His') . "_create_{$this->config['table']}_table.php";
        $file = \Storage::drive('module')->path("{$this->module['name']}/Database/Migrations/" . $file);
        if (!is_file($file)) {
            file_put_contents($file, $this->replaceMigrationVar());
        }
    }

    /**
     * 获取迁移文件内容
     * @return false|mixed|string
     */
    protected function replaceMigrationVar()
    {
        $fields = '';
        foreach ($this->config['fields'] as $field) {
            $isNull = $field['is_null'] ? 'nullable()->' : '';
            $fields .= <<<migration
\$table->{$field['type']}('{$field['name']}')->{$isNull}comment('{$field['title']}');\n
migration;
        }
        $vars = [
            '{TABLE}' => $this->config['table'],
            '{TABLE_CLASS}' => str_plural($this->config['model']),
            '{FIELDS}' => $fields,
        ];
        $content = file_get_contents(__DIR__ . '/Tpls/migration.tpl');
        foreach ($vars as $k => $v) {
            $content = str_replace($k, $v, $content);
        }
        return $content;
    }
}