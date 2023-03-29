<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

//创建模块
class ModuleCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module-create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '创建模块';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $name = ucfirst($this->argument('name'));
        Artisan::call('module:make ' . $name);
        $configFile = 'Modules/' . $name . '/Config/config.php';
        $config = (include $configFile) + ['version' => '1.0.0', 'author' => '盾友'];
        file_put_contents($configFile, '<?php return ' . var_export($config, true) . ';');
    }
}
