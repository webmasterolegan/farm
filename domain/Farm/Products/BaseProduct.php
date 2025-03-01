<?php

namespace Domain\Farm\Products;

use App\Enums\MeasurementUnitEnum;
use App\Exceptions\NegativeValueOfProductsException;
use Domain\Farm\Traits\HasNameTrait;

/**
 * Базовый класс прородитель всех товарных позций на ферме
 */
abstract class BaseProduct
{
    use HasNameTrait;

    /**
     * Товарная единица измирения
     */
    protected static MeasurementUnitEnum $measurementUnit;

    /**
     * Название продукции
     */
    protected static string $name;

    /**
     * Количество товарных едениц
     */
    protected int $quantity = 0;

    /**
     * Установить количество товарных единиц
     */
    public function setQuantity(int $quantity): void
    {
        if ($quantity < 0) {
            throw new NegativeValueOfProductsException;
        }

        $this->quantity = $quantity;
    }

    /**
     * Получить количество товарных единиц
     */
    public function getQuantity(): float|int
    {
        return $this->quantity;
    }

    /**
     * Получить единицу измирения
     */
    public static function getMeasurementUnit(): MeasurementUnitEnum
    {
        return self::$measurementUnit;
    }
}
