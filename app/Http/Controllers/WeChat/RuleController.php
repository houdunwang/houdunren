<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Controller;
use App\Models\WeChat;
use App\Models\WeChatKeyword;
use App\Models\WeChatRule;
use App\Services\WeChatService;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function show(WeChatRule $rule)
    {
        return [
            'rule' => $rule,
            'keywords' => $rule->keywords
        ];
    }

    public function wechat()
    {
        $wechats = WeChat::site()->get();
        return $wechats;
    }

    public function destroy(WeChatRule $rule)
    {
        $rule->delete();
        return response()->json(['message' => '微信回复删除成功']);
    }

    public function checkKeyword(Request $request, WeChatService $weChatService)
    {
        return response()->json([
            'has' => $weChatService->keywordIsExists($request->keyword)
        ]);
    }
}
