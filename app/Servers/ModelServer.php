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
use App\Servers\Model\Controller;
use App\Servers\Model\Migration;
use App\Servers\Model\Model;
use App\Servers\Model\Repository;

/**
 * 模型构建
 * Class ModelServer
 * @package App\Servers
 */
class ModelServer
{
    use Migration, Model, Controller, Repository;

    //模块
    /**
     * @var
     */
    protected $module;
    //字段配置
    /**
     * @var
     */
    protected $config;

    /**
     * 初始配置项
     * @param Module $module
     * @param array $config
     * @return $this
     */
    public function init(Module $module, array $config)
    {
        $config['name'] = ucfirst($config['model']);
        $config['model'] = $module['name'] . ucfirst($config['model']);
        $config['table'] = str_plural(snake_case($config['model']));
        $this->module = $module;
        $this->config = $config;
        return $this;
    }

    public function lists(Module $module)
    {
        $configs = \Storage::drive('module')->files($module['name'] . '/Config/Fields');
        return array_map(function ($config) {
            return include \Storage::drive('module')->path($config);
        }, $configs);
    }

    /**
     * 构建模型相关数据
     * @param Module $module 模块
     * @param array $config 配置
     */
    public function make(Module $module, array $config)
    {
        $this->init($module, $config);
        $this->validate();
        $this->createConfig();
        $this->createMigration();
        $this->createModel();
        $this->createController();
        $this->createRepository();
    }

    /**
     * 表单验证
     */
    protected function validate()
    {
        \Validator::make($this->config, [
            'name' => [
                'regex:/^[a-z]+$/i',
                function ($attribute, $value, $fail) {
                    if ($this->isCreate()) {
                        $fail('模型已经存在');
                    }
                },
            ],
        ], ['name.regex' => '模型名称只能为英文字母'])->validate();
    }

    /**
     * 安装检测
     * @return bool
     */
    protected function isCreate(): bool
    {
        return \Storage::drive('module')
            ->has($this->module['name'] . '/Config/Fields/' . $this->config['model'] . '.php');
    }

    /**
     * 创建配置文件
     */
    protected function createConfig()
    {
        $this->formatField();
        $storage = \Storage::drive('module');
        $storage->makeDirectory($this->module['name'] . '/Config/Fields');
        $configFile = $storage->path($this->module['name'] . '/Config/Fields/' . $this->config['model'] . '.php');
        if (!$storage->has($configFile)) {
            file_put_contents($configFile,
                '<?php return ' . var_export($this->config, true) . ';');
        }
    }

    /**
     * 配置字段设置
     */
    protected function formatField()
    {
        foreach ($this->config['fields'] as $key => $field) {
            $field['index_show'] = true;
            $field['allow_edit'] = true;
            $this->config['fields'][$key] = $field;
        }
    }
}