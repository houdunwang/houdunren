<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = ['filename', 'path'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
