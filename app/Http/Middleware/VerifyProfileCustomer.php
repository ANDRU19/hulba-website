<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyProfileCustomer
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
        if(auth()->check()){
            if(!$request->user()->name || !$request->user()->surname || !$request->user()->email){
                return redirect()->route('profile');
            }
        }
        return $next($request);
    }
}
