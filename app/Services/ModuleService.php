<?php

namespace App\Services;

use App\Models\Module as ModelsModule;
use App\Models\ModuleConfig;
use App\Models\User;
use Illuminate\Support\Facades\URL;
use Nwidart\Modules\Facades\Module;

class ModuleService
{

    public function all()
    {
        $modules = [];
        Module::collections()->each(function ($module, $name) use (&$modules) {
            $modules[] = [
                'name' => $name,
                'preview' => url("Modules/{$name}/preview.jpeg"),
                'is_install' => ModelsModule::where('name', $name)->exists(),
                'config' => include $module->getPath() . '/Config/config.php',
                'model' => ModelsModule::where('name', $name)->first()
            ];
        });
        return $modules;
    }

    //根据访问域名获取模块
    public function getModuleByDomain()
    {
        $url = parse_url(URL::current());
        $module = ModelsModule::where('domain', $url['host'])->first();
        if ($module) return $module;
    }

    //获取模块配置文件
    public function config(string $name)
    {
        $config = include base_path() . '/Modules/' . $name . '/Config/config.php';

        $data = ModuleConfig::where('module', $name)->value('data');
        if ($data) {
            foreach ($config as $name => $value) {
                if (is_string($value)) {
                    $config[$name] = $data[$name] ?? $value;
                } else {
                    $config[$name] = ($data[$name] ?? []) + $value;
                }
            }
        }

        return $config;
    }
}
