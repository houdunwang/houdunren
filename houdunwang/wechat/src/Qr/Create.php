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
     * @param string $type 类型
     * @param array $scene 场景值，可以使用字符串或数值
     * @return mixed
     * @throws RequestException
     */
    public function create(string $type, string $sceneType, string $sceneValue, int $expireSeconds = 3600)
    {
        $url = $this->api . "/qrcode/create?access_token=" . $this->token();
        $data = [
            "action_name" => $type,
            "expire_seconds" => $expireSeconds,
            "action_info" => [
                "scene" => [
                    "scene_{$sceneType}" => $sceneValue
                ]
            ]
        ];
        $response = Http::send('POST', $url, ['body' => json_encode($data, JSON_UNESCAPED_UNICODE)])->throw()->json();
        return $this->return($response);
    }
}
