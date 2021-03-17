<?php

namespace Houdunwang\WeChat\Material\Traits;

use Http;

/**
 * 删除素材
 */
trait Delete
{
    /**
     * 删除素材
     * @param string $media_id 素材编号
     * @return mixed
     */
    public function del(string $media_id)
    {
        $api = $this->api . '/material/del_material?access_token=' . $this->token();
        $response = Http::post($api, ['media_id' => $media_id,]);
        return $this->return($response);
    }
}
