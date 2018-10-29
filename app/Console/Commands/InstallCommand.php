<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hdcms-install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '安装内容管理系统';

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
        \Artisan::call('migrate:refresh');
        \Artisan::call('db:seed',['--class'=>'EduCategorySeeder']);
        \Artisan::call('db:seed',['--class'=>'EduTagSeeder']);
        \Artisan::call('db:seed',['--class'=>'EduShopSeeder']);
    }
}
