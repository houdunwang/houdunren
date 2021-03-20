<?php

namespace App\WeChat;

use App\Http\Controllers\Controller;
use App\Models\WeChatQr;
use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\WeChat;
use App\Http\Resources\WeChatQrResource;
use Houdunwang\WeChat\Qr;

/**
 * 微信二维码
 * @package App\WeChat
 */
class WeChatQrController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(WeChatQr::class, 'qr');
    }

    public function index(Site $site, WeChat $wechat)
    {
        $qrs = $wechat->qrs()->paginate(15);
        return WeChatQrResource::collection($qrs);
    }

    public function store(Request $request, Site $site, WeChat $wechat, WeChatQr $qr)
    {
        $content = app(Qr::class)->init($wechat)->create($request->type, $request->scene_type, $request->scene_value, $request->expire_seconds);
        $qr->fill($request->input() + ['content' => $content, 'wechat_id' => $wechat->id])->save();
        return $this->message('二维码添加成功', $qr);
    }

    public function show(Site $site, WeChat $wechat, WeChatQr $qr)
    {
        return new WeChatQrResource($qr);
    }

    public function destroy(Site $site, WeChat $wechat, WeChatQr $qr)
    {
        $qr->delete();
        return $this->message('二维码删除成功');
    }
}
