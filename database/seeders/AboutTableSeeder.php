<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('abouts')->delete();
        DB::table('abouts')->insert(
            [
                'title' => 'lorem ipsum',
                'description' => 'Lorem ipsum dolor sit amet.',
            ]
        );
    }
}
