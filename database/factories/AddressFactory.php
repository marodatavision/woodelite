<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'street_1' => $this->faker->streetAddress,
            'street_2' => $this->faker->optional()->streetAddress,
            'postal_code' => $this->faker->postcode,
            'city' => $this->faker->city,
            'state' => $this->faker->optional()->state,
            'country' => $this->faker->country,
        ];
    }
}
