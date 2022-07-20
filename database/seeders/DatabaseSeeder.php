<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\AdminFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        /***
         *  Seed admin fak data
         ***/
        User::factory()->create([
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => 'admin@hauwk.com',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        /***
         *  Seed users fak data
         ***/
        User::factory(1000)->create();
    }
}
