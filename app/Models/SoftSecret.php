<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoftSecret extends Model
{
    use HasFactory;
    protected $fillable = ['secret', 'end_time'];

    protected $casts = ['end_time' => 'datetime'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
