<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 微信规则
 * Class ChatRule
 * @package App\Models
 */
class ChatRule extends Model
{
    protected $fillable = ['module','action'];

    public function chatKeyword()
    {
        return $this->hasMany(ChatKeyword::class);
    }

    public function systemModule(){
        return $this->belongsTo(Module::class,'module','name');
    }
}
