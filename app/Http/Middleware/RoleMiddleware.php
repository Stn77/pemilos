<?php

namespace App\Http\Middleware;

use App\Models\Peserta;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        // if(Auth::check() && Auth::user()->role == $role){
        //     return $next($request);
        // }
        // return redirect()->back();

        if(Auth::check() && Auth::user()->role == 'admin'){
            return $next($request);
        }
    }
}
