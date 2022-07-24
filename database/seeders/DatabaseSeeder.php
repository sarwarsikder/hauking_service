<?php

namespace Database\Seeders;

use App\Models\Coupon;
use App\Models\Service;
use App\Models\User;
use Database\Factories\AdminFactory;
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
            'status' => false,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        /***
         *  Seed users fak data
         ***/
        User::factory(100)->create();
        /***
         *  Seed services fak data
         ***/
        Service::factory(20)->create();

        /***
         *  Seed services fak data
         ***/
        Coupon::factory(20)->create();
    }
}
