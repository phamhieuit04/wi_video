<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\progress;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        progress(
            'Seeding reports',
            10,
            fn() => DB::table('reports')->insert([
                'content' => fake()->sentence(),
                'user_id' => fake()->numberBetween(1, 10),
                'video_id' => fake()->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now()
            ])
        );
    }
}
