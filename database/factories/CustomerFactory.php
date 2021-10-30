<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_firstname' => $this->faker->firstname,
            'customer_lastname' => $this->faker->lastname,
            'customer_company' => $this->faker->optional()->company,
            'customer_comments' => $this->faker->optional()->realText(300)
        ];
    }
}
