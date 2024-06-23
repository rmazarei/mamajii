<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\users_tbl;
use Illuminate\Support\Facades\Auth;

class Admin_Panel_Auth
{
    //Get Check Login TOken From Session Start
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            return $next($request);
        }
        else
        {
            return redirect('Admin/Login');
        }
    }
    //Get Check Login TOken From Session End
}
