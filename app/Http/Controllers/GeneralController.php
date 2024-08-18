<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

class GeneralController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Index', );
    }

    public function about(): \Inertia\Response
    {
        return Inertia::render('About');
    }

    public function contact(): \Inertia\Response
    {
        return Inertia::render('Contact');
    }

    public function courses(): \Inertia\Response
    {
        return Inertia::render('Courses');
    }

    public function articles(): \Inertia\Response
    {
        return Inertia::render('Articles');
    }
}
