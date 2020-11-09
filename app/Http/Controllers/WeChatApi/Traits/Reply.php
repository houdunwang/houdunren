<?php

namespace App\Http\Controllers\WeChatApi\Traits;

use App\Models\WeChatKeyword;
use Arr;
use Illuminate\Contracts\Container\BindingResolutionException;
use InvalidArgumentException;
use Log;
use LogicException;

/**
 * 根据关键词内容回复
 */
trait Reply
{
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
    $keywords = WeChatKeyword::where('site_id', site()['id'])->where('wechat_id', request()->model->id)->get();

    foreach ($keywords as $keyword) {
      if ($keyword['word'] == $keyword) {
        return $keyword->rule;
      }
    }
  }
}
