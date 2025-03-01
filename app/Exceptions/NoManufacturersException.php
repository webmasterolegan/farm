<?php

namespace App\Exceptions;

use Exception;

/**
 * Производство невозможно, отсутствуют производители
 */
class NoManufacturersException extends Exception
{
    public function report(): void
    {
        \Log::error('Производство невозможно, отсутствуют производители');
    }
}
