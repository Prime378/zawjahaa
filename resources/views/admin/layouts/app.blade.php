<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel | zawjahaa</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; font-size: 13px; background: #f0f4f0; }
        
        .sidebar {
            position: fixed; left: 0; top: 0; width: 260px; height: 100%;
            background: linear-gradient(180deg, #0a3725 0%, #052a1a 100%);
            transition: all 0.3s; z-index: 1000; overflow-y: auto;
        }
        .sidebar::-webkit-scrollbar { width: 4px; }
        .sidebar::-webkit-scrollbar-track { background: rgba(255,255,255,0.05); }
        .sidebar::-webkit-scrollbar-thumb { background: #c9a03d; border-radius: 10px; }
        
        .sidebar .logo { padding: 20px; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.06); margin-bottom: 20px; }
        .sidebar .logo img { width: 55px; }
        .sidebar .logo h4 { font-size: 16px; margin-top: 10px; color: #f0d88a; font-weight: 600; letter-spacing: 1px; }
        .sidebar .logo p { font-size: 10px; color: rgba(255,255,255,0.5); margin-top: 5px; }
        
        .sidebar .nav { padding: 0 12px; }
        .sidebar .nav-item { margin-bottom: 5px; list-style: none; }
        .sidebar .nav-link {
            display: flex; align-items: center; padding: 10px 14px;
            color: rgba(232,240,234,0.75); text-decoration: none; border-radius: 10px;
            transition: all 0.25s; gap: 12px; font-size: 13px; font-weight: 500;
        }
        .sidebar .nav-link:hover { background: rgba(255,215,0,0.1); color: #f0d88a; }
        .sidebar .nav-link.active { background: linear-gradient(90deg, rgba(201,160,61,0.15), transparent); color: #f0d88a; border-left: 2px solid #c9a03d; }
        .sidebar .nav-link i { width: 22px; font-size: 15px; }
        
        .sidebar-footer { position: absolute; bottom: 15px; left: 0; right: 0; padding: 12px; text-align: center; font-size: 10px; color: rgba(232,240,234,0.4); }
        
        .main-content { margin-left: 260px; min-height: 100vh; }
        
        .top-navbar { background: white; padding: 10px 22px; box-shadow: 0 1px 8px rgba(0,0,0,0.04); display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 99; }
        .toggle-btn { background: #0a3725; border: none; color: white; width: 36px; height: 36px; border-radius: 8px; cursor: pointer; }
        .toggle-btn:hover { background: #052a1a; }
        .visit-site-btn { background: linear-gradient(135deg, #0a3725, #052a1a); color: white; padding: 6px 18px; border-radius: 25px; text-decoration: none; font-size: 12px; font-weight: 500; }
        .visit-site-btn:hover { color: white; background: #052a1a; }
        .user-avatar { width: 36px; height: 36px; border-radius: 50%; object-fit: cover; border: 2px solid #c9a03d; }
        .user-name { font-size: 13px; font-weight: 600; color: #2c3e2f; }
        
        /* Dropdown Fix */
        .dropdown-menu { border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .dropdown-item { font-size: 13px; padding: 8px 16px; }
        .dropdown-item:hover { background: #f0f4f0; }
        .cursor-pointer { cursor: pointer; }
        
        .content-area { padding: 20px 22px; min-height: calc(100vh - 58px); }
        
        /* Cards */
        .stat-card { background: white; border-radius: 12px; padding: 16px 18px; box-shadow: 0 1px 4px rgba(0,0,0,0.05); border: 1px solid #e5ece5; }
        .stat-icon { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 22px; background: linear-gradient(135deg, #0a3725, #052a1a); }
        
        /* Tables */
        .table-custom { background: white; border-radius: 12px; overflow: hidden; }
        .table-custom thead { background: #f8faf8; }
        .table-custom th { padding: 12px 16px; font-size: 12px; font-weight: 600; color: #5a7a5f; border-bottom: 1px solid #e5ece5; }
        .table-custom td { padding: 10px 16px; font-size: 13px; vertical-align: middle; border-bottom: 1px solid #f0f4f0; }
        
        /* Badges */
        .badge-admin { background: #dc3545; padding: 4px 10px; border-radius: 20px; font-size: 10px; font-weight: 600; color: white; }
        .badge-user { background: #28a745; padding: 4px 10px; border-radius: 20px; font-size: 10px; font-weight: 600; color: white; }
        
        /* Pagination Fix */
        .pagination { margin: 0; }
        .pagination .page-link { padding: 6px 12px; font-size: 12px; color: #0a3725; }
        .pagination .active .page-link { background: #0a3725; border-color: #0a3725; color: white; }
        
        /* Progress */
        .progress-premium { height: 5px; border-radius: 5px; background: #e5ece5; }
        .progress-bar-premium { background: linear-gradient(90deg, #0a3725, #c9a03d); border-radius: 5px; }
        
        @media (max-width: 768px) { 
            .sidebar { transform: translateX(-100%); } 
            .sidebar.show { transform: translateX(0); } 
            .main-content { margin-left: 0; } 
        }
        
        .toast-success { background-color: #0a3725 !important; }
        .toast-error { background-color: #dc3545 !important; }
    </style>
</head>
<body>

<div class="sidebar" id="sidebar">
    <div class="logo">
        <img src="{{ asset('assets/logo1.png') }}" alt="Logo">
        <h4>zawjahaa</h4>
        <p>Admin Panel</p>
    </div>
    
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-pie"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.users') }}" class="nav-link {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                <i class="fas fa-users"></i> <span>Manage Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.feedbacks') }}" class="nav-link {{ request()->routeIs('admin.feedbacks') ? 'active' : '' }}">
                <i class="fas fa-star"></i> <span>Feedbacks</span>
            </a>
        </li>
     <li class="nav-item">
    <a href="{{ route('admin.agents') }}" class="nav-link">
        <i class="fas fa-user-tie"></i> <span>Manage Agents</span>
    </a>
</li>
        <li class="nav-item">
    <a href="{{ route('admin.contacts') }}" class="nav-link {{ request()->routeIs('admin.contacts') ? 'active' : '' }}">
        <i class="fas fa-envelope"></i> <span>Contact Queries</span>
    </a>
</li>
        <li class="nav-item">
            <a href="{{ route('admin.activity-logs') }}" class="nav-link {{ request()->routeIs('admin.activity-logs') ? 'active' : '' }}">
                <i class="fas fa-history"></i> <span>Activity Logs</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.settings') }}" class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                <i class="fas fa-sliders-h"></i> <span>Settings</span>
            </a>
        </li>
    </ul>
    
    <div class="sidebar-footer">
        <i class="fas fa-shield-alt"></i> Secure Panel
    </div>
</div>

<div class="main-content" id="mainContent">
    <div class="top-navbar">
        <button class="toggle-btn" id="toggleSidebar">
            <i class="fas fa-bars"></i>
        </button>
        
        <div class="d-flex align-items-center gap-3">
            <a href="{{ url('/') }}" target="_blank" class="visit-site-btn">
                <i class="fas fa-external-link-alt me-1"></i> Visit Site
            </a>
            
            <!-- Profile Dropdown - Fixed -->
            <div class="dropdown">
                <button class="btn btn-link text-dark text-decoration-none dropdown-toggle p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background: none; border: none;">
                    <div class="d-flex align-items-center gap-2">
                        @php
                            $avatar = auth()->user()->profile_image && file_exists(public_path(auth()->user()->profile_image)) 
                                ? asset(auth()->user()->profile_image) 
                                : asset('assets/images/dummy.jpg');
                        @endphp
                        <img src="{{ $avatar }}" class="user-avatar" alt="Avatar">
                        <span class="user-name">{{ auth()->user()->name }}</span>
                        <i class="fas fa-chevron-down text-muted"></i>
                    </div>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-2">
                    <li>
                        <a class="dropdown-item py-2" href="{{ route('admin.profile') }}">
                            <i class="fas fa-user-circle me-2"></i> My Profile
                        </a>
                    </li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li>
                        <a class="dropdown-item py-2 text-danger" href="#" onclick="event.preventDefault(); confirmLogout();">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="content-area">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    toastr.options = { 
        "closeButton": true, 
        "progressBar": true, 
        "positionClass": "toast-top-right", 
        "timeOut": "2500" 
    };
    
    function confirmLogout() {
        Swal.fire({
            title: 'Logout?',
            text: "You will be logged out from admin panel!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0a3725',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, logout!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
    
    // Sidebar toggle
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('toggleSidebar');
    
    if (toggleBtn) {
        toggleBtn.addEventListener('click', function() {
            sidebar.classList.toggle('show');
        });
    }
    
    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(event) {
        if (window.innerWidth < 768) {
            if (!sidebar.contains(event.target) && !toggleBtn.contains(event.target)) {
                sidebar.classList.remove('show');
            }
        }
    });
</script>
@yield('scripts')
</body>
</html>