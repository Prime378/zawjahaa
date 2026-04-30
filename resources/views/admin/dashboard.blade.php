@extends('admin.layouts.app')

@section('content')
<style>
/* ============================================
   DASHBOARD STYLES - Premium Modern Design
   ============================================ */

/* Stats Cards Base Styling */
.stat-card {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    border-radius: 1rem;
    padding: 1.25rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02), 0 1px 2px rgba(0, 0, 0, 0.03);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid rgba(0, 0, 0, 0.05);
    position: relative;
    overflow: hidden;
}

.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    border-color: rgba(37, 147, 112, 0.1);
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #259370 0%, #2ecc71 100%);
}

.stat-icon {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, #259370 0%, #2ecc71 100%);
    border-radius: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.stat-card:hover .stat-icon {
    transform: scale(1.05) rotate(5deg);
}

.stat-icon i {
    font-size: 1.5rem;
    color: white;
}

/* Progress Bars - Premium Style with Green Only */
.progress-premium {
    background-color: #e8f5e9;
    border-radius: 1rem;
    overflow: hidden;
    height: 10px;
    position: relative;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.05);
}

.progress-bar-premium {
    background: linear-gradient(90deg, #259370 0%, #2ecc71 100%);
    border-radius: 1rem;
    transition: width 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
    height: 100%;
}

.progress-bar-premium::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    background: linear-gradient(90deg, 
        rgba(255, 255, 255, 0) 0%,
        rgba(255, 255, 255, 0.3) 50%,
        rgba(255, 255, 255, 0) 100%);
    animation: shimmer 2s infinite;
}

@keyframes shimmer {
    0% {
        transform: translateX(-100%);
    }
    100% {
        transform: translateX(100%);
    }
}

/* Custom Table Styling */
.table-custom {
    margin-bottom: 0;
}

.table-custom thead th {
    background: #f8f9fa;
    color: #495057;
    font-weight: 600;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 1rem 1rem;
    border-bottom: 2px solid #e9ecef;
}

.table-custom tbody tr {
    transition: all 0.2s ease;
    border-bottom: 1px solid #f0f0f0;
}

.table-custom tbody tr:hover {
    background-color: #f8f9fa;
    transform: scale(1.01);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}

.table-custom tbody td {
    padding: 1rem 1rem;
    vertical-align: middle;
    color: #495057;
    font-size: 0.9rem;
}

/* Badge Styling */
.badge {
    padding: 0.35rem 0.75rem;
    font-weight: 500;
    font-size: 0.75rem;
    letter-spacing: 0.3px;
    border-radius: 0.5rem;
}

