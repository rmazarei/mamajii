<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\users_tbl;
use Illuminate\Support\Facades\Auth;

class AdminPanelAuthMiddleware
{
    //Get Check Login TOken From Session Start
    public function handle($request, Closure $next)
    {
        if(Auth::user()->user_type == 'admin')
        {
            return $next($request);
        }
        else
        {
            return redirect('/');
        }
    }
    //Get Check Login TOken From Session End
}
