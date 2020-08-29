<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeChat extends Model
{
    protected $fillable = ['site_id', 'title', 'name', 'introduce', 'qr', 'token', 'type', 'wechat_id', 'appID', 'appsecret', 'welcome', 'default_message'];

    protected $casts = [
        'menus' => 'array',
    ];
}
