<?php

namespace App\Console\Commands;

use App\Models\EduLesson;
use App\Models\EduVideo;
use Carbon\Carbon;
use DB;
use Illuminate\Console\Command;

//后盾人转换
class HoudunrenCommand extends Command
{
    protected $signature = 'hdcms-houdunren';

    protected $description = '后盾人旧版数据转换';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
//        $this->lesson();
        $this->video();
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
                    'lesson_id' => $video->lesson_id,
                    'user_id' => 1,
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
                'user_id' => 1,
            ]);
        });
    }
}