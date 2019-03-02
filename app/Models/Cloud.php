<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 云应用
 * Class Cloud
 * @package App\Models
 */
class Cloud extends Model
{
    protected $fillable = ['build', 'token'];
}
