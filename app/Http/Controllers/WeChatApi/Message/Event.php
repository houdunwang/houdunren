<?php

namespace App\Http\Controllers\WeChatApi\Message;

use App\Http\Controllers\WeChatApi\Traits\Reply;
use App\Models\WeChat;
use Houdunwang\WeChat\Button;
use Houdunwang\WeChat\Message;
use Illuminate\Contracts\Container\BindingResolutionException;
use InvalidArgumentException;
use Log;
use LogicException;

class Event
{
  use Reply;
  //事件处理集
  protected $processes = ['button', 'subscribe'];
  //公众号数据表模型
  protected $model;
  //微信消息处理服务
  protected $message;

  public function handle(WeChat $model, Message $message)
  {
    $this->model = $model;
    $this->message = $message;
    foreach ($this->processes as $action) {
      if ($content = $this->$action()) {
        return $content;
      }
    }
  }

  /**
   * 菜单事件
   * @return mixed
   * @throws BindingResolutionException
   * @throws LogicException
   * @throws InvalidArgumentException
   */
  protected function button()
  {
    $button = app(Button::class);

    if ($button->isClient()) {
      return $this->reply($this->message->EventKey);
    }
  }

  /**
   * 关注事件
   * @return mixed
   * @throws BindingResolutionException
   * @throws LogicException
   * @throws InvalidArgumentException
   */
  protected function subscribe()
  {
    if ($this->message->isSubscribe()) {
      return $this->reply($this->model->welcome);
    }
  }
}
