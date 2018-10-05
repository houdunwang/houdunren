<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatKeyword extends Model
{
    protected $fillable = ['id','content', 'chat_rule_id'];

    public function chatRule()
    {
        return $this->belongsTo(ChatRule::class);
    }
}
