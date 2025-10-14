<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\PageVisit;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogPageVisits
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

       $response = $next($request);

       $userId = auth()->check() ? auth()->id() : null;
        $userAgent = $request->header('User-Agent');
        $ipAddress = $request->ip();

        // Simple device detection
        $device = $this->detectDevice($userAgent);

    if (auth()->check()) {
        PageVisit::create([
            'user_id' => auth()->id(),
            'page_url' => $request->path(),
              'device'     => $device,
            'ip_address' => $ipAddress,
            'visited_at' => now(),
        ]);
    }

    return $response;
    }

    private function detectDevice($userAgent): string
    {
        if (stripos($userAgent, 'Windows') !== false) return 'Windows PC';
        if (stripos($userAgent, 'Macintosh') !== false) return 'Mac';
        if (stripos($userAgent, 'iPhone') !== false) return 'iPhone';
        if (stripos($userAgent, 'Android') !== false) return 'Android';
        if (stripos($userAgent, 'Linux') !== false) return 'Linux';
        return 'Unknown Device';
    }
}
