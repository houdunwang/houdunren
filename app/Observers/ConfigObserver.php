<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Observers;

use App\Models\Config;

class ConfigObserver
{
    public function created(Config $config)
    {
        $this->cache();
    }

    public function updated(Config $config)
    {
        $this->cache();
    }

    public function saved(Config $config)
    {
        $this->cache();
    }

    protected function cache()
    {
        \Cache::forever('system_config', Config::pluck('data', 'name'));
    }
}
