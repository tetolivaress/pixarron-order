<?php

namespace Database\Factories;

use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderProductFactory extends Factory
{
    public function definition()
    {
        return [
            'order_id' => random_int(1, 5),
            'address_id' => random_int(1, 5)
        ];
    }
}
