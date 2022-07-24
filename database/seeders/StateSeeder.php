<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states_sql = base_path('database/sql/states.sql');

        DB::unprepared(
            file_get_contents($states_sql)
        );
    }
}
