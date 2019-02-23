<?php

namespace App\Providers;

use App\Models\Package;
use App\Observers\PackageObserver;
use App\Observers\UserObserver;
use App\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->observer();
//        \Blade::component('components.breadcrumb', 'breadcrumb');
//        \Blade::directive('breadcrumb', function ($menus) {
//            return view('components.breadcrumb', compact('menus'));
//        });
    }

    protected function observer()
    {
        Package::observe(PackageObserver::class);
        User::observe(UserObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
