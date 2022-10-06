<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role1, $role2 = false)
    {
        $user = auth()->user();
      
        if($role2) 
        {
            if ($user->role->name == $role1 ||
            $user->role->name == $role2) 
            {
                return $next($request);
            }   
        } 

        if ($user->role->name == $role1)
        {
            return $next($request);
        }   
        
        abort(403, "You are not allowed to access!");
    }
}
