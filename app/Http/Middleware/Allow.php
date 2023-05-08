<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Allow
{
    /**
     * Gives access if authenticated user has any of the given roles
     * otherwise return 403 unauthorized page
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        foreach ($roles as $role) {
            if (auth()->user()->hasRole($role)) {
                return $next($request);
            }
        }
        return abort(403, 'You are not authorized');
    }
}
