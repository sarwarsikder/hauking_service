<?php

namespace Database\Seeders;

use App\Models\Coupon;
use App\Models\Frequency;
use App\Models\LanguageSettings;
use App\Models\Tax;
use App\Models\User;
use App\Models\Service;
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

        //    $this->call([
        //        CountrySeeder::class
        //    ]);
        //    $this->call([
        //        StateSeeder::class,
        //    ]);
        //    $this->call([
        //        CitySeeder::class,
        //    ]);

        //    /***
        //     *  Seed coupon fake data
        //     ***/
        //    Coupon::factory(20)->create();

        //    /***
        //     *  Seed services fake data
        //     ***/
        //    Frequency::factory(20)->create();
        //    Tax::factory(20)->create();

        //    /***
        //     *  Seed admin fake data
        //     ***/
        //    LanguageSettings::factory(1)->create();
        $this->call([
            CountrySeeder::class
        ]);
        $this->call([
            StateSeeder::class,
        ]);
        $this->call([
            CitySeeder::class,
        ]);

        /***
         *  Seed coupon fake data
         ***/
        Coupon::factory(20)->create();

        /***
         *  Seed services fake data
         ***/
        Frequency::factory(20)->create();
        Tax::factory(20)->create();

        /***
         *  Seed admin fake data
         ***/
        LanguageSettings::factory(1)->create();


        /***
         *  Seed admin fake data
         ***/
        $this->call([
            PaymentSettingsSeeder::class,
        ]);

        //    /***
        //     *  Seed admin fak data
        //     ***/
        //    User::factory()->create([
        //        'first_name' => fake()->firstName(),
        //        'last_name' => fake()->lastName(),
        //        'email' => 'admin@hauwk.com',
        //        'role' => 'admin',
        //        'email_verified_at' => now(),
        //        'status' => false,
        //        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //        'remember_token' => Str::random(10),
        //    ]);

        //    /***
        //     *  Seed users fake data
        //     ***/
        //    User::factory(100)->create();
        //    /***
        //     *  Seed services fake data
        //     ***/
        //    Service::factory(20)->create();
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
         *  Seed users fake data
         ***/
        User::factory(100)->create();
        /***
         *  Seed services fake data
         ***/
        Service::factory(20)->create();

        $this->call([
            PermissionSeeder::class,
        ]);

        $this->call([
            RoleSeeder::class,
        ]);

        $this->call([
            PermissionHasRoleSeeder::class,
        ]);

        $this->call([
            ModelHasRoleSeeder::class,
        ]);


    }
}
