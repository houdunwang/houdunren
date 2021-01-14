<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Throwable;
use Illuminate\Support\Facades\Log;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * 异步自定义响应
     *
     * @param [type] $request
     * @param Throwable $exception
     * @return void
     */
    public function render($request, Throwable $exception)
    {
        $response = parent::render($request, $exception);

        // 访问限制
        if ($exception instanceof ThrottleRequestsException) {
            return back()->with('message', '请求过于频繁，请稍后再试');
        }

        //表单验证
        if ($exception instanceof ValidationException) {
            if ($request->expectsJson()) {
                return response()->json(['message' => '表单验证错误', 'errors' => $exception->validator->getMessageBag()], 422);
            }
        };

        // inertia错误拦截
        if (!$request->expectsJson()) {
            $messages = [404 => '你请求的页面不存在', 419 => '页面访问过期，请重新刷新', 403 => '你没有操作权限'];
            if ($message = $messages[$response->status()] ?? null) {
                return back()->with('error', $message);
            }
            // return back()->with('error', $exception->getmessage());
        }
        return $response;
    }
}
