@extends('layouts.app')

@section('content')
<style>
    .bni-profile {
        max-width: 800px;
        margin: 0 auto;
        background: white;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 15px;
        overflow: hidden;
        font-family: 'Arial', sans-serif;
    }

    .bni-header {
        background: linear-gradient(135deg, #e74c3c, #c0392b);
        color: white;
        padding: 25px;
        text-align: center;
        position: relative;
    }

    .bni-header h1 {
        font-size: 2.5rem;
        font-weight: bold;
        margin: 0;
        letter-spacing: 3px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }

    .bni-content {
        padding: 30px;
        background: #fafafa;
    }

    .profile-title {
        text-align: center;
        color: #2c3e50;
        font-size: 1.8rem;
        font-weight: 600;
        margin-bottom: 30px;
        border-bottom: 3px solid #e74c3c;
        padding-bottom: 10px;
    }

    .gains-section {
        display: flex;
        align-items: flex-start;
        margin-bottom: 25px;
        padding: 20px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        border-left: 5px solid #e74c3c;
        transition: transform 0.2s ease;
    }

    .gains-section:hover {
        transform: translateX(5px);
    }

    .gains-letter {
        background: #e74c3c;
        color: white;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        font-weight: bold;
        margin-right: 20px;
        flex-shrink: 0;
        box-shadow: 0 3px 10px rgba(231, 76, 60, 0.3);
    }

    .gains-content {
        flex: 1;
    }

    .gains-title {
        color: #2c3e50;
        font-size: 1.3rem;
        font-weight: bold;
        margin: 0 0 8px 0;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .gains-intro {
        color: #7f8c8d;
        font-style: italic;
        margin-bottom: 10px;
        font-size: 0.95rem;
    }

    .gains-text {
        color: #34495e;
        line-height: 1.6;
        font-size: 1rem;
    }

    .section-icon {
        position: absolute;
        top: 10px;
        right: 15px;
        color: rgba(255,255,255,0.3);
        font-size: 1.2rem;
    }

    .actions-section {
        background: white;
        padding: 25px;
        text-align: center;
        border-top: 1px solid #ecf0f1;
    }

    .action-buttons {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn-bni {
        background: #e74c3c;
        border: none;
        color: white;
        padding: 12px 25px;
        border-radius: 25px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-bni:hover {
        background: #c0392b;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
    }

    .btn-bni-secondary {
        background: #95a5a6;
    }

    .btn-bni-secondary:hover {
        background: #7f8c8d;
    }

    .contact-info {
        background: #ecf0f1;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .contact-info h4 {
        color: #2c3e50;
        margin-bottom: 15px;
        font-size: 1.2rem;
    }

    .contact-item {
        color: #34495e;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .contact-item i {
        color: #e74c3c;
        width: 20px;
    }

    @media (max-width: 768px) {
        .bni-profile {
            margin: 10px;
            border-radius: 10px;
        }
        
        .gains-section {
            flex-direction: column;
            text-align: center;
        }
        
        .gains-letter {
            margin: 0 auto 15px auto;
        }
        
        .bni-header h1 {
            font-size: 2rem;
        }
        
        .action-buttons {
            flex-direction: column;
            align-items: center;
        }
    }

    .empty-section {
        color: #95a5a6;
        font-style: italic;
        padding: 15px;
        text-align: center;
        background: #f8f9fa;
        border-radius: 5px;
        margin: 10px 0;
    }
</style>

<div class="container py-4">
    <div class="bni-profile">
        <!-- Header -->
        <div class="bni-header">
            <h1>BNI</h1>
            @if($profile->logo)
                <img src="{{ Storage::url($profile->logo) }}" alt="Logo" style="position: absolute; top: 15px; right: 20px; max-height: 50px; max-width: 80px; object-fit: contain;">
            @endif
        </div>

        <!-- Contact Information -->
        <div class="bni-content">
            <div class="profile-title">{{ $profile->title }}</div>
            
            <div class="contact-info">
                <h4>👤 {{ $profile->user->full_name }}</h4>
                @if($profile->user->business_name)
                    <div class="contact-item">
                        <span>🏢</span>
                        <strong>{{ $profile->user->business_name }}</strong>
                    </div>
                @endif
                @if($profile->user->email)
                    <div class="contact-item">
                        <span>📧</span>
                        <a href="mailto:{{ $profile->user->email }}" style="color: #34495e;">{{ $profile->user->email }}</a>
                    </div>
                @endif
                @if($profile->user->phone)
                    <div class="contact-item">
                        <span>📞</span>
                        <a href="tel:{{ $profile->user->phone }}" style="color: #34495e;">{{ $profile->user->phone }}</a>
                    </div>
                @endif
                @if($profile->user->address)
                    <div class="contact-item">
                        <span>📍</span>
                        {{ $profile->user->address }}
                    </div>
                @endif
            </div>

            @if($profile->bniGainsProfile)
                @php
                    $sections = [
                        [
                            'letter' => 'G',
                            'title' => 'Goals',
                            'intro' => $profile->bniGainsProfile->goals_intro,
                            'content' => $profile->bniGainsProfile->goals_input
                        ],
                        [
                            'letter' => 'A',
                            'title' => 'Accomplishments',
                            'intro' => $profile->bniGainsProfile->accomplishments_intro,
                            'content' => $profile->bniGainsProfile->accomplishments_input
                        ],
                        [
                            'letter' => 'I',
                            'title' => 'Interests',
                            'intro' => $profile->bniGainsProfile->interests_intro,
                            'content' => $profile->bniGainsProfile->interests_input
                        ],
                        [
                            'letter' => 'N',
                            'title' => 'Networks',
                            'intro' => $profile->bniGainsProfile->networks_intro,
                            'content' => $profile->bniGainsProfile->networks_input
                        ],
                        [
                            'letter' => 'S',
                            'title' => 'Skills',
                            'intro' => $profile->bniGainsProfile->skills_intro,
                            'content' => $profile->bniGainsProfile->skills_input
                        ]
                    ];
                @endphp

                <!-- GAINS Sections -->
                @foreach($sections as $section)
                    <div class="gains-section">
                        <div class="gains-letter">{{ $section['letter'] }}</div>
                        <div class="gains-content">
                            <div class="gains-title">{{ $section['title'] }}</div>
                            
                            @if($section['intro'] || $section['content'])
                                @if($section['intro'])
                                    <div class="gains-intro">{{ $section['intro'] }}</div>
                                @endif
                                
                                @if($section['content'])
                                    <div class="gains-text">{!! nl2br(e($section['content'])) !!}</div>
                                @else
                                    <div class="empty-section">No content added yet</div>
                                @endif
                            @else
                                <div class="empty-section">This section hasn't been filled out yet</div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center py-5">
                    <div style="font-size: 3rem; color: #95a5a6;">⚠️</div>
                    <h4 class="mt-3" style="color: #7f8c8d;">No BNI Gains Profile Available</h4>
                    <p style="color: #95a5a6;">This profile hasn't been set up yet.</p>
                </div>
            @endif

            <!-- Social Media Links -->
            @if($profile->user->linkedin_url || $profile->user->twitter_handle || $profile->user->instagram_handle || $profile->user->facebook_page)
                <div class="contact-info">
                    <h4>🌐 Connect With Me</h4>
                    @if($profile->user->linkedin_url)
                        <div class="contact-item">
                            <span>💼</span>
                            <a href="{{ $profile->user->linkedin_url }}" target="_blank" style="color: #34495e;">LinkedIn Profile</a>
                        </div>
                    @endif
                    @if($profile->user->twitter_handle)
                        <div class="contact-item">
                            <span>🐦</span>
                            <a href="https://twitter.com/{{ $profile->user->twitter_handle }}" target="_blank" style="color: #34495e;">@{{ $profile->user->twitter_handle }}</a>
                        </div>
                    @endif
                    @if($profile->user->instagram_handle)
                        <div class="contact-item">
                            <span>📸</span>
                            <a href="https://instagram.com/{{ $profile->user->instagram_handle }}" target="_blank" style="color: #34495e;">@{{ $profile->user->instagram_handle }}</a>
                        </div>
                    @endif
                    @if($profile->user->facebook_page)
                        <div class="contact-item">
                            <span>📘</span>
                            <a href="{{ $profile->user->facebook_page }}" target="_blank" style="color: #34495e;">Facebook</a>
                        </div>
                    @endif
                </div>
            @endif
        </div>

        <!-- Action Buttons -->
        <div class="actions-section">
            <div class="action-buttons">
                <a href="{{ route('profiles.qr-code', $profile) }}" class="btn-bni" target="_blank">
                    📱 View QR Code
                </a>
                <a href="{{ route('profiles.pdf', $profile) }}" class="btn-bni btn-bni-secondary">
                    📄 Download PDF
                </a>
                @auth
                    @if(auth()->user()->id === $profile->user_id)
                        <a href="{{ route('profiles.edit', $profile) }}" class="btn-bni btn-bni-secondary">
                            ✏️ Edit Profile
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection