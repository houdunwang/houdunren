<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\EduTopic;
use App\Models\Lesson;
use App\Policies\CommentPolicy;
use App\Policies\EduTopicPolicy;
use App\Policies\LessonPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Spatie\Permission\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\User' => UserPolicy::class,
        Lesson::class => LessonPolicy::class,
        Role::class => RolePolicy::class,
        Comment::class => CommentPolicy::class,
        EduTopic::class => EduTopicPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
