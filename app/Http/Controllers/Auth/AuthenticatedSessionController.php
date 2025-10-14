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

        // 🆕 Check profile completion status
        if (! $user->profile_completed) {
            // Redirect user to complete their profile
            return redirect()->route('profile.edit')->with('info', 'Please complete your profile to continue.');
        }

        // Redirect based on role
        // switch ($user->role) {
        //     case 'admin':
        //         return redirect()->route('dashboard');
        //     case 'teacher':
        //         return redirect()->route('dashboard.teacher');
        //     case 'student':
        //         return redirect()->route('dashboard.student');
        //     default:
        //         return redirect()->route('home');
        // }

        UserSession::create([
            'user_id'    => auth()->id(),
            'login_time' => now(),
        ]);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
