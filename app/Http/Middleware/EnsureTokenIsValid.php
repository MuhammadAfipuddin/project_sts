<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class EnsureTokenIsValid
{

    public function handle(Request $request, Closure $next): Response
    {
        if(!Session::has('token')){
            return redirect('login');
        }
        return $next($request);
    }
}
