<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Houdunwang\Wechat\Button;
use App\Http\Requests\StoreWechatMenuRequest;

class WechatMenuController extends Controller
{
    protected $button;

    public function __construct()
    {
        $this->button = app(Button::class)->config(config('hd.wechat'));
    }


    public function store(StoreWechatMenuRequest $request)
    {
        if (!isAdministrator()) return $this->respondError('没有操作权限');
        $this->button->create([
            "button" => [
                "type" => "view",
                "name" => "在线学习",
                "url" => url('/')
            ]
        ]);

        return $this->respondOk('菜单创建成功');
    }
}
