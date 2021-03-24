<?php

namespace App\WeChat;

use App\Http\Controllers\Controller;
use App\Http\Resources\WeChatUserResource;
use App\Models\WeChat;
use App\Models\WeChatUser;
use Houdunwang\WeChat\User as UserPackage;
use App\Models\Site;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Database\Eloquent\InvalidCastException;
use InvalidArgumentException;
use LogicException;
use WeChatService;
use Illuminate\Http\Request;

/**
 * 微信粉丝
 * @package App\Http\Controllers\WeChat
 */
class WeChatUserController extends Controller
{
    public function __construct()
    {
    }

    /**
     * 粉丝列表
     * @param Site $site
     * @param WeChat $wechat
     * @return mixed
     */
    public function index(Request $request, Site $site, WeChat $wechat)
    {
        $users = $wechat->users()->latest('id')->when($request->keyword, function ($query, $keyword) {
            return $query->where('nickname', 'like', "%$keyword%");
        })->where('black', request('black', false))->paginate(10);
        return WeChatUserResource::collection($users);
    }

    /**
     * 设置备份名称
     * @param Site $site
     * @param WeChat $wechat
     * @param WeChatUser $user
     * @param UserPackage $userPackage
     * @return void
     * @throws InvalidCastException
     * @throws LogicException
     * @throws InvalidArgumentException
     * @throws BindingResolutionException
     */
    public function remark(Request $request, Site $site, WeChat $wechat, WeChatUser $user, UserPackage $userPackage)
    {
        $userPackage->init($wechat)->setRemark($request->input());
        $user['remark'] = $request->remark;
        $user->save();
        return $this->message('备注名称设置成功');
    }

    /**
     * 同步粉丝数据
     * @param Site $site
     * @param WeChat $wechat
     * @param UserPackage $userPackage
     * @return void
     * @throws AuthorizationException
     * @throws BindingResolutionException
     * @throws RequestException
     * @throws InvalidCastException
     * @throws LogicException
     */
    public function sync(Site $site, WeChat $wechat, UserPackage $userPackage)
    {
        //获取粉丝
        $response = $userPackage->init($wechat)->getList(request('next_openid'));
        if (isset($response['data'])) {
            //获取粉丝资料
            $users = $userPackage->getByOpenids($response['data']['openid'])['user_info_list'];
            //同步到数据库
            foreach ($users as $user) {
                WeChatService::saveUser($user + ['wechat_id' => $wechat['id']]);
            }
        }
        return $this->message(
            $response['next_openid'] ? '准备同步下一批粉丝...' : '粉丝同步完毕',
            ['next_openid' => $response['next_openid']]
        );
    }

    /**
     * 拉黑用户
     * @param Request $request
     * @param Site $site
     * @param WeChat $wechat
     * @param WeChatUser $user
     * @param UserPackage $userPackage
     * @return void
     * @throws InvalidCastException
     * @throws LogicException
     * @throws InvalidArgumentException
     * @throws BindingResolutionException
     */
    public function black(Request $request, Site $site, WeChat $wechat, WeChatUser $user, UserPackage $userPackage)
    {
        $userPackage->init($wechat)->batchblack([$user->openid]);
        $user['black'] = true;
        $user->save();
        return $this->message('用户已被接入黑名单');
    }

    /**
     * 移除黑名单
     * @param Request $request
     * @param Site $site
     * @param WeChat $wechat
     * @param WeChatUser $user
     * @param UserPackage $userPackage
     * @return void
     * @throws InvalidCastException
     * @throws LogicException
     * @throws InvalidArgumentException
     * @throws BindingResolutionException
     */
    public function removeBlack(Request $request, Site $site, WeChat $wechat, WeChatUser $user, UserPackage $userPackage)
    {
        $userPackage->init($wechat)->removeBlackList([$user->openid]);
        $user['black'] = false;
        $user->save();
        return $this->message('移除黑名单成功');
    }

    /**
     * 同步黑名单
     * @param Site $site
     * @param WeChat $wechat
     * @param UserPackage $userPackage
     * @return void
     * @throws AuthorizationException
     * @throws BindingResolutionException
     * @throws RequestException
     * @throws InvalidCastException
     * @throws LogicException
     */
    public function syncBlack(Site $site, WeChat $wechat, UserPackage $userPackage)
    {
        //获取粉丝
        $response = $userPackage->init($wechat)->getBlackList(request('next_openid'));
        $openids = $response['data']['openid'] ?? [];
        foreach ($openids as $openid) {
            $user = $wechat->users()->where('openid', $openid)->first();
            $user->black = true;
            $user->save();
        }
        $hasNext = $response['next_openid'] && $response['next_openid'] != request('next_openid');
        return $this->message(
            $hasNext ? '准备同步下一批黑名单...' : '黑名单同步完毕',
            ['next_openid' => $hasNext ? $response['next_openid'] : '']
        );
    }
}
