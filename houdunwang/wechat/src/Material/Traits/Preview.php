<?php

namespace Houdunwang\WeChat\Material\Traits;

use Http;

trait Preview
{
    public function sendMaterialPreview(array $data)
    {
        $api = $this->api . '/message/mass/preview?access_token=' . $this->token();
        $response = Http::post($api, $data)
            ->throw()
            ->json();
        return $this->return($response);
    }

    public function imageMaterialPreview(string $openid, string $mediaId)
    {
        $data = [
            'touser' => $openid,
            'image' => [
                'media_id' => $mediaId,
            ],
            'msgtype' => 'image',
        ];
        return $this->sendMaterialPreview($data);
    }

    public function voiceMaterialPreview(string $openid, string $mediaId)
    {
        $data = [
            'touser' => $openid,
            'voice' => [
                'media_id' => $mediaId,
            ],
            'msgtype' => 'voice',
        ];
        return $this->sendMaterialPreview($data);
    }

    public function newsMaterialPreview(string $openid, string $mediaId)
    {
        $data = [
            'touser' => $openid,
            'mpnews' => [
                'media_id' => $mediaId,
            ],
            'msgtype' => 'mpnews',
        ];
        return $this->sendMaterialPreview($data);
    }
}
