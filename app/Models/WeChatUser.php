<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeChatUser extends Model
{
  protected $table = 'we_chat_users';

  protected $fillable = ['user_id', 'site_id', 'openid', 'unionid', 'type', 'wechat_id', 'nickname', 'sex', 'city', 'country', 'province', 'language', 'headimgurl', 'subscribe_time', 'remark', 'groupid', 'tagid_list', 'subscribe_scene', 'qr_scene', 'qr_scene_str'];

  protected $casts = [
    'tagid_list' => 'array',
    'subscribe_time' => 'datetime',
    'groupid' => 'integer',
    'sex' => 'integer',
    'user_id' => 'integer',
    'wechat_id' => 'integer',
  ];

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
  public function getGenderAttribute()
  {
    return ['男', '女', '保密'][$this->sex];
  }
}
