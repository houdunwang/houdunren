<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\EduChapter;
use App\Models\EduDocument;
use App\Models\EduLesson;
use App\Models\EduSection;
use App\Models\EduTopic;
use App\Policies\CommentPolicy;
use App\Policies\EduChapterPolicy;
use App\Policies\EduDocumentPolicy;
use App\Policies\EduLessonPolicy;
use App\Policies\EduSectionPolicy;
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
        EduLesson::class => EduLessonPolicy::class,
        EduDocument::class=>EduDocumentPolicy::class,
        EduChapter::class=>EduChapterPolicy::class,
        EduSection::class=>EduSectionPolicy::class
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
