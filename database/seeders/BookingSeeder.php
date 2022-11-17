<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    public const NUMBER_OF_BOOKINGS_TO_CREATE = 15000;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // This was done this way, to ensure the seeder won't fail for the unique violation rule
        for($i = 1; $i <= self::NUMBER_OF_BOOKINGS_TO_CREATE; $i++) {
            Booking::firstOrCreate([
                'client_id' => fake()->numberBetween(1, ClientSeeder::NUMBER_OF_CLIENTS_TO_CREATE),
                'product_id' => fake()->numberBetween(1, ProductSeeder::NUMBER_OF_PRODUCTS_TO_CREATE),
            ]);
        }
    }
}
