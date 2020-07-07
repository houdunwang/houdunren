<?php

namespace App\Services;

use App\Models\Module as Model;
use App\Models\Site;
use Module;
use Spatie\Permission\Models\Permission;

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
        $config = $this->config($name, 'config');
        $model = Model::where('name', $name)->first();

        return $config + [
            'id' => $model['id'] ?? 0,
            'name' => $name,
            'description' => $config['description'],
            'version' => $config['version'],
            'preview' => "/modules/{$name}/static/preview.jpg",
            'menus' => $this->config($name, 'menus'),
            // 'permissions' => $this->config($name, 'permissions'),
            'installed' => (bool) $model,
            'module' => $module,
        ];
    }

    protected function config(string $name, string $fileName)
    {
        $module = Module::findOrFail($name);
        $file = $module->getPath() . '/Config/' . $fileName . '.php';

        return is_file($file) ? include $file : [];
    }

    public function saveSitePermissions(Site $site)
    {
        $site->user->group->modules->map(function ($model) use ($site) {
            $module = $this->find($model['name']);

            collect($module['menus'])->map(function ($menu) use ($module, $site) {
                foreach ($menu['items'] as $item) {
                    $name = $site['id'] . $module['name'] . '-' .  $item['permission'];
                    Permission::updateOrCreate(['name' => $name], ['name' => $name, 'title' => $item['title'], 'module_id' => $module['id']]);
                }
            });
        });

        //同步系统权限
        foreach (config('access') as $item) {
            $name = $site['id']  . $item['permission'];
            Permission::updateOrCreate(['name' => $name], ['name' => $name, 'title' => $item['title']]);
        }
    }

    public function getSiteModules(Site $site)
    {
        return $site->user->group->modules->map(function ($model) {
            return $this->find($model['name']);
        });
    }
}
