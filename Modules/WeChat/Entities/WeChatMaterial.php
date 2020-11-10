<?php

namespace Modules\WeChat\Entities;

use App\Models\BaseModel;
use App\Models\WeChatRule;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 微信素材
 * @package Modules\Edu\Entities
 */
class WeChatMaterial extends BaseModel
{
  protected $table = 'we_chat_materials';

  protected $fillable = ['site_id', 'module_id', 'rule_id', 'info', 'contents', 'media_id'];

  protected $casts = [
    'content' => 'array',
    'info' => 'array',
  ];

  /**
   * 微信规则
   * @return BelongsTo
   */
  protected function rule()
  {
    return $this->belongsTo(WeChatRule::class, 'rule_id');
  }

  /**
   * 微信公众号
   * @return BelongsTo
   */
  public function wechat()
  {
    return $this->belongsTo(WeChat::class, 'wechat_id');
  }
}
