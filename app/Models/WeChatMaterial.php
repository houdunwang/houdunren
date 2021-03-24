<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 微信素材
 * @package App\Models
 */
class WeChatMaterial extends Model
{
    use HasFactory;
    protected $fillable = ['wechat_id', 'type', 'title', 'file', 'duration', 'content', 'media'];
    protected $casts = ['content' => 'array', 'media' => 'array'];

    /**
     * 公众号关联
     * @return BelongsTo
     */
    public function wechat()
    {
        return $this->belongsTo(WeChat::class);
    }
}
