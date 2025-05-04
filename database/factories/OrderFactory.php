<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'order_date' => $this->faker->dateTimeThisYear(),
            'total_amount' => $this->faker->randomFloat(2, 1000, 10000),
            'shipping_address' => $this->faker->address(),
            'payment_method' => $this->faker->randomElement(['Cash on Delivery', 'Credit Card', 'PayPal']),
            'order_status' => $this->faker->randomElement(['Pending', 'Processing', 'Shipped', 'Delivered']),
        ];
    }
}
