<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
  /**
   * The policy mappings for the application.
   *
   * @var array
   */
  protected $policies = [
    // 'App\Model' => 'App\Policies\ModelPolicy',
  ];

  /**
   * Register any authentication / authorization services.
   *
   * @return void
   */
  public function boot()
  {
    $this->registerPolicies();
    Gate::guessPolicyNamesUsing(function ($modelClass) {
      //模块与主应用统一处理
      $class = str_replace(['Entities', 'Models'], 'Policies', $modelClass) . 'Policy';
      return $class;
    });
    Passport::routes();
    Passport::cookie('token_cookie');
  }
}
