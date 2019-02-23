<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ModuleCreate extends Command
{
    protected $signature = 'hdcms:module-make {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '创建新模块';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');
        \Artisan::call('module:make', ['name' => [$name]]);
        $this->route($name);
    }

    protected function route($name)
    {
        $lowerModule = strtolower($name);
        $content = file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'Files'.DIRECTORY_SEPARATOR.'web.php');
        $content = str_replace('{lower-module}',$lowerModule,$content);

        file_put_contents(base_path('Modules').DIRECTORY_SEPARATOR.$name.DIRECTORY_SEPARATOR.'Routes'.DIRECTORY_SEPARATOR.'web.php',$content);
    }
}
