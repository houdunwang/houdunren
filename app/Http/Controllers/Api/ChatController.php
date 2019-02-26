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
     * @param Message $message
     * @return string|null
     */
    public function processor(Site $site, Chat $chat, Message $message)
    {
        $this->init($site, $chat);
        //文本消息
        if ($response = $this->textProcessor($site, $chat, $message)) {
            return $response;
        }

        //默认回复
        if ($message->isTextMsg() && isset($chat['default'])) {
            return $message->text($chat['default']);
        }
        //关注回复
        if ($message->isSubscribeEvent()) {
            //向用户回复消息
            return $message->text("感谢你关注后盾网微信");
        }
    }

    /**
     * 文本消息处理
     * @param Site $site
     * @param Chat $chat
     * @param Message $message
     * @return string|null
     */
    protected function textProcessor(Site $site, Chat $chat, Message $message): ?string
    {
        if ($message->isTextMsg()) {
            if ($message->Content == 'hdcms') {
                return $message->text('恭喜~ 微信公众号配置成功');
            }
            $keyword = Keyword::where('key', $message->Content)->first();
            if ($keyword) {
                return $keyword['system'] ?
                    call_user_func_array([$this, $keyword['tag']], [$site, $chat, $message, $keyword])
                    : $this->moduleProcessor($site, $chat, $message, $keyword);
            }
        }
        return null;
    }

    /**
     * 普通文本回复
     * @param Site $site
     * @param Chat $chat
     * @param Message $message
     * @param Keyword $keyword
     * @return string|null
     */
    protected function text(Site $site, Chat $chat, Message $message, Keyword $keyword): ?string
    {
        if ($contents = $keyword->model['content']) {
            return $message->text(array_random(json_decode($contents, true))['content']);
        }
    }

    /**
     * 图文消息回复
     * @param Site $site
     * @param Chat $chat
     * @param Message $message
     * @return string|null
     */
    protected function news(Site $site, Chat $chat, Message $message, Keyword $keyword): ?string
    {

    }

    protected function cover(Site $site, Chat $chat, Message $message, Keyword $keyword): ?string
    {
        if ($model = $keyword->model) {
            return $message->news([$model->toArray(),$model->toArray()]);
        }
    }

    /**
     * 模块处理
     * @param Site $site
     * @param Chat $chat
     * @param Message $message
     * @param Keyword $keyword
     * @return string|null
     */
    protected function moduleProcessor(Site $site, Chat $chat, Message $message, Keyword $keyword): ?string
    {

    }
}
