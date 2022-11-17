<?php

namespace Database\Seeders;

use Database\Factories\ClientFactory;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public const NUMBER_OF_CLIENTS_TO_CREATE = 100;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        (new ClientFactory)->count(self::NUMBER_OF_CLIENTS_TO_CREATE)->create();
    }
}
