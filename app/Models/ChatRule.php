<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------
 */
class ChatRule extends Model
{
    protected $fillable = ['module','action'];

    public function chatKeyword()
    {
        return $this->hasMany(ChatKeyword::class);
    }

    public function systemModule(){
        return $this->belongsTo(Module::class,'module','name');
    }
}
