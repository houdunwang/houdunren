<?php

namespace Houdunwang\WeChat\Material\Traits;

use Exception;
use Http;

/**
 * 修改永久图文素材
 */
trait Edit
{
    /**
     * 修改永久图文消息
     * @param array $article 文章数据
     * @return mixed
     */
    public function editNews(array $article)
    {
        $api = $this->api . "/material/update_news?access_token=" . $this->token();
        $response = Http::post($api, $article)->json();
        return $this->return($response);
    }
}
