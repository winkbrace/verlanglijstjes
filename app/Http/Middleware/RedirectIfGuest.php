<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Our auth routes should also not be accessible to logged-in guests.
 */
class RedirectIfGuest
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // auth middleware should have run first, but guard against direct use
        if (!Auth::check()) {
            // Let the default auth flow handle unauthenticated users
            return redirect()->route('login');
        }

        $user = $request->user();
        if ($user->isGuest()) {
            return redirect()->route('home')
                ->with('error', 'Je hebt geen toegang met een gast-account.');
        }

        return $next($request);
    }
}
