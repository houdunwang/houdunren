<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 微信群发
 * @package App\Models
 */
class WeChatSendAll extends Model
{
    use HasFactory;
    protected $fillable = ['wechat_id', 'module_id', 'title', 'type', 'material_id', 'media_id', 'content', 'response'];
    protected $casts = ['content' => 'array', 'response' => 'array'];

    /**
     * 素材关联
     * @return BelongsTo
     */
    public function material()
    {
        return $this->belongsTo(WeChatMaterial::class, 'material_id');
    }
}
