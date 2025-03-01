<?php

namespace App\Enums\Traits;

/**
 * Получение всех значений Enum
 */
trait GetEnumData
{
    /**
     * Все значения (case->value)
     */
    public static function getAllValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Все имена (case->name)
     *
     * @return array<string> $names
     */
    public static function getAllNames(): array
    {
        return array_column(self::cases(), 'name');
    }

    /**
     * Локализированное описание значения
     */
    public function getDescription(): string
    {
        return __('enums.'.self::class.'.'.$this->name);
    }
}
