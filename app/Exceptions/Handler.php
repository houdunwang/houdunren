<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * 不需要记录到日志的异常类
     *
     * @var array
     */
    protected $dontReport = [
        UploadException::class,
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
     * Report or log an exception.
     *
     * @param  \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof UploadException) {
            return $exception->render();
        }
//        if ($exception instanceof ModelNotFoundException) {
//            $exception = new NotFoundHttpException($exception->getMessage(), $exception);
//        }
//
//        if($exception instanceof \Symfony\Component\Debug\Exception\FatalErrorException
//            ) {
//            return response()->view('errors.default', [], 500);
//        }

        return parent::render($request, $exception);
    }
}
