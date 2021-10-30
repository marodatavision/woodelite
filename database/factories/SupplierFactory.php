<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'supplier_firstname' => $this->faker->firstname,
            'supplier_lastname' => $this->faker->lastname,
            'supplier_company' => $this->faker->optional()->company,
            'supplier_comments' => $this->faker->optional()->realText($this->faker->numberBetween(100, 300)),
        ];
    }
}
