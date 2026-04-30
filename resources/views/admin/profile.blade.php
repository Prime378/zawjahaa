@extends('admin.layouts.app')

@section('content')
<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-semibold mb-1">My Profile</h4>
            <p class="text-muted mb-0">Manage your account information</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back
        </a>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="stat-card text-center">
                <img src="{{ ($user->profile_image && file_exists(public_path($user->profile_image))) ? asset($user->profile_image) : asset('assets/images/dummy.jpg') }}" 
                     class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                <h5>{{ $user->name }}</h5>
                <p class="text-muted">{{ $user->email }}</p>
                <span class="badge {{ $user->role == 'admin' ? 'badge-admin' : 'badge-user' }}">{{ $user->role }}</span>
            </div>
        </div>
        <div class="col-md-8">
            <div class="stat-card">
                <h6 class="fw-semibold mb-3"><i class="fas fa-info-circle text-success me-2"></i>Account Information</h6>
                <table class="table table-borderless">
                    <tr><td width="150"><strong>Full Name:</strong></td><td>{{ $user->name }}</td></tr>
                    <tr><td><strong>Email:</strong></td><td>{{ $user->email }}</td></tr>
                    <tr><td><strong>Phone:</strong></td><td>{{ $user->phone ?? '-' }}</td></tr>
                    <tr><td><strong>Role:</strong></td><td>{{ ucfirst($user->role) }}</td></tr>
                    <tr><td><strong>Member Since:</strong></td><td>{{ $user->created_at->format('d M Y') }}</td></tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection