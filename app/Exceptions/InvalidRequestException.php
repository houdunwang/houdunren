<?php

namespace App\Exceptions;

use Exception;

class InvalidRequestException extends Exception
{
    public function __construct(string $message = '', int $code = 400)
    {
        parent::__construct($message, $code);
    }

    public function render($request)
    {
        if ($request->expectsJson()) {
            return response()
                ->json(['message' => $this->message], $this->code);
        }
        return response()->view('errors.exception', ['message' => $this->message]);
    }
}
