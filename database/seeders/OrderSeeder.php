<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run()
    {
        Order::factory()
            ->times(200)
            ->hasProducts(5)
            ->create();
    }
}
