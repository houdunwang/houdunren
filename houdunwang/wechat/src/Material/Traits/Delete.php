<?php

namespace Houdunwang\WeChat\Material\Traits;

use Http;

trait Delete
{
    public function del(string $media_id)
    {
        $api = $this->api . '/material/del_material?access_token=' . $this->token();

        $response = Http::post($api, [
            'media_id' => $media_id,
        ]);

        return $this->return($response);
    }
}
