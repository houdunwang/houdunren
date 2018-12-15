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

use App\User;
use Spatie\Activitylog\Models\Activity;

/**
 * 网站动态仓库
 * Class ActivityRepository
 * @package App\Repositories
 */
class ActivityRepository extends Repository implements RepositoryInterface
{
    protected $name = Activity::class;

    public function paginate($row = 10, array $columns = ['*'], $latest = null)
    {
        return $this->model
            ->with(['causer', 'subject'])
            ->where('description', '<>', 'deleted')
            ->latest($latest)->paginate($row, $columns);
    }

    /**
     * 用户动态
     * @param User $user
     * @param $row
     * @return mixed
     */
    public function userPaginateList(User $user, $row = 10)
    {
        return $this->model->with(['causer', 'subject'])
            ->where('causer_id', $user['id'])
            ->latest('id')->paginate($row);
    }
}