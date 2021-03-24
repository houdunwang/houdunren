<?php

namespace App\WeChat\Processors;

use Arr;
use Illuminate\Contracts\Container\BindingResolutionException;
use InvalidArgumentException;
use Log;
use LogicException;
use Houdunwang\WeChat\Message;
use App\Models\WeChat as Model;
use App\Models\WeChatMessage;

/**
 * 根据关键词内容回复
 */
abstract class Processor
{
    abstract protected function handle();

    //公众号数据表模型
    protected $model;
    //微信消息处理服务
    protected $message;

    public function __construct(Model $model, Message $message)
    {
        $this->model = $model;
        $this->message = $message;
    }

    /**
     * 统一回复处理
     * @param null|string $keyword 关键词
     * @return mixed
     * @throws BindingResolutionException
     * @throws LogicException
     * @throws InvalidArgumentException
     */
    final protected function reply(?string $keyword)
    {
        $message = $this->model->messages()->where('keyword', $keyword)->first();
        if ($message) {
            $action = $message->type;
            switch ($action) {
                case 'text':
                    return $this->message->text(Arr::random($message->content));
                case 'image':
                case 'voice':
                case 'video':
                case 'news':
                    return $this->message->$action($message->content);
                case 'module':
                    return $this->moduleReply($message);
            }
        }
        //默认消息
        return $this->message->text($this->model['default_message'] ?? '您的消息我们已经收到');
    }

    /**
     * 模块自行处理返回消息内容
     * @param WeChatMessage $message
     * @return mixed
     * @throws BindingResolutionException
     */
    final protected function moduleReply(WeChatMessage $message)
    {
        $class = "Modules\\{$message->module->name}\System\Processor";
        return app($class)->handle($message);
    }
}
