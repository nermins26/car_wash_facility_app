<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasCar
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
        if(auth()->user()->profile->cars->count() > 0) {
            return $next($request);
        } 
        
        return redirect(route('cars.show.create'));

        
    }
}
