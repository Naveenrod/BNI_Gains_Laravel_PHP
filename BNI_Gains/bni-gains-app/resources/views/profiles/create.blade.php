@extends('layouts.app')

@section('title', '- Create Profile')

@section('content')


<style>
    body {
        font-family: 'Inter', 'Segoe UI', sans-serif;
        background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%);
        color: #2c3e50;
    }

    .bni-edit-page {
        min-height: 100vh;
        padding: 40px 15px;
        display: flex;
        justify-content: center;
        align-items: flex-start;
    }

    .edit-card {
        width: 100%;
        max-width: 900px;
        border: none;
        border-radius: 25px;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        animation: fadeUp 0.6s ease;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .edit-card-header {
        background: linear-gradient(135deg, #ff6b6b, #c44536);
        color: white;
        padding: 25px 30px;
        border-bottom: none;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .edit-title {
        font-size: 1.8rem;
        font-weight: 700;
        margin: 0;
        letter-spacing: -0.5px;
    }

    .header-actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .btn-header-action {
        background: rgba(255,255,255,0.15);
        color: white;
        border: 1px solid rgba(255,255,255,0.3);
        padding: 8px 16px;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-header-action:hover {
        background: rgba(255,255,255,0.3);
        transform: translateY(-2px) scale(1.05);
    }

    .edit-card-body {
        padding: 40px;
    }

    .form-section {
        background: #fdfdfd;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 25px;
        border-left: 5px solid #ff6b6b;
        transition: transform 0.2s ease;
    }

    .form-section:hover {
        transform: scale(1.01);
    }

    .form-section-title {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
        color: #2c3e50;
    }

    .form-label-bni {
        font-weight: 600;
        margin-bottom: 8px;
        display: block;
        color: #34495e;
    }

    .form-control-bni {
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 12px 15px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control-bni:focus {
        border-color: #ff6b6b;
        box-shadow: 0 0 10px rgba(255, 107, 107, 0.2);
        outline: none;
    }

    .gains-section-card {
        border-radius: 15px;
        margin-bottom: 25px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .gains-section-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 28px rgba(0,0,0,0.12);
    }

    .gains-section-header {
        padding: 20px 25px;
    }

    .gains-section-title {
        font-size: 1.3rem;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .action-buttons {
        background: #fafafa;
        padding: 25px 40px;
        border-top: 1px solid #eaeaea;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .btn-bni-save {
        background: linear-gradient(135deg, #ff6b6b, #c44536);
        color: white;
        padding: 14px 35px;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        border: none;
        box-shadow: 0 6px 20px rgba(255, 107, 107, 0.3);
    }

    .btn-bni-save:hover {
        background: linear-gradient(135deg, #c44536, #96281b);
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(255, 107, 107, 0.4);
    }
</style>



<div class="bni-edit-page">
    <div class="edit-card">
        <div class="edit-card-header">
            <h4 class="edit-title">
                <i class="bi bi-plus-circle me-2"></i>
                Create New Profile
            </h4>
        </div>

        <div class="edit-card-body">
            <form method="POST" action="{{ route('profiles.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-section">
                    <h5 class="form-section-title">Profile Info</h5>
                    <label for="title" class="form-label-bni">Profile Title</label>
                    <input type="text" class="form-control-bni @error('title') is-invalid @enderror"
                           id="title" name="title" value="{{ old('title') }}"
                           placeholder="e.g., My BNI Profile" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-section">
                    <label for="logo" class="form-label-bni">Logo (Optional)</label>
                    <input type="file" class="form-control-bni @error('logo') is-invalid @enderror"
                           id="logo" name="logo" accept="image/*">
                    <div class="form-text-bni">Upload a logo (JPEG, PNG, GIF - Max 2MB)</div>
                    @error('logo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="action-buttons">
                    <a href="{{ route('dashboard') }}" class="btn-bni-back">
                        <i class="bi bi-arrow-left me-2"></i> Cancel
                    </a>
                    <button type="submit" class="btn-bni-save">
                        <i class="bi bi-check-circle me-2"></i> Create Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
document.getElementById('logo').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            // Could add image preview here
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection