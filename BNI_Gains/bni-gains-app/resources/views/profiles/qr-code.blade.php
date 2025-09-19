@extends('layouts.app')

@section('content')
<style>
    .qr-container {
        max-width: 600px;
        margin: 40px auto;
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        text-align: center;
    }

    .qr-header {
        background: linear-gradient(135deg, #e74c3c, #c0392b);
        color: white;
        padding: 20px;
        border-radius: 12px 12px 0 0;
        margin: -30px -30px 20px -30px;
    }

    .qr-header h1 {
        font-size: 1.8rem;
        margin: 0;
        letter-spacing: 2px;
    }

    .qr-code {
        display: inline-block;
        padding: 15px;
        background: #fafafa;
        border: 3px solid #e74c3c;
        border-radius: 15px;
        margin: 20px 0;
    }

    .qr-text {
        color: #7f8c8d;
        font-size: 1.1rem;
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
</style>

<div class="qr-container">
    <div class="qr-header">
        <h1>{{ $profile->title }} - QR Code</h1>
    </div>

    <p class="qr-text">📱 Scan this QR code to view the public profile:</p>

    <div class="qr-code">
        {!! $qrCode !!}
    </div>

    <a href="{{ route('profiles.pdf', $profile) }}" class="btn-bni mt-3">
        📄 Download PDF
    </a>
</div>
@endsection
