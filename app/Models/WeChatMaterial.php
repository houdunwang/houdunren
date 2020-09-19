<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeChatMaterial extends BaseModel
{
  protected $table = 'we_chat_materials';

  protected $fillable = ['site_id', 'module_id', 'rule_id', 'info', 'contents', 'media_id'];

  protected $casts = [
    'content' => 'array',
    'info' => 'array',
  ];

  protected function rule()
  {
    return $this->belongsTo(WeChatRule::class, 'rule_id');
  }
  public function wechat()
  {
    return $this->belongsTo(WeChat::class, 'wechat_id');
  }
}
