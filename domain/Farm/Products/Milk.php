<?php

namespace Domain\Farm\Products;

use App\Enums\MeasurementUnitEnum;

/**
 * Товарная позиция Молоко
 */
class Milk extends BaseProduct
{
    protected static string $name = 'Молоко';

    protected static MeasurementUnitEnum $measurementUnit = MeasurementUnitEnum::LITER;
}
