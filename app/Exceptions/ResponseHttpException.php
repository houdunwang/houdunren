<?php

namespace App\Exceptions;

use Exception;

/**
 * HTTP响应处理异常
 * Class ResponseHttpException
 * @package App\Exceptions
 */
class ResponseHttpException extends Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render($request)
    {
        return $request->expectsJson()
            ? response()->json(['message' => $this->getMessage(), 'code' => 403], 401)
            : back()->with('error', $this->getMessage());
    }
}
