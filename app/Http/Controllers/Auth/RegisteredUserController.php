<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\{User, Order};
use App\Providers\RouteServiceProvider;
use App\Http\Resources\{UserResource};
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        Auth::login($user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }

    public function index()
    {
				return new UserResource(User::find(Auth::id()));
        // return User::with(['orders.products', 'addresses'])->find(Auth::user()->id);
    }

    public function listOrders()
    {
				$orders = Order::with(['address.user', 'products'])->orderBy('created_at')->get();
				return $orders->where('address.user.id', Auth::id());
    }

    public function listAddresses()
    {
				$user = new UserResource(User::find(Auth::id()));
				return $user->addresses;
    }
}
