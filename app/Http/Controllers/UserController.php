<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    public function showDoctor(User $user)
    {
        if ($user->user_type != "midwife") {
            abort(404);
        }
        return Inertia::render('Doctors/Show', ['doctor' => $user]);
    }

}
