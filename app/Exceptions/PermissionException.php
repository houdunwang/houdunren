<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class PermissionException extends Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render($request)
    {
        return $request->expectsJson() ?
            response()->json(['message' => $this->getMessage(), 'code' => 403], $this->code) :
            back()->with('error', $this->getMessage());
    }
}
