<?php

namespace Database\Seeders;

use App\Constants\BookingConstants;
use App\Models\Booking;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // This was done this way, to ensure the seeder won't fail for the unique violation rule. There is for sure a better
        // and more performant way to do this, but time is extremely limited
        for($i = 1; $i <= BookingConstants::NUMBER_OF_BOOKINGS_TO_CREATE; $i++) {
            Booking::firstOrCreate([
                'client_id' => fake()->numberBetween(1, BookingConstants::NUMBER_OF_CLIENTS_TO_CREATE),
                'product_id' => fake()->numberBetween(1, BookingConstants::NUMBER_OF_PRODUCTS_TO_CREATE),
            ]);
        }
    }
}
