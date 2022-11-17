<?php

namespace Database\Seeders;

use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public const NUMBER_OF_PRODUCTS_TO_CREATE = 500;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        (new ProductFactory())->count(self::NUMBER_OF_PRODUCTS_TO_CREATE)->create();
    }
}
