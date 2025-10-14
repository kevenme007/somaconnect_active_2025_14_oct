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
use Illuminate\Validation\Rule;
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
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'role'     => ['required', Rule::in(['student', 'teacher', 'admin'])],
            'username' => 'nullable|string|max:255|unique:users,username',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name'              => $request->name,
            'email'             => $request->email,
            'username'          => $request->username,
            'password'          => Hash::make($request->password),
            'role'              => $request->role,
            'profile_completed' => false,

        ]);

        event(new Registered($user));

        Auth::login($user);

        // 🆕 Check profile completion status
        if (! $user->profile_completed) {
            // Redirect user to complete their profile
            return redirect()->route('profile.edit')->with('info', 'Please complete your profile to continue.');
        }

        return redirect(RouteServiceProvider::HOME);
        // return redirect()->route('profile.edit');
    }
}
