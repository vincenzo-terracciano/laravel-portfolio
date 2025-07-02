<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function home()
    {
        $user = Auth::user();

        return view('admin.home', compact('user'));
    }

    public function profile()
    {
        $user = Auth::user();

        return view('admin.profile', compact('user'));
    }
}
