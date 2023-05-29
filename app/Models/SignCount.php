<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignCount extends Model
{
    use HasFactory;

    protected $table = 'sign_counts';

    protected $fillable = ['user_id', 'month', 'year', 'total'];
}
