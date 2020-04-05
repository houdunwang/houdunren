<?php

namespace Modules\Edu\Providers;

use Modules\Edu\Entities\Comment;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Modules\Edu\Entities\Sign;
use Modules\Edu\Observers\CommentObserver;
use Modules\Edu\Observers\SignObserver;

class EduServiceProvider extends ServiceProvider
{
  /**
   * Boot the application events.
   *
   * @return void
   */
  public function boot()
  {
    $this->registerTranslations();
    $this->registerConfig();
    $this->registerViews();
    $this->registerFactories();
    $this->loadMigrationsFrom(module_path('Edu', 'Database/Migrations'));

    Comment::observe(CommentObserver::class);
    Sign::observe(SignObserver::class);
  }

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    $this->app->register(RouteServiceProvider::class);
  }

  /**
   * Register config.
   *
   * @return void
   */
  protected function registerConfig()
  {
    $this->publishes([
      module_path('Edu', 'Config/config.php') => config_path('edu.php'),
    ], 'config');
    $this->mergeConfigFrom(
      module_path('Edu', 'Config/config.php'),
      'edu'
    );
  }

  /**
   * Register views.
   *
   * @return void
   */
  public function registerViews()
  {
    $viewPath = resource_path('views/modules/edu');

    $sourcePath = module_path('Edu', 'Resources/views');

    $this->publishes([
      $sourcePath => $viewPath
    ], 'views');

    $this->loadViewsFrom(array_merge(array_map(function ($path) {
      return $path . '/modules/edu';
    }, \Config::get('view.paths')), [$sourcePath]), 'edu');
  }

  /**
   * Register translations.
   *
   * @return void
   */
  public function registerTranslations()
  {
    $langPath = resource_path('lang/modules/edu');

    if (is_dir($langPath)) {
      $this->loadTranslationsFrom($langPath, 'edu');
    } else {
      $this->loadTranslationsFrom(module_path('Edu', 'Resources/lang'), 'edu');
    }
  }

  /**
   * Register an additional directory of factories.
   *
   * @return void
   */
  public function registerFactories()
  {
    if (!app()->environment('production') && $this->app->runningInConsole()) {
      app(Factory::class)->load(module_path('Edu', 'Database/factories'));
    }
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides()
  {
    return [];
  }
}
