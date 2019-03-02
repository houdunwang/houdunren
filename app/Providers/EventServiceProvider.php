<?php

namespace App\Providers;

use App\Events\NotificationEvent;
use App\Events\UploadEvent;
use App\Listeners\Message\NotificationEmailListener;
use App\Listeners\Message\NotificationMobileListener;
use App\Listeners\Upload\AliYunListener;
use App\Listeners\Upload\LocalListener;
use App\Listeners\Upload\OssListener;
use App\Listeners\Upload\TextListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        //消息通知事件
        NotificationEvent::class => [
            NotificationEmailListener::class,
            NotificationMobileListener::class,
        ],
        //上传处理
        UploadEvent::class => [
            TextListener::class,
            LocalListener::class,
            OssListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
