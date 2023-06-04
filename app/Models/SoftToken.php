<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoftToken extends Model
{
    use HasFactory;

    protected $fillable = ['soft_id', 'token'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
