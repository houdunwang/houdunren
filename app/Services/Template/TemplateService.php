<?php

namespace App\Services\Template;

use App\Models\Module as Model;
use App\Models\Site;
use App\Models\Template;
use Browser;
use File;
use Illuminate\Contracts\Container\BindingResolutionException;
use Module;
use Nwidart\Modules\Collection;
use View;

/**
 * 模板管理服务
 * @package App\Services
 */
class TemplateService
{
    /**
     * 所有模板
     * @return Collection
     */
    public function all()
    {
        $templates = File::directories(public_path('templates'));
        return collect($templates)->map(function ($template) {
            return $this->find(basename($template));
        });
    }

    /**
     * 所有已经安装的模板
     * @return Collection
     */
    public function allInstalled()
    {
        return $this->all()->filter(function ($module) {
            return $module['installed'];
        });
    }

    /**
     * 获取站点所有模板
     * @param Site $site
     * @return mixed
     */
    public function getSiteTemplates(Site $site)
    {
        return $site->master->group->templates->map(function ($module) {
            return $this->find($module['name']);
        });
    }

    /**
     * 安装模块
     * @param string $name
     * @return Template
     * @throws BindingResolutionException
     */
    public function install(string $name): Template
    {
        $template = $this->find($name);
        $model = Template::create($template);
        // $model['preview'] = $this->preview($name);
        $model->save();
        return $model;
    }

    /**
     * 模板预览图片
     */
    // protected function preview($name)
    // {
    //   $dir = public_path("templates/{$name}");
    //   $preview = "{$dir}/preview.jpg";
    //   if (!is_dir($dir)) {
    //     File::makeDirectory(public_path("templates/{$name}"), 0755, true);
    //   }
    //   if (!is_file($preview)) {
    //     File::copy(base_path("templates/{$name}/preview.jpg"), $preview);
    //   }
    //   return $preview;
    // }
    /**
     * 根据模板标识获取模板
     * @param string $name
     * @return array
     */
    public function find(string $name)
    {
        $config = $this->config($name);
        $model = Template::where('name', $name)->first();
        $installed = (bool)$model;
        return array_merge($config, [
            'id' => $model['id'] ?? 0,
            'name' => $name,
            'description' => $config['description'],
            'version' => $config['version'],
            'installed' => $installed,
            'preview' => url("templates/{$name}/preview.jpg"),
            'model' => $model,
        ]);
    }

    /**
     * 模板配置
     * @param string $name
     * @param string $fileName
     * @return mixed
     * @throws BindingResolutionException
     */
    protected function config(string $name, $fileName = 'config')
    {
        // dd(public_path("templates/{$name}/{$fileName}.json"));
        $content = file_get_contents(public_path("templates/{$name}/{$fileName}.json"));
        return json_decode($content, true);
    }

    /**
     * 当前站点使用的视图路径
     * @param Site $site
     * @return exit
     * @throws BindingResolutionException
     */
    public function template(Site $site)
    {
        $config = $this->config($site->template->name);
        $type = $config['type'] ?? 2;
        if ($type == 2) {
            $path = public_path('templates/' . $site->template->name);
        } else {
            $path = public_path('templates/' . $site->template->name . '/' . (Browser::isDesktop() ? 'pc' : 'phone'));
        }
        View::addLocation($path);
        View::addExtension('html', 'blade');
    }
}
