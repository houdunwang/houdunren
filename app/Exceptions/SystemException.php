<?php

namespace App\Exceptions;

use Exception;

class SystemException extends Exception
{
    protected $code;
    protected $message;

    public function __construct(string $message = "", int $code = 500, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->message = $message;
        $this->code    = $code;
    }

    public function render($request)
    {
        if (request()->expectsJson()) {
            return ['code'=>$this->code,'message'=>$this->message];
        }

        return view('errors.system', ['message' => $this->message,'code'=>$this->code]);
    }
}
