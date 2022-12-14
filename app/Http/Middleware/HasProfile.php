<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->profile) {
            return $next($request);
        } 

        return redirect(route('profiles.show.create'))->with('user-info-missing', 'You need to have your profile completed to make an order');

        
    }
}
