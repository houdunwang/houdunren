<?php

namespace App\WeChat;

use App\Http\Controllers\Controller;
use Houdunwang\WeChat\Message;
use App\Models\WeChat as Model;
use App\Models\Site;
use Illuminate\Contracts\Container\BindingResolutionException;
use Log;
use SiteService;

/**
 * 微信通信
 * @package App\Http\Controllers\WeChatApi
 */
class ApiController extends Controller
{
    //微信模型
    protected $model;
    //消息处理模块
    protected $message;

    /**
     * 微信接口
     * @param Site $site
     * @param Model $model
     * @return mixed
     * @throws BindingResolutionException
     */
    public function handle(Site $site, Model $model)
    {
        SiteService::cache($site);
        $this->model = $model;
        //初始化微信消息模块
        $this->message = app(Message::class)->init($model);
        $this->subscribe();
        return $this->processor();
    }

    /**
     * 事件订阅处理
     * @return void
     */
    protected function subscribe()
    {
        $methods = $this->message->getAllTypeCheckMethods();
        foreach ($methods as $method) {
            return $this->callModuleSubscribeMethod($method);
        }
    }

    /**
     * 调用模块订阅方法
     * @param mixed $method
     * @return void
     */
    protected function callModuleSubscribeMethod($method)
    {
        foreach (site()->modules as $module) {
            $class = "Modules\\{$module->name}\System\Subscribe";
            $subscribes = $module->config['wechat']['subscribe'] ?? [];
            if (in_array($method, $subscribes) && class_exists($class)) {
                $obj = new $class;
                if (method_exists($obj, $method)) {
                    $obj->$method();
                }
            }
        }
    }

    /**
     * 关键词消息处理
     * @param Model $model
     * @param Message $message
     * @return mixed
     */
    protected function processor()
    {
        $files = glob(__DIR__ . '/Processors/Handles/*.php');
        foreach ($files as $file) {
            $class = 'App\WeChat\Processors\Handles\\' . pathinfo($file)['filename'];
            $processor = new $class($this->model, $this->message);
            if ($content = $processor->handle()) {
                return $content;
            }
        }
    }
}
