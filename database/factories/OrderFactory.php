<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_description' => $this->faker->realText($this->faker->numberBetween(20, 250)),
            'order_comments' => $this->faker->optional()->realText($this->faker->numberBetween(100, 300)),
        ];
    }
}
