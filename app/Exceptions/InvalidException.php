<?php

namespace App\Exceptions;

use Exception;
class InvalidException extends Exception
{
    protected $code;

    public function __construct(string $message = "", int $code = 400, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->code = $code;
    }

    public function render($request)
    {
        if (request()->expectsJson()) {
            return ['code'=>$this->code,'message'=>$this->message];
        }

        return view('errors.invalid', ['message' => $this->getMessage()]);
    }
}
