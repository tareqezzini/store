<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Order;
use App\Models\ProductRate;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        // $this->call(AboutTableSeeder::class);
        // $this->call(UserTableSeeder::class);
        // $this->call(CurrencyTableSeeder::class);
        // $this->call(SettingsTableSeeder::class);

        // User::factory(20)->create();
        // Category::factory(15)->create();

        // Order::factory(200)->create();
        ProductRate::factory(500)->create();
    }
}
