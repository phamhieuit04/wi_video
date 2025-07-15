<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\progress;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        progress(
            'Seeding videos...',
            10,
            fn($step) => DB::table('videos')->insert([
                'video_url' => env('APP_URL') . "/video_{$step}.com",
                'caption' => fake()->sentence(10),
                'author_id' => fake()->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now()
            ])
        );
    }
}
