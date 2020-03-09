<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 文件附件
 * Class Attachment
 */
class Attachment extends Model
{
  protected $fillable = ['site_id', 'user_id', 'path', 'name'];
}
