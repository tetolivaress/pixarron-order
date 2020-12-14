<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition()
    {
        return [
            'user_id' => random_int(1, 10),
            'name' => $this->faker->word(),
            'detail' => $this->faker->address(random_int(160, 480)),
        ];
    }
}
