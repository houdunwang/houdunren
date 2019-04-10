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
    protected $module;
    //字段配置
    protected $config;

    public function make(Module $module, array $config)
    {
        \Validator::make($config, [
            'name' => 'regex:/^[a-z]+$/i',
        ], ['name.regex' => '模型名称只能为英文字母'])->validate();
        $config['name'] = ucfirst($config['model']);
        $config['model'] = $module['name'] . ucfirst($config['model']);
        $config['table'] = str_plural(snake_case($config['model']));
        $this->module = $module;
        $this->config = $config;
        $this->createConfig();
        $this->createMigration();
        $this->createModel();
        $this->createController();
        $this->createRepository();
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

    protected function formatField()
    {
        foreach ($this->config['fields'] as $key => $field) {
            $field['index_show'] = true;
            $field['allow_edit'] = true;
            $this->config['fields'][$key] = $field;
        }
    }
}