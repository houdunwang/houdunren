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

    protected $messages = [404 => '你请求的页面不存在', 419 => '页面访问过期，请重新刷新', 403 => '你没有操作权限', 429 => '请求过于频繁，请稍候再试'];

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
        $code = $response->status();

        if ($request->expectsJson()) {
            if ($message = $this->messages[$code] ?? null) {
                return response(['message' => $message, $code]);
            }
        }
        return $response;
    }
}
