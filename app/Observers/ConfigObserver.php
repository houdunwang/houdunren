<?php

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
        \Cache::forever('hd_config', Config::pluck('data', 'name'));
    }
}
