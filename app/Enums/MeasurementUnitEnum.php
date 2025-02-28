<?php

namespace App\Enums;

use App\Enums\Traits\GetEnumData;

/**
 * Единицы измерения в соответствии с ОК 015-94 (МК 002-97)
 * https://www.consultant.ru/document/cons_doc_LAW_362322/0060b1f1924347c03afbc57a8d4af63888f81c6c/
 */
enum MeasurementUnitEnum: int
{
    use GetEnumData;

    /**
     * Штуки/Единицы
     */
    case PIECE = 0;

    /**
     * Литр
     */
    case LITER = 41;
}
