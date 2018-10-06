<?php namespace App\Servers;

use App\Models\ChatKeyword;
use App\Models\ChatRule;

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
class ChatServer
{
    public function saveRule(string $module, string $action, ChatRule $chatRule = null): ChatRule
    {
        $chatRule = $chatRule ?? ChatRule::create(['module' => $module, 'action' => $action]);
        $keywords = json_decode(\Request::get('keywords'), true);

        //删除原关键词后添加，不允许重复添加关键词
        $chatRule->chatKeyword()->delete();
        foreach ((array)$keywords as $keyword) {
            if (!empty($keyword['content']) && !$this->hasKeywords($keyword)) {
                ChatKeyword::firstOrNew(['id' => $keyword['id'] ?? null])->chatRule()->associate($chatRule)->fill($keyword)->save();
            }
        }
        return $chatRule;
    }

    public function hasKeywords($keyword)
    {
        return ChatKeyword::where([
            ['content', $keyword['content']],
            ['id', '<>', $keyword['id'] ?? null],
        ])->first();
    }

    public function view($chatRule = null)
    {
        return view('chat.layouts._keywords', compact('chatRule'));
    }
}
