<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash, Log;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        User::factory()
            ->times(9)
            ->hasAddresses(3)
            ->create();

		try {
            User::factory()->hasAddresses(3)
                ->create([
                    'name' => 'Jesus Olivares',
                    'email' => 'tetolivares@gmail.com',
                    'password' => Hash::make('1234'),
                    'is_admin' => true
                ]);

            User::factory()->hasAddresses(3)
                ->create([
                    'name' => 'cliente',
                    'email' => 'cliente@gmail.com',
                    'password' => Hash::make('password')
                ]);
		} catch (\Throwable $th) {
			Log::error($th);
		}
    }
}
