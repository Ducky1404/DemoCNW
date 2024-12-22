<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('books')->insert([
                'name' => $faker->sentence(3),
                'author' => $faker->name,
                'category' => $faker->word,
                'year' => $faker->year,
                'quantity' => $faker->numberBetween(1, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
