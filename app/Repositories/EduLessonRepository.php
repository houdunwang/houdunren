<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018/11/10
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\EduLesson;
use Illuminate\Database\Eloquent\Model;

/**
 * 课程
 * Class EduLessonRepository
 * @package App\Repositories
 */
class EduLessonRepository extends Repository implements RepositoryInterface
{
    protected $name = EduLesson::class;

    public function create(array $attributes)
    {
        $attributes['user_id'] = auth()->id();
        $lesson = $this->model->create($attributes);
        $lesson->tags()->sync(request()->input('tags'));
        return $lesson;
    }

    public function update(Model $model, array $attributes)
    {
        $model->tags()->sync(request()->input('tags'));
        return parent::update($model, $attributes);
    }


    /**
     * 课程列表
     * @return mixed
     */
    public function lists()
    {
        return $this->model->with('user')->latest()->where('video_num', '>', 0)->paginate(12);
    }

    public function delete(Model $lesson)
    {
        //删除视频
        $lesson->video()->withTrashed()->forceDelete();
        return $lesson->delete();
    }

}