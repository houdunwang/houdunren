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
    public function create(array $qr)
    {

        $url = $this->api . "/qrcode/create?access_token=" . $this->token();
        switch ($qr['type']) {
            case 'QR_SCENE':
                $actionName =  $qr['scene_type'] == 'scene_id' ? 'QR_SCENE' : 'QR_STR_SCENE';
                $data = [
                    "action_name" => $actionName,
                    "expire_seconds" => $qr['expire_seconds'],
                    "action_info" => ["scene" => [$qr['scene_type'] => $qr['scene_value']]]
                ];
                break;
            case 'QR_LIMIT_SCENE':
                $actionName =  $qr['scene_type'] == 'scene_id' ? 'QR_LIMIT_SCENE' : 'QR_LIMIT_STR_SCENE';
                $data = [
                    "action_name" => $actionName,
                    "action_info" => ["scene" => [$qr['scene_type'] => $qr['scene_value']]]
                ];
                break;
        }

        $response = Http::send('POST', $url, ['body' => json_encode($data, JSON_UNESCAPED_UNICODE)])->throw()->json();
        return $this->return($response);
    }
}
