<?php

namespace Domain\Farm\Animals;

use App\Exceptions\UniqueNumberAalreadyInUseException;
use Domain\Farm\Farm;
use Domain\Farm\Products\BaseProduct;
use Domain\Farm\Traits\HasNameTrait;

/**
 * Базовый клас прорадитель всех животных на ферме
 */
abstract class AnimalBase
{
    use HasNameTrait;

    /**
     * Название животного
     */
    protected static string $name;

    /**
     * Класс производимой продукции
     */
    protected static string $productClass;

    /**
     * Уникальный номер животного
     */
    protected int $number;

    /**
     * Минимальная продуктивность животного
     */
    protected int $minimumProductivity = 0;

    /**
     * Максимальная продуктивность животного
     */
    protected int $maximumProductivity;

    /**
     * Количество произведённых товаров
     *
     * @var array
     */
    protected int $products = 0;

    /**
     * Количество итераций забора продукции
     */
    protected int $productionIterations = 0;

    /**
     * Полчить экземпляр производимой продукции
     */
    public function makeProduct(): BaseProduct
    {
        return new static::$productClass;
    }

    /**
     * Получить название класса производимой продукции
     */
    public function getProductClass(): string
    {
        return static::$productClass;
    }

    /**
     * Произвести некоторое количество продукции
     */
    public function makeProducts(): BaseProduct
    {
        $product = $this->makeProduct();
        $quantity = random_int($this->minimumProductivity, $this->maximumProductivity);
        $product->setQuantity($quantity);

        $this->products += $quantity;
        $this->productionIterations++;

        return $product;
    }

    /**
     * Присвоить уникальный номер
     *
     * @throws \App\Exceptions\UniqueNumberAalreadyInUseException
     */
    public function setNumber(int $number): void
    {
        if (Farm::existAnimalNumber($number)) {
            throw new UniqueNumberAalreadyInUseException;
        }

        $this->number = $number;
    }

    /**
     * Получить уникальный номер животного
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * Получить количество произведённой продукции
     *
     * @return array|int
     */
    public function getProducts(): int
    {
        return $this->products;
    }

    /**
     * Получить количество заборов продукции
     */
    public function getProductionIterations(): int
    {
        return $this->productionIterations;
    }
}
