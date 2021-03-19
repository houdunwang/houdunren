<?php

namespace App\WeChat\Processors;

use App\Models\WeChatKeyword;
use Arr;
use Illuminate\Contracts\Container\BindingResolutionException;
use InvalidArgumentException;
use Log;
use LogicException;
use Houdunwang\WeChat\Message;
use App\Models\WeChat as Model;

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
        if ($rule = $this->getRule($keyword)) {
            switch ($rule->type) {
                case 'text':
                    return $this->message->text(Arr::random($rule->text->contents));
                case 'news':
                    return $this->message->news($rule->news->contents);
            }
        }
    }

    /**
     * 获取回复规则
     * @param null|string $keyword 关键词
     * @return mixed
     * @throws BindingResolutionException
     * @throws LogicException
     */
    final protected function getRule(?string $keyword)
    {
        $keywords = WeChatKeyword::where('site_id', SID)->where('wechat_id', $this->model->id)->get();

        foreach ($keywords as $keyword) {
            if ($keyword['word'] == $keyword) {
                return $keyword->rule;
            }
        }
    }
}
