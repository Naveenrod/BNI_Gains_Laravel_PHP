@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="text-center mb-5">
                <h1 class="display-4 mb-4">
                    <i class="bi bi-person-badge text-primary me-3"></i>
                    Welcome to BNI Gains
                </h1>
                <p class="lead text-muted mb-4">
                    Create and share professional profiles that help you network effectively at BNI meetings
                </p>
                
                @guest
                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
                            <i class="bi bi-person-plus me-2"></i>Get Started
                        </a>
                        <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                        </a>
                    </div>
                @else
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">
                        <i class="bi bi-speedometer2 me-2"></i>Go to Dashboard
                    </a>
                @endguest
            </div>

            <div class="row g-4 mt-5">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <i class="bi bi-person-lines-fill text-primary display-6 mb-3"></i>
                            <h5 class="card-title">Create Profiles</h5>
                            <p class="card-text">Build comprehensive BNI Gains profiles with your goals, accomplishments, interests, networks, and skills.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <i class="bi bi-share text-success display-6 mb-3"></i>
                            <h5 class="card-title">Share Online</h5>
                            <p class="card-text">Get a custom URL for your profile and share it with your BNI chapter members and networking contacts.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <i class="bi bi-file-earmark-pdf text-danger display-6 mb-3"></i>
                            <h5 class="card-title">Export & Print</h5>
                            <p class="card-text">Download your profile as a PDF or generate QR codes for easy sharing at networking events.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection