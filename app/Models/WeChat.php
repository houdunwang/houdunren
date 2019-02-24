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
        'token',
        'encodingaeskey',
        'name',
        'account',
        'original',
        'genre',
        'appid',
        'appsecret',
        'mch_id',
        'key',
        'apiclient_cert',
        'apiclient_key',
        'rootca',
        'qr',
        'icon',
    ];
    protected $casts = [];

    public function scopeSite($query, Site $site)
    {
        return $query->where('site_id', $site['id']);
    }

    public function getGenreTitleAttribute()
    {
        $type = ['普通订阅号','普通服务号','认证订阅号','认证服务号/认证媒体/政府订阅号'];
        return $type[$this['genre']];
    }
}
