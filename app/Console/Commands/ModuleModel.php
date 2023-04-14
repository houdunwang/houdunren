<?php

namespace App\Console\Commands;

use Artisan;
use Illuminate\Console\Command;
use Str;

class ModuleModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module-model {model} {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '创建模块模型、控制器、策略、资源、表单验证类';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $model = ucfirst($this->argument('model'));
        $modelSnake = Str::snake($model, '_');
        $module = ucfirst($this->argument('module'));

        Artisan::call("module:make-model {$model} {$module}");
        $this->info('model created successfully');

        Artisan::call("module:make-controller {$model} {$module} --api");
        $this->info('controller created successfully');

        Artisan::call("module:make-migration create_{$modelSnake}_table {$module}");
        $this->info('migration created successfully');

        Artisan::call("module:make-request Store{$model}Request {$module}");
        $this->info('store-request created successfully');

        Artisan::call("module:make-request Update{$model}Request {$module}");
        $this->info('update-request created successfully');

        Artisan::call("module:make-factory {$model} {$module}");
        $this->info('factory created successfully');

        Artisan::call("module:make-policy {$model}Policy {$module}");
        $this->info('policy created successfully');
    }
}
