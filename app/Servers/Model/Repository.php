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
 * 数据仓库
 * Trait Repository
 * @package App\Servers\Model
 */
trait Repository
{
    protected function createRepository()
    {
        $this->createRepositoryDir();
        $file = \Storage::drive('module')
            ->path("{$this->module['name']}/Repositories/{$this->config['name']}Repository.php");
        if (!is_file($file)) {
            file_put_contents($file, $this->replaceRepositoryVars());
        }
        dump($this->module->toArray());
        dd($this->config);
    }

    protected function createRepositoryDir()
    {
        $storage = \Storage::drive('module');
        $storage->makeDirectory($this->module['name'] . '/Repositories');
    }

    protected function replaceRepositoryVars()
    {
        $vars = [
            '{MODULE_NAME}' => $this->module['name'],
            '{MODEL}' => $this->config['model'],
            '{NAME}' => $this->config['name'],
            '{NAME_LOWER}' => strtolower($this->config['name']),
            '{MODULE_NAME_LOWER}' => strtolower($this->module['name']),
        ];
        $content = file_get_contents(__DIR__ . '/Tpls/repository.tpl');
        foreach ($vars as $k => $v) {
            $content = str_replace($k, $v, $content);
        }
        return $content;
    }
}