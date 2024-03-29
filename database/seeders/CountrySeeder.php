<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries_sql = base_path('database/sql/countries.sql');

        DB::unprepared(
            file_get_contents($countries_sql)
        );
    }
}
