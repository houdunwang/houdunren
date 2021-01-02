<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 上传资源表
 */
class Attachment extends Model
{
    protected $fillable = ['path', 'user_id', 'name', 'extension'];
}
