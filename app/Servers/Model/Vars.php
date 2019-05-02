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
 * 变量替换操作
 * Trait Vars
 * @package App\Servers\Model
 */
trait Vars
{
    protected $vars = [
        //大写模块名
        'UPPER_MODULE' => '',
        //小写模块标识
        'LOWER_MODULE' => '',
        //小写控制器包（去掉模块的模型名）
        'LOWER_NAME' => '',
        'UPPER_NAME' => '',
        //模型名称
        'MODEL_TITLE' => '',
        //模型类名
        'MODEL' => '',
        //模型fillAble
        'FILLABLE' => '',
        //数据迁移类
        'TABLE_CLASS' => '',
        //数据表名
        'TABLE' => '',
        //数据迁移字段列表
        'FIELDS' => '',
    ];

    protected function setVars()
    {
        $this->vars = [
            //大写模块名
            'UPPER_MODULE' => $this->module['name'],
            //小写模块标识
            'LOWER_MODULE' => strtolower($this->module['name']),
            //小写控制器包（去掉模块的模型名）
            'LOWER_NAME' => strtolower($this->config['name']),
            'UPPER_NAME' => $this->config['name'],
            //模型名称
            'MODEL_TITLE' => $this->config['title'],
            //模型
            'MODEL' => $this->config['model'],
            //模型fillAble
            'FILLABLE' => $this->ModelFillAble(),
            //数据迁移类
            'TABLE_CLASS' => str_plural($this->config['model']),
            //表名
            'TABLE' => $this->config['table'],
            //字段列表
            'FIELDS' => $this->migrationFields(),
        ];
    }

    /**
     * 模型填充字段
     * @return string
     */
    protected function ModelFillAble()
    {
        $fillAble = ["'site_id'"];
        foreach ($this->config['fields'] as $field) {
            $fillAble[] = "'{$field['name']}'";
        }
        return implode(',', $fillAble);
    }

    /**
     * 数据迁移字段
     * @return string
     */
    protected function migrationFields()
    {
        $fields = '';
        foreach ($this->config['fields'] as $field) {
            $isNull = $field['is_null'] ? 'nullable()->' : '';
            $length = isset($field['length'])?','.$field['length']:'';
            $fields .= <<<migration
\$table->{$field['type']}('{$field['name']}'{$length})->{$isNull}comment('{$field['title']}');\n
migration;
        }
        return $fields;
    }

    protected function replaceVars(string $file): string
    {
        $content = file_get_contents($file);
        foreach ($this->vars as $k => $v) {
            $content = str_replace('{'.$k.'}', $v, $content);
        }
        return $content;
    }
}
