<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class userNotLoggedIn
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
        if (!$request->session()->exists('user')) {
            // user value cannot be found in session
            if(session('loginRedirect')){
                return redirect(session('loginRedirect'))->with('loginmessage', 'You are not logged in : Please Log in');
            }
            else{
                return redirect('/'); 
            }
            
        }
        return $next($request);
    }
}
