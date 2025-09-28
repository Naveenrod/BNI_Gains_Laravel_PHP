<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Register</title>
    
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

        .register-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .brand-header {
            text-align: center;
            margin-bottom: 30px;
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-top: 5px solid #dc2626;
        }

        .brand-header h1 {
            color: #dc2626;
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 8px;
            letter-spacing: 2px;
        }

        .brand-header h2 {
            color: #374151;
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .brand-header p {
            color: #6b7280;
            font-size: 0.9rem;
        }

        .register-card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            border-top: 4px solid #dc2626;
        }

        .welcome-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .welcome-section h3 {
            color: #111827;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .welcome-section p {
            color: #6b7280;
            font-size: 0.95rem;
        }

        .section-divider {
            border: none;
            border-top: 2px solid #e5e7eb;
            margin: 30px 0 25px 0;
            position: relative;
        }

        .section-divider::after {
            content: "Optional Business Information";
            position: absolute;
            top: -12px;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            padding: 0 15px;
            color: #6b7280;
            font-size: 0.85rem;
            font-weight: 600;
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

        .form-label.required::after {
            content: " *";
            color: #dc2626;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 1.1rem;
        }

        .form-input {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 1rem;
            background-color: #f9fafb;
            transition: all 0.3s ease;
        }

        .form-input.no-icon {
            padding-left: 15px;
        }

        .form-input:focus {
            outline: none;
            border-color: #dc2626;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
        }

        .form-input::placeholder {
            color: #9ca3af;
        }

        .form-textarea {
            width: 100%;
            padding: 15px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 1rem;
            background-color: #f9fafb;
            transition: all 0.3s ease;
            resize: vertical;
            min-height: 80px;
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

        .btn-register {
            width: 100%;
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
            color: white;
            border: none;
            padding: 15px;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
        }

        .btn-register:hover {
            background: linear-gradient(135deg, #991b1b 0%, #7f1d1d 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 38, 38, 0.3);
        }

        .btn-register:active {
            transform: translateY(0);
        }

        .btn-icon {
            margin-right: 8px;
        }

        .login-section {
            text-align: center;
            padding-top: 25px;
            border-top: 1px solid #e5e7eb;
        }

        .login-section p {
            color: #6b7280;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }

        .btn-login {
            display: inline-flex;
            align-items: center;
            padding: 12px 24px;
            border: 2px solid #dc2626;
            background: white;
            color: #dc2626;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: #dc2626;
            color: white;
            transform: translateY(-1px);
            text-decoration: none;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #6b7280;
            font-size: 0.8rem;
        }

        .status-message {
            background: #dcfce7;
            border: 1px solid #bbf7d0;
            color: #166534;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        .info-box {
            background: #dbeafe;
            border: 1px solid #93c5fd;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 25px;
        }

        .info-box h4 {
            color: #1e40af;
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
        }

        .info-box p {
            color: #1e3a8a;
            font-size: 0.9rem;
            line-height: 1.5;
            margin: 0;
        }

        /* Icons using Unicode */
        .icon-user::before { content: "👤"; }
        .icon-email::before { content: "✉"; }
        .icon-lock::before { content: "🔒"; }
        .icon-building::before { content: "🏢"; }
        .icon-phone::before { content: "📞"; }
        .icon-link::before { content: "🔗"; }
        .icon-location::before { content: "📍"; }
        .icon-register::before { content: "✨"; }
        .icon-login::before { content: "→"; }
        .icon-info::before { content: "ℹ"; }

        /* Error state styling */
        .form-input.error, .form-textarea.error {
            border-color: #ef4444;
            background-color: #fef2f2;
        }
        
        .form-input.error:focus, .form-textarea.error:focus {
            border-color: #ef4444;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .register-container {
                padding: 10px;
            }
            
            .brand-header {
                padding: 20px;
            }
            
            .brand-header h1 {
                font-size: 2.5rem;
            }
            
            .register-card {
                padding: 30px 20px;
            }
            
            .form-row {
                grid-template-columns: 1fr;
                gap: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="register-container">
        <!-- BNI Header -->
        <div class="brand-header">
            <h1>BNI</h1>
            <h2>GAINS Profile</h2>
            <p>Join the Professional Networking Platform</p>
        </div>

        <!-- Register Card -->
        <div class="register-card">
            <!-- Welcome Message -->
            <div class="welcome-section">
                <h3>Create Your Account</h3>
                <p>Join BNI GAINS to create and share your professional profile</p>
            </div>

            <!-- Info Box -->
            <div class="info-box">
                <h4>
                    <span class="icon-info" style="margin-right: 8px;"></span>
                    Getting Started with GAINS
                </h4>
                <p>GAINS stands for Goals, Accomplishments, Interests, Networks, and Skills. After creating your account, you'll be able to build comprehensive profiles that help you network more effectively.</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Personal Information -->
                <div class="form-row">
                    <!-- First Name -->
                    <div class="form-group">
                        <label for="first_name" class="form-label required">First Name</label>
                        <div class="input-wrapper">
                            <span class="input-icon icon-user"></span>
                            <input id="first_name" 
                                class="form-input @error('first_name') error @enderror" 
                                type="text" 
                                name="first_name" 
                                value="{{ old('first_name') }}" 
                                required 
                                autofocus 
                                autocomplete="given-name"
                                placeholder="Enter your first name">
                        </div>
                        @error('first_name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Last Name -->
                    <div class="form-group">
                        <label for="last_name" class="form-label required">Last Name</label>
                        <div class="input-wrapper">
                            <span class="input-icon icon-user"></span>
                            <input id="last_name" 
                                class="form-input @error('last_name') error @enderror" 
                                type="text" 
                                name="last_name" 
                                value="{{ old('last_name') }}" 
                                required 
                                autocomplete="family-name"
                                placeholder="Enter your last name">
                        </div>
                        @error('last_name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label required">Email Address</label>
                    <div class="input-wrapper">
                        <span class="input-icon icon-email"></span>
                        <input id="email" 
                            class="form-input @error('email') error @enderror" 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            autocomplete="email"
                            placeholder="Enter your email address">
                    </div>
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password Row -->
                <div class="form-row">
                    <!-- Password -->
                    <div class="form-group">
                        <label for="password" class="form-label required">Password</label>
                        <div class="input-wrapper">
                            <span class="input-icon icon-lock"></span>
                            <input id="password" 
                                class="form-input @error('password') error @enderror"
                                type="password"
                                name="password"
                                required 
                                autocomplete="new-password"
                                placeholder="Create a password">
                        </div>
                        @error('password')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label required">Confirm Password</label>
                        <div class="input-wrapper">
                            <span class="input-icon icon-lock"></span>
                            <input id="password_confirmation" 
                                class="form-input @error('password_confirmation') error @enderror"
                                type="password"
                                name="password_confirmation" 
                                required 
                                autocomplete="new-password"
                                placeholder="Confirm your password">
                        </div>
                        @error('password_confirmation')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Section Divider -->
                <hr class="section-divider">

                <!-- Business Information -->
                <div class="form-group">
                    <label for="business_name" class="form-label">Business Name</label>
                    <div class="input-wrapper">
                        <span class="input-icon icon-building"></span>
                        <input id="business_name" 
                            class="form-input @error('business_name') error @enderror" 
                            type="text" 
                            name="business_name" 
                            value="{{ old('business_name') }}" 
                            placeholder="Your company or business name">
                    </div>
                    @error('business_name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <!-- Phone -->
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone Number</label>
                        <div class="input-wrapper">
                            <span class="input-icon icon-phone"></span>
                            <input id="phone" 
                                class="form-input @error('phone') error @enderror" 
                                type="tel" 
                                name="phone" 
                                value="{{ old('phone') }}" 
                                placeholder="Your phone number">
                        </div>
                        @error('phone')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- LinkedIn -->
                    <div class="form-group">
                        <label for="linkedin_url" class="form-label">LinkedIn Profile</label>
                        <div class="input-wrapper">
                            <span class="input-icon icon-link"></span>
                            <input id="linkedin_url" 
                                class="form-input @error('linkedin_url') error @enderror" 
                                type="url" 
                                name="linkedin_url" 
                                value="{{ old('linkedin_url') }}" 
                                placeholder="https://linkedin.com/in/yourname">
                        </div>
                        @error('linkedin_url')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Address -->
                <div class="form-group">
                    <label for="address" class="form-label">Address</label>
                    <textarea id="address" 
                        class="form-textarea @error('address') error @enderror" 
                        name="address" 
                        placeholder="Your business address (optional)">{{ old('address') }}</textarea>
                    @error('address')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Register Button -->
                <button type="submit" class="btn-register">
                    <span class="btn-icon icon-register"></span>
                    {{ __('Create Your GAINS Account') }}
                </button>

                <!-- Login Link -->
                <div class="login-section">
                    <p>Already have an account?</p>
                    <a href="{{ route('login') }}" class="btn-login">
                        <span class="btn-icon icon-login"></span>
                        Sign In to Your Account
                    </a>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>© {{ date('Y') }} BNI GAINS Profile Platform</p>
            <p>Building professional networking connections</p>
        </div>
    </div>
</body>
</html>