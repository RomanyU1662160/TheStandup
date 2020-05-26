<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{

    public function handle($request, Closure $next)
    {

        if (!$request->user()->hasRole('admin')) {
            return redirect()->route('home')->with('info', "Sorry you don't have access to the admin dashboard ");
        }
        return $next($request);
    }
}
