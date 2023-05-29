<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Houdunwang\Wechat\Button;
use App\Http\Requests\StoreWechatMenuRequest;
use Log;

class WechatMenuController extends Controller
{
    protected $button;

    public function __construct()
    {
        $this->middleware('auth:sanctum')->only(['store']);
        $this->button = app(Button::class)->config(config('hd.wechat'));
    }


    public function store(StoreWechatMenuRequest $request)
    {
        if (!isAdministrator()) return $this->respondError('没有操作权限');
        $this->button->create([
            "button" => [
                "type" => "view",
                "name" => "在线学习",
                "url" => url('/', [], true)
            ]
        ]);

        return $this->respondOk('菜单创建成功');
    }
}
