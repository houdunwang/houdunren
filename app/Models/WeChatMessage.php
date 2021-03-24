<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 微信消息
 * @package App\Models
 */
class WeChatMessage extends Model
{
    use HasFactory;
    protected $fillable = ['wechat_id', 'module_id', 'type', 'file', 'title', 'keyword', 'content'];
    protected $casts = ['content' => 'array'];

    /**
     * 公众号关联
     * @return BelongsTo
     */
    public function wechat()
    {
        return $this->belongsTo(WeChat::class);
    }

    /**
     * 模块关联
     * @return BelongsTo
     */
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
}
