<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Lesson;
use App\Models\User;
use App\Models\VideoPlayHistory;
use App\Http\Resources\VideoResource;

//学习历史
class LearnHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only(['lessonVideos']);
    }

    //用户视频学习历史
    public function userVideos(User $user)
    {
        $collection = $user->videos()->with('lesson')
            ->latest('video_play_histories.updated_at')
            ->paginate(10);
        return VideoResource::collection($collection);
    }

    //用户某个课程视频学习历史
    public function lessonVideos(Lesson $lesson)
    {
        $collection = Auth::user()->videos()->wherePivot('lesson_id', $lesson->id)->get();
        return VideoResource::collection($collection);
    }

    //全站用户视频学习动态
    public function videos()
    {
        return VideoResource::collection(
            VideoPlayHistory::latest('updated_at')->with(['user', 'video'])->limit(request('row', 10))->get()
        );
    }
}
