<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class adminLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->exists('adminuser')) {
            // user value found in session
            return redirect('tsadmin/dashboard');
        }
        return $next($request);
    }
}
