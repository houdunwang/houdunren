<?php

namespace App\Console\Commands;

use App\Models\EduLesson;
use App\Models\EduVideo;
use App\User;
use Carbon\Carbon;
use DB;
use Illuminate\Console\Command;

//后盾人转换
class HoudunrenCommand extends Command
{
    protected $signature = 'hdcms-houdunren-lesson';

    protected $description = '后盾人旧版数据转换';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->user();
        $this->lesson();
        $this->video();
    }

    protected function user()
    {
        DB::table('users')->where('id', '>', 2)->delete();

        DB::table('hd_member')->where('siteid', 18)->orderBy('uid','DESC')
            ->whereNotIn('uid', [610, 611, 999, 1000, 1018, 1019, 2030, 2031, 2171, 2172, 3363, 3364,3841,3842,4305,4306,4474,4475,9570,9571,9572,9573,9574,10002,10003,11263,11264,11265,
                11420,11421,6753,17984,17985,17237,17238,16544,16894,16895,16856,16857,16390,16391,
                15046,15047,15048,15049,13823,13824,13650,13651,13652,13379,13380,12881,12882,12054,12055,
                11500,11501])
            ->get()->each(function ($member) {
                User::create([
                    'id' => $member->uid,
                    'email' => $member->email ? $member->email : null,
                    'mobile' => $member->mobile ? $member->mobile : null,
                    'password' => '##',
                    'name' => $member->nickname,
                    'icon' => $member->icon,
                ]);
            });
    }

    protected function video()
    {
        DB::table('edu_videos')->delete();
        DB::table('hd_houdunren_video')->get()->each(function ($video) {
            if (DB::table('edu_lessons')->where('id', $video->lesson_id)->first()) {
                EduVideo::create([
                    'id' => $video->video_id,
                    'title' => $video->video_title,
                    'path' => $video->video_path,
                    'lesson_id' => $video->lesson_id
                ]);
            }
        });
    }

    protected function lesson()
    {
        \DB::table('edu_lessons')->delete();
        \DB::table('hd_houdunren_lesson')->get()->each(function ($lesson) {
            $lesson = (array)$lesson;
            EduLesson::create([
                'id' => $lesson['lesson_id'],
                'title' => $lesson['lesson_title'],
                'description' => '',
                'thumb' => $lesson['lesson_thumb'],
                'free_num' => 3,
                'status' => 1,
                'user_id' => 1,
            ]);
        });
    }
}