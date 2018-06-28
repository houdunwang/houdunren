<?php

namespace App\Exceptions;

use App\Traits\Message;
use Exception;

class SystemException extends Exception
{
    use Message;
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
            return $this->error($this->message, [], $this->code);
        }

        return view('errors.system', ['message' => $this->message,'code'=>$this->code]);
    }
}
