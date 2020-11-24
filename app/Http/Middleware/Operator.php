<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Operator
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
        if (empty(Auth::guard('user')->user())) {
            return back()->with('error', "Only operator can access!");
        } else {
            if (Auth::guard('user')->user()->role_id == 2) {
                return $next($request);
            }
        }

        return back()->with('error', "Only operator can access!");
    }
}
