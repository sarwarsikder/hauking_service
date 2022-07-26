<?php

namespace Database\Seeders;

use App\Models\Timezone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimezoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payments = new Timezone();

        $data = [
            [
                'method_type' => 'paypal',
                'mode' => 'test',

                'account_email' => fake()->email(),
                'client_id' => 'fdfdfddfddfdfd',
                'client_secret_key' => 'gfgfffgggfgffgfgfgg',

                'test_public_key' => '',
                'test_secret_key' => '',
                'live_public_key' => '',
                'live_secret_key' => '',

                'default_payment' => 1,
                'display_order' => 1
            ],
            [
                'method_type' => 'stripe',
                'mode' => 'test',

                'account_email' => fake()->email(),
                'client_id' =>null,
                'client_secret_key' => null,

                'test_public_key' => '12121212121',
                'test_secret_key' => 'sdsdsdsdsddsdsdsdsdsd',
                'live_public_key' => 'dsdshsjhsjdhsdhsdhshdsdsds',
                'live_secret_key' => 'dsdssdssdsdsdsdsdsdsdsdsddsd',

                'default_payment' => 0,
                'display_order' => 2
            ]
        ];

        $payments::insert($data);

    }
}
