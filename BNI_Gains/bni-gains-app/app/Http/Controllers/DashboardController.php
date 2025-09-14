<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $profiles = Auth::user()->profiles()->with('bniGainsProfile')->latest()->get();
        return view('dashboard', compact('profiles'));
    }
}