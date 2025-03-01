<?php

namespace App\Exceptions;

use Exception;

/**
 * Количество товарных позиций не может быть отрицательным
 */
class NegativeValueOfProductsException extends Exception
{
    public function report(): void
    {
        \Log::error('Количество товарных позиций не может быть отрицательным');
    }
}
