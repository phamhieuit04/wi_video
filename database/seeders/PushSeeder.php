<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\progress;

class PushSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        progress(
            'Seeding pushes...',
            10,
            fn() => DB::table('pushes')->insert([
                'content' => fake()->sentence(),
                'user_id' => fake()->numberBetween(1, 10),
                'status' => fake()->randomElement(['wait', 'done', 'fail']),
                'created_at' => now(),
                'updated_at' => now()
            ])
        );
    }
}
