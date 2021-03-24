<?php

namespace Houdunwang\WeChat\User;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * 获取粉丝资料
 */
trait Remark
{
    /**
     * 设置备注名称
     * @param array $data
     * @return mixed
     * @throws RequestException
     */
    public function setRemark(array $data)
    {
        $response = Http::post($this->api . '/user/info/updateremark?access_token=' . $this->token(), $data)->throw()->json();
        return $this->return($response);
    }
}
