<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WoodlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'log_price' => $this->faker->randomFloat(2, 1.00, 1000.00),
            'log_owner' => $this->faker->optional()->name,
            'log_diameter' => $this->faker->randomFloat(2, 10.00, 90.00),
            'log_length' => $this->faker->randomFloat(2, 1.00, 9.00),
            'wood_type' => $this->faker->randomElement(['Fichte', 'Kiefer', 'Lärche', 'Tanne', 'Eiche', 'Buche']),
            'wood_quality' => $this->faker->numberBetween(1, 3),
        ];
    }
}
