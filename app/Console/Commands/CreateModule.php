<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * 创建模块
 * Class ModuleCreate
 * @package App\Console\Commands
 */
class CreateModule extends Command
{
    protected $signature = 'cms:module-make {name}';
    //模块名称
    protected $name;

    //模块目录
    protected $modulePath;
    //复制的文件目录
    protected $tplPath;
    //替换变量表
    protected $vars = [];
    protected $description = '创建新模块';

    public function handle()
    {
        $this->name = $this->argument('name');
        \Artisan::call('module:make', ['name' => [$this->name]]);
        $this->modulePath = \Storage::disk('module')->path($this->name . DIRECTORY_SEPARATOR);
        $this->tplPath = __DIR__ . '/Module/';
        $this->vars = ['{lower-module}' => strtolower($this->name), '{module}' => $this->name];
        //路由
        $this->copyFile('web.txt', 'Routes/web.php');
        //控制器
        $this->copyFile('HomeController.txt', 'Http/Controllers/Front/HomeController.php');
        $this->copyFile('ChatController.txt', 'Http/Controllers/System/ChatController.php');
        //视图
        $this->copyFile('config.blade.txt', 'Resources/views/system/config.blade.php');
    }

    /**
     * 替换内容变量
     * @param string $resFile 命令模板文件
     * @param string $toFile 复制到的模块文件
     * @return string
     */
    protected function copyFile(string $resFile, string $toFile): string
    {
        $path = $this->modulePath.dirname($toFile);
        is_dir($path) || mkdir($path, 0755, true);
        $content = file_get_contents($this->tplPath . $resFile);
        foreach ($this->vars as $name => $value) {
            $content = str_replace($name, $value, $content);
        }
        return file_put_contents($this->modulePath . $toFile, $content);
    }
}
