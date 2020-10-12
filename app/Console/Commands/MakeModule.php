<?php

namespace App\Console\Commands;

use Artisan;
use File;
use Illuminate\Console\Command;
use Module;
use Storage;

class MakeModule extends Command
{
  protected $signature = 'hd:make {name : 请输入模块英文字符标识，该标识也将做为模块目录使用}';

  protected $description = '创建模块应用';
  protected $bar;
  protected $vars = [];

  public function __construct()
  {
    parent::__construct();
  }

  public function handle()
  {
    $this->name = ucfirst($this->argument('name'));
    $this->vars['lower_name'] = strtolower($this->name);
    $this->vars['title'] = $this->ask('模块中文名称');

    if (Module::find($this->name)) {
      return $this->error("{$this->name}模块已经存在");
    }

    $this->bar = $this->output->createProgressBar(3);
    $this->bar->start();

    $this->createModule();
    $this->copyFiles();
    $this->replaceVars();

    $this->bar->finish();

    $this->info("\n");
    $this->table(['请执行以下步骤'], [["cd Modules/{$this->name}"], ["cnpm i"], ["npm run watch"]]);
  }

  protected function path()
  {
    return config('modules.paths.modules') . '/' . $this->name;
  }

  protected function createModule()
  {
    Artisan::call("module:make {$this->name}");
    $this->bar->advance();
  }

  protected function copyFiles()
  {
    File::deleteDirectory($this->path() . '/Resources/assets');
    File::copyDirectory(base_path('data/MakeModule/Resources'), $this->path() . '/Resources');
    File::copyDirectory(base_path('data/MakeModule/Config'), $this->path() . '/Config');
    File::copyDirectory(base_path('data/MakeModule/Http'), $this->path() . '/Http');
    File::copyDirectory(base_path('data/MakeModule/Routes'), $this->path() . '/Routes');
    File::copy(base_path('data/MakeModule/webpack.mix.js'), $this->path() . '/webpack.mix.js');
    $this->bar->advance();
  }

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
    $this->bar->advance();
  }
}
