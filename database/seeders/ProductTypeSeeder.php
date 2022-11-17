<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTypeSeeder extends Seeder
{
    // This could ideally go into a more centralized file, perhaps an enum dedicated file. But the time allowed for the assignment is extremely limited for decisions like that.
    private const TYPES = [
        'Excursions',
        'Custom',
        'Packages',
        'Cruises',
        'Transfers',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach(self::TYPES as $type) {
            DB::table('product_types')->insert([
                'title' => $type,
                'description' => fake()->text(255),
                'active' => 1,
            ]);
        }
    }
}
