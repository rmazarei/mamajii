<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hospital;
use Inertia\Inertia;

class HospitalController extends Controller
{
    public function show(Hospital $hospital)
    {
        return Inertia::render('Hospitals/Show', ['hospital'=>$hospital]);
    }
}
