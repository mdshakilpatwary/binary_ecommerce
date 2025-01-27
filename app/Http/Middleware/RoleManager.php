<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
        if(!Auth::check()){
            return redirect('login')->with('error', 'Please login first.');
        }
        switch ($role) {
            case 'admin':
                if(Auth::user()->role =='admin'){
                    return $next($request);
                }
                break;
            
            case 'user':
                if(Auth::user()->role =='user'){
                    return $next($request);
                }
                break;
        }



        switch(Auth::user()->role){
            case 'admin':
                return redirect('admin/dashboard');
            break;

            case 'user' :
                return redirect('dashboard');

        }


        return redirect()->route('login');
    }
}
