<?php

namespace Houdunwang\Wechat\Qrcode;

use Illuminate\Support\Facades\Http;
use Log;

trait Create
{
    //生成二维码信息
    public function getQrTicket($data = [])
    {
        $api = $this->api . '/qrcode/create?access_token=' . $this->token();
        $response = Http::post($api, $data)->throw()->json();
        return $this->return($response);
    }

    //根据Ticket获取二维码图片
    public function getQrImageByTicket($ticket)
    {
        $api = 'https://mp.weixin.qq.com/showqrcode?ticket=' . $ticket;
        $response = Http::get($api)->throw();

        return $this->return($response);
    }

    //生成二维码图片
    public function getQrImage($data = [])
    {
        $info = $this->getQrTicket($data);
        return [
            'info' => $info,
            'image' => base64_encode($this->getQrImageByTicket($info['ticket']))
        ];
    }
}
