<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{
    public function render($request)
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => $this->getMessage(), 'code' => 403], 403);
        } else {
            return back()->with('error', $this->getMessage());
        }
    }
}
