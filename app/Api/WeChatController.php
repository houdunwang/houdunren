<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeChatRequest;
use Houdunwang\WeChat\Message;
use Illuminate\Http\Request;
use App\Models\WeChat;
use App\Models\Site;
use Exception;

/**
 * 站点微信公众号
 * @package App\Api
 */
class WeChatController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index(Request $request, Site $site)
    {
        return $site->wechats;
    }

    public function show(Request $request, Site $site, WeChat $wechat)
    {
        return $wechat;
    }

    /**
     * 保存公众号
     *
     * @param WeChatRequest $request
     * @param Site $site
     * @param WeChat $wechat
     * @param Message $message
     * @return void
     */
    public function store(WeChatRequest $request, Site $site, WeChat $wechat, Message $message)
    {
        try {
            //连接微信服务器验证TOKEN是否正确
            $message->config($request->all())->token();
            $wechat->site_id = $site->id;
            $wechat->fill($request->all())->save();
            return $this->message('公众号添加成功');
        } catch (Exception $e) {
            return $this->error('appid或appsecret配置错误', 403);
        }
    }

    /**
     * 更新公众号
     *
     * @param WeChatRequest $request
     * @param WeChat $wechat
     * @return void
     */
    public function update(WeChatRequest $request, Site $site, WeChat $wechat)
    {
        $wechat->fill($request->all())->save();
        return $this->message('公众号修改成功');
    }

    /**
     * 删除公众号
     *
     * @param Site $site
     * @param WeChat $wechat
     * @return void
     */
    public function destroy(Site $site, WeChat $wechat)
    {
        $wechat->delete();
        return $this->message('公众号删除成功');
    }
}
