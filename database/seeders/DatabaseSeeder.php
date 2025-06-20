<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\DeliveryPersonSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DeliveryPersonSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
