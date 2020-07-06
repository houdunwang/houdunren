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
            'permissions' => $this->config($name, 'permissions'),
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

    public function syncSitePermissions(Site $site)
    {
        $site->user->group->modules->map(function ($model) use ($site) {
            $module = $this->find($model['name']);
            foreach ($module['permissions'] as $permissions) {
                foreach ($permissions['permissions'] as $name => $title) {
                    $name = 's' . $site['id'] . '-' . $module['name'] . '-' . $name;
                    Permission::updateOrCreate(['name' => $name], ['name' => $name, 'title' => $title, 'module_id' => $module['id']]);
                }
            }
        });
    }

    public function setSitePrefixToPermission(Site $site, $module)
    {
        $module['premission'] = collect($module['permissions'])->map(function ($permission) use ($site, $module) {

            $sitePermission =  collect($permission['permissions'])->mapWithKeys(function ($title, $name) use ($site, $module) {
                $name = 's' . $site['id'] . '-' . $module['name'] . '-' . $name;
                return [$name => $title];
            })->toArray();

            return ['title' => $permission['title'], 'permissions' => $sitePermission];
        })->toArray();

        return $module;
    }
}
