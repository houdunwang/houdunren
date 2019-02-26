<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2019-02-23
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Servers;

use Illuminate\Validation\Rule;

/**
 * 微信处理服务
 * Class WeChatServer
 * @package App\Servers
 */
class WeChatServer
{
    /**
     * 保存关键词数据
     * @param $model
     * @return bool
     * @throws \Exception
     */
    public function save($model)
    {
        \DB::beginTransaction();
        $data = request()->input();
        $data['site_id'] = site()['id'];
        $data['module_id'] = module()['id'];
        $model = $model->firstOrCreate(['id' => $model['id']], $data);
        $model->save($data);
        $this->validate($model);
        $model->keyword()->updateOrCreate(['id' => $model->keyword['id']], request()->input('keyword'));
        \DB::commit();
        return true;
    }

    protected function validate($model)
    {
        $keyword = request()->input('keyword');
        //添加关键词
        \Validator::make($keyword, [
            'key' => [
                'required',
                'unique:keywords,key,'.$model['keyword']['id']??null
            ],
        ], ['key.required' => '关键词不能为空', 'key.unique' => '关键词已经在公众号中被使用'])->validate();
    }
}