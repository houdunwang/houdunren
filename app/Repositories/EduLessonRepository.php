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
     * @param int $row
     * @return mixed
     */
    public function lists(int $row = 12)
    {
        return $this->model->with('user')->latest('updated_at')->where('video_num', '>', 0)->paginate($row);
    }

    public function getCommend($limit = 10)
    {
        return $this->model->where('is_commend', 1)->latest('updated_at')->where('video_num', '>', 0)->limit($limit)->get();
    }

    /**
     * 删除课程
     * @param Model $lesson
     * @return bool|null
     * @throws \Exception
     */
    public function delete(Model $lesson)
    {
        //删除视频
        $lesson->video()->withTrashed()->forceDelete();
        return $lesson->delete();
    }

}