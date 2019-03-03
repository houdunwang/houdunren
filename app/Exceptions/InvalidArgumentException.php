<?php

namespace App\Exceptions;

use Exception;

/**
 * 参数验证错误统一处理
 * Class InvalidArgumentException
 * @package App\Exceptions
 */
class InvalidArgumentException extends Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render($request)
    {
        return $request->expectsJson()
            ? response()->json(['message' => $this->getMessage(), 'code' => 403], 200)
            : back()->with('error', $this->getMessage());
    }
}
