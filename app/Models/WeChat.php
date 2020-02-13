<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 网站公众号
 * Class WeChat
 * @package App\Models
 */
class WeChat extends Model
{
    protected $guarded = [];
    protected $casts = ['config' => 'array'];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
