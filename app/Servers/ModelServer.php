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
use App\Servers\Model\Migration;

class ModelServer
{
    use Migration;
    protected $module;
    protected $config;

    public function recordConfig(Module $module, array $config)
    {
        $config['model'] = $module['name'] . ucfirst($config['model']);
        $config['table'] = str_plural(snake_case($config['model']));
        $this->module = $module;
        $this->config = $config;
        \Validator::make($config, [
            'name' => 'regex:/^[a-z]+$/i',
        ], ['name.regex' => '模型名称只能为英文字母'])->validate();

        $storage = \Storage::drive('module');
        $storage->makeDirectory($module['name'] . '/Config/Fields');
        $configFile = $storage->path($module['name'] . '/Config/Fields/' . $config['model'] . '.php');
        if (!$storage->has($configFile)) {
            file_put_contents($configFile,
                '<?php return ' . var_export($config, true) . ';');
        }
        $this->createMigration();
    }
}