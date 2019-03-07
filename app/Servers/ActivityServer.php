<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Servers;

use App\Exceptions\ResponseHttpException;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;

/**
 * 动态服务
 * Class ActivityServer
 * @package App\Servers
 */
class ActivityServer
{
    /**
     * 记录日志
     * @param Model $model 模型实例
     * @param array $attributes 自定义储存属性
     * @param string $log 日志名称
     * @return mixed
     * @throws ResponseHttpException
     */
    public function record(Model $model, array $attributes = [], string $log = '')
    {
        try {
            return activity()->performedOn($model)->withProperties($attributes)
                ->tap(function (Activity $activity) {
                    $activity->site_id = \site()['id'];
                    $activity->module_id = \module()['id'];
                    $activity->module = \module()['name'];
                })->log($log);
        } catch (\Exception $exception) {
            throw new ResponseHttpException($exception->getMessage());
        }
    }

    /**
     * 获取所有动态
     * @return mixed
     */
    public function query()
    {
        return Activity::causedBy($user)->where('site_id', \site()['id']);
    }

    /**
     * 获取指定用户的动态
     * @param User $user 用户
     * @param string|null $module 模块标识
     * @return mixed
     */
    public function getByUser(User $user, string $module = null)
    {
        $query = Activity::causedBy($user)->where('site_id', \site()['id']);
        if ($module) {
            $query->where('module', $module);
        }
        return $query;
    }

    /**
     * 获取指定模块的动态
     * @param string|array ...$module
     * @return mixed
     */
    public function getByModule(...$module)
    {
        if (is_array($module[0])) {
            $module = $module[0];
        }
        return Activity::where('site_id', \site()['id'])->whereIn('module', $module);
    }
}