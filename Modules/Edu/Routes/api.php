<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Edu\Api\ConfigController;
use Modules\Edu\Api\TagController;
use Modules\Edu\Api\LessonController;
use Modules\Edu\Api\SystemController;
use Modules\Edu\Api\SubscribeController;
use Modules\Edu\Api\TopicController;
use Modules\Edu\Api\VideoController;
use Modules\Edu\Api\SignController;
use Modules\Edu\Api\ActivityController;
use Modules\Edu\Api\CommentController;
use Modules\Edu\Api\SiteMessageController;
use Modules\Edu\Api\UserController;

Route::group(['prefix' => 'Edu/site/{site}', 'middleware' => ['module']], function () {
    //配置
    Route::get('config', [ConfigController::class, 'show']);
    Route::put('config', [ConfigController::class, 'update']);
    //标签
    Route::get('tag', [TagController::class, 'index']);
    Route::put('tag', [TagController::class, 'update']);
    //课程
    Route::get('lesson/search', [LessonController::class, 'search']);
    Route::apiResource('lesson', LessonController::class);
    //系统课程
    Route::apiResource('system', SystemController::class);
    //套餐
    Route::apiResource('subscribe', SubscribeController::class);
    //视频
    Route::get('video/{video}/comments', [VideoController::class, 'commentList']);
    Route::post('video/{video}/comment', [VideoController::class, 'comment']);
    Route::apiResource('video', VideoController::class);
    //评论
    Route::get('comment/topic/{topic}', [CommentController::class, 'topic']);
    Route::post('comment/topic/{topic}', [CommentController::class, 'topicSend']);
    Route::get('comment/video/{video}', [CommentController::class, 'video']);
    Route::post('comment/video/{video}', [CommentController::class, 'videoSend']);
    Route::get('comment/page/{id}/{cid}', [CommentController::class, 'page']);
    Route::delete('comment/{comment}', [CommentController::class, 'destroy']);
    //贴子
    Route::get('topic/{topic}/recommend', [TopicController::class, 'recommend']);
    Route::get('topic/recommend', [TopicController::class, 'recommendList']);
    Route::apiResource('topic', TopicController::class);
    //签到
    Route::apiResource('sign', SignController::class);
    //动态
    Route::apiResource('activity', ActivityController::class);
    //站内消息
    Route::apiResource('message', SiteMessageController::class);
    //用户视频
    Route::get('user/video', [UserController::class, 'video']);
    Route::get('user/topic', [UserController::class, 'topic']);
    Route::get('user/order', [UserController::class, 'order']);
    Route::get('user/duration', [UserController::class, 'duration']);
});
