<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\UserSession;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();

        // Profile completion check
        if (! $user->profile_completed) {
            return redirect()->route('profile.edit')->with('info', 'Please complete your profile to continue.');
        }

        // Create session entry with device (user agent)
        UserSession::create([
            'user_id'    => $user->id,
            'login_time' => now(),
            'device'     => $request->userAgent(), 
        ]);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     $user = Auth::user();

    //     if (! $user->profile_completed) {
    //         return redirect()->route('profile.edit')->with('info', 'Please complete your profile to continue.');
    //     }

    //     UserSession::create([
    //         'user_id'    => auth()->id(),
    //         'login_time' => now(),
    //     ]);

    //     return redirect()->intended(RouteServiceProvider::HOME);
    // }

    /**
     * Destroy an authenticated session.
     */
    // public function destroy(Request $request): RedirectResponse
    // {
    //     Auth::guard('web')->logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect('/');
    // }



    public function destroy(Request $request): RedirectResponse
    {
        $user = Auth::user();

        if ($user) {
            // Find the latest open session for this user and update logout time & duration
            $session = UserSession::where('user_id', $user->id)
                ->whereNull('logout_time')
                ->latest('login_time')
                ->first();

            if ($session) {
                $session->update([
                    'logout_time' => now(),
                    'duration'    => now()->diffInSeconds($session->login_time),
                ]);
            }
        }

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
