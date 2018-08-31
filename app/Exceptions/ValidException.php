<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class ValidException extends Exception
{
    public function __construct(string $message = "", int $code = 403, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render()
    {
        return response()->json(['message' => $this->getMessage(), 'code' => $this->code], 401);
    }
}
