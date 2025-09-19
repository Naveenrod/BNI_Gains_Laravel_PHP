@extends('layouts.app')

@section('title', 'Welcome')

@section('content')

<style>
body {
    font-family: 'Inter', 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%);
    color: #2c3e50;
}

.hero-section {
    text-align: center;
    padding: 80px 15px 40px 15px;
}

.hero-section h1 {
    font-size: 3rem;
    font-weight: 700;
    letter-spacing: -1px;
}

.hero-section p {
    font-size: 1.2rem;
    color: #555;
    margin-bottom: 30px;
}

.hero-buttons a {
    border-radius: 50px;
    padding: 14px 35px;
    font-size: 1.1rem;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
}

.hero-buttons a.btn-primary {
    background: linear-gradient(135deg, #ff6b6b, #c44536);
    color: white;
    border: none;
}

.hero-buttons a.btn-primary:hover {
    background: linear-gradient(135deg, #c44536, #96281b);
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(255, 107, 107, 0.4);
}

.hero-buttons a.btn-outline-primary {
    border: 2px solid #ff6b6b;
    color: #ff6b6b;
    background: transparent;
}

.hero-buttons a.btn-outline-primary:hover {
    background: #ff6b6b;
    color: white;
}

.features-section {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    justify-content: center;
    padding: 40px 0;
}

.feature-card {
    background: white;
    border-radius: 20px;
    padding: 35px 20px;
    max-width: 300px;
    flex: 1 1 250px;
    text-align: center;
    box-shadow: 0 10px 25px rgba(0,0,0,0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
}

.feature-card i {
    font-size: 3rem;
    margin-bottom: 20px;
}

.feature-card h5 {
    font-weight: 700;
    margin-bottom: 15px;
    color: #2c3e50;
}

.feature-card p {
    color: #555;
    font-size: 0.95rem;
}

@media (max-width: 768px) {
    .hero-section h1 {
        font-size: 2rem;
    }
    .features-section {
        gap: 20px;
    }
}
</style>

<div class="container">
    <!-- Hero Section -->
    <div class="hero-section">
        <h1><i class="bi bi-people-fill text-primary me-2"></i>Welcome to <span class="text-primary">BNI Gains</span></h1>
        <p>Build, share, and showcase your professional profile to connect with your BNI network.</p>

        <div class="hero-buttons">
            @guest
                <a href="{{ route('register') }}" class="btn-primary">
                    <i class="bi bi-person-plus"></i> Get Started
                </a>
                <a href="{{ route('login') }}" class="btn-outline-primary">
                    <i class="bi bi-box-arrow-in-right"></i> Sign In
                </a>
            @else
                <a href="{{ route('dashboard') }}" class="btn-primary">
                    <i class="bi bi-speedometer2"></i> Go to Dashboard
                </a>
            @endguest
        </div>
    </div>

    <!-- Features Section -->
    <div class="features-section">
        <div class="feature-card">
            <i class="bi bi-person-lines-fill text-primary"></i>
            <h5>Create Profiles</h5>
            <p>Build detailed BNI Gains profiles highlighting your goals, accomplishments, interests, networks, and skills.</p>
        </div>

        <div class="feature-card">
            <i class="bi bi-share text-success"></i>
            <h5>Share Online</h5>
            <p>Get a unique link to your profile and share it instantly with BNI members and professional contacts.</p>
        </div>

        <div class="feature-card">
            <i class="bi bi-file-earmark-pdf text-danger"></i>
            <h5>Export & Print</h5>
            <p>Download your profile as a PDF or generate QR codes for easy sharing at meetings and events.</p>
        </div>
    </div>
</div>
@endsection
