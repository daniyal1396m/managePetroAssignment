<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Client::factory(20)->create();
        \App\Models\Address::factory(15)->create();
        \App\Models\Truck::factory(10)->create();
        \App\Models\Order::factory(13)->create();
    }
}
