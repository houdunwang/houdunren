<?php

namespace App\Http\Controllers\Edu;

use App\Models\EduVideo;
use App\Servers\EduVideoServer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 课程视频考试
 * Class VideoQuestionController
 * @package App\Http\Controllers\Edu
 */
class VideoQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(EduVideo $video,EduVideoServer $eduVideoServer)
    {
        //跳课学习检测
        if ($eduVideoServer->isSkipLesson($video) === false) {
            $video = $eduVideoServer->getLearnVideo($video->lesson, auth()->user());
            return view('edu.video.prev_video_learn_notice', compact('video'));
        }
        return view('edu.video_question.show', compact('video'));
    }

    public function edit(EduVideo $video)
    {
    }

    public function update(Request $request, EduVideo $video, EduVideoServer $videoServer)
    {
        $topics = $request->input('topics',[]);
        $result = $videoServer->question($video, $topics);
        return view('edu.video_question.update',compact('video','result','topics'));
    }

    public function destroy(EduVideo $video)
    {
    }
}
