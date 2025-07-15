<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\progress;

class FollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        progress(
            'Seeding follows...',
            10,
            function () {
                $user_id = fake()->numberBetween(1, 10);
                $follow_id = fake()->numberBetween(1, 10);
                while ($follow_id == $user_id) {
                    $follow_id = fake()->numberBetween(1, 10);
                }
                DB::table('follows')->insert([
                    'follow_id' => $follow_id,
                    'user_id' => $user_id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        );
    }
}
