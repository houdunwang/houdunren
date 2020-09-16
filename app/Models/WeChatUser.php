<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeChatUser extends Model
{
  protected $table = 'we_chat_users';

  protected $fillable = ['user_id', 'site_id', 'openid', 'unionid'];

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
