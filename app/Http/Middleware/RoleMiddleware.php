<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
		if (!Auth::user() || !Auth::user()->tokenCan(env('APP_TOKEN'))) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        foreach ($roles as $role) {
            if (!Auth::user()->hasRole($role)) {
                return response()->json(['error' => 'Unauthorized.'], 403);
            }
        }

        return $next($request);
    }
}
