<?php

namespace App\Exceptions;

use Exception;

/**
 * Уникальный номер не присвоен
 */
class UniqueNumberNotExistException extends Exception
{
    public function report(): void
    {
        \Log::error('Уникальный номер не присвоен');
    }
}
