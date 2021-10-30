<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentinfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bank_name' => $this->faker->company,
            'iban' => $this->faker->iban,
            'bic' => $this->faker->swiftBicNumber,
            'receiver_name' => $this->faker->name,
            'receiver_email' => $this->faker->optional()->email,
            'receiver_phone' => $this->faker->optional()->e164PhoneNumber,
            'tax_number' => $this->faker->optional()->creditCardNumber // yes i know it's tax_number but for simple testing i use creditCardNumber as pendant
        ];
    }
}
