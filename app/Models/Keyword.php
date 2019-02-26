<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 微信关键词
 * Class Keyword
 * @package App\Models
 */
class Keyword extends Model
{
    protected $fillable = [
        'title',
        'key',
        'tag',
        'system',
        'model_id',
        'model_type',
        'site_id',
        'module_id',
        'chat_id',
    ];
    protected $casts = ['system' => "boolean"];

    public function model()
    {
        return $this->morphTo();
    }

    /**
     * 根据关键词获取
     * @param $query
     * @param $key
     * @return mixed
     */
    public function scopeKey($query, $key)
    {
        return $query->where('key', $key);
    }
}
