<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeChatText extends BaseModel
{
    protected $table = 'we_chat_texts';

    protected $fillable = ['site_id', 'module_id', 'rule_id', 'contents'];

    protected $casts = [
        'contents' => 'array',
    ];

    protected function rule()
    {
        return $this->belongsTo(WeChatRule::class, 'rule_id');
    }
}
