<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 微信公众号
 * Class WeChat
 * @package App\Models
 */
class WeChat extends Model
{
    protected $fillable = [
        'site_id',
        'name',
        'account',
        'original',
        'genre',
        'app_id',
        'app_secret',
        'qr',
        'icon',
        'token',
        'EncodingAESKey',
    ];
    protected $casts = [];

    public function scopeSite($query, Site $site)
    {
        return $query->where('site_id', $site['id']);
    }
}
