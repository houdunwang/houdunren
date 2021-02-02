<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Models\WeChat;
use Houdunwang\WeChat\User as UserPackage;
use Illuminate\Http\Request;
use App\Models\User as ModelsUser;
use Illuminate\Http\JsonResponse;
use WeChatService;
use App\Models\Site;
use Cache;

/**
 * 微信粉丝
 * @package App\Http\Controllers\WeChat
 */
class WeChatUserController extends Controller
{
    /**
     * 同步粉丝数据
     *
     * @param Request $request
     * @param WeChat $wechat
     * @param UserPackage $userPackage
     * @return void
     */
    public function sync(Request $request, Site $site, WeChat $wechat, UserPackage $userPackage)
    {

        //获取用户列表。openid为上次获取的最后一个粉丝openid
        $response = $userPackage->config($wechat)->getList(Cache::get('next_openid'));
        if ($response['next_openid']) {
            Cache::put('next_openid', $response['next_openid'], 600);
        } else {
            Cache::forget('next_openid');
        }
        if (isset($response['data'])) {
            //获取粉丝资料
            $users = $userPackage->getByOpenids($response['data']['openid'])['user_info_list'];
            //同步到数据库
            WeChatService::batchSaveUsers(array_map(function ($v) use ($wechat) {
                $v['wechat_id'] = $wechat['id'];
                $v['site_id'] = $wechat->site->id;
                return $v;
            }, $users));
        }


        $next_openid = Cache::get('next_openid');
        return $this->message($next_openid ? '准备同步下一批粉丝...' : '粉丝同步完毕', ['next_openid' => $next_openid]);
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
