<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            for ($i = 0; $i < 10; $i++) {
                DB::table('videos')->insert([
                    'video_url' => 'video_{$i}.com',
                    'caption' => fake()->sentence(10),
                    'author_id' => fake()->numberBetween(1, 10),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        });
    }
}
