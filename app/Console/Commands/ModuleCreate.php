<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ModuleCreate extends Command
{
    protected $signature = 'hdcms:module-make {name}';
    //模块名称
    protected $name;
    //模块目录
    protected $modulePath;
    //复制的文件目录
    protected $tplPath;
    //替换变量表
    protected $vars = [];
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '创建新模块';

    public function handle()
    {
        $this->name = $this->argument('name');
        \Artisan::call('module:make', ['name' => [$this->name]]);
        $this->modulePath = \Storage::disk('module')->path($this->name . DIRECTORY_SEPARATOR);
        $this->tplPath = __DIR__ . '/Module/';
        $this->vars = ['{lower-module}' => strtolower($this->name), '{module}' => $this->name];
        //复制路由
        $this->copyFile('web.txt', 'Routes/web.php');
        //控制器
        mkdir($this->modulePath . 'Http/Controllers/System',0755,true);
        $this->copyFile('HomeController.txt', 'Http/Controllers/System/HomeController.php');
        $this->copyFile('ChatController.txt', 'Http/Controllers/System/ChatController.php');
        //视图
        mkdir($this->modulePath . 'Resources/views/system',0755,true);
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
        $content = file_get_contents($this->tplPath . $resFile);
        foreach ($this->vars as $name => $value) {
            $content = str_replace($name, $value, $content);
        }
        return file_put_contents($this->modulePath . $toFile, $content);
    }
}
