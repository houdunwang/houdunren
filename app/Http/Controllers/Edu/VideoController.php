<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\Edu;

use App\Http\Controllers\Controller;
use App\Models\EduVideo;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(EduVideo $video)
    {
        $video->userVideo()->sync([auth()->id()]);
        return view('edu.video.show', compact('video'));
    }
}
