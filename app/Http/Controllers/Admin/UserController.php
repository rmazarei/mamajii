<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query();
        if($request->midwives){
            $users = $users->where('user_type', 'midwife');
        } else {
            $users = $users->where('user_type', 'user');
        }
        $users = $users->paginate();

        return view('Admin.Panel.usermanager', compact('users'));
    }

    public function edit(User $user)
    {
        $userTypes = UserType::all();
        return view('Admin.Panel.edit_user',compact('user', 'userTypes'));
    }
}
