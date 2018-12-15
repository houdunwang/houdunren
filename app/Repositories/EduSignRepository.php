<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018-12-10
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\EduSign;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;

/**
 * 签到
 * Class EduSignRepository
 * @package App\Repositories
 */
class EduSignRepository extends Repository implements RepositoryInterface
{
    protected $name = EduSign::class;

    /**
     * 用户今日签到信息
     * @param User $user
     * @return mixed
     */
    public function todaySign(User $user)
    {
        return $this->model->where('user_id', $user['id'])->whereDay('created_at', date('d'))->first();
    }

    /**
     * 新增用户签到信息
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        //签到检测
        if (!$this->todaySign(auth()->user())) {
            $attributes['user_id'] = auth()->id();
            parent::create($attributes);
            return app(EduSignTotalRepository::class)->log();
        }
    }

    /**
     * 获取签到数据
     * @param int $row
     * @param array $columns
     * @param null $latest
     * @return mixed
     */
    public function paginate($row = 10, array $columns = ['*'], $latest = null)
    {
        return $this->model->orderBy('created_at', 'ASC')->whereDay('created_at', date('d'))->paginate($row, $columns);
    }

    public function delete(Model $model)
    {
        //删除动态
        $where = [
            ['subject_id', $model['id']],
            ['subject_type', EduSign::class],
            ['causer_id', $model['user_id']],
        ];
        Activity::where($where)->delete();
        return parent::delete($model);
    }

}