<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class PublicProfileController extends Controller
{
    public function show($slug)
    {
        $profile = Profile::where('slug', $slug)
            ->where('status', 'enabled')
            ->with(['user', 'bniGainsProfile'])
            ->firstOrFail();

        return view('public.profile', compact('profile'));
    }
}