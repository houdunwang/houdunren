<?php

namespace App\Services;

use App\Models\Module as ModelsModule;
use App\Models\User;
use Nwidart\Modules\Facades\Module;

class ModuleService
{

    public function all()
    {
        $modules = [];
        Module::collections()->each(function ($module, $name) use (&$modules) {
            // dd($config->getPath());
            $modules[] = [
                'name' => $name,
                'preview' => url("Modules/{$name}/preview.jpeg"),
                'is_install' => ModelsModule::where('name', $name)->exists(),
                'config' => include $module->getPath() . '/Config/config.php'
            ];
        });
        return $modules;
    }
}
