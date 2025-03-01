<?php

namespace App\Console\Commands;

use Domain\Farm\Animals\Chicken;
use Domain\Farm\Animals\Cow;
use Domain\Farm\Farm;
use Illuminate\Console\Command;

class FarmLife extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'farm:life';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Запуск сценария имитации производства на ферме';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $newAnimals = [
            Cow::class => 10,
            Chicken::class => 20,
        ];

        $this->addNewAnimals($newAnimals);
        $this->showAnimalsInfo();
        $this->production(7);
        $this->showProductsInfo();

        $newAnimals = [
            Cow::class => 1,
            Chicken::class => 5,
        ];

        $this->addNewAnimals($newAnimals);
        $this->showAnimalsInfo();
        $this->production(7);
        $this->showProductsInfo();

    }

    protected function showAnimalsInfo(): void
    {
        $this->newLine();
        $this->line('Животные на ферме');
        $this->line('------------------------------');
        foreach (Farm::getAnimals() as $animalClass => $count) {
            $this->line($animalClass::getName() .': '. $count);
        }
        $this->line('------------------------------');
    }

    protected function showProductsInfo(): void
    {
        $this->newLine();
        $this->line('Произведено продукции');
        $this->line('------------------------------');
        foreach (Farm::getProducts() as $productClass => $count) {
            $this->line($productClass::getName() .': '. $count);
        }
        $this->line('------------------------------');
    }

    protected function production(int $days): void
    {
        if ($days <= 0) {
            throw new \Exception('Количество дней производства должно быть больше 0', 1);
        }

        for ($i=0; $i < $days; $i++) {
            Farm::makeProducts();
        }
    }

    protected function addNewAnimals(array $newAnimals): void
    {
        foreach ($newAnimals as $animal => $count) {
            for ($i = 0; $i < $count; $i++) {
                Farm::addAnimal(new $animal);
            }
        }
    }
}
