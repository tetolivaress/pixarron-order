<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\{RegisterUserRequest, LoginUserRequest};
use Hash;

class PassportAuthController extends Controller
{
    public function register(RegisterUserRequest $request)
		{
				$user = User::create([
						'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
				]);
				return response()->json(['user' => $user], 200);
		}
}
