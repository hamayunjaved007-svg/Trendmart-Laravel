<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class clientController extends Controller
{
    // Dashboard Page
    public function dashboard()
    {
        return view('user.dashboard');
    }

    // Orders Page
    public function orders()
    {
        return view('user.orders');
    }

    // Settings Page
    public function settings()
    {
        return view('user.settings');
    }
}
