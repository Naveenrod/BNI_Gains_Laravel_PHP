<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Login</title>
    
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
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
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

        .login-card {
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

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            color: #374151;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 0.9rem;
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

        .form-input:focus {
            outline: none;
            border-color: #dc2626;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
        }

        .form-input::placeholder {
            color: #9ca3af;
        }

        .error-message {
            color: #ef4444;
            font-size: 0.85rem;
            margin-top: 5px;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .remember-me {
            display: flex;
            align-items: center;
        }

        .remember-me input {
            margin-right: 8px;
            accent-color: #dc2626;
        }

        .remember-me label {
            color: #6b7280;
            font-size: 0.9rem;
            cursor: pointer;
        }

        .forgot-link {
            color: #dc2626;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .forgot-link:hover {
            text-decoration: underline;
            color: #991b1b;
        }

        .btn-login {
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

        .btn-login:hover {
            background: linear-gradient(135deg, #991b1b 0%, #7f1d1d 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 38, 38, 0.3);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .btn-icon {
            margin-right: 8px;
        }

        .register-section {
            text-align: center;
            padding-top: 25px;
            border-top: 1px solid #e5e7eb;
        }

        .register-section p {
            color: #6b7280;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }

        .btn-register {
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

        .btn-register:hover {
            background: #dc2626;
            color: white;
            transform: translateY(-1px);
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

        /* Icons using Unicode */
        .icon-email::before { content: "✉"; }
        .icon-lock::before { content: "🔒"; }
        .icon-login::before { content: "→"; }
        .icon-user::before { content: "👤"; }

        /* Responsive */
        @media (max-width: 480px) {
            .login-container {
                padding: 10px;
            }
            
            .brand-header {
                padding: 20px;
            }
            
            .brand-header h1 {
                font-size: 2.5rem;
            }
            
            .login-card {
                padding: 30px;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <!-- BNI Header -->
        <div class="brand-header">
            <h1>BNI</h1>
            <h2>GAINS Profile</h2>
            <p>Professional Networking Platform</p>
        </div>

        <!-- Login Card -->
        <div class="login-card">
            <!-- Welcome Message -->
            <div class="welcome-section">
                <h3>Welcome Back</h3>
                <p>Sign in to manage your GAINS profile</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="status-message">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-wrapper">
                        <span class="input-icon icon-email"></span>
                        <input id="email" 
                            class="form-input @error('email') error @enderror" 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            autofocus 
                            autocomplete="username"
                            placeholder="Enter your email address">
                    </div>
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-wrapper">
                        <span class="input-icon icon-lock"></span>
                        <input id="password" 
                            class="form-input @error('password') error @enderror"
                            type="password"
                            name="password"
                            required 
                            autocomplete="current-password"
                            placeholder="Enter your password">
                    </div>
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="remember-forgot">
                    <div class="remember-me">
                        <input id="remember_me" type="checkbox" name="remember">
                        <label for="remember_me">{{ __('Remember me') }}</label>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <button type="submit" class="btn-login">
                    <span class="btn-icon icon-login"></span>
                    {{ __('Sign In to BNI GAINS') }}
                </button>

                <!-- Register Link -->
                @if (Route::has('register'))
                <div class="register-section">
                    <p>Don't have an account yet?</p>
                    <a href="{{ route('register') }}" class="btn-register">
                        <span class="btn-icon icon-user"></span>
                        Create Your GAINS Account
                    </a>
                </div>
                @endif
            </form>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>© {{ date('Y') }} BNI GAINS Profile Platform</p>
            <p>Building professional networking connections</p>
        </div>
    </div>

    <style>
        /* Error state styling */
        .form-input.error {
            border-color: #ef4444;
            background-color: #fef2f2;
        }
        
        .form-input.error:focus {
            border-color: #ef4444;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
        }
    </style>
</body>
</html>