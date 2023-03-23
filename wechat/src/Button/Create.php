<?php

namespace Houdunwang\Wechat\Button;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;
use Log;

trait Create
{
    /**
     * 推送微信菜单
     * @param mixed $button
     * @return true
     * @throws RequestException
     * @throws Exception
     */
    public function create($button)
    {
        $url = $this->api . '/menu/create?access_token=' . $this->token();
        $response = Http::send('POST', $url, ['body' => json_encode($button, JSON_UNESCAPED_UNICODE)])
            ->throw()
            ->json();

        if ($response['errmsg'] != 'ok') {
            throw new Exception($response['errmsg']);
        }
        return true;
    }
}
