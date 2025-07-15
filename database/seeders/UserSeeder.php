<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\progress;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        progress(
            'Seeding users...',
            10,
            fn() => DB::table('users')->insert([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'created_at' => now(),
                'updated_at' => now()
            ])
        );
    }
}
