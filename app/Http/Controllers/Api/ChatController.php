<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Keyword;
use App\Models\Module;
use App\Models\Site;
use App\Models\Chat;
use App\Repositories\ModuleRepository;
use Houdunwang\WeChat\Build\Message\Message;

class ChatController extends Controller
{
    protected $site;
    protected $message;
    protected $chat;
    protected $keyword;

    /**
     * 被动消息处理
     * @param Site $site
     * @param Chat $chat
     * @param Message $message
     * @return string|null
     */
    public function processor(Site $site, Chat $chat, Message $message)
    {
        $this->site = $site;
        $this->chat = $chat;
        $this->message = $message->config($chat)->valid();
//        $this->subscribe();

        if ($message->isTextMsg()) {
            if ($response = $this->textProcessor()) {
                return $response;
            }
            if (isset($chat['default'])) {
                return $message->text($chat['default']);
            }
        }
        //关注回复
        if ($message->isSubscribeEvent()) {
            //向用户回复消息
            return $message->text("感谢你关注后盾网微信");
        }
    }

    /**
     * 微信订阅消息处理
     */
    protected function subscribe()
    {
        foreach (Module::all() as $module) {
            if ($module['subscribe']) {
                $this->runModuleAction($module, 'subscribe');
            }
        }
    }

    /**
     * 执行模块动作
     * @param Module $module
     * @param string $action
     * @return mixed
     */
    protected function runModuleAction(Module $module, string $action)
    {
        $method = 'Modules\\' . $module['name'] . '\Http\Controllers\System\ChatController@' . $action;
        return app()->call($method,
            ['site' => $this->site, 'chat' => $this->chat, 'message' => $this->message, 'keyword' => $this->keyword]);
    }

    /**
     * 文本消息处理
     * @return string|null
     */
    protected function textProcessor(): ?string
    {

        if ($this->message->Content == 'hdcms') {
            return $this->message->text('恭喜~ 微信公众号配置成功');
        }
        $this->keyword = Keyword::where('key', $this->message->Content)->first();
        if ($this->keyword) {
            return $this->keyword['system'] ?
                call_user_func_array([$this, $this->keyword['tag']], [])
                : $this->runModuleAction(Module::find($this->keyword['id']), 'processor');
        }
        return null;
    }

    /**
     * 普通文本回复
     * @return string|null
     */
    protected function text(): ?string
    {
        if ($contents = $this->keyword->model['content']) {
            return $this->message->text(array_random(json_decode($contents, true))['content']);
        }
    }

    /**
     * 图文消息回复
     * @return string|null
     */
    protected function cover(): ?string
    {
        if ($model = $this->keyword->model) {
            return $this->message->news([$model->toArray()]);
        }
    }
}
