<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class updateHouDunRen extends Command
{
    protected $signature = 'updateHouDunRen';

    protected $description = 'Command description';

    public function handle()
    {
        $this->user();
        $this->comments();
        $this->activity_log();
        $this->sign();
        $this->order();
        $this->lesson();
        $this->video();
        $this->topic();
    }

    protected function order()
    {
        \DB::table('a_orders_o')->get()->map(function ($pay) {
            $pay = (array)$pay;
            $order = \DB::table('a_edu_orders_o')->where('order_id', $pay['id'])->first();
            $order = (array)$order;
            $pay['site_id'] = 1;
            $pay['module_id'] = 2;
            $pay['sn'] = $pay['order_sn'];
            $pay['price'] = $pay['fee'];
            $pay['subject'] = $pay['fee'] > 200 ? '会员订阅' : '购买课程';
            $pay['pay_id'] = $order['id'] ?? 0;
            $pay['pay_type'] = 'Modules\Edu\Entities\EduOrder';
            unset($pay['order_sn']);
            unset($pay['fee']);
            unset($pay['module']);
            \DB::table('pays')->insert($pay);
        });

        \DB::table('a_edu_orders_o')->get()->map(function ($order) {
            $order = (array)$order;
            if ($order['user_id'] != 412) {
                $pay = \DB::table('pays')->where('id', $order['order_id'])->first();
                $pay = (array)$pay;
                $order['site_id'] = 1;
                $order['subject'] = $pay['subject'] ?? '';
                $order['sn'] = $pay['sn'] ?? $order['id'];
                $order['type'] = $order['lesson_id'] == 0 ? 'subscribe' : 'lesson';
                $order['month'] = 0;
                $order['price'] = $pay['price'] ?? 0;
                unset($order['order_id']);
                unset($order['shop_id']);
                \DB::table('edu_orders')->insert($order);
            }
        });

        \DB::table('a_edu_subscribes_o')->get()->map(function ($subscribe) {
            $subscribe = (array)$subscribe;
            if (!in_array($subscribe['user_id'], [412, 81806, 16544, 16962])) {
                $subscribe['site_id'] = 1;
                \DB::table('edu_durations')->insert($subscribe);
            }
        });
    }

    protected function sign()
    {
        \DB::table('a_edu_signs_o')->get()->map(function ($sign) {
            $sign = (array)$sign;
            $sign['site_id'] = 1;
            $sign['favour_count'] = 0;
            \DB::table('edu_signs')->insert($sign);
        });
        \DB::table('a_edu_sign_totals_o')->get()->map(function ($signTotal) {
            $signTotal = (array)$signTotal;
            $signTotal['site_id'] = 1;
            \DB::table('edu_sign_totals')->insert($signTotal);
        });
    }

    public function activity_log()
    {
        \DB::table('a_activity_log_o')->get()->map(function ($activity) {
            $activity = (array)$activity;
            $activity['site_id'] = 1;
            $activity['module_id'] = 2;
            $activity['module'] = 'Edu';
            if ($activity['log_name'] == 'zan') {
                $activity['log_name'] = 'favour';
                $activity['subject_type'] = 'App\Models\Favour';
            }
            if ($activity['log_name'] == 'edu_topic') {
                $activity['subject_type'] = 'Modules\Edu\Entities\EduTopic';
            }
            if ($activity['log_name'] == 'comment') {
                $activity['subject_type'] = 'Modules\Comment\Entities\Content';
            }
            if ($activity['subject_type'] == 'App\Models\EduSign') {
                $activity['subject_type'] = 'Modules\Edu\Entities\EduSign';
            }
            \DB::table('activity_log')->insert($activity);
        });
    }

    public function comments()
    {
        \DB::table('a_comments_o')->get()->map(function ($comment) {
            $comment = (array)$comment;
            $comment['parent_id'] = 0;
            $comment['site_id'] = 1;
            $comment['module_id'] = 2;
            $comment['comment_content'] = $comment['content'];
            $comment['favour_count'] = $comment['zan_num'];
            unset($comment['zan_num']);
            unset($comment['content']);
            unset($comment['description']);
            unset($comment['url']);
            unset($comment['favorite_num']);
            if (strstr($comment['comment_type'], 'EduVideo')) {
                $comment['comment_type'] = 'Modules\Edu\Entities\EduVideo';
            }
            if (strstr($comment['comment_type'], 'EduTopic')) {
                $comment['comment_type'] = 'Modules\Edu\Entities\EduTopic';
            }
            \DB::table('comment_contents')->insert($comment);
        });
    }

    protected function topic()
    {
        \DB::table('a_edu_topics_o')->get()->map(function ($topic) {
            $topic = (array)$topic;
            unset($topic['category_id']);
            $topic['favour_num'] = $topic['zan_num'];
            $topic['comment_num'] = 0;
            $topic['site_id'] = 1;
            unset($topic['zan_num']);
            \DB::table('edu_topics')->insert($topic);
        });
    }

    protected function user()
    {
        \DB::table('a_users_o')->where('id', '>', 1)->get()->map(function ($user) {
            $user = (array)$user;
            $user['email_verified_at'] = null;
            $user['mobile_verified_at'] = null;
            $user['group_id'] = 1;
            $user['lock'] = 0;
            \DB::table('users')->insert($user);
            \DB::table('site_user')->insert([
                'site_id' => 1,
                'user_id' => $user['id'],
                'role' => 'user',
            ]);
        });
    }

    protected function lesson()
    {
        \DB::table('a_edu_lessons_o')->get()->map(function ($lesson) {
            $lesson = (array)$lesson;
            unset($lesson['is_hot']);
            unset($lesson['click']);
            unset($lesson['order_learn']);
            $lesson['site_id'] = 1;
            \DB::table('edu_lessons')->insert($lesson);
        });

    }

    protected function video()
    {
        \DB::table('a_edu_videos_o')->get()->map(function ($video) {
            $video = (array)$video;
            unset($video['other_path']);
            unset($video['deleted_at']);
            $video['site_id'] = 1;
            \DB::table('edu_videos')->insert($video);
        });
    }
}
