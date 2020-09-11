<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeChatMaterial extends BaseModel
{
    protected $table = 'we_chat_materials';

    protected $fillable = ['site_id', 'module_id', 'rule_id', 'contents', 'media_id'];

    protected $casts = [
        'contents' => 'array',
    ];

    protected function rule()
    {
        return $this->belongsTo(WeChatRule::class, 'rule_id');
    }
}
