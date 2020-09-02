<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function scopeSite($query)
    {
        return $this->where('site_id', site()['id']);
    }

    public function scopeModule($query)
    {
        return $this->where('module_id', module()['id']);
    }
}
