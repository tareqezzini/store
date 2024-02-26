<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('users')->insert(
            // Insert record for admin
            [
                'full_name' => 'Tareq Zini',
                'user_name' => 'tareq',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
            ],
        );
        // Insert record for seller
        DB::table('users')->insert([
            'full_name' => 'Oussama Alaoui',
            'user_name' => 'oussama',
            'email' => 'seller@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'seller', // You can add the seller role here
        ]);

        // Insert record for customer
        DB::table('users')->insert([
            'full_name' => 'Yassin Sabti',
            'user_name' => 'yassin',
            'email' => 'costumer@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'costumer', // You can add the customer role here
        ]);
    }
}