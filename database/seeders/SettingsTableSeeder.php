<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('settings')->delete();
        DB::table('settings')->insert([
            'name_app' => 'lorem ipsum',
            'email' => 'lorem ipsum',
            'phone' => 'lorem ipsum',
            'logo' => 'logo.png',
            'fave_icon' => 'fav_icon.png',
            'instagram' => 'www.instagram/techStore',
            'facebook' => 'www.facebook/techStore',
            'description' => 'Lorem ipsum dolor sit.',

        ]);
    }
}
