<?php

namespace App\Exceptions;

use Exception;

/**
 * Уникальный номер уже используется
 */
class UniqueNumberAalreadyInUseException extends Exception
{
    public function report(): void
    {
        \Log::error('Уникальный номер уже используется');
    }
}
