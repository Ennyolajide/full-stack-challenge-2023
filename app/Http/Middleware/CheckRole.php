<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (!auth()->user() || !auth()->user()->hasRole($role)) {
            return abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
