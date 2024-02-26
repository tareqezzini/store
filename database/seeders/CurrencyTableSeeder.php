<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencyTableSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('currencies')->insert(
            [
                'name' => 'dollar',
                'code' => 'usa',
                'symbol' => '$',
                'exchange' => '1',
            ]
        );
    }
}
