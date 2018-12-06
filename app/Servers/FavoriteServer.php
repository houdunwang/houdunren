<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018-12-06
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Servers;

/**
 * 内容收藏服务
 * Class FavoriteServer
 * @package App\Servers
 */
class FavoriteServer
{
    /**
     * 收藏或取消收藏
     * @return mixed
     */
    public function make()
    {
        if (!$relationModel = model_instance()) {
            throw new InvalidParamException('参数错误');
        }
//        $model = model_instance()->favorite();
//        $favorite = $model->where('user_id', auth()->id())->first();
//        if ($favorite) {
//            $this->changeFavoriteNum($favorite, -1);
//            return $favorite->delete();
//        } else {
//            $favorite = $model->create(['user_id' => auth()->id()]);
//            $this->changeFavoriteNum($favorite, 1);
//        }
        $favorite = model_instance()->favorite()->where('user_id', auth()->id())->first();
        $favorite ? $this->delete($favorite) : $this->create();
        return (int)model_instance()->favorite_num;
    }

    /**
     * 添加收藏
     * 软删除的收藏使用恢复处理
     */
    protected function create()
    {
        //软件删除的恢复，避免重复通知
        $favorite = model_instance()->favorite()->where('user_id', auth()->id())->withTrashed()->first();
        if ($favorite) {
            //恢复软件删除
            $favorite->restore();
        } else {
            $favorite = model_instance()->favorite()->create([
                'user_id' => auth()->id(),
                'title' => model_instance()->title(),
                'url' => model_instance()->link(),
            ]);
            //发送通知
            //$favorite->belongModel->user->notify(new ZanNotification($favorite));
        }
        $this->changeModelZanNum($favorite, 1);
    }

    /**
     * 删除收藏
     * @param $favorite
     */
    protected function delete($favorite)
    {
        $this->changeModelZanNum($favorite, -1);
        $favorite->delete();
    }

    /**
     * 更改收藏数
     * @param $favorite
     * @param $num
     */
    protected function changeModelZanNum($favorite, $num)
    {
        $model = $favorite->belongModel()->getModel();
        \DB::table($model->getTable())->update(['favorite_num' => (int)$model['favorite_num'] + $num]);
    }
}