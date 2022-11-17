<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            GenderSeeder::class,
            ProductTypeSeeder::class,
            ClientSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
