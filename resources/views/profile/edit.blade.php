@extends('layouts.app')
@section('title', 'Edit Profile')
@section('content')

<div class="card p-4">
    <h4>Edit Profile</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
        </div>

        @if($user->role === 'peserta')
        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
        </div>

        <div class="form-group mb-3">
            <label>Password (kosongkan jika tidak ingin ganti)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
        @endif

        <div class="form-group mb-3">
            <label>Foto Profil</label>
            @if($user->profile_picture)
                <div class="mb-2">
                    <img src="{{ asset('uploads/'.$user->profile_picture) }}" class="profile-preview">
                </div>
            @endif
            <input type="file" name="profile_picture" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Profile</button>
    </form>
</div>
@endsection
