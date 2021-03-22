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
        if ($message = $this->getReplyMessage($keyword)) {
            $action = $message->type;
            switch ($action) {
                case 'text':
                    return $this->message->text(Arr::random($message->content));
                case 'image':
                case 'voice':
                case 'video':
                case 'news':
                    return $this->message->$action($message->content);
            }
        }
        return $this->defaultMessage();
    }

    /**
     * 获取回复规则
     * @param null|string $keyword 关键词
     * @return mixed
     * @throws BindingResolutionException
     * @throws LogicException
     */
    final protected function getReplyMessage(?string $keyword)
    {
        return WeChatMessage::where('wechat_id', $this->model->id)->where('keyword', $keyword)->first();
    }

    /**
     * 默认回复消息
     * @return mixed
     * @throws BindingResolutionException
     * @throws InvalidArgumentException
     */
    final protected function defaultMessage()
    {
        $message  = $this->model['default_message'] ?? '您的消息我们已经收到';
        return $this->message->text($message);
    }
}
