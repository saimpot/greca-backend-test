<?php

namespace Database\Seeders;

use App\Constants\BookingConstants;
use Database\Factories\ClientFactory;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        (new ClientFactory)->count(BookingConstants::NUMBER_OF_CLIENTS_TO_CREATE)->create();
    }
}
