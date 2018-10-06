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
use App\Models\ChatDefault;
use App\Models\ChatKeyword;
use Houdunwang\WeChat\Build\Button\Button;
use Houdunwang\WeChat\Build\Message\Message;
use Houdunwang\WeChat\WeChat;

class HandleController extends Controller
{
    /**
     * 处理微信事件
     * @return bool|mixed
     */
    public function handle()
    {
        //微信绑定时验证使用
        WeChat::valid();

        //文本消息
        $instance = WeChat::instance('message');
        if ($instance->isTextMsg()) {
            return $this->text($instance->getMessage()->Content);
        }

        //按钮事件
        $instance = WeChat::instance('button');
        if ($instance->isClickEvent()) {
            return $this->text($instance->getMessage()->EventKey);
        }

        //关注消息
        $instance = new Message();
        if ($instance->isSubscribeEvent()) {
            return $instance->text(ChatDefault::where('id', 1)->value('welcome') ?? '感谢你的关注');
        }
    }

    /**
     * 处理关键词文本消息
     * @param string $keywordContent 关键词
     * @return bool|mixed
     */
    protected function text($keywordContent)
    {
        //关键词对象
        $keyword = ChatKeyword::where('content', $keywordContent)->first();
        if ($keyword) {
            $info = explode('@', $keyword->chatRule->action);
            return call_user_func_array([app($info[0]), $info[1]], [$keyword->chatRule]);
        }
        return (new Message())->text(ChatDefault::where('id', 1)->value('default_message') ?? '');
    }
}
