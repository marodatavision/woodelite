<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SquaretimberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'timber_price' => $this->faker->randomFloat(2, 1.00, 500.00),
            'timber_height' => $this->faker->randomFloat(2, 1.00, 90.00),
            'timber_width' => $this->faker->randomFloat(2, 1.00, 90.00),
            'timber_length' => $this->faker->randomFloat(2, 1.00, 9.00),
            'timber_quality' => $this->faker->optional()->randomElement([1, 2, 3]),
            'timber_moisture' => $this->faker->optonal()->randomFloat(2, 0.00, 99.99)
        ];
    }
}
