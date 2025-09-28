@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 20px 0;
        }

        .profile-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }

        .header-section {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-top: 5px solid #dc2626;
            margin-bottom: 30px;
            text-align: center;
        }

        .header-section h1 {
            color: #dc2626;
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .header-section h2 {
            color: #374151;
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .navbar {
            background: #dc2626;
            padding: 15px 25px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .navbar a:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .navbar .nav-right {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 25px;
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
            color: white;
            padding: 20px 25px;
            border-bottom: none;
        }

        .card-header h3 {
            font-size: 1.2rem;
            font-weight: 600;
            margin: 0;
        }

        .card-header p {
            margin: 5px 0 0 0;
            opacity: 0.9;
            font-size: 0.9rem;
        }

        .card-body {
            padding: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-label {
            display: block;
            color: #374151;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .form-input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 1rem;
            background-color: #f9fafb;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: #dc2626;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
        }

        .form-textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 1rem;
            background-color: #f9fafb;
            transition: all 0.3s ease;
            resize: vertical;
            min-height: 100px;
        }

        .form-textarea:focus {
            outline: none;
            border-color: #dc2626;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
        }

        .error-message {
            color: #ef4444;
            font-size: 0.85rem;
            margin-top: 5px;
        }

        .success-message {
            background: #dcfce7;
            border: 1px solid #bbf7d0;
            color: #166534;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        .btn {
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #991b1b 0%, #7f1d1d 100%);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
        }

        .btn-secondary {
            background: #6b7280;
            color: white;
        }

        .btn-secondary:hover {
            background: #4b5563;
            transform: translateY(-1px);
        }

        .btn-danger {
            background: #ef4444;
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
            transform: translateY(-1px);
        }

        .btn-outline {
            background: white;
            border: 2px solid #dc2626;
            color: #dc2626;
        }

        .btn-outline:hover {
            background: #dc2626;
            color: white;
        }

        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-info {
            background: #dbeafe;
            border: 1px solid #93c5fd;
            color: #1e40af;
        }

        .alert-warning {
            background: #fef3c7;
            border: 1px solid #fbbf24;
            color: #92400e;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-top: 25px;
        }

        .verification-notice {
            background: #fef3c7;
            border: 1px solid #f59e0b;
            color: #92400e;
            padding: 12px 15px;
            border-radius: 8px;
            margin-top: 10px;
            font-size: 0.9rem;
        }

        .verification-notice a {
            color: #dc2626;
            text-decoration: underline;
        }

        .delete-section {
            border-top: 2px solid #ef4444;
        }

        .delete-section .card-header {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .profile-container {
                padding: 10px;
            }
            
            .header-section h1 {
                font-size: 2rem;
            }
            
            .card-body {
                padding: 20px;
            }
            
            .form-row {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .navbar {
                flex-direction: column;
                gap: 10px;
            }
            
            .form-actions {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>
</head>

<body>
    <div class="profile-container">
        <!-- Update Profile Information -->
        <div class="card">
            <div class="card-header">
                <h3>Profile Information</h3>
                <p>Update your account's profile information and email address</p>
            </div>
            <div class="card-body">
                @if (session('status') === 'profile-updated')
                    <div class="success-message">
                        Profile updated successfully!
                    </div>
                @endif

                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')

                    <div class="form-row">
                        <div class="form-group">
                            <label for="first_name" class="form-label">First Name</label>
                            <input id="first_name" 
                                name="first_name" 
                                type="text" 
                                class="form-input @error('first_name') error @enderror" 
                                value="{{ old('first_name', auth()->user()->first_name) }}" 
                                required 
                                autofocus 
                                autocomplete="given-name">
                            @error('first_name')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input id="last_name" 
                                name="last_name" 
                                type="text" 
                                class="form-input @error('last_name') error @enderror" 
                                value="{{ old('last_name', auth()->user()->last_name) }}" 
                                required 
                                autocomplete="family-name">
                            @error('last_name')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <input id="email" 
                            name="email" 
                            type="email" 
                            class="form-input @error('email') error @enderror" 
                            value="{{ old('email', auth()->user()->email) }}" 
                            required 
                            autocomplete="username">
                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror

                        @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                            <div class="verification-notice">
                                Your email address is unverified. 
                                <a href="{{ route('verification.send') }}">Click here to re-send the verification email.</a>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="business_name" class="form-label">Business Name</label>
                        <input id="business_name" 
                            name="business_name" 
                            type="text" 
                            class="form-input @error('business_name') error @enderror" 
                            value="{{ old('business_name', auth()->user()->business_name) }}" 
                            autocomplete="organization">
                        @error('business_name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input id="phone" 
                                name="phone" 
                                type="tel" 
                                class="form-input @error('phone') error @enderror" 
                                value="{{ old('phone', auth()->user()->phone) }}" 
                                autocomplete="tel">
                            @error('phone')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="linkedin_url" class="form-label">LinkedIn Profile</label>
                            <input id="linkedin_url" 
                                name="linkedin_url" 
                                type="url" 
                                class="form-input @error('linkedin_url') error @enderror" 
                                value="{{ old('linkedin_url', auth()->user()->linkedin_url) }}" 
                                placeholder="https://linkedin.com/in/yourname">
                            @error('linkedin_url')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address" class="form-label">Address</label>
                        <textarea id="address" 
                            name="address" 
                            class="form-textarea @error('address') error @enderror" 
                            autocomplete="street-address">{{ old('address', auth()->user()->address) }}</textarea>
                        @error('address')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        @if (session('status') === 'profile-updated')
                            <span style="color: #16a34a; font-size: 0.9rem;">✓ Saved</span>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <!-- Update Password -->
        <div class="card">
            <div class="card-header">
                <h3>Update Password</h3>
                <p>Ensure your account is using a long, random password to stay secure</p>
            </div>
            <div class="card-body">
                @if (session('status') === 'password-updated')
                    <div class="success-message">
                        Password updated successfully!
                    </div>
                @endif

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="update_password_current_password" class="form-label">Current Password</label>
                        <input id="update_password_current_password" 
                            name="current_password" 
                            type="password" 
                            class="form-input @error('current_password', 'updatePassword') error @enderror" 
                            autocomplete="current-password">
                        @error('current_password', 'updatePassword')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="update_password_password" class="form-label">New Password</label>
                            <input id="update_password_password" 
                                name="password" 
                                type="password" 
                                class="form-input @error('password', 'updatePassword') error @enderror" 
                                autocomplete="new-password">
                            @error('password', 'updatePassword')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="update_password_password_confirmation" class="form-label">Confirm Password</label>
                            <input id="update_password_password_confirmation" 
                                name="password_confirmation" 
                                type="password" 
                                class="form-input @error('password_confirmation', 'updatePassword') error @enderror" 
                                autocomplete="new-password">
                            @error('password_confirmation', 'updatePassword')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Update Password</button>
                        @if (session('status') === 'password-updated')
                            <span style="color: #16a34a; font-size: 0.9rem;">✓ Saved</span>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <!-- Delete Account -->
        <div class="card delete-section">
            <div class="card-header">
                <h3>Delete Account</h3>
                <p>Once your account is deleted, all of its resources and data will be permanently deleted</p>
            </div>
            <div class="card-body">
                <div class="alert alert-warning">
                    <strong>Warning:</strong> This action cannot be undone. All your profiles and data will be permanently deleted.
                </div>

                <button type="button" class="btn btn-danger" onclick="showDeleteModal()">
                    Delete Account
                </button>

                <!-- Delete Modal (Simple version) -->
                <div id="deleteModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000;">
                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 30px; border-radius: 15px; max-width: 400px; width: 90%;">
                        <h3 style="color: #ef4444; margin-bottom: 15px;">Confirm Account Deletion</h3>
                        <p style="margin-bottom: 20px; color: #6b7280;">Are you sure you want to delete your account? This action cannot be undone.</p>
                        
                        <form method="POST" action="{{ route('profile.destroy') }}">
                            @csrf
                            @method('delete')
                            
                            <div class="form-group">
                                <label for="password" class="form-label">Enter your password to confirm:</label>
                                <input id="password" 
                                    name="password" 
                                    type="password" 
                                    class="form-input @error('password', 'userDeletion') error @enderror" 
                                    placeholder="Password" 
                                    required>
                                @error('password', 'userDeletion')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div style="display: flex; gap: 10px; margin-top: 20px;">
                                <button type="button" class="btn btn-secondary" onclick="hideDeleteModal()">Cancel</button>
                                <button type="submit" class="btn btn-danger">Delete Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showDeleteModal() {
            document.getElementById('deleteModal').style.display = 'block';
        }

        function hideDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        // Close modal when clicking outside
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                hideDeleteModal();
            }
        });
    </script>
@endsection