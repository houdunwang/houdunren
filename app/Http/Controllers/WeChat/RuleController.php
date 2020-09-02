<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Controller;
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

    public function checkKeyword(Request $request, WeChatService $weChatService)
    {
        return response()->json([
            'has' => $weChatService->keywordIsExists($request->keyword)
        ]);
    }
}
