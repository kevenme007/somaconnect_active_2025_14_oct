<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureProfileIsComplete
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        // Check if profile is incomplete
        // if ($user && !$user->profile_completed && !$request->is('profile/edit')) {
        //     return redirect()->route('profile.edit')->with('info', 'Please complete your profile before proceeding.');
        // }

         if (Auth::check() && Auth::user()->profile_completed == false) {
            if (!$request->is('profile/edit')) {
                return redirect()->route('profile.edit')->with('info', 'Please complete your profile before proceeding.');
            }
        }

        return $next($request);
    }
}
