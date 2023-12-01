<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use \Illuminate\Validation\ValidationException;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
if(isset($request->businessName)){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'business_name' => $request->businessName,
            'type_account' => $request->type_account,
            'password' => Hash::make($request->password),
        ]);
}else{
    $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'type_account' => $request->type_account,
            'password' => Hash::make($request->password),
        ]);
}
        event(new Registered($user));

        Auth::login($user);

        return Redirect::to('registertow');
    }
}