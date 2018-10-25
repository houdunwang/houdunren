<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\EduTopic;
use App\Policies\CommentPolicy;
use App\Policies\EduTopicPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
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
