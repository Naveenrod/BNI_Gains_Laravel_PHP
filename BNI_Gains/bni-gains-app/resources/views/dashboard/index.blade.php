@extends('layouts.app')
@section('title', '- Dashboard')

@section('content')
<style>
    .bni-dashboard {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 100vh;
        padding: 30px 0;
    }

    .dashboard-header {
        background: linear-gradient(135deg, #e74c3c, #c0392b);
        color: white;
        border-radius: 15px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 8px 25px rgba(231, 76, 60, 0.3);
    }

    .dashboard-title {
        font-size: 2.2rem;
        font-weight: bold;
        margin: 0;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
    }

    .dashboard-subtitle {
        font-size: 1.1rem;
        margin: 10px 0 0 0;
        opacity: 0.9;
    }

    .btn-bni-primary {
        background: linear-gradient(135deg, #ffffff, #f8f9fa);
        color: #e74c3c;
        border: 2px solid rgba(255,255,255,0.3);
        padding: 12px 25px;
        border-radius: 25px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .btn-bni-primary:hover {
        background: #ffffff;
        color: #c0392b;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    }

    .profile-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        background: white;
    }

    .profile-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }

    .profile-card-header {
        background: linear-gradient(135deg, #e74c3c, #c0392b);
        color: white;
        padding: 20px;
        border-bottom: none;
    }

    .profile-card-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin: 0;
    }

    .profile-status-badge {
        background: rgba(255,255,255,0.2);
        color: white;
        padding: 5px 12px;
        border-radius: 15px;
        font-size: 0.85rem;
        border: 1px solid rgba(255,255,255,0.3);
    }

    .profile-status-enabled {
        background: rgba(46, 204, 113, 0.2);
        border-color: #2ecc71;
    }

    .profile-card-body {
        padding: 25px;
    }

    .profile-info-item {
        display: flex;
        align-items: center;
        margin-bottom: 12px;
        color: #6c757d;
        font-size: 0.9rem;
    }

    .profile-info-icon {
        color: #e74c3c;
        margin-right: 8px;
        font-size: 1rem;
    }

    .logo-preview {
        max-height: 80px;
        max-width: 100px;
        object-fit: contain;
        border-radius: 8px;
        border: 2px solid #f8f9fa;
        padding: 5px;
    }

    .btn-group-bni {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .btn-bni {
        flex: 1;
        min-width: 80px;
        padding: 8px 12px;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        border: 1px solid;
    }

    .btn-bni-edit {
        background: #f8f9fa;
        color: #e74c3c;
        border-color: #e74c3c;
    }

    .btn-bni-edit:hover {
        background: #e74c3c;
        color: white;
    }

    .btn-bni-view {
        background: #f8f9fa;
        color: #27ae60;
        border-color: #27ae60;
    }

    .btn-bni-view:hover {
        background: #27ae60;
        color: white;
    }

    .btn-bni-pdf {
        background: #f8f9fa;
        color: #e67e22;
        border-color: #e67e22;
    }

    .btn-bni-pdf:hover {
        background: #e67e22;
        color: white;
    }

    .btn-bni-qr {
        background: #f8f9fa;
        color: #3498db;
        border-color: #3498db;
    }

    .btn-bni-qr:hover {
        background: #3498db;
        color: white;
    }

    .btn-bni-delete {
        background: #f8f9fa;
        color: #dc3545;
        border-color: #dc3545;
    }

    .btn-bni-delete:hover {
        background: #dc3545;
        color: white;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }

    .empty-state-icon {
        font-size: 4rem;
        color: #e74c3c;
        opacity: 0.7;
        margin-bottom: 20px;
    }

    .empty-state-title {
        color: #2c3e50;
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .empty-state-text {
        color: #7f8c8d;
        margin-bottom: 25px;
        font-size: 1.1rem;
    }

    .btn-bni-large {
        background: linear-gradient(135deg, #e74c3c, #c0392b);
        color: white;
        padding: 15px 30px;
        border-radius: 25px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
        transition: all 0.3s ease;
        border: none;
    }

    .btn-bni-large:hover {
        background: linear-gradient(135deg, #c0392b, #a93226);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(231, 76, 60, 0.4);
    }

    @media (max-width: 768px) {
        .dashboard-header {
            padding: 20px;
            text-align: center;
        }

        .dashboard-title {
            font-size: 1.8rem;
        }

        .btn-group-bni {
            justify-content: center;
        }

        .profile-card-body {
            padding: 20px;
        }
    }
</style>

<div class="bni-dashboard">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Dashboard Header -->
                <div class="dashboard-header">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div>
                            <h2 class="dashboard-title">
                                🏆 BNI Dashboard
                            </h2>
                            <p class="dashboard-subtitle">Welcome back, {{ auth()->user()->full_name }}!</p>
                        </div>
                        <div class="mt-3 mt-md-0">
                            <a href="{{ route('profiles.create') }}" class="btn-bni-primary">
                                ➕ Create New Profile
                            </a>
                        </div>
                    </div>
                </div>

                @if($profiles->count() > 0)
                    <div class="row g-4">
                        @foreach($profiles as $profile)
                            <div class="col-md-6 col-xl-4">
                                <div class="profile-card">
                                    <!-- Card Header -->
                                    <div class="profile-card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="profile-card-title">{{ $profile->title }}</h6>
                                            <span class="profile-status-badge {{ $profile->status === 'enabled' ? 'profile-status-enabled' : '' }}">
                                                {{ $profile->status === 'enabled' ? '👁️' : '🙈' }}
                                                {{ ucfirst($profile->status) }}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Card Body -->
                                    <div class="profile-card-body">
                                        @if($profile->logo)
                                            <div class="text-center mb-3">
                                                <img src="{{ Storage::url($profile->logo) }}" alt="Logo" class="logo-preview">
                                            </div>
                                        @endif

                                        <div class="profile-info-item">
                                            <span class="profile-info-icon">📅</span>
                                            Created {{ $profile->created_at->format('M j, Y') }}
                                        </div>

                                        <div class="profile-info-item">
                                            <span class="profile-info-icon">🔗</span>
                                            <span class="text-break" style="font-size: 0.8rem;">{{ $profile->hostname }}</span>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="btn-group-bni mb-3">
                                            <a href="{{ route('profiles.edit', $profile) }}" class="btn-bni btn-bni-edit">
                                                ✏️ Edit
                                            </a>
                                            <a href="{{ route('public.profile', $profile->slug) }}" target="_blank" class="btn-bni btn-bni-view">
                                                👁️ View
                                            </a>
                                        </div>

                                        <div class="btn-group-bni">
                                            <a href="{{ route('profiles.pdf', $profile) }}" class="btn-bni btn-bni-pdf">
                                                📄 PDF
                                            </a>
                                            <a href="{{ route('profiles.qr-code', $profile) }}" target="_blank" class="btn-bni btn-bni-qr">
                                                📱 QR
                                            </a>
                                            <button type="button" class="btn-bni btn-bni-delete" onclick="deleteProfile({{ $profile->id }})">
                                                🗑️ Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-state-icon">🎯</div>
                        <h4 class="empty-state-title">No profiles yet</h4>
                        <p class="empty-state-text">Create your first BNI Gains profile to get started networking like a pro!</p>
                        <a href="{{ route('profiles.create') }}" class="btn-bni-large">
                            ➕ Create Your First Profile
                        </a>
                    </div>
                @endif
            </div>
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
    if (confirm('🗑️ Are you sure you want to delete this profile?\n\nThis action cannot be undone and will permanently remove all your profile data.')) {
        const form = document.getElementById('deleteProfileForm');
        form.action = '/profiles/' + profileId;
        form.submit();
    }
}
</script>
@endsection