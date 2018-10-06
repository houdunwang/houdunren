<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatButton extends Model
{
    protected $fillable = ['title', 'content'];

    public function chatRule()
    {
        return $this->belongsTo(ChatRule::class);
    }
}
