<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class adminAuth{

    public function handle(Request $request, Closure $next)
    {
        $userId=$request->session()->get('id');
        if(empty($userId))
        {
            return redirect()->route('login');
        }
        else{
            // dd($userId);
            return redirect()->route('student.create');
        }
    }
}