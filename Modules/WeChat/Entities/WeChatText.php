<?php

namespace Modules\WeChat\Entities;

use App\Models\BaseModel;
use App\Models\WeChatRule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 文本消息
 * @package Modules\Edu\Entities
 */
class WeChatText extends BaseModel
{
  protected $table = 'we_chat_texts';

  protected $fillable = ['site_id', 'module_id', 'rule_id', 'contents'];

  protected $casts = [
    'contents' => 'array',
  ];

  /**
   * 微信规则
   * @return BelongsTo
   */
  protected function rule()
  {
    return $this->belongsTo(WeChatRule::class, 'rule_id');
  }
}
