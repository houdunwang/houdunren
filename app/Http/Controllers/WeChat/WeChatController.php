<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Auth\Controller;
use App\Http\Requests\WeChatRequest;
use App\Models\Site;
use App\Models\WeChat;
use Exception;
use Houdunwang\WeChat\Message;
use Illuminate\Http\Request;

/**
 * 站点微信公众号
 */
class WeChatController extends Controller
{
    public function index(Request $request, Site $site)
    {
        $wechats = WeChat::where('site_id', $site->id)->get();

        if ($request->expectsJson()) {
            return $wechats;
        }
        return inertia('Wechat/Wechat/Index', compact('site', 'wechats'));
    }

    /**
     * 添加公众号
     *
     * @param Site $site
     * @param WeChat $wechat
     * @return void
     */
    public function create(Site $site)
    {
        return inertia('Wechat/Wechat/Form', compact('site'));
    }

    /**
     * 保存公众号
     *
     * @param WeChatRequest $request
     * @param Site $site
     * @param WeChat $weChat
     * @param Message $message
     * @return void
     */
    public function store(WeChatRequest $request, Site $site, WeChat $weChat, Message $message)
    {
        try {
            //连接微信服务器验证TOKEN是否正确
            $message->config($request->all())->token();
            $weChat->site_id = $site->id;
            $weChat->fill($request->all())->save();
            return redirect()
                ->route('wechat.site.wechat.index', $site)
                ->with('success', '公众号添加成功');
        } catch (Exception $e) {
            return back()
                ->with('message', 'appid或appsecret配置错误,' . $e->getMessage());
        }
    }

    /**
     * 编辑套餐
     * @param WeChat $wechat
     * @return void
     */
    public function edit(WeChat $wechat)
    {
        $site = $wechat->site;
        return inertia('Wechat/Wechat/Form', compact('wechat', 'site'));
    }

    /**
     * 更新公众号
     *
     * @param WeChatRequest $request
     * @param WeChat $wechat
     * @return void
     */
    public function update(WeChatRequest $request,  WeChat $wechat)
    {
        $wechat->fill($request->all())->save();
        return redirect()
            ->route('wechat.site.wechat.index', $wechat->site)
            ->with('success', '公众号修改成功');
    }

    /**
     * 删除成功
     *
     * @param WeChat $wechat
     * @return void
     */
    public function destroy(WeChat $wechat)
    {
        $wechat->delete();

        return back()->with('success', '公众号删除成功');
    }
}
