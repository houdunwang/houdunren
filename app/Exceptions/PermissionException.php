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
        if ($request->expectsJson()) {
            return response()->json(['message' => $this->getMessage(), 'code' => 403], $this->code);
        } elseif (!auth()->check()) {
            return redirect(route('login'))->with('error', '请登录后操作');
        }
        return back()->with('error', $this->getMessage());
    }
}
