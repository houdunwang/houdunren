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
        $model = model_instance()->favorite();
        $favorite = $model->where('user_id', auth()->id())->first();
        if ($favorite) {
            $this->changeFavoriteNum($favorite, -1);
            return $favorite->delete();
        } else {
            $favorite = $model->create(['user_id' => auth()->id()]);
            $this->changeFavoriteNum($favorite, 1);
        }
    }

    protected function changeFavoriteNum($favorite, $num)
    {
        $model = $favorite->belongModel()->getModel();
        \DB::table($model->getTable())->update(['favorite_num' => (int)$model['favorite_num'] + $num]);
    }
}