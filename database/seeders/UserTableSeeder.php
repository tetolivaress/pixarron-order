<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash, Log;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		try {
			User::create([
				'name' => 'Jesus Olivares',
				'email' => 'tetolivares@gmail.com',
				'password' => Hash::make('1234')
			]);
		} catch (\Throwable $th) {
			Log::error($th);
		}
    }
}
