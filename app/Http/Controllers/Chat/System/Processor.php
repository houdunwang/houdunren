<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDCMS framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\Chat\System;

use App\Models\ChatBase;
use App\Models\ChatRule;
use Houdunwang\WeChat\WeChat;

/**
 * .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------
 */
class Processor
{
    public function base(ChatRule $chatRule = null)
    {
        $content = ChatBase::where('chat_rule_id', $chatRule['id'])->value('content');

        return WeChat::instance('message')->text(array_random($content)['content']);
    }
}
