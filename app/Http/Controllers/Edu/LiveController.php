<?php

namespace App\Http\Controllers\Edu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//直播控制
class LiveController extends Controller
{
    //开关直播
    public function make()
    {
        $config = config_get('edu');
        $config['is_live'] = !isset($config['is_live']) || !$config['is_live']?true:false;
        config_save($config);
        return back()->with('success', $config['is_live'] ? '开启' : '关闭');
    }
}
