<?php

namespace Database\Seeders;

use App\Constants\BookingConstants;
use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        (new ProductFactory())->count(BookingConstants::NUMBER_OF_PRODUCTS_TO_CREATE)->create();
    }
}
