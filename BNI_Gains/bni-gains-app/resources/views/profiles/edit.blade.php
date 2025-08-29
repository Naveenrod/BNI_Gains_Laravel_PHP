@extends('layouts.app')

@section('title', "- Edit {$profile->title}")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="bi bi-pencil me-2 text-primary"></i>
                            Edit Profile: {{ $profile->title }}
                        </h4>
                        <div class="btn-group">
                            <a href="{{ route('public.profile', $profile->slug) }}" target="_blank" class="btn btn-outline-success btn-sm">
                                <i class="bi bi-eye me-1"></i>Preview
                            </a>
                            <a href="{{ route('profiles.pdf', $profile) }}" class="btn btn-outline-danger btn-sm">
                                <i class="bi bi-file-earmark-pdf me-1"></i>Download PDF
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('profiles.update', $profile) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <!-- Basic Profile Settings -->
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label for="title" class="form-label fw-bold">Profile Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                       id="title" name="title" value="{{ old('title', $profile->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="status" class="form-label fw-bold">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                    <option value="enabled" {{ old('status', $profile->status) === 'enabled' ? 'selected' : '' }}>
                                        <i class="bi bi-eye me-1"></i>Enabled (Public)
                                    </option>
                                    <option value="disabled" {{ old('status', $profile->status) === 'disabled' ? 'selected' : '' }}>
                                        <i class="bi bi-eye-slash me-1"></i>Disabled (Private)
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="logo" class="form-label fw-bold">Logo</label>
                            @if($profile->logo)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($profile->logo) }}" alt="Current Logo" class="logo-preview border rounded">
                                    <small class="text-muted d-block">Current logo</small>
                                </div>
                            @endif
                            <input type="file" class="form-control @error('logo') is-invalid @enderror" 
                                   id="logo" name="logo" accept="image/*">
                            <div class="form-text">Upload a new logo to replace the current one (optional)</div>
                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr class="my-4">

                        <!-- BNI Gains Sections -->
                        @php
                            $sections = [
                                ['key' => 'goals', 'title' => 'Goals', 'icon' => 'bi-target', 'color' => 'primary'],
                                ['key' => 'accomplishments', 'title' => 'Accomplishments', 'icon' => 'bi-trophy', 'color' => 'success'],
                                ['key' => 'interests', 'title' => 'Interests', 'icon' => 'bi-heart', 'color' => 'danger'],
                                ['key' => 'networks', 'title' => 'Networks', 'icon' => 'bi-people', 'color' => 'warning'],
                                ['key' => 'skills', 'title' => 'Skills', 'icon' => 'bi-gear', 'color' => 'info']
                            ];
                        @endphp

                        @foreach($sections as $section)
                            <div class="mb-4">
                                <div class="card border-{{ $section['color'] }}">
                                    <div class="card-header bg-{{ $section['color'] }} bg-opacity-10">
                                        <h5 class="mb-0">
                                            <i class="{{ $section['icon'] }} me-2 text-{{ $section['color'] }}"></i>
                                            {{ $section['title'] }}
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="{{ $section['key'] }}_intro" class="form-label fw-bold">Introduction Text</label>
                                            <input type="text" class="form-control" 
                                                   id="{{ $section['key'] }}_intro" name="{{ $section['key'] }}_intro" 
                                                   value="{{ old($section['key'].'_intro', $profile->bniGainsProfile->{$section['key'].'_intro'} ?? '') }}"
                                                   placeholder="e.g., My {{ strtolower($section['title']) }} include:">
                                        </div>
                                        <div class="mb-0">
                                            <label for="{{ $section['key'] }}_input" class="form-label fw-bold">Content</label>
                                            <textarea class="form-control" 
                                                      id="{{ $section['key'] }}_input" name="{{ $section['key'] }}_input" 
                                                      rows="4" 
                                                      placeholder="Enter your {{ strtolower($section['title']) }} here...">{{ old($section['key'].'_input', $profile->bniGainsProfile->{$section['key'].'_input'} ?? '') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="d-flex justify-content-between pt-3">
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left me-2"></i>Back to Dashboard
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-check-circle me-2"></i>Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection