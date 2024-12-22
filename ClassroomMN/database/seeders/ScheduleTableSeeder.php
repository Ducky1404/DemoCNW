<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $classroomIds = DB::table('classrooms')->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            DB::table('schedules')->insert([
                'classroom_id' => $faker->randomElement($classroomIds),
                'course_name' => $faker->sentence(3),
                'day_of_week' => $faker->dayOfWeek,
                'time_slot' => $faker->randomElement([
                    '08:00 - 10:00',
                    '10:00 - 12:00',
                    '13:00 - 15:00',
                    '15:00 - 17:00',
                    '18:00 - 20:00',
                ]),
                'created_at' => now(), // Current timestamp
                'updated_at' => now(), // Current timestamp
            ]);
        }
    }
}
