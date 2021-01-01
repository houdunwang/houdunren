<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Console\Command;
use Nwidart\Modules\Facades\Module;

/**
 * 创建模块
 * @package App\Console\Commands
 */
class MakeModule extends Command
{
    protected $signature = 'hd:make {name : 请输入模块英文字符标识，该标识也将做为模块目录使用}';
    protected $description = '创建模块应用';
    protected $bar;
    protected $vars = [];

    public function handle()
    {
        $this->name = ucfirst($this->argument('name'));
        $this->vars['lower_name'] = strtolower($this->name);
        $this->vars['title'] = $this->ask('模块中文名称');
        if (Module::find($this->name)) {
            return $this->error("{$this->name}模块已经存在");
        }

        $this->createModule();
        $this->copyFiles();
        $this->replaceVars();
        $this->info("\n");
        $this->table(['请执行以下步骤'], [["cd Modules/{$this->name}"], ["cnpm i"], ["cnpm run watch"]]);
    }

    protected function path()
    {
        return config('modules.paths.modules') . '/' . $this->name;
    }

    /**
     * 调用插件命令创建模块基本文件
     *
     * @return void
     */
    protected function createModule()
    {
        Artisan::call("module:make {$this->name}");
    }

    protected function copyFiles()
    {
        File::deleteDirectory($this->path() . '/Resources/assets');
        File::copyDirectory(base_path('data/module'), $this->path());
        // File::copyDirectory(base_path('data/MakeModule/Resources'), $this->path() . '/Resources');
        // File::copyDirectory(base_path('data/MakeModule/Config'), $this->path() . '/Config');
        // File::copyDirectory(base_path('data/MakeModule/Config'), $this->path() . '/Config');
        // File::copyDirectory(base_path('data/MakeModule/Http'), $this->path() . '/Http');
        // File::copyDirectory(base_path('data/MakeModule/Routes'), $this->path() . '/Routes');
        // File::copy(base_path('data/MakeModule/webpack.mix.js'), $this->path() . '/webpack.mix.js');
    }

    /**
     * 替换文件变量
     *
     * @return void
     */
    protected function replaceVars()
    {
        $files = [
            $this->path() . '/webpack.mix.js',
            $this->path() . '/Config/config.php',
            $this->path() . '/Http/Controllers/Admin/HomeController.php',
            $this->path() . '/Http/Controllers/HomeController.php',
            $this->path() . '/Routes/web.php',
        ];

        foreach ($files as $file) {
            $content = file_get_contents($file);
            $content = str_replace([
                '{MODULE_NAME}', '{MODULE_LOWER_NAME}', '{MODULE_TITLE}'
            ], [$this->name] + $this->vars, $content);
            file_put_contents($file, $content);
        }
    }
}
