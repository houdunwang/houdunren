<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 微信公众号资料
 * @package App\Models
 */
class WeChat extends Model
{
    protected $fillable = ['site_id', 'title', 'name', 'introduce', 'qr', 'token', 'type', 'wechat_id', 'appid', 'appsecret', 'welcome', 'default_message'];

    protected $casts = [
        'menus' => 'array',
    ];

    /**
     * 粉丝
     * @return HasMany
     */
    public function users()
    {
        return $this->hasMany(WeChatUser::class, 'wechat_id');
    }

    /**
     * 站点关联
     * @return BelongsTo
     */
    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    /**
     * 消息
     * @return HasMany
     */
    public function messages()
    {
        return $this->hasMany(WeChatMessage::class, 'wechat_id');
    }

    /**
     * 素材
     * @return HasMany
     */
    public function materials()
    {
        return $this->hasMany(WeChatMaterial::class, 'wechat_id');
    }
}
