<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeChatKeyword extends Model
{
    protected $fillable = [
        'site_id', 'module_id', 'wechat_id', 'word', 'title', 'regexp', 'rule_id'
    ];
}
