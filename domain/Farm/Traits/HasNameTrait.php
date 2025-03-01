<?php

namespace Domain\Farm\Traits;

/**
 * Получение названия (например товара или продукции)
 */
trait HasNameTrait
{
    /**
     * Получить название
     *
     * @return string
     */
    public static function getName(): string
    {
        return static::$name;
    }
}
