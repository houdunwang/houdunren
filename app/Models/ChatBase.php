<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatBase extends Model
{
    protected $fillable = ['title','content', 'chat_rule_id'];

    protected $casts = ['content' => 'array'];

    public function chatRule()
    {
        return $this->belongsTo(ChatRule::class);
    }
}
