<?php

namespace App\Observers;

use App\Models\ModuleConfig;

class ModuleConfigObserver
{
    public function created(ModuleConfig $config)
    {
        $this->cache();
    }

    public function updated(ModuleConfig $config)
    {
        $this->cache();
    }

    public function saved(ModuleConfig $config)
    {
        $this->cache();
    }

    protected function cache()
    {
        \Cache::forever('module_config', ModuleConfig::pluck('data', 'module'));
    }
}
