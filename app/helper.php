<?php

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

if (!function_exists('user')) {
    function user()
    {
        return Auth::user();
    }
}

if (!function_exists('isAdministrator')) {
    function isAdministrator()
    {
        return Auth::check() && Auth::user()->isAdministrator;
    }
}

if (!function_exists('modelInstance')) {
    function modelInstance(): Model
    {
        $class = modelClass();
        return $class::findOrFail(request('id'));
    }
}

if (!function_exists('modelClass')) {
    function modelClass()
    {
        $class = 'App\Models\\' . ucfirst(request('model'));
        if (!class_exists($class)) abort(404, '模型不存在');
        return $class;
    }
}

if (!function_exists('rateLimiter')) {
    //限流
    function rateLimiter($limiterKey, $perMinute, $callback, $error = '')
    {
        //验证发送时间间隔
        if (RateLimiter::tooManyAttempts($limiterKey, $perMinute)) {
            $seconds = RateLimiter::availableIn($limiterKey);
            abort(403, "{$error}请 {$seconds} 秒后再试.");
        }
        //限流定义
        return RateLimiter::attempt(
            $limiterKey,
            $perMinute,
            function () use ($callback) {
                return $callback();
            }
        );
    }
}

if (!function_exists('isWechat')) {
    function isWechat()
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        return strpos($user_agent, 'MicroMessenger');
    }
}

if (!function_exists('activityLog')) {
    function activityLog($model, string $title, $properties = [])
    {
        activity()
            ->causedBy(Auth::user())
            ->performedOn($model)
            ->withProperties($properties)
            ->event('created')
            ->log($title);
    }
}

if (!function_exists('isSubscribe')) {
    function isSubscribe()
    {
        if (Auth::check()) {
            $user = User::find(Auth::id());
            return $user->subscribe && (now()->diffInMinutes($user->subscribe->end_time, false) > 0);
        }
    }
}
