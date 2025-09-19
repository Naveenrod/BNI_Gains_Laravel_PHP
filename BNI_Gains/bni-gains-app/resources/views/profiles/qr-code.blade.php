@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>{{ $profile->title }} - QR Code</h1>

    <p>Scan this QR code to view the public profile:</p>

    <div>{!! $qrCode !!}</div>

    <a href="{{ route('profiles.pdf', $profile) }}" class="btn btn-primary mt-3">
        Download PDF
    </a>
</div>
@endsection
