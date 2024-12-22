<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class ClassroomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('classrooms')->insert([
                'room_number' => $faker->randomElement(['A', 'B', 'C', 'D']) . $faker->randomNumber(3),
                'capacity' => $faker->numberBetween(10, 100),
                'building' => 'Tòa Nhà ' . $faker->randomElement(['A', 'B', 'C', 'D']) . $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
