<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DemoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $practice)
     {
        //echo "welcome to hello world";
        return $practice($request);  
    }

    // public function handle(Request $request, Closure $twocreated)
    // {
    //     echo "welcome to demo practies";
    //     return $twocreated($request);
    // }
}
