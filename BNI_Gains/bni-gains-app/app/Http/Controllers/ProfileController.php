<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
            'type' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'nullable|in:enabled,disabled',
        ]);
        
        $validated['user_id'] = Auth::id();
    
        // Handle logo upload
        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }
    
        // Create profile
        $profile = Profile::create($validated);
    
        // 🔑 Automatically create an empty BNI Gains Profile
        $profile->bniGainsProfile()->create([
            'goals_intro' => null,
            'goals_input' => null,
            'accomplishments_intro' => null,
            'accomplishments_input' => null,
            'interests_intro' => null,
            'interests_input' => null,
            'networks_intro' => null,
            'networks_input' => null,
            'skills_intro' => null,
            'skills_input' => null,
        ]);
    
        // ✅ Redirect to the profile view instead of dashboard
        return redirect()
            ->route('profiles.show', $profile)
            ->with('success', 'Profile created successfully!');
    }
    

    /**
     * Display the specified profile
     */
    public function show(Profile $profile)
    {
        $this->authorize('view', $profile);
        return view('profiles.public', compact('profile'));
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
    
        // Validate main profile fields
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'nullable|string',
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
    
        // Update the profile
        $profile->update($validated);
    
        // Update or create the related BNI Gains profile
        $profile->bniGainsProfile()->updateOrCreate(
            ['profile_id' => $profile->id],
            [
                'goals_intro'           => $request->goals_intro,
                'goals_input'           => $request->goals_input,
                'accomplishments_intro' => $request->accomplishments_intro,
                'accomplishments_input' => $request->accomplishments_input,
                'interests_intro'       => $request->interests_intro,
                'interests_input'       => $request->interests_input,
                'networks_intro'        => $request->networks_intro,
                'networks_input'        => $request->networks_input,
                'skills_intro'          => $request->skills_intro,
                'skills_input'          => $request->skills_input,
            ]
        );
    
        // ✅ Redirect to the profile view instead of dashboard
        return redirect()
            ->route('profiles.show', $profile)
            ->with('success', 'Profile updated successfully!');
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

        // Load a Blade view for the PDF
        $pdf = Pdf::loadView('profiles.pdf', compact('profile'));

        // Download the PDF
        return $pdf->download($profile->slug . '.pdf');
        // For now, return a simple response
        return response()->json(['message' => 'PDF generation not implemented yet']);
    }

    /**
     * Show QR code for profile
     */
    public function qrCode(Profile $profile)
    {
        $this->authorize('view', $profile);

        // Generate QR code for the public profile URL
        $url = route('profiles.public', $profile->slug); // e.g., https://yourapp.com/profiles/{slug}
        $qrCode = QrCode::size(200)->generate($url);

        return view('profiles.qr-code', compact('profile', 'qrCode'));
    }
}