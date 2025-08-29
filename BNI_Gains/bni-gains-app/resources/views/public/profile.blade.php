<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->title }} - {{ $profile->user->full_name }}</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        body { font-family: 'Georgia', serif; line-height: 1.6; }
        .header-section { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
        .profile-section { margin-bottom: 2rem; padding: 1.5rem; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .goals { background: #e3f2fd; border-left: 5px solid #2196f3; }
        .accomplishments { background: #e8f5e8; border-left: 5px solid #4caf50; }
        .interests { background: #f3e5f5; border-left: 5px solid #9c27b0; }
        .networks { background: #fff3e0; border-left: 5px solid #ff9800; }
        .skills { background: #e8eaf6; border-left: 5px solid #3f51b5; }
        .logo-container { max-width: 150px; }
        .contact-info { background: #f8f9fa; }
        @media print {
            .no-print { display: none !important; }
            body { font-size: 12px; }
            .profile-section { break-inside: avoid; }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="header-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-4 fw-bold">{{ $profile->user->full_name }}</h1>
                    @if($profile->user->business_name)
                        <h3 class="fw-light">{{ $profile->user->business_name }}</h3>
                    @endif
                    <p class="lead mt-3">{{ $profile->title }}</p>
                </div>
                @if($profile->logo)
                    <div class="col-md-4 text-center">
                        <div class="logo-container mx-auto">
                            <img src="{{ Storage::url($profile->logo) }}" alt="Logo" class="img-fluid rounded bg-white p-2">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container my-5">
        <!-- Contact Information -->
        <div class="profile-section contact-info">
            <div class="row">
                @if($profile->user->email)
                    <div class="col-md-6 mb-2">
                        <i class="bi bi-envelope-fill text-primary me-2"></i>
                        <a href="mailto:{{ $profile->user->email }}">{{ $profile->user->email }}</a>
                    </div>
                @endif
                @if($profile->user->phone)
                    <div class="col-md-6 mb-2">
                        <i class="bi bi-telephone-fill text-primary me-2"></i>
                        <a href="tel:{{ $profile->user->phone }}">{{ $profile->user->phone }}</a>
                    </div>
                @endif
                @if($profile->user->linkedin_url)
                    <div class="col-md-6 mb-2">
                        <i class="bi bi-linkedin text-primary me-2"></i>
                        <a href="{{ $profile->user->linkedin_url }}" target="_blank">LinkedIn Profile</a>
                    </div>
                @endif
                @if($profile->user->address)
                    <div class="col-md-6 mb-2">
                        <i class="bi bi-geo-alt-fill text-primary me-2"></i>
                        {{ $profile->user->address }}
                    </div>
                @endif
            </div>
        </div>

        @php
            $sections = [
                ['key' => 'goals', 'title' => 'Goals', 'icon' => 'bi-target', 'class' => 'goals'],
                ['key' => 'accomplishments', 'title' => 'Accomplishments', 'icon' => 'bi-trophy', 'class' => 'accomplishments'],
                ['key' => 'interests', 'title' => 'Interests', 'icon' => 'bi-heart', 'class' => 'interests'],
                ['key' => 'networks', 'title' => 'Networks', 'icon' => 'bi-people', 'class' => 'networks'],
                ['key' => 'skills', 'title' => 'Skills', 'icon' => 'bi-gear', 'class' => 'skills']
            ];
        @endphp

        <!-- Profile Sections -->
        @foreach($sections as $section)
            @if($profile->bniGainsProfile && ($profile->bniGainsProfile->{$section['key'].'_intro'} || $profile->bniGainsProfile->{$section['key'].'_input'}))
                <div class="profile-section {{ $section['class'] }}">
                    <h3 class="fw-bold mb-3">
                        <i class="{{ $section['icon'] }} me-2"></i>
                        {{ $section['title'] }}
                    </h3>
                    
                    @if($profile->bniGainsProfile->{$section['key'].'_intro'})
                        <p class="fw-semibold">{{ $profile->bniGainsProfile->{$section['key'].'_intro'} }}</p>
                    @endif
                    
                    @if($profile->bniGainsProfile->{$section['key'].'_input'})
                        <div class="mt-2">
                            {!! nl2br(e($profile->bniGainsProfile->{$section['key'].'_input'})) !!}
                        </div>
                    @endif
                </div>
            @endif
        @endforeach

        <!-- Social Media Links -->
        @if($profile->user->twitter_handle || $profile->user->instagram_handle || $profile->user->facebook_page)
            <div class="profile-section contact-info">
                <h3 class="fw-bold mb-3">
                    <i class="bi bi-share me-2"></i>
                    Connect With Me
                </h3>
                <div class="row">
                    @if($profile->user->twitter_handle)
                        <div class="col-md-4 mb-2">
                            <i class="bi bi-twitter text-info me-2"></i>
                            <a href="https://twitter.com/{{ $profile->user->twitter_handle }}" target="_blank">
                                @{{ $profile->user->twitter_handle }}
                            </a>
                        </div>
                    @endif
                    @if($profile->user->instagram_handle)
                        <div class="col-md-4 mb-2">
                            <i class="bi bi-instagram text-danger me-2"></i>
                            <a href="https://instagram.com/{{ $profile->user->instagram_handle }}" target="_blank">
                                @{{ $profile->user->instagram_handle }}
                            </a>
                        </div>
                    @endif
                    @if($profile->user->facebook_page)
                        <div class="col-md-4 mb-2">
                            <i class="bi bi-facebook text-primary me-2"></i>
                            <a href="{{ $profile->user->facebook_page }}" target="_blank">Facebook</a>
                        </div>
                    @endif
                </div>
            </div>
        @endif

        <!-- Footer with QR Code and Actions -->
        <div class="row no-print mt-5">
            <div class="col-md-8">
                <div class="alert alert-info">
                    <h5><i class="bi bi-info-circle me-2"></i>Share This Profile</h5>
                    <p class="mb-2">Share this profile using the URL below:</p>
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ request()->fullUrl() }}" id="profileUrl" readonly>
                        <button class="btn btn-outline-secondary" onclick="copyUrl()">
                            <i class="bi bi-clipboard"></i> Copy
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card">
                    <div class="card-body">
                        <h6>QR Code</h6>
                        <img src="{{ route('profiles.qr-code', $profile) }}" alt="QR Code" class="img-fluid" style="max-width: 150px;">
                        <div class="mt-2">
                            <a href="{{ route('profiles.pdf', $profile) }}" class="btn btn-danger btn-sm">
                                <i class="bi bi-file-earmark-pdf me-1"></i>Download PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function copyUrl() {
            const urlInput = document.getElementById('profileUrl');
            urlInput.select();
            urlInput.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(urlInput.value).then(() => {
                alert('Profile URL copied to clipboard!');
            });
        }

        // Print functionality
        function printProfile() {
            window.print();
        }
    </script>
</body>
</html>

## PDF Template (`resources/views/profiles/pdf.blade.php`)

```php
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $profile->title }} - {{ $profile->user->full_name }}</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            font-size: 12px; 
            line-height: 1.4; 
            margin: 0; 
            padding: 20px; 
            color: #333;
        }
        .header { 
            background: #f8f9fa; 
            padding: 20px; 
            margin-bottom: 20px; 
            border-radius: 5px;
            text-align: center;
        }
        .header h1 { 
            margin: 0; 
            font-size: 24px; 
            color: #2c3e50;
        }
        .header h2 { 
            margin: 5px 0 0 0; 
            font-size: 18px; 
            color: #7f8c8d;
            font-weight: normal;
        }
        .header p { 
            margin: 10px 0 0 0; 
            font-size: 14px; 
            color: #34495e;
        }
        .contact-info { 
            background: #ecf0f1; 
            padding: 15px; 
            margin-bottom: 20px; 
            border-radius: 5px;
        }
        .contact-info h3 { 
            margin: 0 0 10px 0; 
            font-size: 16px; 
            color: #2c3e50;
        }
        .contact-row { 
            display: table; 
            width: 100%; 
            margin-bottom: 5px;
        }
        .contact-item { 
            display: table-cell; 
            width: 50%; 
            padding-right: 10px;
        }
        .section { 
            margin-bottom: 20px; 
            padding: 15px; 
            border-radius: 5px; 
            border-left: 5px solid #3498db;
        }
        .section h3 { 
            margin: 0 0 10px 0; 
            font-size: 16px; 
            color: #2c3e50;
        }
        .section p { 
            margin: 0 0 10px 0; 
            font-weight: bold;
        }
        .section .content { 
            margin: 0; 
            line-height: 1.6;
        }
        .goals { background: #e3f2fd; border-left-color: #2196f3; }
        .accomplishments { background: #e8f5e8; border-left-color: #4caf50; }
        .interests { background: #f3e5f5; border-left-color: #9c27b0; }
        .networks { background: #fff3e0; border-left-color: #ff9800; }
        .skills { background: #e8eaf6; border-left-color: #3f51b5; }
        .logo { 
            float: right; 
            max-width: 100px; 
            max-height: 100px; 
            margin: 0 0 20px 20px;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #bdc3c7;
            text-align: center;
            font-size: 10px;
            color: #7f8c8d;
        }
    </style>
</head>
<body>
    <!-- Logo -->
    @if($profile->logo)
        <img src="{{ storage_path('app/public/' . $profile->logo) }}" class="logo" alt="Logo">
    @endif

    <!-- Header -->
    <div class="header">
        <h1>{{ $profile->user->full_name }}</h1>
        @if($profile->user->business_name)
            <h2>{{ $profile->user->business_name }}</h2>
        @endif
        <p>{{ $profile->title }}</p>
    </div>

    <!-- Contact Information -->
    <div class="contact-info">
        <h3>Contact Information</h3>
        <div class="contact-row">
            @if($profile->user->email)
                <div class="contact-item">
                    <strong>Email:</strong> {{ $profile->user->email }}
                </div>
            @endif
            @if($profile->user->phone)
                <div class="contact-item">
                    <strong>Phone:</strong> {{ $profile->user->phone }}
                </div>
            @endif
        </div>
        @if($profile->user->address)
            <div class="contact-row">
                <div class="contact-item" style="width: 100%;">
                    <strong>Address:</strong> {{ $profile->user->address }}
                </div>
            </div>
        @endif
        @if($profile->user->linkedin_url)
            <div class="contact-row">
                <div class="contact-item" style="width: 100%;">
                    <strong>LinkedIn:</strong> {{ $profile->user->linkedin_url }}
                </div>
            </div>
        @endif
    </div>

    @php
        $sections = [
            ['key' => 'goals', 'title' => 'Goals', 'class' => 'goals'],
            ['key' => 'accomplishments', 'title' => 'Accomplishments', 'class' => 'accomplishments'],
            ['key' => 'interests', 'title' => 'Interests', 'class' => 'interests'],
            ['key' => 'networks', 'title' => 'Networks', 'class' => 'networks'],
            ['key' => 'skills', 'title' => 'Skills', 'class' => 'skills']
        ];
    @endphp

    <!-- Profile Sections -->
    @foreach($sections as $section)
        @if($profile->bniGainsProfile && ($profile->bniGainsProfile->{$section['key'].'_intro'} || $profile->bniGainsProfile->{$section['key'].'_input'}))
            <div class="section {{ $section['class'] }}">
                <h3>{{ $section['title'] }}</h3>
                
                @if($profile->bniGainsProfile->{$section['key'].'_intro'})
                    <p>{{ $profile->bniGainsProfile->{$section['key'].'_intro'} }}</p>
                @endif
                
                @if($profile->bniGainsProfile->{$section['key'].'_input'})
                    <div class="content">
                        {!! nl2br(e($profile->bniGainsProfile->{$section['key'].'_input'})) !!}
                    </div>
                @endif
            </div>
        @endif
    @endforeach

    <!-- Social Media -->
    @if($profile->user->twitter_handle || $profile->user->instagram_handle || $profile->user->facebook_page)
        <div class="section">
            <h3>Connect With Me</h3>
            @if($profile->user->twitter_handle)
                <p><strong>Twitter:</strong> @{{ $profile->user->twitter_handle }}</p>
            @endif
            @if($profile->user->instagram_handle)
                <p><strong>Instagram:</strong> @{{ $profile->user->instagram_handle }}</p>
            @endif
            @if($profile->user->facebook_page)
                <p><strong>Facebook:</strong> {{ $profile->user->facebook_page }}</p>
            @endif
        </div>
    @endif

    <!-- Footer -->
    <div class="footer">
        <p>Generated on {{ now()->format('F j, Y \a\t g:i A') }}</p>
        <p>Profile URL: {{ route('public.profile', $profile->slug) }}</p>
    </div>
</body>
</html>

## Custom Authentication Views

### Login (`resources/views/auth/login.blade.php`)

```php
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4 class="mb-0">
                        <i class="bi bi-box-arrow-in-right me-2 text-primary"></i>
                        Sign In to BNI Gains
                    </h4>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                       name="password" required autocomplete="current-password">
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" 
                                       {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                            </button>
                        </div>

                        <div class="text-center mt-3">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-decoration-none">
                                    Forgot Your Password?
                                </a>
                            @endif
                        </div>

                        <hr>

                        <div class="text-center">
                            <p class="mb-0">Don't have an account?</p>
                            <a href="{{ route('register') }}" class="btn btn-outline-primary">
                                <i class="bi bi-person-plus me-2"></i>Create Account
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

### Register (`resources/views/auth/register.blade.php`)

```php
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4 class="mb-0">
                        <i class="bi bi-person-plus me-2 text-primary"></i>
                        Create Your BNI Gains Account
                    </h4>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Personal Information -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">First Name</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" 
                                       name="first_name" value="{{ old('first_name') }}" required autocomplete="given-name" autofocus>
                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" 
                                       name="last_name" value="{{ old('last_name') }}" required autocomplete="family-name">
                                @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                       name="password" required autocomplete="new-password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password-confirm" class="form-label">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" 
                                       name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <!-- Business Information -->
                        <hr>
                        <h5 class="text-muted mb-3">Business Information (Optional)</h5>

                        <div class="mb-3">
                            <label for="business_name" class="form-label">Business Name</label>
                            <input id="business_name" type="text" class="form-control @error('business_name') is-invalid @enderror" 
                                   name="business_name" value="{{ old('business_name') }}">
                            @error('business_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                       name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="linkedin_url" class="form-label">LinkedIn URL</label>
                                <input id="linkedin_url" type="url" class="form-control @error('linkedin_url') is-invalid @enderror" 
                                       name="linkedin_url" value="{{ old('linkedin_url') }}" placeholder="https://linkedin.com/in/yourname">
                                @error('linkedin_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea id="address" class="form-control @error('address') is-invalid @enderror" 
                                      name="address" rows="2">{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-person-plus me-2"></i>Create Account
                            </button>
                        </div>

                        <div class="text-center mt-3">
                            <p class="mb-0">Already have an account?</p>
                            <a href="{{ route('login') }}" class="btn btn-outline-primary">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection