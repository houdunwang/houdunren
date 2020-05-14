<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Parsedown;

class houdunren extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'houdunren';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $old;
    protected $hdcms;
    public function __construct()
    {
        parent::__construct();
        $this->old = DB::connection('houdunren');
        $this->hdcms = DB::connection('mysql');
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // $this->user();
        // $this->site_user();
        // $this->attachments();
        // $this->comments();
        // $this->edu_sign();
        // $this->edu_sign_total();
        // $this->edu_tag();
        // $this->edu_tag_relation();
        // $this->edu_topics();
        // $this->edu_lessons();
        // $this->edu_system();
        // $this->edu_system_lesson();
        // $this->edu_videos();
        // $this->edu_follower();
        // $this->edu_favorite();
        // $this->edu_favour();
        // $this->edu_order();
        // $this->edu_duration();
        $this->edu_subscribe();
    }
    protected function edu_subscribe()
    {
        $this->old->table('edu_subscribes')->get()->map(function ($a) {
            $this->hdcms->table('edu_subscribe')->insert([
                'id' => $a->id,
                'site_id' => $a->site_id,
                'title' => $a->title,
                'ad' => $a->ad,
                'icon' => $a->icon,
                'price' => $a->price,
                'month' => $a->month,
                'created_at' => $a->created_at,
                'updated_at' => $a->updated_at,
            ]);
        });
    }
    protected function edu_duration()
    {
        $this->old->table('edu_durations')->get()->map(function ($a) {
            $this->hdcms->table('edu_duration')->insert([
                'id' => $a->id,
                'site_id' => $a->site_id,
                'user_id' => $a->user_id,
                'begin_time' => $a->begin_time,
                'end_time' => $a->end_time,
                'created_at' => $a->created_at,
                'updated_at' => $a->updated_at,
            ]);
        });
    }
    protected function edu_order()
    {
        $this->old->table('edu_orders')->get()->map(function ($a) {
            $hasLesson = $this->hdcms->table('edu_lessons')->find($a->lesson_id);
            if ($hasLesson) {
                $this->hdcms->table('edu_order')->insert([
                    'id' => $a->id,
                    'site_id' => $a->site_id,
                    'user_id' => $a->user_id,
                    'price' => $a->price,
                    'subject' => $a->subject,
                    'sn' => $a->sn,
                    'type' => $a->type,
                    'month' => $a->month,
                    'lesson_id' => $a->lesson_id,
                    'status' => $a->status,
                    'created_at' => $a->created_at,
                    'updated_at' => $a->updated_at,
                ]);
            }
        });
    }
    protected function edu_favorite()
    {
        $this->old->table('favorites')->get()->map(function ($a) {
            $this->hdcms->table('edu_favorite')->insert([
                'id' => $a->id,
                'user_id' => $a->user_id,
                'favorite_id' => $a->favorite_id,
                'favorite_type' => $a->favorite_type,
                'created_at' => $a->created_at,
                'updated_at' => $a->updated_at,
            ]);
        });
        $this->hdcms->table('edu_favorite')->where('favorite_type', 'Modules\\Edu\\Entities\\EduVideo')->update([
            'favorite_type' => 'Modules\\Edu\\Entities\\Video'
        ]);
        $this->hdcms->table('edu_favorite')->where('favorite_type', 'Modules\\Edu\\Entities\\EduTopic')->update([
            'favorite_type' => 'Modules\\Edu\\Entities\\Topic'
        ]);
    }
    protected function edu_favour()
    {
        $this->old->table('favours')->get()->map(function ($a) {
            $this->hdcms->table('edu_favour')->insert([
                'id' => $a->id,
                'user_id' => $a->user_id,
                'favour_id' => $a->favour_id,
                'favour_type' => $a->favour_type,
                'created_at' => $a->created_at,
                'updated_at' => $a->updated_at,
            ]);
        });
        $this->hdcms->table('edu_favour')->where('favour_type', 'Modules\\Edu\\Entities\\EduTopic')->update([
            'favour_type' => 'Modules\\Edu\\Entities\\Topic'
        ]);
    }
    protected function edu_follower()
    {
        $this->old->table('followers')->get()->map(function ($a) {
            $this->hdcms->table('edu_follower')->insert([
                'id' => $a->id,
                'user_id' => $a->user_id,
                'follower_id' => $a->follower_id,
                'created_at' => $a->created_at,
                'updated_at' => $a->updated_at,
            ]);
        });
    }
    protected function edu_videos()
    {
        $this->old->table('edu_videos')->get()->map(function ($a) {
            $this->hdcms->table('edu_videos')->insert([
                'id' => $a->id,
                'site_id' => $a->site_id,
                'lesson_id' => $a->lesson_id,
                'title' => $a->title,
                'path' => $a->path,
                'external_address' => $a->external_address,
                'rank' => $a->rank,
                'read_count' => 0,
                'favour_count' => $a->zan_num,
                'favorite_count' => $a->favorite_num,
                'comment_count' => $a->comment_num,
                'created_at' => $a->created_at,
                'updated_at' => $a->updated_at,
            ]);
        });
    }
    protected function edu_system()
    {
        $this->old->table('edu_systems')->get()->map(function ($a) {
            $this->hdcms->table('edu_system')->insert([
                'id' => $a->id,
                'site_id' => $a->site_id,
                'user_id' => $a->user_id,
                'title' => $a->title,
                'preview' => $a->thumb,
                'description' => $a->introduce,
                'created_at' => $a->created_at,
                'updated_at' => $a->updated_at,
            ]);
        });
    }
    protected function edu_system_lesson()
    {
        $this->old->table('edu_system_lesson')->get()->map(function ($a) {
            $this->hdcms->table('edu_system_lesson')->insert([
                'lesson_id' => $a->lesson_id,
                'system_id' => $a->system_id,
            ]);
        });
    }
    protected function edu_lessons()
    {
        $this->old->table('edu_lessons')->get()->map(function ($a) {
            $this->hdcms->table('edu_lessons')->insert([
                'id' => $a->id,
                'site_id' => $a->site_id,
                'user_id' => $a->user_id,
                'title' => $a->title,
                'description' => $a->description,
                'thumb' => $a->thumb,
                'type' => $a->type,
                'status' => $a->status,
                'free_num' => $a->free_num,
                'price' => $a->price,
                'is_commend' => $a->is_commend,
                'video_num' => $a->video_num,
                'download_address' => $a->download_address,
                'read_num' => $a->read_num,
                'comment_num' => $a->user_id,
                'favour_count' => $a->zan_num,
                'favorite_count' => $a->favorite_num,
                'created_at' => $a->created_at,
                'updated_at' => $a->updated_at,
            ]);
        });
    }
    protected function edu_topics()
    {
        $this->old->table('edu_topics')->get()->map(function ($a) {
            $Parsedown = new Parsedown();
            $this->hdcms->table('edu_topic')->insert([
                'id' => $a->id,
                'site_id' => $a->site_id,
                'user_id' => $a->user_id,
                'title' => $a->title,
                'content' => $Parsedown->text($a->content),
                'favour_count' => $a->favour_num,
                'favorite_count' => $a->favorite_num,
                'comment_count' => $a->comment_num,
                'recommend' => $a->recommend,
                'created_at' => $a->created_at,
                'updated_at' => $a->updated_at,
            ]);
        });
    }
    protected function edu_tag_relation()
    {
        $ids = $this->old->table('edu_tags')->pluck('id')->toArray();
        $this->old->table('edu_tag_relations')->get()->map(function ($a) use ($ids) {
            if (in_array($a->edu_tag_id, $ids)) {
                $this->hdcms->table('edu_tag_relation')->insert([
                    'tag_id' => $a->edu_tag_id,
                    'relation_id' => $a->tag_relation_id,
                    'relation_type' => $a->tag_relation_type,
                ]);
            }
        });
        $this->hdcms->table('edu_tag_relation')->where('relation_type', 'Modules\\Edu\\Entities\\EduLesson')->update([
            'relation_type' => 'Modules\\Edu\\Entities\\Lesson'
        ]);
        $this->hdcms->table('edu_tag_relation')->where('relation_type', 'Modules\\Edu\\Entities\\EduTopic')->update([
            'relation_type' => 'Modules\\Edu\\Entities\\Topic'
        ]);
    }
    protected function edu_tag()
    {
        $this->old->table('edu_tags')->get()->map(function ($a) {
            $this->hdcms->table('edu_tag')->insert([
                'id' => $a->id,
                'site_id' => $a->site_id,
                'title' => $a->name,
                'created_at' => $a->created_at,
                'updated_at' => $a->updated_at,
            ]);
        });
    }
    protected function edu_sign_total()
    {
        $this->old->table('edu_sign_totals')->get()->map(function ($a) {
            $this->hdcms->table('edu_sign_total')->insert([
                'site_id' => $a->site_id,
                'user_id' => $a->user_id,
                'total' => $a->total,
                'month' => $a->month,
                'created_at' => $a->created_at,
                'updated_at' => $a->updated_at,
            ]);
        });
        $this->hdcms->table('edu_comment')->where('comment_type', 'Modules\\Edu\\Entities\\EduTopic')->update([
            'comment_type' => 'Modules\\Edu\\Entities\\Topic'
        ]);
        $this->hdcms->table('edu_comment')->where('comment_type', 'Modules\\Edu\\Entities\\EduVideo')->update([
            'comment_type' => 'Modules\\Edu\\Entities\\Video'
        ]);
    }
    protected function edu_sign()
    {
        $this->old->table('edu_signs')->get()->map(function ($a) {
            $this->hdcms->table('edu_sign')->insert([
                'site_id' => $a->site_id,
                'user_id' => $a->user_id,
                'content' => $a->content,
                'mood' => $a->mood,
                'content' => $a->content,
                'created_at' => $a->created_at,
                'updated_at' => $a->updated_at,
            ]);
        });
        $this->hdcms->table('edu_comment')->where('comment_type', 'Modules\\Edu\\Entities\\EduTopic')->update([
            'comment_type' => 'Modules\\Edu\\Entities\\Topic'
        ]);
        $this->hdcms->table('edu_comment')->where('comment_type', 'Modules\\Edu\\Entities\\EduVideo')->update([
            'comment_type' => 'Modules\\Edu\\Entities\\Video'
        ]);
    }
    protected function comments()
    {
        $this->old->table('comment_contents')->get()->map(function ($a) {
            $Parsedown = new Parsedown();
            $this->hdcms->table('edu_comment')->insert([
                'site_id' => $a->site_id,
                'user_id' => $a->user_id,
                'content' => $Parsedown->text($a->comment_content),
                'comment_id' => $a->comment_id,
                'comment_type' => $a->comment_type,
                'favour_count' => $a->favour_count,
                'created_at' => $a->created_at,
                'updated_at' => $a->updated_at,
            ]);
        });
        $this->hdcms->table('edu_comment')->where('comment_type', 'Modules\\Edu\\Entities\\EduTopic')->update([
            'comment_type' => 'Modules\\Edu\\Entities\\Topic'
        ]);
        $this->hdcms->table('edu_comment')->where('comment_type', 'Modules\\Edu\\Entities\\EduVideo')->update([
            'comment_type' => 'Modules\\Edu\\Entities\\Video'
        ]);
    }
    protected function site_user()
    {
        $this->old->table('users')->select('id')->get()->map(function ($a) {
            $this->hdcms->table('site_users')->insert([
                'user_id' => $a->id,
                'site_id' => 1,
                'role' => $a->id == 1 ? 'admin' : 'user',
            ]);
        });
    }
    protected function user()
    {
        $this->old->table('users')->get()->map(function ($a) {
            $this->hdcms->table('users')->insert([
                'id' => $a->id,
                'name' => $a->name,
                'email' => $a->email,
                'mobile' => $a->mobile,
                'real_name' => $a->real_name,
                'password' => $a->password,
                'home' => $a->home,
                'avatar' => $a->icon,
                'weibo' => $a->weibo,
                'wechat' => $a->wechat,
                'github' => $a->github,
                'qq' => $a->qq,
                'weibo' => $a->weibo,
                'weibo' => $a->weibo,
                'weibo' => $a->weibo,
                'created_at' => $a->created_at,
                'updated_at' => $a->updated_at,
            ]);
        });
    }
    protected function attachments()
    {
        $this->old->table('attachments')->get()->map(function ($a) {
            $this->hdcms->table('attachments')->insert([
                'id' => $a->id,
                'name' => $a->filename,
                'path' => $a->path,
                'site_id' => 1,
                'user_id' => $a->user_id,
                'created_at' => $a->created_at,
                'updated_at' => $a->updated_at,
            ]);
        });
    }
}
