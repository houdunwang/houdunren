<?php

namespace App\WeChat;

use App\Http\Controllers\Controller;
use App\Models\WeChatQr;
use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\WeChat;
use App\Http\Resources\WeChatQrResource;
use Houdunwang\WeChat\Qr;
use App\Http\Requests\WeChatQrRequest;

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
        $qrs = $wechat->qrs()->latest()->paginate(10);
        return WeChatQrResource::collection($qrs);
    }

    public function store(WeChatQrRequest $request, Site $site, WeChat $wechat, WeChatQr $qr)
    {
        $response = app(Qr::class)->init($wechat)->create($request->input());
        $qr->fill($request->input() + ['response' => $response, 'wechat_id' => $wechat->id, 'module_id' => request('module')])->save();
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
