<?php

namespace App\WeChat\Message;

use App\WeChat\Traits\Reply;
use App\Models\WeChat as Model;
use Houdunwang\WeChat\Message;
use Illuminate\Contracts\Container\BindingResolutionException;
use InvalidArgumentException;
use Log;

/**
 * 文本消息
 * @package App\WeChat\Message
 */
class Text
{
    use Reply;
    protected $processes = ['text', 'defaultMessage'];
    //公众号数据表模型
    protected $model;
    //微信消息处理服务
    protected $message;

    public function handle(Model $model, Message $message)
    {
        $this->model = $model;
        $this->message = $message;

        if ($this->message->isText()) {
            foreach ($this->processes as $action) {
                if ($content = $this->$action()) {
                    return $content;
                }
            }
        }
    }

    /**
     * 文本消处理
     * @return mixed
     * @throws BindingResolutionException
     * @throws InvalidArgumentException
     */
    protected function text()
    {
        // if ($content = $this->reply($this->message->Content)) {
        //     return $content;
        // }
    }

    /**
     * 默认回复消息
     * @return mixed
     * @throws BindingResolutionException
     * @throws InvalidArgumentException
     */
    protected function defaultMessage()
    {
        $message  = $this->model['default_message'] ?? '您的消息我们已经收到';
        Log::info($message);
        // if ($content = $this->reply($message)) {
        //     return $content;
        // }
        return $this->message->text($message);
    }
}
