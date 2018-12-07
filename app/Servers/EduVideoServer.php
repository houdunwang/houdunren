<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018-12-07
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Servers;


use App\Models\EduVideo;
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
     * @param EduVideo $video
     * @return array
     */
    public function log(EduVideo $video)
    {
        return $video->userVideo()->withTimestamps()->sync([auth()->id()]);
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
        return [
            'wrong' => count($video['question']) - count($rights),
            'rights' => $rights,
            'grade' => round(count($rights) / count($video['question']) * 100),
        ];
    }

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
}