<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $orders = [];

        for ($i = 1; $i <= 30; $i++) {
            $orders[] = [
                'order_id' => 'Order'.rand(1111,99999),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('orders')->insert($orders);
    }
}
