<?php

namespace App\Exceptions;

use Exception;

class MaxLimitException extends Exception
{
    public function report(): void
    {
        \Log::error('Достигнут лимит ёмкости');
    }
}
