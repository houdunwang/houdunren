<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018-12-06
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Servers;

use App\Models\Zan;
use App\Notifications\ZanNotification;
use App\Exceptions\InvalidParamException;

/**
 * 点赞服务
 * Class ZanServer
 * @package App\Servers
 */
class ZanServer
{
    /**
     * @return int
     * @throws InvalidParamException
     */
    public function make()
    {
        if (!$relationModel = model_instance()) {
            throw new InvalidParamException('参数错误');
        }
        $zan = model_instance()->zan()->where('user_id', auth()->id())->first();
        $zan ? $this->delete($zan) : $this->create();
        return (int)model_instance()->zan_num;
    }

    /**
     * 添加点赞
     * 软删除的点赞使用恢复处理
     */
    protected function create()
    {
        //软件删除的恢复，避免重复通知
        $zan = model_instance()->zan()->where('user_id', auth()->id())->withTrashed()->first();
        if ($zan) {
            //恢复软件删除
            $zan->restore();
        } else {
            $zan = model_instance()->zan()->create([
                'user_id' => auth()->id(),
                'title' => model_instance()->title(),
                'url' => model_instance()->link(),
            ]);
            //发送通知
            $zan->belongModel->user->notify(new ZanNotification($zan));
        }
        $this->changeModelZanNum($zan, 1);
    }

    /**
     * 删除点赞
     * @param $zan
     */
    protected function delete($zan)
    {
        $this->changeModelZanNum($zan, -1);
        $zan->delete();
    }

    /**
     * 更改文章点赞数
     * @param $zan
     * @param $num
     */
    protected function changeModelZanNum($zan, $num)
    {
        $model = $zan->belongModel()->getModel();
        \DB::table($model->getTable())->update(['zan_num' => (int)$model['zan_num'] + $num]);
    }
}