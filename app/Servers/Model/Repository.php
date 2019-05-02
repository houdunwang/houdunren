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
            file_put_contents($file, $this->replaceVars(__DIR__ . '/app/repository.tpl'));
        }
    }

    protected function createRepositoryDir()
    {
        $storage = \Storage::drive('module');
        $storage->makeDirectory($this->module['name'] . '/Repositories');
    }
}