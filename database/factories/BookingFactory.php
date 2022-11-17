<?php

namespace Database\Factories;

use App\Models\Client;
use Database\Seeders\ClientSeeder;
use Database\Seeders\ProductSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => fake()->numberBetween(1, ClientSeeder::NUMBER_OF_CLIENTS_TO_CREATE),
            'product_id' => fake()->numberBetween(1, ProductSeeder::NUMBER_OF_PRODUCTS_TO_CREATE),
        ];
    }
}
