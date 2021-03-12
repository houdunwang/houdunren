<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 微信消息
 * @package App\Models
 */
class WeChatMessage extends Model
{
    use HasFactory;
    protected $fillable = [
        'site_id', 'module_id', 'wechat_id', 'keyword_type', 'type', 'keyword', 'title', 'content'
    ];
    protected $casts = ['content' => 'array'];
    protected $types = ['text' => '普通文本', 'news' => '图文消息', 'image' => "图片"];

    protected $appends = ['TypeTitle'];

    /**
     * 类型中文
     * @return string
     */
    protected function getTypeTitleAttribute()
    {
        return $this->types[$this->type];
    }
}
