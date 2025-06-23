<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            for ($i = 0; $i < 10; $i++) {
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
        });
    }
}
