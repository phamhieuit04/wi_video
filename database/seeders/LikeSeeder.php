<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\progress;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        progress(
            'Seeding likes...',
            10,
            fn() => DB::table('likes')->insert([
                'video_id' => fake()->numberBetween(1, 10),
                'user_id' => fake()->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now()
            ])
        );
    }
}
