<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the profiles
     */
    public function index()
    {
        $profiles = Auth::user()->profiles()->latest()->get();
        return view('profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new profile
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created profile
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:enabled,disabled',
        ]);

        $validated['user_id'] = Auth::id();

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Profile::create($validated);

        return redirect()->route('dashboard')->with('success', 'Profile created successfully!');
    }

    /**
     * Display the specified profile
     */
    public function show(Profile $profile)
    {
        $this->authorize('view', $profile);
        return view('profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the profile
     */
    public function edit(Profile $profile)
    {
        $this->authorize('update', $profile);
        return view('profiles.edit', compact('profile'));
    }

    /**
     * Update the specified profile
     */
    public function update(Request $request, Profile $profile)
    {
        $this->authorize('update', $profile);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:enabled,disabled',
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($profile->logo) {
                Storage::disk('public')->delete($profile->logo);
            }
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $profile->update($validated);

        return redirect()->route('dashboard')->with('success', 'Profile updated successfully!');
    }

    /**
     * Remove the specified profile
     */
    public function destroy(Profile $profile)
    {
        $this->authorize('delete', $profile);

        // Delete logo if exists
        if ($profile->logo) {
            Storage::disk('public')->delete($profile->logo);
        }

        $profile->delete();

        return redirect()->route('dashboard')->with('success', 'Profile deleted successfully!');
    }

    /**
     * Show public profile
     */
    public function public($slug)
    {
        $profile = Profile::where('slug', $slug)
            ->where('status', 'enabled')
            ->with('bniGainsProfile')
            ->firstOrFail();

        return view('profiles.public', compact('profile'));
    }

    /**
     * Generate PDF for profile
     */
    public function pdf(Profile $profile)
    {
        $this->authorize('view', $profile);

        // You'll need to implement PDF generation logic here
        // For now, return a simple response
        return response()->json(['message' => 'PDF generation not implemented yet']);
    }

    /**
     * Show QR code for profile
     */
    public function qrCode(Profile $profile)
    {
        $this->authorize('view', $profile);

        // You'll need to implement QR code generation logic here
        // For now, return a simple view
        return view('profiles.qr-code', compact('profile'));
    }
}