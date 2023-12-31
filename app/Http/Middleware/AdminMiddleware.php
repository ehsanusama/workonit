<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        $allowedAdmins = ['usamaa.ehsan@gmail.com']; // Add your admin usernames or emails

        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        return redirect('/dashboard')->with('error', 'You do not have permission to access this page.');
    }
}
