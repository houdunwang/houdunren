<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Servers;

use App\Models\Module;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FieldServer
 * @package App\Servers
 */
class FieldServer
{
    /**
     * 获取模块字段配置
     * @param Module $module 模块
     * @param string $name Config/Fields中的模型字段配置
     * @return array|null
     */
    protected function getConfig(Module $module, string $name): ?array
    {
        $file = \Storage::drive('module')->path($module['name'] . "/Config/Fields/{$name}.php");
        return include($file);
    }

    /**
     * 获取字段标题一般用于后台列表页显示
     * @param Module $module 模块
     * @param string $name Config/Fields中的模型字段配置
     * @return array
     */
    public function getFieldTitles(Module $module, string $name): array
    {
        $fields = [];
        foreach ($this->getConfig($module, $name)['fields'] as $field) {
            if ($field['index_show']) {
                $fields[] = $field['title'];
            }
        }
        return $fields;
    }

    /**
     * 获取字段值
     * @param Module $module 模块
     * @param string $name Config/Fields中的模型字段配置
     * @param $model
     * @return array
     */
    public function getFieldValues(Module $module, string $name, $model): array
    {
        $values = [];
        foreach ($this->getConfig($module, $name)['fields'] as $field) {
            if ($field['index_show']) {
                $values[] = $model[$field['name']];
            }
        }
        return $values;
    }

    /**
     * 处理模块字段用于编辑和发表界面
     * @param Module $module 模块
     * @param string $name Config/Fields中的模型字段配置
     * @param Model $model 模型对象
     * @return array
     */
    public function form(Module $module, string $name, Model $model): array
    {
        return $this->fields($this->getConfig($module, $name)['fields'], $model);
    }

    /**
     * 字段编辑视图
     * @param array $fields 字段配置
     * @param Model $model 模型对象
     * @return array
     */
    public function fields(array $fields, Model $model): array
    {
        $forms = [];
        foreach ($fields as $field) {
            if ($field['allow_edit']) {
                $field['value'] = $model[$field['name']] ?? '';
                $forms[] =
                    \View::make('servers.field.' . $field['form'])->with('field', $field)->render();
            }
        }
        return $forms;
    }
}