<?php

namespace App\Exceptions;

use App\Traits\Message;
use Exception;
use Throwable;

class InvalidException extends Exception
{
    use Message;
    protected $code;

    public function __construct(string $message = "", int $code = 400, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->code = $code;
    }

    public function render($request)
    {
        if (request()->expectsJson()) {
            return $this->error($this->getMessage(), [], $this->code);
        }

        return view('errors.invalid', ['message' => $this->getMessage()]);
    }
}
