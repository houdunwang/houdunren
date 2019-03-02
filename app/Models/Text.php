<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    protected $fillable = ['content', 'site_id', 'module_id'];

    public function scopeSite($query)
    {
        return $query->where('site_id', \site()['id']);
    }

    public function scopeModule($query)
    {
        return $query->where('module_id', \module()['id']);
    }

    public function keyword()
    {
        return $this->morphOne(Keyword::class, 'model');
    }

    public function getContentJsonAttribute()
    {
        return $this['content'] ? json_encode($this['content']) : '[""]';
    }
}
