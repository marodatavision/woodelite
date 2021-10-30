<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $invoice_number = '' . $this->faker->dayOfMonth() . $this->faker->month() . $this->faker->year() . $this->faker->time('His');
        return [
            'invoice_text' => $this->faker->optional()->realText($this->faker->numberBetween(100, 300)),
            'invoice_comments' => $this->faker->optional()->realText($this->faker->numberBetween(100, 300)),
            'invoice_number' => intval($invoice_number),
            'invoice_discount' => $this->faker->randomFloat(2, 0.00, 1.00),
        ];
    }
}
