<?php

namespace Houdunwang\WeChat\Qr;

use Http;
use Illuminate\Http\Client\RequestException;

/**
 * 创建二维码
 */
trait Create
{
    /**
     * 创建二维码
     * @param string $action
     * @param array $scene 场景值，可以使用字符串或数值
     * @return mixed
     * @throws RequestException
     */
    public function create(string $action, array $scene, int $expireSeconds = 3600)
    {
        $url = $this->api . "/qrcode/create?access_token=" . $this->token();
        $data = [
            "action_name" => $action,
            "expire_seconds" => $expireSeconds,
            "action_info" => [
                "scene" => $scene
            ]
        ];
        $response = Http::send('POST', $url, ['body' => json_encode($data, JSON_UNESCAPED_UNICODE)])->throw()->json();
        return $this->return($response);
    }
}
