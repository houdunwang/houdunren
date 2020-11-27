<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

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
     * @param Request $request
     * @param Throwable $exception
     * @return Response
     * @throws BindingResolutionException
     * @throws Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ThrottleRequestsException) {
            if ($request->expectsJson()) {
                return response()
                    ->json(['message' => '请求过于频繁，请稍后再试'], 429)
                    ->withHeaders($exception->getHeaders());
            }
        }

        if ($exception instanceof ValidationException) {
            if ($request->expectsJson()) {
                return response()->json(['message' => '表单验证错误', 'errors' => $exception->validator->getMessageBag()], 422);
            }
        }

        return parent::render($request, $exception);
    }
}
