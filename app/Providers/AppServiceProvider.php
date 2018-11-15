<?php

namespace App\Providers;

use App\Http\Controllers\Content\config\Tag;
use App\Models\Comment;
use App\Models\Config;
use App\Models\EduLesson;
use App\Models\EduTopic;
use App\Models\EduVideo;
use App\Models\Favorite;
use App\Models\Module;
use App\Models\ModuleConfig;
use App\Models\Zan;
use App\Observers\CommentObserver;
use App\Observers\ConfigObserver;
use App\Observers\EduLessonObserver;
use App\Observers\EduTopicObserver;
use App\Observers\EduVideoObserver;
use App\Observers\FavoriteObserver;
use App\Observers\ModuleConfigObserver;
use App\Observers\UserObserver;
use App\Observers\ZanObserver;
use App\User;
use Houdunwang\Alipay\AliPay;
use Houdunwang\Aliyun\Aliyun;
use Houdunwang\WeChat\WeChat;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->init();
        $this->obServer();
        $this->loadConfig();
        (new Tag())->make();
    }

    protected function init()
    {
        Schema::defaultStringLength(191);
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        \Carbon\Carbon::setLocale('zh');
    }

    protected function obServer()
    {
        Comment::observe(CommentObserver::class);
        Config::observe(ConfigObserver::class);
        EduLesson::observe(EduLessonObserver::class);
        EduTopic::observe(EduTopicObserver::class);
        EduVideo::observe(EduVideoObserver::class);
        Favorite::observe(FavoriteObserver::class);
        ModuleConfig::observe(ModuleConfigObserver::class);
        User::observe(UserObserver::class);
        Zan::observe(ZanObserver::class);
    }

    protected function loadConfig()
    {
        config_get('admin.aliyun', []);
        Aliyun::config(config_get('admin.aliyun', []));
        WeChat::config(config('admin.wechat', []));
        AliPay::config(config_get('admin.alipay', []));
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
