<?php

namespace App\Http\Controllers\Api\WeChat;

use App\Http\Controllers\Controller;
use Houdunwang\WeChat\Message;
use App\Models\WeChat;
use App\Http\Controllers\WeChatApi\Message\Text;
use App\Http\Controllers\WeChatApi\Message\Event;
use App\Services\WeChatService;
use Houdunwang\WeChat\User;
use Illuminate\Contracts\Container\BindingResolutionException;
use InvalidArgumentException;
use Illuminate\Support\Facades\Log;
use App;

/**
 * 微信API
 * @package App\Http\Controllers\WeChatApi
 */
class ProcessorController extends Controller
{
    //消息处理器
    protected $processes = [Text::class, Event::class];
    //微信被动消息服务
    protected $message;
    //公众号模型
    protected $model;

    /**
     * 被动消息接口
     * @param WeChat $model
     * @param Message $message
     * @return mixed
     * @throws BindingResolutionException
     * @throws InvalidArgumentException
     */
    public function handle(WeChat $model, Message $message)
    {
        $this->message = $message;
        $this->model = $model;
        $message->bind()->config($model)->message();
        $this->login();

        foreach ($this->processes as $processor) {
            if ($content = App::call([new $processor(), 'handle'], ['model' => $model, 'message' => $message])) {
                return $content;
            }
        }
    }

    /**
     * 粉丝登录
     * @return void
     * @throws BindingResolutionException
     */
    protected function login()
    {
        $account = app(User::class)->getByOpenid($this->message->message->FromUserName);
        $account['wechat_id'] = $this->model->id;
        app(WeChatService::class)->login($account, 'wechat');
    }
}
