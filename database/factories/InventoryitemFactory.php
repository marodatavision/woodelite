<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryitemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $item_names = [
            'Sägeblatt (Besäumer)',
            'Sägeblatt (Bandsäge)',
            'Axt',
            'Keil',
            'Lagerhölzer (klein)',
            'Lagerhölzer (groß)'
        ];
        return [
            'item_name' => $this->faker->randomElement($item_names),
            'item_description' => $this->faker->realText($this->faker->numberBetween(20, 200)),
            'item_comments' => $this->faker->optional()->realText($this->faker->numberBetween(50, 300)),
            'item_price' => $this->faker->randomFloat(2, 10.00, 10000.00),
            'package_units' => $this->faker->optional()->numberBetween(10, 1000),
        ];
    }
}
