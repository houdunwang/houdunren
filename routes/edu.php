<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Http\Controllers\LearnHistoryController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\MorningController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QuestionAnswerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ShortVideoController;
use App\Http\Controllers\ShotController;
use App\Http\Controllers\SignController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\WechatMenuController;


//贴子
Route::put('topic/recommend/{topic}', [TopicController::class, 'recommend']);
Route::get('topic/recommend', [TopicController::class, 'recommendList']);
Route::get('topic/user/{user}', [TopicController::class, 'user']);
Route::apiResource('topic', TopicController::class);

//系统课程
Route::put('system/order', [SystemController::class, 'order']);
Route::get('system/downloadUrl/{system}', [SystemController::class, 'downloadUrl']);
Route::apiResource('system', SystemController::class);

//课程
Route::get('lesson/downloadUrl/{lesson}', [LessonController::class, 'downloadUrl']);
Route::apiResource('lesson', LessonController::class);

//视频
Route::get('video/lesson/{lesson}', [VideoController::class, 'getLessonVideo']);
Route::get('video/history/{user}', [VideoController::class, 'learnLessonVideo']);
Route::get('video/search', [VideoController::class, 'search']);
Route::apiResource('video', VideoController::class);

//学习历史
Route::controller(LearnHistoryController::class)->prefix('learn/history')->group(function () {
    Route::get('videos', 'videos');
    Route::get('lessonVideos/{lesson}', 'lessonVideos');
    Route::get('user/{user}', 'userVideos');
});

//用户签到
Route::controller(SignController::class)->prefix('sign')->group(function () {
    Route::get('userSignList/{user}', [SignController::class, 'userSignList']);
    Route::get('todaySignList', [SignController::class, 'todaySignList']);
});
Route::apiResource('sign', SignController::class);

//早起活动
Route::controller(MorningController::class)->prefix("morning")->group(function () {
    Route::get('latest', 'latest');
    Route::post('luck', 'luck');
    Route::get('signs', 'signs');
});
Route::apiResource('morning', MorningController::class);

//金榜提名-问题
Route::get('question/user_question_list/{user}', [QuestionController::class, 'userQuestionList']);
Route::get('question/examine', [QuestionController::class, 'examine']);
Route::get('question/relation_question/{question}', [QuestionController::class, 'relationQuestion']);
Route::apiResource('question', QuestionController::class);

//答题
Route::get('question_answer/ranking_list', [QuestionAnswerController::class, 'rankingList']);
Route::get('question_answer/questionRankTotal', [QuestionAnswerController::class, 'questionRankTotal']);
Route::get('question_answer/my_answer_list', [QuestionAnswerController::class, 'myAnswerList']);
Route::apiResource('question_answer', QuestionAnswerController::class);

//短视频
Route::apiResource('shortVideo', ShortVideoController::class);

//微信菜单
Route::apiResource('wechat/menu', WechatMenuController::class);

//订阅
Route::controller(SubscribeController::class)->prefix("subscribe")->group(function () {
    Route::get('info', 'info');
    Route::post('douyin', 'douyin');
});

//订单
Route::controller(OrderController::class)->prefix('order')->group(function () {
    Route::post('create', 'create');
});

//直播评论截图
Route::controller(ShotController::class)->prefix("shot")->group(function () {
    Route::get('comment', 'comment');
    Route::get('live', 'live');
});
