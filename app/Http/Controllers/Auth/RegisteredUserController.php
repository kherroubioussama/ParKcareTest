<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\UserRegisteredNotification;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'profile_picture' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);


        $profilePicturePath = null;

        if ($request->hasFile('profile_picture')) {
            $fileName = time() . $request->file('profile_picture')->getClientOriginalName();
            $profilePicturePath = $request->file('profile_picture')->storeAs('uploads', $fileName, 'public');
        } else {
            $profilePicturePath = 'uploads/default.png';
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_picture' => $profilePicturePath,
        ]);
        try {
            $user->notify(new UserRegisteredNotification($user));
        } catch (\Exception $e) {
        }


        // Authenticate the user
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
