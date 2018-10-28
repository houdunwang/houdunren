<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class EduOrder extends Model
{
    protected $fillable=[];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
