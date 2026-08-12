<?php
namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class TrackUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            logger('Updating online status for user: ' . Auth::id());

            $expiresAt = now()->addMinutes(2);
            Cache::put('user-is-online-' . Auth::id(), true, $expiresAt);

            Auth::user()->update(['last_seen_at' => now()]);
        }

        return $next($request);
    }
}
