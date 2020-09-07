<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeChatKeyword extends Model
{
    protected $fillable = [
        'id', 'site_id', 'module_id', 'wechat_id', 'word', 'title', 'regexp', 'rule_id'
    ];

    public function rule()
    {
        return $this->belongsTo(WeChatRule::class, 'rule_id');
    }
}
