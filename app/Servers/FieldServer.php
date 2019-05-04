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
     * 获取字段值用于列表页显示
     * @param $model
     * @return array
     */
    public function value($model, array $fields = null): array
    {
        $values = [];
        foreach ($fields ?? $this->config['fields'] as $field) {
            if ($field['index_show']) {
                $values[] = $this->getValue($model, $field);
            }
        }
        return $values;
    }
    /**
     * 获取表单值
     *
     * @param App\Model $model
     * @param array $field
     * @return mixed
     */
    protected function getValue($model, array $field)
    {
        if (in_array($field['form'], ['checkbox', 'radio', 'image'])) {
            return view('servers.field.show.' . $field['form'], compact('field', 'model'))->render();
        }
        return mb_substr(strip_tags($model[$field['name']]), 0, 20, 'utf-8');
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
                    \View::make('servers.field.' . $field['form'])->with(['field' => $field, 'model' => $model])->render();
            }
        }
        return $forms;
    }
    /**
     * 表单选项如 radio/checkbox
     *
     * @param string $field
     * @return void
     */
    public function params($field)
    {
        $options = [];
        if ($field['params'] instanceof \Closure) {
            return $field['params']();
        } else {
            $params = explode(',', $field['params']);
            foreach ($params as $param) {
                $info = explode(':', $param);
                $options[] = ['value' => $info[0], 'title' => $info[1]];
            }
            return $options;
        }
    }
    /**
     * 获取表单选项的标题
     *
     * @param array $field 字段
     * @param mixed $value 模型值 
     * @return mixed
     */
    public function getTitleByValueFromParams($field, $value)
    {
        foreach ($this->params($field) as $param) {
            if ($value == $param['value']) {
                return $param['title'];
            }
        }
    }
}
