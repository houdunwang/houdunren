<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Zan extends Model
{
    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
