@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h3 class="mb-0">Profile Page</h3>
                </div>
                <div class="card-body text-center">
                    @if($user->profile_photo)
                        <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo" class="rounded-circle mb-3" width="150" height="150">
                    @else
                        <img src="{{ asset('default-profile.png') }}" alt="Default Profile Photo" class="rounded-circle mb-3" width="150" height="150">
                    @endif
                    <p><strong>Username:</strong> {{ $user->username }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Bio:</strong> {{ $user->bio }}</p>
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary mt-3">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
