<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 500, 5000),
            'size' => $this->faker->randomElement(['6', '7', '8', '9', '10']),
            'color' => $this->faker->safeColorName(),
            'image_url' => $this->faker->imageUrl(640, 480, 'fashion', true),
        ];
    }
}
