<?php

namespace Domain\Farm;

use App\Exceptions\MaxLimitException;
use App\Exceptions\NoManufacturersException;
use Domain\Farm\Animals\AnimalBase;

/**
 * Любимая ферма )
 */
class Farm
{
    /**
     * Максимальное количество животных на ферме
     * Определяет номерную ёмкость для выдачи уникальных номеров и предотвращает переполнение фермы
     *
     * @var int
     */
    public const int MAX_ANIMALS = 100;

    /**
     * Животные зарегистрированные на ферме
     */
    protected static array $animals = [];

    /**
     * Сколько раз было запущено производство (только успешные запуски)
     */
    protected static int $productionIterations = 0;

    /**
     * Проверить существование номера животного
     */
    public static function existAnimalNumber(int $number): bool
    {
        return array_key_exists($number, self::$animals);
    }

    /**
     * Создание уникального номера
     *
     * @throws \App\Exceptions\MaxLimitException
     */
    private static function makeAnimalNumber(): int
    {
        for ($i = 1; $i <= self::MAX_ANIMALS; $i++) {
            if (! self::existAnimalNumber($i)) {
                return $i;
            }
        }

        throw new MaxLimitException;
    }

    /**
     * Добавить животное на ферму
     *
     * @throws \App\Exceptions\MaxLimitException
     */
    public static function addAnimal(AnimalBase $animal): int
    {
        if (count(self::$animals) >= self::MAX_ANIMALS) {
            throw new MaxLimitException;
        }

        $number = self::makeAnimalNumber();
        $animal->setNumber($number);

        self::$animals[$number] = $animal;

        return $number;
    }

    /**
     * Произвести забор продукции у животных
     *
     * @throws \App\Exceptions\NoManufacturersException
     */
    public static function makeProducts(): void
    {
        if (empty(self::$animals)) {
            throw new NoManufacturersException;
        }

        self::$productionIterations++;

        foreach (self::$animals as $animal) {
            $animal->makeProducts();
        }
    }

    /**
     * Получить всю информацию по животным на ферме
     */
    public static function getAnimalsInfo(): array
    {
        return self::$animals;
    }

    /**
     * Получить базовую информацию о животных на ферме (количество каждого типа)
     */
    public static function getAnimals(): array
    {
        return array_reduce(
            self::$animals,
            function (?array $carry, AnimalBase $animal): array {
                $key = get_class($animal);

                if (! empty($carry) && array_key_exists($key, $carry)) {
                    $carry[$key]++;
                } else {
                    $carry[$key] = 1;
                }

                return $carry;
            });
    }

    /**
     * Получить всю произведённую продукцию
     */
    public static function getProducts(): array
    {
        return array_reduce(
            self::$animals,
            function (?array $carry, AnimalBase $animal): array {
                $key = $animal->getProductClass();

                if (! empty($carry) && array_key_exists($key, $carry)) {
                    $carry[$key] += $animal->getProducts();
                } else {
                    $carry[$key] = $animal->getProducts();
                }

                return $carry;
            });
    }
}