.badge.bg-primary {
    background: linear-gradient(135deg, #259370 0%, #2ecc71 100%) !important;
}

.badge.bg-danger {
    background: linear-gradient(135deg, #259370 0%, #2ecc71 100%) !important;
}

.badge.bg-success {
    background: linear-gradient(135deg, #259370 0%, #1a6b50 100%) !important;
}

/* Gender Badge Specific */
.gender-badge {
    padding: 0.35rem 0.75rem;
    font-weight: 500;
    font-size: 0.75rem;
    letter-spacing: 0.3px;
    border-radius: 0.5rem;
}

.gender-badge.male {
    background: linear-gradient(135deg, #259370 0%, #2ecc71 100%);
    color: white;
}

.gender-badge.female {
    background: linear-gradient(135deg, #259370 0%, #2ecc71 100%);
    color: white;
}

/* Avatar/Profile Image Styling */
.profile-img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #fff;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease;
}

.profile-img:hover {
    transform: scale(1.1);
}

/* Welcome Section Typography */
.welcome-title {
    font-size: 1.75rem;
    font-weight: 600 !important;
    background: linear-gradient(135deg, #2c3e50 0%, #259370 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.text-muted {
    color: #6c757d !important;
    font-size: 0.9rem;
}

/* Date Badge Styling */
.date-badge {
    background: linear-gradient(135deg, #259370 0%, #2ecc71 100%) !important;
    box-shadow: 0 2px 8px rgba(37, 147, 112, 0.3);
}

/* Stats Number */
.stats-number {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 0;
    color: #259370;
}

/* Distribution Row Styling */
.distribution-item {
    margin-bottom: 1.25rem;
}

.distribution-label {
    display: flex;
    justify-content: space-between;
    margin-bottom: 0.5rem;
    font-weight: 500;
}

.distribution-label span:first-child {
    color: #2c3e50;
}

.distribution-label span:last-child {
    color: #259370;
    font-weight: 600;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .stat-card {
        margin-bottom: 1rem;
    }
    
    .stat-icon {
        width: 40px;
        height: 40px;
    }
    
    .stat-icon i {
        font-size: 1.25rem;
    }
    
    .welcome-title {
        font-size: 1.25rem;
    }
    
    .table-custom thead th,
    .table-custom tbody td {
        padding: 0.75rem 0.5rem;
        font-size: 0.8rem;
    }
    
    .badge {
        padding: 0.25rem 0.5rem;
        font-size: 0.7rem;
    }
    
    .stats-number {
        font-size: 1.5rem;
    }
}.gender-badge.male {
    background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
    color: white;
}

.gender-badge.female {
    background: linear-gradient(135deg, #259370 0%, #2ecc71 100%);
    color: white;
}

/* Grid Gap Enhancement */
.g-3 {
    --bs-gutter-y: 1rem;
    --bs-gutter-x: 1rem;
}

/* Empty State Styling */
.empty-state {
    color: #6c757d;
    font-size: 0.9rem;
}

.empty-state a {
    color: #259370;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.2s ease;
}

.empty-state a:hover {
    color: #1a6b50;
    text-decoration: underline;
}

/* Animation for Cards */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.stat-card {
    animation: fadeInUp 0.4s ease-out forwards;
    opacity: 0;
}

.stat-card:nth-child(1) { animation-delay: 0.1s; }
.stat-card:nth-child(2) { animation-delay: 0.2s; }
.stat-card:nth-child(3) { animation-delay: 0.3s; }
.stat-card:nth-child(4) { animation-delay: 0.4s; }

/* Button Styling */
.btn-link-custom {
    color: #259370;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.2s ease;
}

.btn-link-custom:hover {
    color: #1a6b50;
    transform: translateX(3px);
}

/* Section Headers */
.section-header {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: #2c3e50;
}

/* Hover Effects */
.hover-scale {
    transition: transform 0.2s ease;
}

.hover-scale:hover {
    transform: scale(1.02);
}

/* Green Circle Animation */
@keyframes pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(37, 147, 112, 0.4);
    }
    70% {
        box-shadow: 0 0 0 10px rgba(37, 147, 112, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(37, 147, 112, 0);
    }
}

.online-indicator {
    display: inline-block;
    width: 10px;
    height: 10px;
    background-color: #2ecc71;
    border-radius: 50%;
    animation: pulse 2s infinite;
}
</style>

<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="welcome-title mb-1">
                @if(auth()->user()->role == 'agent')
                    Agent Dashboard
                @else
                    Dashboard
                @endif
            </h4>
            <p class="text-muted mb-0">Welcome back, {{ auth()->user()->name }}!</p>
        </div>
        <div>
            <span class="badge bg-success px-3 py-2 rounded-pill date-badge">
                <i class="fas fa-calendar-alt me-1"></i> {{ now()->format('d M, Y') }}
            </span>
        </div>
    </div>
    
    <!-- Stats Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">
                            @if(auth()->user()->role == 'agent')
                                Total Users Created
                            @else
                                Total Users
                            @endif
                        </p>
                        <h3 class="stats-number">{{ $totalUsers }}</h3>
                    </div>
                    <div class="stat-icon"><i class="fas fa-users text-white"></i></div>
                </div>
            </div>
        </div>
        
        @if(auth()->user()->role != 'agent')
        <div class="col-md-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Online Now</p>
                        <h3 class="stats-number">{{ $onlineUsers ?? 0 }}</h3>
                    </div>
                    <div class="stat-icon"><i class="fas fa-circle online-indicator text-white"></i></div>
                </div>
            </div>
        </div>
        @endif
        
        <div class="col-md-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">
                            @if(auth()->user()->role == 'agent')
                                Male Users
                            @else
                                Today's Signups
                            @endif
                        </p>
                        <h3 class="stats-number">
                            @if(auth()->user()->role == 'agent')
                                {{ $maleUsers ?? 0 }}
                            @else
                                {{ $todayUsers ?? 0 }}
                            @endif
                        </h3>
                    </div>
                    <div class="stat-icon">
                        <i class="fas {{ auth()->user()->role == 'agent' ? 'fa-mars' : 'fa-user-plus' }} text-white"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">
                            @if(auth()->user()->role == 'agent')
                                Female Users
                            @else
                                Active Cities
                            @endif
                        </p>
                        <h3 class="stats-number">
                            @if(auth()->user()->role == 'agent')
                                {{ $femaleUsers ?? 0 }}
                            @else
                                {{ $cityWiseUsers->count() ?? 0 }}
                            @endif
                        </h3>
                    </div>
                    <div class="stat-icon">
                        <i class="fas {{ auth()->user()->role == 'agent' ? 'fa-venus' : 'fa-city' }} text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Gender Distribution (Only for Agent) -->
    @if(auth()->user()->role == 'agent')
    <div class="row g-3 mb-4">
        <div class="col-md-12">
            <div class="stat-card">
                <h6 class="section-header">
                    <i class="fas fa-venus-mars text-success me-2"></i>
                    My Users Gender Distribution
                </h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="distribution-item">
                            <div class="distribution-label">
                                <span><i class="fas fa-mars me-2"></i>Male Users</span>
                                <span>{{ $maleUsers ?? 0 }} ({{ $totalUsers > 0 ? round(($maleUsers/$totalUsers)*100) : 0 }}%)</span>
                            </div>
                            <div class="progress-premium">
                                <div class="progress-bar-premium" style="width: {{ ($totalUsers > 0 ? ($maleUsers/$totalUsers)*100 : 0) }}%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="distribution-item">
                            <div class="distribution-label">
                                <span><i class="fas fa-venus me-2"></i>Female Users</span>
                                <span>{{ $femaleUsers ?? 0 }} ({{ $totalUsers > 0 ? round(($femaleUsers/$totalUsers)*100) : 0 }}%)</span>
                            </div>
                            <div class="progress-premium">
                                <div class="progress-bar-premium" style="width: {{ ($totalUsers > 0 ? ($femaleUsers/$totalUsers)*100 : 0) }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    
    <!-- Admin Specific Sections -->
    @if(auth()->user()->role != 'agent')
    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <div class="stat-card">
                <h6 class="section-header">
                    <i class="fas fa-venus-mars text-success me-2"></i>
                    Gender Distribution
                </h6>
                <div class="distribution-item">
                    <div class="distribution-label">
                        <span><i class="fas fa-mars me-2"></i>Male Users</span>
                        <span>{{ $maleUsers ?? 0 }} ({{ $totalUsers > 0 ? round(($maleUsers/$totalUsers)*100) : 0 }}%)</span>
                    </div>
                    <div class="progress-premium">
                        <div class="progress-bar-premium" style="width: {{ ($totalUsers > 0 ? ($maleUsers/$totalUsers)*100 : 0) }}%"></div>
                    </div>
                </div>
                <div class="distribution-item">
                    <div class="distribution-label">
                        <span><i class="fas fa-venus me-2"></i>Female Users</span>
                        <span>{{ $femaleUsers ?? 0 }} ({{ $totalUsers > 0 ? round(($femaleUsers/$totalUsers)*100) : 0 }}%)</span>
                    </div>
                    <div class="progress-premium">
                        <div class="progress-bar-premium" style="width: {{ ($totalUsers > 0 ? ($femaleUsers/$totalUsers)*100 : 0) }}%"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="stat-card">
                <h6 class="section-header">
                    <i class="fas fa-chart-line text-success me-2"></i>
                    Top Cities
                </h6>
                @foreach(($cityWiseUsers ?? collect())->take(5) as $city)
                <div class="distribution-item">
                    <div class="distribution-label">
                        <span><i class="fas fa-city me-2"></i>{{ $city->city }}</span>
                        <span>{{ $city->total }} ({{ round(($city->total/$totalUsers)*100) }}%)</span>
                    </div>
                    <div class="progress-premium">
                        <div class="progress-bar-premium" style="width: {{ ($city->total/$totalUsers)*100 }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    
    <!-- Recent Users Table -->
    <div class="stat-card">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="section-header mb-0">
                <i class="fas fa-history text-success me-2"></i>
                @if(auth()->user()->role == 'agent')
                    Recent Users Created by Me
                @else
                    Recent Users
                @endif
            </h6>
            @if(auth()->user()->role == 'agent')
                <a href="{{ route('agent.users') }}" class="btn-link-custom">
                    View All <i class="fas fa-arrow-right ms-1"></i>
                </a>
            @else
                <a href="{{ route('admin.users') }}" class="btn-link-custom">
                    View All <i class="fas fa-arrow-right ms-1"></i>
                </a>
            @endif
        </div>
        <div class="table-responsive">
            <table class="table table-custom">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentUsers as $user)
                    <tr class="hover-scale">
                        <td class="fw-semibold">{{ $user->id }}</td>
                        <td>
                            <img src="{{ ($user->profile_image && file_exists(public_path($user->profile_image))) ? asset($user->profile_image) : asset('assets/images/dummy.jpg') }}" 
                                 class="profile-img"
                                 alt="{{ $user->name }}">
                        </td>
                        <td class="fw-medium">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @php
                                // Convert gender to lowercase and check properly
                                $gender = strtolower(trim($user->gender ?? ''));
                            @endphp
                            
                            @if($gender == 'male')
                                <span class="gender-badge male">
                                    <i class="fas fa-mars me-1"></i> Male
                                </span>
                            @elseif($gender == 'female')
                                <span class="gender-badge female">
                                    <i class="fas fa-venus me-1"></i> Female
                                </span>
                            @elseif($gender == 'm')
                                <span class="gender-badge male">
                                    <i class="fas fa-mars me-1"></i> Male
                                </span>
                            @elseif($gender == 'f')
                                <span class="gender-badge female">
                                    <i class="fas fa-venus me-1"></i> Female
                                </span>
                            @else
                                <span class="badge bg-secondary">
                                    <i class="fas fa-genderless me-1"></i> {{ $user->gender ? ucfirst($user->gender) : 'N/A' }}
                                </span>
                            @endif
                        </td>
                        <td>{{ $user->phone ?? '-' }}</td>
                        <td>
                            <span class="badge bg-light text-dark">
                                <i class="far fa-clock me-1"></i>
                                {{ $user->created_at ? $user->created_at->diffForHumans() : '-' }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 empty-state">
                            @if(auth()->user()->role == 'agent')
                                <i class="fas fa-user-slash fa-2x mb-2 d-block"></i>
                                No users created yet. 
                                <a href="{{ route('agent.create-user') }}">Create your first user</a>
                            @else
                                <i class="fas fa-database fa-2x mb-2 d-block"></i>
                                No users found
                            @endif
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection