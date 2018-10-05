<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDCMS framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\ChatKeyword;
use Houdunwang\WeChat\WeChat;

class HandleController extends Controller
{
    public function __construct()
    {
        WeChat::valid();
    }

    public function handle()
    {
        $instance = WeChat::instance('message');
        if ($instance->isTextMsg()) {
            //关键词对象
            $keyword = ChatKeyword::where('content', $instance->getMessage()->Content)->first();
            if ($keyword) {
                $info = explode('@', $keyword->chatRule->action);
                return call_user_func_array([app($info[0]), $info[1]], [$keyword->chatRule]);
            }
        }
    }
}
