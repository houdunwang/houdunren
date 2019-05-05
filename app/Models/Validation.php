<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 验证码记录
 */
class Validation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['account', 'code'];
}
