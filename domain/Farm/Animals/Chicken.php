<?php

namespace Domain\Farm\Animals;

use Domain\Farm\Products\Egg;
use Domain\Farm\Traits\HasNameTrait;

/**
 * Курица
 */
class Chicken extends AnimalBase
{
    use HasNameTrait;

    protected static string $name = 'Курица';

    protected int $minimumProductivity = 0;

    protected int $maximumProductivity = 1;

    protected static string $productClass = Egg::class;
}
