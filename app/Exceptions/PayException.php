<?php

namespace App\Exceptions;

use Exception;

class PayException extends Exception
{
    public function render()
    {
        return redirect('/')->with('error', $this->getMessage());
    }
}
