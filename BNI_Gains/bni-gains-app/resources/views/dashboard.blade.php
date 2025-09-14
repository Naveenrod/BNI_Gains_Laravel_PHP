
@extends('layouts.app')

@section('title', '- Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2>
                        <i class="bi bi-speedometer2 me-2 text-primary"></i>
                        Dashboard
                    </h2>
                    <p class="text-muted">Welcome back, {{ auth()->user()->full_name }}!</p>
                </div>
                <a href="{{ route('profiles.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i>Create New Profile
                </a>
            </div>

            @if($profiles->count() > 0)
                <div class="row g-4">
                    @foreach($profiles as $profile)
                        <div class="col-md-6 col-lg-4">
                            <div class="card profile-card shadow-sm h-100">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">{{ $profile->title }}</h6>
                                    <span class="badge {{ $profile->status === 'enabled' ? 'bg-success' : 'bg-secondary' }}">
                                        <i class="bi bi-{{ $profile->status === 'enabled' ? 'eye' : 'eye-slash' }} me-1"></i>
                                        {{ ucfirst($profile->status) }}
                                    </span>
                                </div>
                                
                                <div class="card-body">
                                    @if($profile->logo)
                                        <div class="text-center mb-3">
                                            <img src="{{ Storage::url($profile->logo) }}" alt="Logo" class="logo-preview rounded">
                                        </div>
                                    @endif
                                    
                                    <p class="text-muted small mb-3">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        Created {{ $profile->created_at->format('M j, Y') }}
                                    </p>
                                    
                                    <p class="text-muted small mb-3">
                                        <i class="bi bi-link-45deg me-1"></i>
                                        <span class="text-break">{{ $profile->hostname }}</span>
                                    </p>

                                    <div class="btn-group w-100" role="group">
                                        <a href="{{ route('profiles.edit', $profile) }}" class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <a href="{{ route('public.profile', $profile->slug) }}" target="_blank" class="btn btn-outline-success btn-sm">
                                            <i class="bi bi-eye"></i> View
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="card-footer">
                                    <div class="btn-group w-100" role="group">
                                        <a href="{{ route('profiles.pdf', $profile) }}" class="btn btn-outline-danger btn-sm">
                                            <i class="bi bi-file-earmark-pdf"></i> PDF
                                        </a>
                                        <a href="{{ route('profiles.qr-code', $profile) }}" target="_blank" class="btn btn-outline-info btn-sm">
                                            <i class="bi bi-qr-code"></i> QR Code
                                        </a>
                                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="deleteProfile({{$profile->id}})">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <i class="bi bi-person-badge text-muted" style="font-size: 4rem;"></i>
                    <h4 class="text-muted mt-3">No profiles yet</h4>
                    <p class="text-muted">Create your first BNI Gains profile to get started.</p>
                    <a href="{{ route('profiles.create') }}" class="btn btn-primary mt-3">
                        <i class="bi bi-plus-circle me-2"></i>Create Your First Profile
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Delete Profile Form (Hidden) -->
<form id="deleteProfileForm" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endsection

@section('scripts')
<script>
function deleteProfile(profileId) {
    if (confirm('Are you sure you want to delete this profile? This action cannot be undone.')) {
        const form = document.getElementById('deleteProfileForm');
        form.action = ' /profiles/' + profileId;
        form.submit();
    }
}
</script>
@endsection