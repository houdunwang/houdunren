<?php

namespace App\Services;

use App\Models\Module as Model;
use Module;

class ModuleService
{
    public function all()
    {
        return Module::toCollection()->map(function ($module) {
            return $this->find($module->getName());
        });
    }

    public function allInstalled()
    {
        return $this->all()->filter(function ($module) {
            return $module['installed'];
        });
    }

    public function find(string $name)
    {
        $module = Module::findOrFail($name);
        $config = include $module->getPath() . '/Config/config.php';
        $model = Model::where('name', $name)->first();
        return $config + [
            'id' => $model['id'] ?? 0,
            'name' => $name,
            'preview' => "/modules/{$name}/static/preview.jpg",
            'installed' => (bool) $model,
            'module' => $module
        ];
    }
}
