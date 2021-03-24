<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 上传文件
 * @package App\Models
 */
class Attachment extends Model
{
    protected $fillable = ['path', 'user_id', 'size', 'user_id', 'site_id', 'name', 'extension', 'type'];
    protected $casts = ['site_id' => 'integer'];
}
