<?php

namespace App\WeChat;

use App\Http\Controllers\Controller;
use Houdunwang\WeChat\Message;
use App\Models\WeChat as Model;
use App\WeChat\Processors\Text;
use App\WeChat\Processors\Event;
use Houdunwang\WeChat\User;
use App\Models\Site;
use InvalidArgumentException;
use WeChatService;
use Illuminate\Http\Client\RequestException;
use Illuminate\Database\Eloquent\InvalidCastException;
use Illuminate\Contracts\Container\BindingResolutionException;
use Log;

/**
 * 微信通信
 * @package App\Http\Controllers\WeChatApi
 */
class ApiController extends Controller
{
    //消息处理器
    protected $processes = [Text::class, Event::class];

    /**
     * 被动消息接口
     * @param Site $site
     * @param Model $model
     * @param Message $message
     * @return mixed
     * @throws InvalidCastException
     * @throws BindingResolutionException
     * @throws InvalidArgumentException
     */
    public function handle(Site $site, Model $model, Message $message)
    {
        //初始化微信服务
        $message->init($model->toArray());
        $this->login($model, $message);
        return $this->processor($model, $message);
    }

    /**
     * 粉丝登录
     * @param Model $model
     * @param Message $message
     * @return void
     * @throws BindingResolutionException
     * @throws RequestException
     */
    protected function login(Model $model, Message $message)
    {
        $account = app(User::class)->getByOpenid($message->FromUserName);
        app(WeChatService::class)->saveUser($account + ['site_id' => SID, 'wechat_id' => $model->id]);
    }

    /**
     * 处理消息
     * @param Model $model
     * @param Message $message
     * @return mixed
     */
    protected function processor(Model $model, Message $message)
    {
        foreach ($this->processes as $class) {
            $processor = new $class($model, $message);
            if ($content = $processor->handle()) {
                return $content;
            }
        }
    }
}
