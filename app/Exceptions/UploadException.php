<?php

namespace App\Exceptions;

use Exception;
use Throwable;

/**
 * 上传
 * Class UploadException
 * @package App\Exceptions
 */
class UploadException extends Exception
{
    public function __construct(string $message = "", int $code = 200, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render()
    {
        return response()->json(['message' => $this->getMessage(), 'code' => 403], 200);
    }
}
