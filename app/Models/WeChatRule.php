<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeChatRule extends Model
{
    protected $fillable = [
        'site_id', 'module_id', 'wechat_id', 'type', 'title', 'options'
    ];

    protected $casts = [
        'options' => 'array',
    ];

    public function keywords()
    {
        return $this->hasMany(WeChatKeyword::class, 'rule_id');
    }
}
