<?php

namespace Domain\Farm\Products;

use App\Enums\MeasurementUnitEnum;

/**
 * Товарная позиция Яйцо
 */
class Egg extends BaseProduct
{
    protected static string $name = 'Яйцо';

    protected static MeasurementUnitEnum $measurementUnit = MeasurementUnitEnum::PIECE;
}
