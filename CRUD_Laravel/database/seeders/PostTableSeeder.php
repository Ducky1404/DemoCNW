<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // su dung fake du lieu;
        $faker = Faker::create('vi');

        // sinh du lieu;
        for ($i = 0; $i < 100; $i++) {
            DB::table('posts')->insert([
                'title' => $faker->name,
                'content' => $faker->text,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
