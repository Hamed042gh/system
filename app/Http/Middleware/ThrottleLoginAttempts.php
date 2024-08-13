<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\RateLimiter;

class ThrottleLoginAttempts
{
    public function handle($request, Closure $next)
    {
        $ip = $request->ip();
        $key = 'login_attempts:' . $ip;

        $maxAttempts = 5;
        $decayMinutes = 1;

        if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
            $seconds = RateLimiter::availableIn($key);
            return response()->json(['error' => "Too many login attempts. Try again in $seconds seconds."], 429);
        }

        RateLimiter::hit($key, $decayMinutes * 60);

        return $next($request);
    }
}
