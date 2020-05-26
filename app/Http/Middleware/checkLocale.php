<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class checkLocale
{

    public function handle($request, Closure $next)
    {
        if ($request->has('locale')) {
            session(['locale', $request('locale')]);
        } else {
            session(['locale', 'en']);
        }
        App::setLocale(session('locale'));
        return $next($request);
    }
}
