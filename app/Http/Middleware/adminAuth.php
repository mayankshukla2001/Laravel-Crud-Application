<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class adminAuth{

    public function handle(Request $request, Closure $next)
    {
        $userId=$request->session()->get('id');
        if(!empty($userId))
        {
            return $next($request);
        }
        else{
            return redirect()->route('login');
        }
    }
}