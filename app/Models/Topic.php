<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['title', 'content','category_id','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
