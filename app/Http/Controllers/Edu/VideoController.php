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
use App\Repositories\EduVideoRepository;
use App\Servers\EduLessonServer;
use App\Servers\EduVideoServer;

/**
 * 课程视频
 * Class VideoController
 * @package App\Http\Controllers\Edu
 */
class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 视频播放
     * @param EduVideo $video
     * @param EduVideoRepository $repository
     * @param EduVideoServer $eduVideoServer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(
        EduVideo $video,
        EduVideoServer $eduVideoServer,
        EduVideoRepository $repository
    ) {
        $eduVideoServer->log($video);
        $nextVideo = $repository->nextOrPrev($video, 'next');
        $prevVideo = $repository->nextOrPrev($video, 'prev');
        return view('edu.video.show', compact('video', 'nextVideo', 'prevVideo'));
    }
}
