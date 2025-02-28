<?php

namespace Domain\Farm\Animals;

use Domain\Farm\Products\Milk;
use Domain\Farm\Traits\HasNameTrait;

/**
 * Корова
 */
class Cow extends AnimalBase
{
    use HasNameTrait;

    protected static string $name = 'Корова';

    protected int $minimumProductivity = 8;

    protected int $maximumProductivity = 12;

    protected static string $productClass = Milk::class;
}
