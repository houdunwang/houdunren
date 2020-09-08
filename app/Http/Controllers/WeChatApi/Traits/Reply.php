<?php

namespace App\Http\Controllers\WeChatApi\Traits;

use App\Models\WeChatKeyword;
use Arr;
use Log;

trait Reply
{
    final protected function reply(?string $content)
    {
        if ($rule = $this->getRule($content)) {
            switch ($rule->type) {
                case 'text':
                    return $this->message->text(Arr::random($rule->text->contents));
                case 'news':
                    return $this->message->news($rule->news->contents);
            }
        }
    }

    final protected function getRule(?string $content)
    {
        $keywords = WeChatKeyword::where('site_id', site()['id'])->where('wechat_id', request()->model->id)->get();

        foreach ($keywords as $keyword) {
            if ($keyword['word'] == $content) {
                return $keyword->rule;
            }
        }
    }
}
