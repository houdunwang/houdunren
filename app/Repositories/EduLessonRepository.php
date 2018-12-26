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
     * @param string|null $type 课程类型
     * @param int $row
     * @return mixed
     */
    public function lists(string $type = null, int $row = 12)
    {
        $query = $this->model->with('user')->latest('id')->where('video_num', '>', 0);
        return $query->where(function ($query) use ($type) {
            if (!is_null($type)) {
                $query->where('type', $type);
            }
        })->paginate($row);
//        return $query->paginate($row);
    }

    /**
     * 获取推荐课程
     * @param int $row
     * @return mixed
     */
    public function commend($row = 12)
    {
        return EduLesson::where('is_commend', 1)->with('user')->latest('id')->limit($row)->get();
    }

    /**
     * 获取系统课程
     * @return mixed
     */
    public function getSystem()
    {
        $where = [
            ['type', 'system'],
        ];
        return $this->model->with('user')->latest('updated_at')->where($where)->get();
    }

    public function getCommend($limit = 10)
    {
        return $this->model->where('is_commend', 1)->latest('updated_at')->where('video_num', '>',
            0)->limit($limit)->get();
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