<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    // This could ideally go into a more centralized file, perhaps an enum dedicated file. But the time allowed for the assignment is extremely limited for decisions like that.
    private const GENDERS = [
        'male',
        'female',
        'other'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach(self::GENDERS as $gender) {
            DB::table('genders')->insert([
                'title' => $gender,
                'description' => fake()->text(255),
                'active' => 1,
            ]);
        }
    }
}
