<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018-12-07
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Servers;

use App\Models\EduLesson;
use App\Models\EduUserVideo;
use App\Models\EduVideo;
use App\Models\EduVideoExamLog;
use App\Repositories\EduVideoRepository;
use App\User;

/**
 * 课程视频
 * Class EduVideoServer
 * @package App\Servers
 */
class EduVideoServer
{
    /**
     * 视频学习记录
     * @param EduVideo $video 视频
     * @param bool $force 强制记录
     * @return bool
     */
    public function log(EduVideo $video, $force = false)
    {
        if (!$video['question'] || $force) {
            $video->userVideo()->detach([auth()->id()]);
            $video->userVideo()->attach([auth()->id()],
                ['lesson_id' => $video['lesson_id']]
            );
        }
        return false;
    }

    /**
     * 视频学习检测
     * @param EduVideo $video
     * @param User|null $user
     * @return bool
     */
    public function learned(EduVideo $video, User $user = null): bool
    {
        return $user ? (bool)in_array($video['id'], $this->learnList($video, $user)) : false;
    }

    /**
     * 针对按顺序学习的课程，检测是否跳课学习
     * @param EduVideo $video
     * @param User|null $user
     * @return bool
     */
    public function isSkipLesson(EduVideo $video, User $user = null): bool
    {
        $user = $user ?? auth()->user();
        $prevVideo = app(EduVideoRepository::class)->nextOrPrev($video, 'prev');
//        dd($prevVideo->toArray());
        if ($video->lesson['order_learn'] && $prevVideo && !$this->learned($prevVideo, $user)) {
            return false;
        }
        return true;
    }

    /**
     * 在按顺序学习时，获取将要学习的课程
     *
     * @param EduLesson $lesson
     * @param User $user
     * @return EduVideo
     */
    public function getLearnVideo(EduLesson $lesson, User $user): EduVideo
    {
        $videos = app(EduVideoRepository::class)->videos($lesson);
        $learnedVideos = EduUserVideo::where('lesson_id', $lesson['id'])->where('user_id',$user['id'])->pluck('video_id','video_id');
        return $videos->first(function ($v) use ($learnedVideos) {
            return !$learnedVideos->has($v['id']);
        });
    }

    /**
     * 学习列表
     * @param EduVideo $video
     * @param User $user
     * @return array
     */
    public function learnList(EduVideo $video, User $user)
    {
        static $cache = [];
        $name = 'log' . $video['id'] . $user['id'];
        if (!isset($cache[$name])) {
            $cache[$name] = $video->userVideo()->where('user_id', $user['id'])->pluck('video_id')->toArray();
        }
        return (array)$cache[$name];
    }

    /**
     * 判题
     * @param EduVideo $video
     * @param array $answers
     * @return array
     */
    public function question(EduVideo $video, array $answers): array
    {
        //答对的题
        $rights = [];
        foreach ((array)$this->getQuestionRightAnswers($video) as $q => $question) {
            //回答了这个问题
            if (isset($answers[$q])) {
                if (array_keys($answers[$q]) == array_keys($question)) {
                    $rights[$q] = $answers[$q];
                }
            }
        }
        //分数
        $grade = round(count($rights) / count($video['question']) * 100);
        //错题数
        $wrong = count($video['question']) - count($rights);
        //记录学习
        if ($wrong == 0) {
            $this->log($video, true);
        }
        //记录成绩
        EduVideoExamLog::updateOrCreate([
            'user_id' => auth()->id(),
            'video_id' => $video['id'],
        ], ['grade' => $grade]);
        return [
            'wrong' => $wrong,
            'rights' => $rights,
            'grade' => $grade,
        ];
    }

    /**
     * 获取正确答案
     * @param EduVideo $video
     * @return array
     */
    protected function getQuestionRightAnswers(EduVideo $video)
    {
        $answers = [];
        foreach ($video['question'] as $q => $question) {
            foreach ($question['topics'] as $t => $topic) {
                if ($topic['right']) {
                    $answers[$q][$t] = true;
                }
            }
        }
        return $answers;
    }

    /**
     * 检测上一课
     * @param EduVideo $video
     * @return bool
     */
//    public function prevVideoLearned(EduVideo $video)
//    {
//        //上一课
//        $prevVideo = app(EduVideoRepository::class)->nextOrPrev($video, 'prev');
//        if ($prevVideo) {
//            $has = EduUserVideo::whereExists(function ($query) use ($video, $prevVideo) {
//                $query->from($video->getTable())
//                    ->whereRaw('edu_user_videos.video_id =? ', [$prevVideo['id']]);
//            })->first();
//            return (bool)$has;
//        }
//        return true;
//    }
}