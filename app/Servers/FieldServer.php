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
    //模块
    protected $module;
    //Config/Fields中的模型字段配置文件名
    protected $name;
    //模块字段配置
    protected $config;

    /**
     * 获取模块字段配置
     * @param Module $module 模块
     * @param string $name Config/Fields中的模型字段配置
     * @return array|null
     */
    public function init(Module $module, string $name): FieldServer
    {
        $this->module = $module;
        $this->name = $name;
        $file = \Storage::drive('module')->path($module['name'] . "/Config/Fields/{$name}.php");
        $this->config = include($file);
        return $this;
    }

    /**
     * 获取字段标题一般用于后台列表页显示
     * @return array
     */
    public function titles(array $fields = null): array
    {
        $data = [];
        foreach ($fields ?? $this->config['fields'] as $field) {
            if ($field['index_show']) {
                $data[] = $field['title'];
            }
        }
        return $data;
    }

    /**
     * 获取字段值
     * @param $model
     * @return array
     */
    public function value($model, array $fields = null): array
    {
        $values = [];
        foreach ($fields ?? $this->config['fields'] as $field) {
            if ($field['index_show']) {
                $values[] = $model[$field['name']];
            }
        }
        return $values;
    }

    /**
     * 字段编辑视图
     * @param Model $model 模型对象
     * @return array
     */
    public function forms(Model $model, array $fields = null): array
    {
        $forms = [];
        foreach ($fields ?? $this->config['fields'] as $field) {
            if ($field['allow_edit']) {
                $field['value'] = $model[$field['name']] ?? '';
                $forms[] =
                    \View::make('servers.field.' . $field['form'])->with('field', $field)->render();
            }
        }
        return $forms;
    }
}
