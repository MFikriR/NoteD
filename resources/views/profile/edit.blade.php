@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Edit Profile</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3 text-center">
                            @if($user->profile_photo)
                                <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo" class="rounded-circle mb-3" width="150" height="150">
                            @else
                                <img src="{{ asset('default-profile.png') }}" alt="Default Profile Photo" class="rounded-circle mb-3" width="150" height="150">
                            @endif
                            <div class="mt-3">
                                <label for="profile_photo" class="form-label">Profile Photo</label>
                                <input type="file" id="profile_photo" name="profile_photo" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="bio" class="form-label">Bio:</label>
                            <textarea id="bio" name="bio" class="form-control" rows="4">{{ $user->bio }}</textarea>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">Update Profile</button>
                        </div>
                    </form>
                    <div class="mt-3 text-center">
                        <a href="{{ route('profile.show') }}" class="back-to-profile">Back to Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
