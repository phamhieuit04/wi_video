<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PushSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            for ($i = 0; $i < 10; $i++) {
                DB::table('pushes')->insert([
                    'content' => fake()->sentence(),
                    'user_id' => fake()->numberBetween(1, 10),
                    'status' => fake()->randomElement(['wait', 'done', 'fail']),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        });
    }
}
