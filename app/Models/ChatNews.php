<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatNews extends Model
{
    protected $fillable = ['title', 'content'];
    protected $casts = ['content' => 'array'];

    public function chatRule()
    {
        return $this->belongsTo(ChatRule::class);
    }
}
