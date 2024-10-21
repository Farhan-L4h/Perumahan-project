<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$roles
     */
    public function handle(Request $request, Closure $next, $level): Response
    {
        if (auth()->user()->level == $level) {
            return $next($request);
        }

        return redirect()->route('login')->with('error', 'kamu tidak memiliki akses');
    }
}
