<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\progress;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        progress(
            'Seeding comments...',
            10,
            fn() => DB::table('comments')->insert([
                'video_id' => fake()->numberBetween(1, 10),
                'comment' => fake()->paragraph(2),
                'user_id' => fake()->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now()
            ])
        );
    }
}
