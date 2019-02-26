<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Keyword;
use App\Models\Site;
use App\Models\Chat;
use Houdunwang\WeChat\Build\Message\Message;

class ChatController extends Controller
{
    /**
     * 初始环境
     * @param Site $site
     * @param Chat $chat
     */
    protected function init(Site $site, Chat $chat)
    {
        \site($site);
        (new Message())->config($chat)->valid();
    }

    /**
     * 被动消息处理
     * @param Site $site
     * @param Chat $chat
     * @param Keyword $keyModel
     * @param Message $message
     * @return string
     */
    public function processor(Site $site, Chat $chat, Keyword $keyModel, Message $message)
    {
        $this->init($site, $chat);
        if ($message->isTextMsg()) {
            if ($message->Content == 'hdcms') {
                return $message->text('恭喜~ 微信公众号配置成功');
            }
            $keyword = $keyModel->key($message->Content)->first();
            $response = $keyword['system'] ? $this->system($keyword) : $this->module($keyword);
            if (empty($response)) {
                return $message->text($chat['default'] ?? '');
            }
        }
    }

    protected function system(Keyword $keyword): ?string
    {

    }

    protected function module(Keyword $keyword): ?string
    {

    }
}
