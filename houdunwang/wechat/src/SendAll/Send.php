<?php

namespace Houdunwang\WeChat\SendAll;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Log;

/**
 * 群发消息
 */
trait Send
{

    /**
     * 预览消息
     * @param array $data
     * @return mixed
     * @throws RequestException
     */
    public function preview(array $data)
    {
        $url = $this->api . '/message/mass/preview?access_token=' . $this->token();
        $response = Http::post($url, ["body" => $data])->throw()->json();
        return $this->return($response);
    }

    /**
     * 群发消息
     * @param array $data
     * @return mixed
     * @throws RequestException
     */
    public function sendAll(array $data)
    {
        $url = $this->api . '/message/mass/sendall?access_token=' . $this->token();
        $response = Http::post($url, ["body" => $data])->throw()->json();
        return $this->return($response);
    }
}
