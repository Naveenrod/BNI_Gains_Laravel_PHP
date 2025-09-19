<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $profile->title }} - Profile PDF</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            background: #f4f6f7;
            margin: 0;
            padding: 0;
        }
        .bni-profile {
            max-width: 800px;
            margin: 20px auto;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            border: 1px solid #ddd;
        }
        .bni-header {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
            padding: 25px;
            text-align: center;
            position: relative;
        }
        .bni-header h1 {
            font-size: 2rem;
            margin: 0;
        }
        .logo {
            position: absolute;
            top: 15px;
            right: 20px;
            max-height: 50px;
        }
        .bni-content {
            padding: 25px;
        }
        .profile-title {
            text-align: center;
            color: #2c3e50;
            font-size: 1.5rem;
            margin-bottom: 20px;
            border-bottom: 3px solid #e74c3c;
            padding-bottom: 8px;
        }
        .gains-section {
            display: flex;
            margin-bottom: 15px;
            padding: 15px;
            background: #fff;
            border-radius: 10px;
            border-left: 5px solid #e74c3c;
        }
        .gains-letter {
            background: #e74c3c;
            color: white;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 15px;
        }
        .gains-title {
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 5px;
        }
        .gains-intro {
            font-style: italic;
            font-size: 0.9rem;
            color: #7f8c8d;
            margin-bottom: 5px;
        }
        .gains-text {
            font-size: 0.95rem;
            color: #34495e;
        }
        .contact-info {
            background: #ecf0f1;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .contact-info h4 {
            margin-bottom: 10px;
            color: #2c3e50;
        }
        .contact-item {
            margin-bottom: 5px;
            font-size: 0.9rem;
            color: #34495e;
        }
        .empty-section {
            color: #95a5a6;
            font-style: italic;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="bni-profile">
        <div class="bni-header">
            <h1>BNI</h1>
            @if($profile->logo)
                <img src="{{ public_path('storage/' . $profile->logo) }}" alt="Logo" class="logo">
            @endif
        </div>
        <div class="bni-content">
            <div class="profile-title">{{ $profile->title }}</div>

            <div class="contact-info">
                <h4>{{ $profile->user->full_name }}</h4>
                @if($profile->user->business_name)
                    <div class="contact-item">🏢 {{ $profile->user->business_name }}</div>
                @endif
                @if($profile->user->email)
                    <div class="contact-item">📧 {{ $profile->user->email }}</div>
                @endif
                @if($profile->user->phone)
                    <div class="contact-item">📞 {{ $profile->user->phone }}</div>
                @endif
                @if($profile->user->address)
                    <div class="contact-item">📍 {{ $profile->user->address }}</div>
                @endif
            </div>

            @if($profile->bniGainsProfile)
                @php
                    $sections = [
                        ['letter' => 'G','title' => 'Goals','intro' => $profile->bniGainsProfile->goals_intro,'content' => $profile->bniGainsProfile->goals_input],
                        ['letter' => 'A','title' => 'Accomplishments','intro' => $profile->bniGainsProfile->accomplishments_intro,'content' => $profile->bniGainsProfile->accomplishments_input],
                        ['letter' => 'I','title' => 'Interests','intro' => $profile->bniGainsProfile->interests_intro,'content' => $profile->bniGainsProfile->interests_input],
                        ['letter' => 'N','title' => 'Networks','intro' => $profile->bniGainsProfile->networks_intro,'content' => $profile->bniGainsProfile->networks_input],
                        ['letter' => 'S','title' => 'Skills','intro' => $profile->bniGainsProfile->skills_intro,'content' => $profile->bniGainsProfile->skills_input],
                    ];
                @endphp

                @foreach($sections as $section)
                    <div class="gains-section">
                        <div class="gains-letter">{{ $section['letter'] }}</div>
                        <div>
                            <div class="gains-title">{{ $section['title'] }}</div>
                            @if($section['intro'])
                                <div class="gains-intro">{{ $section['intro'] }}</div>
                            @endif
                            @if($section['content'])
                                <div class="gains-text">{{ $section['content'] }}</div>
                            @else
                                <div class="empty-section">No content added yet</div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div class="empty-section">No BNI Gains Profile Available</div>
            @endif
        </div>
    </div>
</body>
</html>
