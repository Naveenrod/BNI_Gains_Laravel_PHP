@extends('layouts.app')
@section('title', "- Edit {$profile->title}")

@section('content')
<style>
    .bni-edit-page {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 100vh;
        padding: 30px 0;
    }

    .edit-card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        background: white;
    }

    .edit-card-header {
        background: linear-gradient(135deg, #e74c3c, #c0392b);
        color: white;
        padding: 25px 30px;
        border-bottom: none;
    }

    .edit-title {
        font-size: 1.6rem;
        font-weight: 600;
        margin: 0;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
    }

    .header-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .btn-header-action {
        background: rgba(255,255,255,0.2);
        color: white;
        border: 1px solid rgba(255,255,255,0.3);
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 0.9rem;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-header-action:hover {
        background: rgba(255,255,255,0.3);
        color: white;
        transform: translateY(-1px);
    }

    .edit-card-body {
        padding: 40px;
    }

    .form-section {
        background: #f8f9fa;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 25px;
        border-left: 4px solid #e74c3c;
    }

    .form-section-title {
        color: #2c3e50;
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-label-bni {
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 8px;
        display: block;
    }

    .form-control-bni {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 12px 15px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: white;
    }

    .form-control-bni:focus {
        border-color: #e74c3c;
        box-shadow: 0 0 0 0.2rem rgba(231, 76, 60, 0.25);
        background: white;
    }

    .gains-section-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        margin-bottom: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
    }

    .gains-section-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    }

    .gains-header-goals {
        background: linear-gradient(135deg, #3498db, #2980b9);
        color: white;
    }

    .gains-header-accomplishments {
        background: linear-gradient(135deg, #27ae60, #229954);
        color: white;
    }

    .gains-header-interests {
        background: linear-gradient(135deg, #e74c3c, #c0392b);
        color: white;
    }

    .gains-header-networks {
        background: linear-gradient(135deg, #f39c12, #e67e22);
        color: white;
    }

    .gains-header-skills {
        background: linear-gradient(135deg, #9b59b6, #8e44ad);
        color: white;
    }

    .gains-section-header {
        padding: 20px 25px;
    }

    .gains-section-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
    }

    .gains-section-body {
        padding: 25px;
        background: white;
    }

    .gains-letter-icon {
        background: rgba(255,255,255,0.2);
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        font-weight: bold;
    }

    .logo-preview-container {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 15px;
        text-align: center;
        margin-bottom: 15px;
    }

    .logo-preview {
        max-height: 100px;
        max-width: 120px;
        object-fit: contain;
        border-radius: 8px;
        border: 2px solid #e9ecef;
        padding: 5px;
        background: white;
    }

    .form-text-bni {
        color: #6c757d;
        font-size: 0.9rem;
        margin-top: 8px;
    }

    .action-buttons {
        background: #f8f9fa;
        padding: 25px 40px;
        border-top: 1px solid #e9ecef;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .btn-bni-back {
        background: #6c757d;
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 25px;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-bni-back:hover {
        background: #5a6268;
        color: white;
        transform: translateY(-1px);
    }

    .btn-bni-save {
        background: linear-gradient(135deg, #e74c3c, #c0392b);
        color: white;
        border: none;
        padding: 15px 35px;
        border-radius: 25px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
    }

    .btn-bni-save:hover {
        background: linear-gradient(135deg, #c0392b, #a93226);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(231, 76, 60, 0.4);
    }

    .status-select {
        position: relative;
    }

    .status-badge-preview {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 0.8rem;
        padding: 2px 8px;
        border-radius: 10px;
        pointer-events: none;
    }

    .status-enabled {
        background: #d4edda;
        color: #155724;
    }

    .status-disabled {
        background: #f8d7da;
        color: #721c24;
    }

    @media (max-width: 768px) {
        .edit-card-body {
            padding: 25px;
        }

        .action-buttons {
            padding: 20px 25px;
            flex-direction: column;
            gap: 15px;
        }

        .btn-bni-save {
            width: 100%;
            justify-content: center;
        }

        .header-actions {
            margin-top: 15px;
            justify-content: center;
        }
    }
</style>

<div class="bni-edit-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="edit-card">
                    <!-- Header -->
                    <div class="edit-card-header">
                        <div class="d-flex justify-content-between align-items-start flex-wrap">
                            <div>
                                <h4 class="edit-title">
                                    ✏️ Edit Profile: {{ $profile->title }}
                                </h4>
                            </div>
                            <div class="header-actions">
                                <a href="{{ route('public.profile', $profile->slug) }}" target="_blank" class="btn-header-action">
                                    👁️ Preview
                                </a>
                                <a href="{{ route('profiles.pdf', $profile) }}" class="btn-header-action">
                                    📄 Download PDF
                                </a>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('profiles.update', $profile) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="edit-card-body">
                            <!-- Basic Profile Settings -->
                            <div class="form-section">
                                <h5 class="form-section-title">
                                    ⚙️ Basic Settings
                                </h5>
                                
                                <div class="row mb-4">
                                    <div class="col-md-8">
                                        <label for="title" class="form-label-bni">Profile Title</label>
                                        <input type="text" class="form-control form-control-bni @error('title') is-invalid @enderror"
                                               id="title" name="title" value="{{ old('title', $profile->title) }}" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="status" class="form-label-bni">Status</label>
                                        <div class="status-select">
                                            <select class="form-control form-control-bni @error('status') is-invalid @enderror" id="status" name="status" required>
                                                <option value="enabled" {{ old('status', $profile->status) === 'enabled' ? 'selected' : '' }}>
                                                    Enabled (Public)
                                                </option>
                                                <option value="disabled" {{ old('status', $profile->status) === 'disabled' ? 'selected' : '' }}>
                                                    Disabled (Private)
                                                </option>
                                            </select>
                                            <span class="status-badge-preview {{ old('status', $profile->status) === 'enabled' ? 'status-enabled' : 'status-disabled' }}" id="statusPreview">
                                                {{ old('status', $profile->status) === 'enabled' ? '👁️ Public' : '🙈 Private' }}
                                            </span>
                                        </div>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-0">
                                    <label for="logo" class="form-label-bni">Logo</label>
                                    @if($profile->logo)
                                        <div class="logo-preview-container">
                                            <img src="{{ Storage::url($profile->logo) }}" alt="Current Logo" class="logo-preview">
                                            <div class="form-text-bni">Current logo</div>
                                        </div>
                                    @endif
                                    <input type="file" class="form-control form-control-bni @error('logo') is-invalid @enderror"
                                           id="logo" name="logo" accept="image/*">
                                    <div class="form-text-bni">Upload a new logo to replace the current one (optional)</div>
                                    @error('logo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- BNI Gains Sections -->
                            <div class="form-section">
                                <h5 class="form-section-title">
                                    🎯 BNI GAINS Content
                                </h5>

                                @php
                                    $sections = [
                                        ['key' => 'goals', 'title' => 'Goals', 'letter' => 'G', 'header_class' => 'gains-header-goals'],
                                        ['key' => 'accomplishments', 'title' => 'Accomplishments', 'letter' => 'A', 'header_class' => 'gains-header-accomplishments'],
                                        ['key' => 'interests', 'title' => 'Interests', 'letter' => 'I', 'header_class' => 'gains-header-interests'],
                                        ['key' => 'networks', 'title' => 'Networks', 'letter' => 'N', 'header_class' => 'gains-header-networks'],
                                        ['key' => 'skills', 'title' => 'Skills', 'letter' => 'S', 'header_class' => 'gains-header-skills']
                                    ];
                                @endphp

                                @foreach($sections as $section)
                                    <div class="gains-section-card">
                                        <div class="gains-section-header {{ $section['header_class'] }}">
                                            <h6 class="gains-section-title">
                                                <span class="gains-letter-icon">{{ $section['letter'] }}</span>
                                                {{ $section['title'] }}
                                            </h6>
                                        </div>
                                        <div class="gains-section-body">
                                            <div class="mb-3">
                                                <label for="{{ $section['key'] }}_intro" class="form-label-bni">Introduction Text</label>
                                                <input type="text" class="form-control form-control-bni"
                                                       id="{{ $section['key'] }}_intro" name="{{ $section['key'] }}_intro"
                                                       value="{{ old($section['key'].'_intro', $profile->bniGainsProfile->{$section['key'].'_intro'} ?? '') }}"
                                                       placeholder="e.g., My {{ strtolower($section['title']) }} include:">
                                            </div>
                                            <div class="mb-0">
                                                <label for="{{ $section['key'] }}_input" class="form-label-bni">Content</label>
                                                <textarea class="form-control form-control-bni"
                                                          id="{{ $section['key'] }}_input" name="{{ $section['key'] }}_input"
                                                          rows="4"
                                                          placeholder="Enter your {{ strtolower($section['title']) }} here...">{{ old($section['key'].'_input', $profile->bniGainsProfile->{$section['key'].'_input'} ?? '') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="action-buttons">
                            <a href="{{ route('dashboard') }}" class="btn-bni-back">
                                ← Back to Dashboard
                            </a>
                            <button type="submit" class="btn-bni-save">
                                💾 Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Status select preview update
document.getElementById('status').addEventListener('change', function() {
    const preview = document.getElementById('statusPreview');
    const value = this.value;
    
    if (value === 'enabled') {
        preview.textContent = '👁️ Public';
        preview.className = 'status-badge-preview status-enabled';
    } else {
        preview.textContent = '🙈 Private';
        preview.className = 'status-badge-preview status-disabled';
    }
});
</script>
@endsection