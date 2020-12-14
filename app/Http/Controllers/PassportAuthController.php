<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\{RegisterUserRequest, LoginUserRequest};
use Laravel\Passport\{TokenRepository, RefreshTokenRepository};
use Hash, Auth;

class PassportAuthController extends Controller
{
    private $tokenRepository, $refreshTokenRepository;

    public function __construct() {
      $this->tokenRepository = app(TokenRepository::class);
      $this->refreshTokenRepository = app(RefreshTokenRepository::class);
    }

    public function register(RegisterUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
            ]);
        return response()->json(['user' => $user], 200);
    }

    public function logout(Request $request)
    {
        Auth::user()->token()->revoke();
        return response()->json(['message' => 'Your token has been revoked']);
    }
}
