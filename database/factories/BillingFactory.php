<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BillingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'num_invoice'=> $this->faker->randomElement(['1234567890001','1987654321001', '1787654321001', '117654321001']),
            'type'=> $this->faker->randomElement(['Factura', 'Rompe']),
            'status'=> $this->faker->randomElement(['Pagado','No Pagado']),
            'mount'=> $this->faker->randomDigit,
            'user_id'=> 1
        ];
    }
}
