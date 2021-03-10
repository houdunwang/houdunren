<?php

namespace App\WeChat;

use App\Http\Controllers\Controller;
use Houdunwang\WeChat\Message;
use App\Models\WeChat as Model;
use App\WeChat\Message\Text;
use App\WeChat\Message\Event;
use Houdunwang\WeChat\User;
use Illuminate\Contracts\Container\BindingResolutionException;
use InvalidArgumentException;
use App\Models\Site;
use Houdunwang\WeChat\WeChat;
use WeChatService;
use App;
use Log;

/**
 * 微信通信
 * @package App\Http\Controllers\WeChatApi
 */
class ApiController extends Controller
{
    //消息处理器
    protected $processes = [Text::class, Event::class];
    //站点
    protected $site;
    //公众号服务
    protected $wechat;
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
    public function handle(Site $site, Model $model, WeChat $wechat, Message $message)
    {
        $this->site = $site;
        $this->model = $model;
        $this->wechat = $wechat;
        $wechat->init($model->toArray());
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
        Log::info(11);
        $account = app(User::class)->getByOpenid($this->wechat->FromUserName);
        Log::info($account);
        app(WeChatService::class)->saveUser($account + ['site_id' => SID, 'wechat_id' => $this->model->id]);
    }
}
