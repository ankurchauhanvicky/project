<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class UseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle($request, Closure $next)
    // {
    //     $response = $next($request);

    //     if (auth()->check()) {
    //         $user = auth()->user();

    //         //echo $user;die;
    //          Mail::to($user->email)->send(new TestMail());
    //     }
    //          return $response;
    // }

    public function handle($request, Closure $Role)
    {  
       
        return $Role($request);
    }


}
