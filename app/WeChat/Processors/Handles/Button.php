<?php

namespace App\WeChat\Processors\Handles;

use App\WeChat\Processors\Processor;
use Illuminate\Contracts\Container\BindingResolutionException;
use InvalidArgumentException;
use Log;
use LogicException;

/**
 * 事件消息
 * @package App\WeChat\Message
 */
class Button extends Processor
{
    //事件处理集
    protected $processes = ['isButtonClick', 'isButtonPicWeixin'];

    public function handle()
    {
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
    protected function isButtonClick()
    {
        if ($this->message->isButtonClick()) {
            return $this->reply($this->message->EventKey);
        }
    }

    protected function isButtonPicWeixin()
    {
        if ($this->message->isButtonPicWeixin()) {
            return $this->message->text('isButtonPicWeixin');
        }
    }
}
