<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            for ($i = 0; $i < 10; $i++) {
                DB::table('users')->insert([
                    'name' => fake()->userName(),
                    'email' => fake()->unique()->safeEmail(),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        });
    }
}
