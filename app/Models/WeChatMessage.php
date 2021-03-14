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
    // protected $fillable = [
    //     'site_id', 'module_id', 'wechat_id', 'keyword_type', 'type', 'keyword', 'title', 'content'
    // ];
    protected $guarded = [];
    protected $casts = ['content' => 'array'];
    protected $types = ['all' => '完全匹配', 'regexp' => '正则匹配'];
    protected $appends = ['keywordTypeTitle'];

    /**
     * 关键词类型中文描述
     * @return string
     */
    protected function getKeywordTypeTitleAttribute()
    {
        return $this->types[$this->keyword_type];
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
     * 公众号关联
     * @return BelongsTo
     */
    public function wechat()
    {
        return $this->belongsTo(WeChat::class);
    }
}
