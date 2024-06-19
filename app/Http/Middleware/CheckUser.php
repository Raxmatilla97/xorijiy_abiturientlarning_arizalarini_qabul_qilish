<?php

namespace App\Http\Middleware;


use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $userId)
    {
        if (Auth::check() && Auth::user()->id == $userId) {
            return $next($request);
        }

        return abort(403, "Unauthorized");
    }
}
