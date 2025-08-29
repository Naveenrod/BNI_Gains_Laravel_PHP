<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $profiles = Auth::user()->profiles()->with('bniGainsProfile')->latest()->get();
        return view('dashboard.index', compact('profiles'));
    }
}