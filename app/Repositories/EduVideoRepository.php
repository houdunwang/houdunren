<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018/11/16
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;


use App\Models\EduLesson;
use App\Models\EduVideo;

class EduVideoRepository extends Repository implements RepositoryInterface
{
    protected $name = EduVideo::class;

    /**
     * 添加多个视频
     * @param EduLesson $lesson
     * @param array $videos
     * @return bool
     */
    public function createManyVideo(EduLesson $lesson, array $videos)
    {
        $lesson->video()->createMany($videos);
        $lesson['video_num'] = $lesson->video()->count();
        $lesson->save();
        return true;
    }

    /**
     * 更新多条课程视频
     * @param EduLesson $lesson
     * @param array $videos
     * @return bool
     */
    public function updateManyVideo(EduLesson $lesson, array $videos)
    {
        //软删除后添加视频
        $lesson->video()->delete();
        foreach ($videos as $rank => $video) {
            $video['rank'] = $rank;
            $lesson->video()->withTrashed()->updateOrCreate(['id' => $video['id'] ?? 0], $video)->restore();
        }
        //清除软件删除数据
        $lesson->video()->onlyTrashed()->forceDelete();
        $lesson['video_num'] = $lesson->video()->count();
        return $lesson->save();
    }

    /**
     * 上一课/下一课
     * @param EduVideo $video 视频
     * @param string $type prev or next
     * @return mixed
     */
    public function nextOrPrev(EduVideo $video, $type = 'prev')
    {
        $videos = $this->videos($video->lesson);
        $videos = $type=='next'?$videos->reverse():$videos;
        $filters = collect();
        foreach ($videos as $v){
            if($v['id']==$video['id']){
                break;
            }
            $filters->push($v);
        }
        return $filters->last();
    }

    /**
     * 获取课程视频列表
     * @param EduLesson $lesson
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function videos(EduLesson $lesson)
    {
        return $lesson->video()->orderBy('rank')->orderBy('id')->get();
    }
}