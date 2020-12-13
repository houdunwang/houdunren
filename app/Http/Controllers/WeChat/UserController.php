<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Controller;
use App\Models\WeChat;
use Houdunwang\WeChat\User;
use App\Services\WeChatService;
use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\User as ModelsUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Client\RequestException;

/**
 * 微信粉丝
 * @package App\Http\Controllers\WeChat
 */
class UserController extends Controller
{

    /**
     * 同步粉丝数据
     * @param Request $request
     * @param Site $site
     * @param WeChat $wechat
     * @param string $openid
     * @param User $userPackage
     * @param WeChatService $weChatService
     * @return JsonResponse
     * @throws BindingResolutionException
     * @throws RequestException
     */
    public function sync(Request $request, Site $site, WeChat $wechat, string $openid, User $userPackage, WeChatService $weChatService)
    {
        $response = $userPackage->config($wechat)->getList($openid ?? null);
        session(['next_openid' => $response['next_openid']]);
        if (!isset($response['data'])) {
            return response()->json(['state' => 1]);
        }
        $users = $userPackage->getByOpenids($response['data']['openid'])['user_info_list'];

        $weChatService->batchSaveUsers(array_map(function ($v) use ($wechat) {
            $v['wechat_id'] = $wechat['id'];
            return $v;
        }, $users));

        return response()->json(array_filter($response, function ($k) {
            return $k != 'data';
        }, ARRAY_FILTER_USE_KEY) + ['state' => 0]);
    }

    /**
     * 粉丝搜索
     * @param Request $request
     * @param WeChat $wechat
     * @return mixed
     */
    public function search(Request $request, WeChat $wechat)
    {
        $users = ModelsUser::whereHas('wechatUser', function ($query) use ($wechat) {
            $query->where('site_id', site()['id'])->where('wechat_id', $wechat['id']);
        })
            ->with('wechatUser')
            ->limit(10)
            ->get();

        return $users;
    }
}
