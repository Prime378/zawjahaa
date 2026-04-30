<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-logged-in" content="{{ Auth::check() ? 'true' : 'false' }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5, user-scalable=yes">
    <title>Search Matches | Zawjahaa - Marriage Bureau</title>
    <link rel="icon" type="image/png" href="{{asset('assets/header.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700;800;900&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #10B981;
            --primary-dark: #059669;
            --secondary: #F59E0B;
            --dark: #111827;
            --light: #F9FAFB;
            --gray: #6B7280;
        }
        
        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
            font-family: 'Poppins', sans-serif;
        }
        /* Add this to your style section */
#favorites-container {
    transition: all 0.3s ease;
    min-height: 100px;
}

#favorites-list {
    transition: all 0.3s ease;
}
        body {
            background: #f8fafc;
            color: #334155;
            padding-top: 71px;
            font-size: 14px;
        }
        
        /* ===== NAVBAR FIXED ===== */
        .navbar {
            background: white;
            padding: 0.75rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1040;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
            border-bottom: 3px solid var(--primary);
            font-size: 14px;
        }
        
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 700;
        }
        
        .header-logo {
            height: 42px;
            width: auto;
            object-fit: contain;
        }
        
        .text-success { 
            color: #10B981 !important; 
        }
        
        .nav-link {
            color: #4b5563 !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            border-radius: 6px;
            transition: all 0.3s;
        }
        
        .nav-link:hover,
        .nav-link.active {
            color: #10B981 !important;
            background: rgba(16, 185, 129, 0.1);
        }
        
        /* DROPDOWN - FIXED */
        .dropdown-menu {
            border-radius: 12px;
            border: 1px solid #edf2f7;
            box-shadow: 0 8px 18px rgba(0,0,0,0.06);
            margin-top: 6px;
            padding: 0.5rem 0;
            display: none;
        }
        
        .dropdown-menu.show {
            display: block;
        }
        
        .dropdown-item {
            padding: 0.6rem 1.5rem;
            font-weight: 500;
        }
        
        .dropdown-item:hover {
            background-color: rgba(16,185,129,0.08);
            color: #10B981;
        }
        
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ef4444;
            color: white;
            font-size: 0.7rem;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Mobile Navbar Fix */
        @media (max-width: 991px) {
            .navbar-collapse {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                width: 100%;
                background: white;
                padding: 0 1.2rem;
                border-radius: 0 0 18px 18px;
                box-shadow: 0 14px 20px rgba(0,0,0,0.08);
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.35s ease, padding 0.25s ease;
                z-index: 1030;
            }
            .navbar-collapse.show {
                max-height: 600px;
                padding: 1.2rem 1.2rem 1.8rem;
            }
            .navbar-nav { width: 100%; }
            .nav-item { width: 100%; margin: 2px 0; }
            .nav-link { display: block; padding: 12px 16px !important; }
            .dropdown-menu {
                background: #f8fafc;
                border: none;
                padding: 0.5rem;
                margin-top: 0;
                box-shadow: none;
                width: 100%;
            }
        }

        @media (min-width: 992px) {
            .navbar-collapse {
                display: flex !important;
                flex-basis: auto;
                position: static;
                max-height: none !important;
                overflow: visible;
                padding: 0 !important;
                box-shadow: none;
            }
        }
        
        /* ===== PAGE LOADER ===== */
        #page-loader {
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }
        .loader-wrapper {
            position: relative;
            width: 120px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .loader-ring {
            border: 6px solid transparent;
            border-top: 6px solid #00a157;
            border-bottom: 6px solid #00a157;
            animation: spin 1s linear infinite;
            z-index: 1;
        }
        #loader-img {
            width: 100px;
            height: 100px;
            animation: blink 1s infinite;
            object-fit: contain;
        }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
        @keyframes blink { 0%,100% { opacity: 1; } 50% { opacity: 0.3; } }
        #page-loader.hidden { opacity: 0; visibility: hidden; }
        
        /* ===== FOOTER ===== */
        footer {
            background: linear-gradient(135deg, #111827 0%, #1F2937 100%);
            color: white;
            padding: 80px 0 30px;
            margin-top: 80px;
        }
        .footer-logo { font-size: 2rem; font-weight: 800; color: white; margin-bottom: 25px; }
        .footer-logo i { color: #34D399; }
        .footer-links h5 { color: white; margin-bottom: 25px; border-bottom: 2px solid var(--primary); display: inline-block; padding-bottom: 10px; }
        .footer-links a { color: rgba(255,255,255,0.7); text-decoration: none; display: block; margin-bottom: 12px; transition: 0.3s; }
        .footer-links a:hover { color: white; padding-left: 20px; }
        .social-icons { display: flex; gap: 15px; margin-top: 20px; }
        .social-icons a { width: 40px; height: 40px; background: rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; transition: 0.3s; }
        .social-icons a:hover { background: var(--primary); transform: translateY(-5px); }
        .copyright { text-align: center; padding-top: 40px; margin-top: 40px; border-top: 1px solid rgba(255,255,255,0.1); color: rgba(255,255,255,0.6); }
        .text-green-light { color: #34D399 !important; }
        
        /* ===== BACK TO TOP & WHATSAPP ===== */
        .back-to-top {
            position: fixed; bottom: 30px; right: 30px; width: 55px; height: 55px;
            background: linear-gradient(135deg, #10B981, #059669); color: white;
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            font-size: 1.2rem; cursor: pointer; opacity: 0; visibility: hidden;
            transition: 0.4s; z-index: 1000; border: 2px solid white;
            box-shadow: 0 5px 15px rgba(16, 185, 129, 0.4);
        }
        .back-to-top.show { opacity: 1; visibility: visible; }
        .whatsapp-float {
            position: fixed; bottom: 95px; right: 30px; width: 60px; height: 60px;
            background: linear-gradient(135deg, #25D366, #128C7E); color: white;
            border-radius: 50%; font-size: 2rem; display: flex; align-items: center;
            justify-content: center; z-index: 1000; text-decoration: none;
            border: 2px solid white; box-shadow: 0 5px 15px rgba(37,211,102,0.4);
        }
        .whatsapp-float:hover { transform: scale(1.1); }
        
        /* ===== SEARCH PAGE STYLES ===== */
        .premium-card {
            transition: all 0.3s ease;
            border: 2px solid transparent;
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 10px 30px -10px rgba(16, 185, 129, 0.1);
            height: 100%;
        }
        
        .premium-card:hover {
            transform: translateY(-5px);
            border-color: #10b981;
            box-shadow: 0 20px 25px -5px rgba(16, 185, 129, 0.2), 0 10px 10px -5px rgba(16, 185, 129, 0.1);
        }
        
        .online-indicator {
            position: absolute;
            bottom: 10px;
            right: 10px;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            border: 3px solid white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            z-index: 10;
        }
        
        .online-indicator.online {
            background-color: #10b981;
            animation: pulse 2s infinite;
        }
        
        .online-indicator.offline {
            background-color: #6b7280;
        }
        
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(16, 185, 129, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
            }
        }
        .filter-section .row {
    row-gap: 10px;
}
        .filter-section .form-control,
.filter-section .form-select {
    padding: 0.45rem 0.75rem !important;
    font-size: 13px;
}
.filter-section .form-label {
    font-size: 13px;
    margin-bottom: 6px;
}
/* APPLY BUTTON COMPACT + TOP POSITION */
.filter-section  {
    margin-top: 0 !important;
    margin-bottom: 10px !important;
}

/* Button ko thora tight aur upar bring */
.apply-btn-wrapper {
    margin-top: 8px !important;
        margin-top: -10px !important; /* upar lane ke liye */

    align-items: flex-start;
}

#apply-filters {
    font-size: 14px;
    padding: 10px 22px;50
    border-radius: 50px;
     transform: translateY(-60px); /* ye real upward shift hai */

}
        
        .filter-section {
             padding: 1.2rem !important;   /* default p-4 ko reduce */
             margin-bottom: 2rem !important; /* mb-5 ko reduce */
           border-radius: 18px;          /* optional: slightly compact look */
             background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(16, 185, 129, 0.2);
            border-radius: 24px;
            box-shadow: 0 20px 40px -15px rgba(16, 185, 129, 0.2);
        }
        
        .premium-badge {
            background: linear-gradient(135deg, #10b981, #065f46);
        }
        
        .search-input:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
        }
        
        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            color: white;
            padding: 4rem 0;
            text-align: center;
            position: relative;
            overflow: hidden;
            margin-bottom: 2rem;
        }
        
        .page-header:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
            background-size: cover;
            background-position: center;
        }
        
        .page-header h1 {
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 1rem;
            position: relative;
        }
        
        .page-header .brand-highlight {
            color: #a7f3d0;
        }
        
        /* Stats Banner */
        .stats-banner {
            font-size: 1px;
            background: white;
            border-radius: 30px;
            padding: 1rem;
            margin: -4rem 0 3rem 0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 10;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }
        
        .stats-banner:hover {
            border-color: #10b981;
        }
        
        .stat-number {
            font-size: 1.4rem;
            font-weight: 800;
            color: #10b981;
        }
        
        .stat-label {
            font-size: 0.9rem;
            color: #6b7280;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .search-loader {
            display: none;
            text-align: center;
            padding: 3rem;
        }
        
        .search-loader.active {
            display: block;
        }
        
        .no-results {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: 30px;
            border: 1px solid #e5e7eb;
        }

        .form-select,
        .form-control {
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            padding: 0.75rem;
            transition: all 0.3s;
            font-size: 0.95rem;
            width: 100%;
        }
        
        .form-select:focus,
        .form-control:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
            outline: none;
        }
        
        .btn-green {
            background: linear-gradient(135deg, #10b981, #059669);
            border: none;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border-radius: 12px;
            transition: all 0.3s;
            color: white;
            cursor: pointer;
        }
        
        .btn-green:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.3);
        }
        
        .badge-online {
            background-color: #10b981;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.7rem;
            font-weight: 600;
        }
        
        .badge-verified {
            background-color: #3b82f6;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.7rem;
            font-weight: 600;
        }
        
        .badge-ai {
            background-color: #8b5cf6;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .badge-premium {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
        }
        
        /* ===== USER NAV LINK ===== */
        .user-nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            padding: 6px 14px;
            border-radius: 50px;
            background: rgba(16, 185, 129, 0.08);
            border: 1px solid rgba(16, 185, 129, 0.2);
            transition: all 0.3s ease;
        }

        .user-nav-link:hover {
            background: #10B981;
            border-color: #10B981;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(16, 185, 129, 0.3);
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #10B981;
            color: #fff;
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-name {
            color: #10B981;
            font-weight: 600;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .user-nav-link:hover .user-name {
            color: #fff;
        }
        
        .logout-icon-btn {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            border: 1px solid rgba(239, 68, 68, 0.3);
            background: rgba(239, 68, 68, 0.08);
            color: #10B981;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .logout-icon-btn:hover {
            background: #ef4444;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(239, 68, 68, 0.3);
        }

        .logout-icon-btn:focus {
            outline: none;
            box-shadow: none;
        }
        
        /* Heart Icon Styles */
        .heart-icon {
            cursor: pointer;
            font-size: 1.5rem;
            transition: all 0.3s ease;
            color: #9ca3af;
        }
        
        .heart-icon:hover {
            transform: scale(1.2);
            color: #dc2626;
        }
        
        .heart-icon.fas {
            color: #dc2626;
        }
        
        /* Load More Button Animation */
        .load-more-btn {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .load-more-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(16, 185, 129, 0.4);
        }
        
        .load-more-btn .spinner-border {
            width: 1.2rem;
            height: 1.2rem;
            border-width: 2px;
        }
        
        .load-more-btn.loading {
            background: #10b981;
            color: white;
            border-color: #10b981;
            pointer-events: none;
            opacity: 0.8;
        }
        
        .load-more-btn.loading i {
            animation: spin 1s linear infinite;
        }
        
        /* Premium Animation */
        .premium-pulse {
            animation: premiumPulse 2s infinite;
        }
        
        @keyframes premiumPulse {
            0% {
                box-shadow: 0 0 0 0 rgba(245, 158, 11, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(245, 158, 11, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(245, 158, 11, 0);
            }
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2.2rem;
            }
            
            .stat-number {
                font-size: 1.8rem;
            }
            
            .filter-section {
                margin-bottom: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Page Loader -->
    <div id="page-loader" class="position-fixed top-0 start-0 w-100 h-100 bg-white d-flex justify-content-center align-items-center" style="z-index: 9999;">
        <div class="loader-wrapper position-relative" style="width: 120px; height: 120px;">
            <div class="loader-ring position-absolute top-0 start-0 w-100 h-100 rounded-circle"></div>
            <img src="{{ asset('assets/zawjahaa_logo.png') }}" alt="Loading..." id="loader-img" class="position-absolute top-50 start-50 translate-middle" />
        </div>
    </div>
    
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('website') }}">
                <img src="{{ asset('assets/zawjahaa_logo.png') }}" alt="Zawjahaa Logo" class="header-logo">
                <span class="fw-bold text-success">زوجھا</span>
            </a>

            <div class="d-flex align-items-center d-lg-none">
                <button class="navbar-toggler border-success" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <!-- Navigation Links -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('website') ? 'active' : '' }}" href="{{ route('website') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('search') ? 'active' : '' }}" href="{{ route('search') }}">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('ai-match') ? 'active' : '' }}" href="{{ route('ai-match') }}">AI Match</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                    </li>

                    @guest
                        <!-- Login & Register Buttons for Guest Users -->
                        <li class="nav-item ms-lg-3">
                            <a class="btn btn-outline-success nav-btn login-btn" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </a>
                        </li>
                        <li class="nav-item ms-lg-2">
                            <a class="btn btn-success nav-btn register-btn" href="{{ route('register') }}">
                                <i class="fas fa-user-plus me-2"></i>Register
                            </a>
                        </li>
                    @endguest

                    @auth
                        <!-- Simple User Info & Logout Button for Authenticated Users -->
                        <li class="nav-item ms-lg-3">
                            <a href="{{ route('profile') }}" class="user-greeting me-2 d-none d-lg-inline text-decoration-none text-success">
                                <i class="fas fa-user-circle me-1"></i>
                                {{ Auth::user()->name ?? 'User' }}
                            </a>
                        </li>
                        <li class="nav-item ms-lg-2">
                            <form method="POST" action="{{ route('logout') }}" class="m-0">
                                @csrf
                                <button type="submit" class="logout-icon-btn">
                                    <i class="fas fa-sign-out-alt"></i>
                                </button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="page-header">
        <div class="container">
            <h1>
                <span class="brand-highlight">Zawjahaa</span><br>
                Find Your Perfect Match
            </h1>
            <p class="text-lg opacity-90">Pakistan's Most Trusted Marriage Bureau • 5,000+ Successful Marriages • 35+ Countries</p>
        </div>
    </div>

    <!-- Stats Banner -->
    <div class="container">
        <div class="stats-banner">
            <div class="row g-4">
                <div class="col-md-3 col-6">
                    <div class="stat-item text-center">
                        <div class="stat-number">5,000+</div>
                        <div class="stat-label">Happy Marriages</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item text-center">
                        <div class="stat-number">{{ $userCount }}+</div>
                        <div class="stat-label">Active Members</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item text-center">
                        <div class="stat-number">{{ number_format($countryCount) }}+</div>
                        <div class="stat-label">Countries</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item text-center">
                        <div class="stat-number">15+</div>
                        <div class="stat-label">Years Experience</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container py-4">
        <!-- Search Bar - ONLY ID SEARCH NOW -->
        <div class="row justify-content-center mb-4">
            <div class="col-md-8">
                <div class="position-relative">
                    <i class="fas fa-id-card position-absolute top-50 start-0 translate-middle-y ms-4 text-gray-400"></i>
                    <input type="text" id="global-search" placeholder="Enter Profile ID (e.g., ZWJ12345)..." 
                           class="form-control form-control-lg rounded-pill ps-5 py-3 border-2 shadow-sm">
                    <button id="search-btn" class="btn btn-success position-absolute top-50 end-0 translate-middle-y me-2 px-4 py-2 rounded-pill">
                        <i class="fas fa-search me-2"></i>Search ID
                    </button>
                </div>
            </div>
        </div>

        <!-- Filters Section -->
        <div class="filter-section p-4 mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-success mb-0">
                    <i class="fas fa-sliders-h me-2"></i>Advanced Filters
                </h4>
                <button id="reset-btn" class="btn btn-link text-success text-decoration-none">
                    <i class="fas fa-redo-alt me-1"></i>Reset All
                </button>
            </div>
            
            <div class="row g-3">
                <!-- Gender Filter -->
                <div class="col-md-6 col-lg-3">
                    <label class="form-label fw-semibold">
                        <i class="fas fa-venus-mars text-success me-1"></i>Gender
                    </label>
                    <select id="gender" class="form-select">
                        <option value="">All Genders</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                
                <!-- Age Range -->
                <div class="col-md-6 col-lg-3">
                    <label class="form-label fw-semibold">
                        <i class="fas fa-calendar-alt text-success me-1"></i>Age Range
                    </label>
                    <div class="d-flex gap-2">
                        <input type="number" id="age-min" placeholder="Min" value="18" min="18" max="70" class="form-control">
                        <input type="number" id="age-max" placeholder="Max" value="70" min="18" max="70" class="form-control">
                    </div>
                </div>
                
                <!-- Height Range -->
                <div class="col-md-6 col-lg-3">
                    <label class="form-label fw-semibold">
                        <i class="fas fa-arrows-alt-v text-success me-1"></i>Height Range
                    </label>
                    <div class="d-flex gap-2">
                        <select id="height-min" class="form-select">
                            <option value="">Min</option>
                            <option value="4'0&quot;">4'0"</option>
                            <option value="4'5&quot;">4'5"</option>
                            <option value="5'0&quot;">5'0"</option>
                            <option value="5'2&quot;">5'2"</option>
                            <option value="5'4&quot;">5'4"</option>
                            <option value="5'6&quot;">5'6"</option>
                            <option value="5'8&quot;">5'8"</option>
                            <option value="5'10&quot;">5'10"</option>
                            <option value="6'0&quot;">6'0"</option>
                        </select>
                        <select id="height-max" class="form-select">
                            <option value="">Max</option>
                            <option value="5'0&quot;">5'0"</option>
                            <option value="5'2&quot;">5'2"</option>
                            <option value="5'4&quot;">5'4"</option>
                            <option value="5'6&quot;">5'6"</option>
                            <option value="5'8&quot;">5'8"</option>
                            <option value="5'10&quot;">5'10"</option>
                            <option value="6'0&quot;">6'0"</option>
                            <option value="6'2&quot;">6'2"</option>
                            <option value="6'4&quot;">6'4"</option>
                            <option value="6'6&quot;">6'6"</option>
                            <option value="7'0&quot;">7'0"</option>
                        </select>
                    </div>
                </div>
                
                <!-- Marital Status -->
                <div class="col-md-6 col-lg-3">
                    <label class="form-label fw-semibold">
                        <i class="fas fa-ring text-success me-1"></i>Marital Status
                    </label>
                    <select id="marital-status" class="form-select">
                        <option value="">All</option>
                        @foreach($maritalStatuses as $status)
                        <option value="{{ $status }}">{{ ucfirst(str_replace('_',' ',$status)) }}</option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Religion -->
                <div class="col-md-6 col-lg-3">
                    <label class="form-label fw-semibold">
                        <i class="fas fa-pray text-success me-1"></i>Religion
                    </label>
                    <select id="religion" class="form-select">
                        <option value="">All</option>
                        @foreach($religions as $rel)
                        <option value="{{ $rel }}">{{ $rel }}</option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Caste -->
                <div class="col-md-6 col-lg-3">
                    <label class="form-label fw-semibold">
                        <i class="fas fa-users text-success me-1"></i>Caste
                    </label>
                    <input type="text" id="caste" placeholder="Enter caste" class="form-control">
                </div>
                
                <!-- Mother Tongue
                <div class="col-md-6 col-lg-3">
                    <label class="form-label fw-semibold">
                        <i class="fas fa-language text-success me-1"></i>Mother Tongue
                    </label>
                    <select id="mother-tongue" class="form-select">
                        <option value="">All</option>
                        <option value="Urdu">Urdu</option>
                        <option value="Punjabi">Punjabi</option>
                        <option value="Sindhi">Sindhi</option>
                        <option value="Pashto">Pashto</option>
                        <option value="Balochi">Balochi</option>
                        <option value="English">English</option>
                    </select>
                </div> -->
                
                <!-- Country -->
                <div class="col-md-6 col-lg-3">
                    <label class="form-label fw-semibold">
                        <i class="fas fa-globe text-success me-1"></i>Country
                    </label>
                    <select id="country" class="form-select">
                        <option value="">All Countries</option>
                        @foreach($countries as $country)
                        <option value="{{ $country }}">{{ $country }}</option>
                        @endforeach
                    </select>
                </div>
                
                <!-- City -->
                <div class="col-md-6 col-lg-3">
                    <label class="form-label fw-semibold">
                        <i class="fas fa-city text-success me-1"></i>City
                    </label>
                    <input type="text" id="city" placeholder="e.g. Karachi, Lahore" class="form-control">
                </div>
                
                <!-- Education -->
                <div class="col-md-6 col-lg-3">
                    <label class="form-label fw-semibold">
                        <i class="fas fa-graduation-cap text-success me-1"></i>Education
                    </label>
                    <select id="education" class="form-select">
                        <option value="">All</option>
                        @foreach($educations as $edu)
                        <option value="{{ $edu }}">{{ $edu }}</option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Profession -->
                <div class="col-md-6 col-lg-3">
                    <label class="form-label fw-semibold">
                        <i class="fas fa-briefcase text-success me-1"></i>Profession
                    </label>
                    <input type="text" id="profession" placeholder="e.g. Doctor, Engineer" class="form-control">
                </div>
                
                <!-- On Behalf
                <div class="col-md-6 col-lg-3">
                    <label class="form-label fw-semibold">
                        <i class="fas fa-user-tie text-success me-1"></i>On Behalf
                    </label>
                    <select id="on-behalf" class="form-select">
                        <option value="">All</option>
                        <option value="self">Self</option>
                        <option value="son">Son</option>
                        <option value="daughter">Daughter</option>
                        <option value="brother">Brother</option>
                        <option value="sister">Sister</option>
                        <option value="friend">Friend</option>
                    </select>
                </div> -->
                
                <!-- Premium Filters -->
                <div class="col-md-6 col-lg-3">
                    <label class="form-label fw-semibold">
                        <i class="fas fa-crown text-warning me-1"></i>Premium Filters
                    </label>
                    <div class="bg-light p-3 rounded-3">
                        <div class="form-check">
                            <input type="checkbox" id="online-now" class="form-check-input">
                            <label class="form-check-label" for="online-now">Online Now</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="photo-only" class="form-check-input">
                            <label class="form-check-label" for="photo-only">With Photo</label>
                        </div>
                    </div>
                    
                </div>
            </div>
            
           <div class="d-flex justify-content-end mt-2 apply-btn-wrapper">
    <button id="apply-filters" class="btn btn-success px-4 py-2 rounded-pill fw-semibold">
    <i class="fas fa-search me-2"></i>Apply Filters
</button>
            </div>
        </div>

        <!-- Results Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold text-success" id="results-count">
                <i class="fas fa-users me-2"></i>
                <span id="total-results">0</span> Matches Found
            </h5>
            <div class="text-end mb-4">
    <button id="show-favorites-btn" class="btn btn-outline-danger px-4 py-2 rounded-pill">
        <i class="fas fa-heart me-2"></i>Show Favorites
    </button>
</div>
        </div>

        <!-- Search Loader -->
        <div class="search-loader text-center py-5" id="search-loader">
            <div class="spinner-border text-success" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-3 text-muted">Searching for your perfect match...</p>
        </div>
         <div id="favorites-container" class="row g-4 mb-4" style="display: none;">
    <h5 class="fw-bold text-danger mb-3">
        <i class="fas fa-heart me-2"></i>Your Favorites
    </h5>
    <div id="favorites-list" class="row g-4">
        <!-- Favorite profiles will be injected here -->
    </div>
</div>
        <!-- Profiles Grid -->
        <div id="results-container" class="row g-4">
            <!-- Profiles will be loaded here via AJAX -->
        </div>
        
        <!-- Load More Button -->
        <div class="text-center mt-5" id="load-more-container" style="display: none;">
            <button id="load-more-btn" class="btn btn-outline-success px-5 py-3 rounded-pill load-more-btn">
                <i class="fas fa-spinner me-2 d-none"></i>
                <span class="btn-text">Load More Profiles</span>
            </button>
        </div>
        
        <!-- No Results Message -->
        <div id="no-results" class="no-results text-center py-5 bg-white rounded-4 shadow-sm d-none">
            <i class="fas fa-search fa-4x text-muted mb-3"></i>
            <h4 class="fw-bold text-dark">No Matches Found</h4>
            <p class="text-muted">Try adjusting your search filters</p>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5">
                    <div class="footer-logo">
                        <i class="fas fa-heart"></i>
                        <span class="text-green-light">Zawjahaa</span>
                    </div>
                    <p class="opacity-75 mb-4">Pakistan's Most Trusted Marriage Bureau since 2010. Connecting hearts across the globe with integrity, excellence, and care.</p>
                    <div class="social-icons">
                        <a href="https://facebook.com/zawjahaa" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/zawjahaa.official/" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 mb-5">
                    <div class="footer-links">
                        <h5>Quick Links</h5>
                        <a href="{{ route('website') }}">Home</a>
                        <a href="{{ route('search') }}">Search</a>
                        <a href="{{ route('profile') }}">Profiles</a>
                        <a href="{{ route('ai-match') }}">AI Match</a>
                        <a href="{{ route('services') }}">Services</a>
                        <a href="{{ route('contact') }}">Contact</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 mb-5">
                    <div class="footer-links">
                        <h5>Our Services</h5>
                        <a href="{{ route('personal.matchmaking') }}" target="_blank">Personal Matchmaking</a>
                        <a href="{{ route('international.match') }}" target="_blank">International Rishta</a>
                        <a href="{{ route('family.match') }}" target="_blank">Family Mediation</a>
                        <a href="{{ route('bg.verify') }}" target="_blank">Background Verification</a>
                        <a href="{{ route('wedding.plan') }}" target="_blank">Wedding Planning</a>
                        <a href="{{ route('vip.concierge') }}" target="_blank">VIP Concierge</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 mb-5">
                    <div class="footer-links">
                        <h5>Contact Info</h5>
                        <p><i class="fas fa-envelope me-2 text-green-light"></i> info@Zawjahaa.com</p>
                        <p><i class="fas fa-map-marker-alt me-2 text-green-light"></i> Punjab Pakistan</p>
                        <p><i class="fas fa-clock me-2 text-green-light"></i> Mon-Sat: 10AM - 8PM</p>
                    </div>
                </div>
            </div>

            <div class="copyright">
                <p>&copy; 2025 Zawjahaa Marriage Bureau. All rights reserved. | Since 2010 | <a href="{{ route('privacy.policy') }}" class="text-green-light">Privacy Policy</a> | <a href="{{ route('terms.service') }}" class="text-green-light">Terms of Service</a> | <a class="text-green-light" href="{{ route('faq') }}">FAQ</a></p>
                <p class="mt-2">Designed with <i class="fas fa-heart text-danger"></i> Zawjahaa</p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <div class="back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </div>
    
    <!-- WhatsApp Button -->
    <a href="{{ route('contact') }}" class="whatsapp-float">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
      <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
<script>
    // Store favorites in memory
    let favorites = [];
    let showingFavorites = false;
    
    // ===== PAGE LOADER =====
    window.addEventListener('load', function() {
        const loader = document.getElementById('page-loader');
        if (loader) {
            setTimeout(function() {
                loader.classList.add('hidden');
                setTimeout(function() {
                    loader.style.display = 'none';
                }, 500);
            }, 800);
        }
        
        // Load user favorites
        @auth
        loadUserFavorites();
        @endauth

// ===== PREMIUM PROFILE INCOMPLETE ALERT =====
@if(isset($showAlert) && $showAlert)
(function() {
    const overlay = document.createElement('div');
    overlay.style.position = 'fixed';
    overlay.style.top = '0';
    overlay.style.left = '0';
    overlay.style.width = '100%';
    overlay.style.height = '100%';
    overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
    overlay.style.backdropFilter = 'blur(6px)';
    overlay.style.zIndex = '99999';
    overlay.style.display = 'flex';
    overlay.style.alignItems = 'center';
    overlay.style.justifyContent = 'center';
    
    overlay.innerHTML = `
        <div style="background: white; border-radius: 24px; padding: 0; max-width: 420px; width: 90%; text-align: center; box-shadow: 0 30px 50px rgba(0,0,0,0.2); overflow: hidden;">
            
            <!-- Top green bar -->
            <div style="background: #10B981; padding: 20px;">
                <i class="fas fa-id-card" style="font-size: 50px; color: white;"></i>
            </div>
            
            <!-- Content -->
            <div style="padding: 30px 25px 35px;">
                <h3 style="font-size: 22px; font-weight: 700; color: #1F2937; margin-bottom: 12px;">
                    Profile Incomplete
                </h3>
                
                <p style="color: #6B7280; font-size: 14px; line-height: 1.6; margin-bottom: 25px;">
                    Please complete your profile to access the search feature and find your perfect match.
                </p>
                
                <!-- Progress bar -->
                <div style="background: #E5E7EB; border-radius: 50px; height: 4px; margin-bottom: 30px; overflow: hidden;">
                    <div style="background: #10B981; width: 0%; height: 100%; border-radius: 50px; transition: width 0.1s linear;" id="blockProgress"></div>
                </div>
                
                <!-- Button -->
                <a href="{{ route('profile') }}" style="display: inline-block; background: #10B981; color: white; padding: 12px 30px; border-radius: 50px; text-decoration: none; font-weight: 600; font-size: 14px; transition: all 0.3s ease; width: 100%; box-sizing: border-box; border: none; cursor: pointer;" 
                   onmouseover="this.style.background='#059669'; this.style.transform='translateY(-2px)';" 
                   onmouseout="this.style.background='#10B981'; this.style.transform='translateY(0)';">
                    <i class="fas fa-arrow-right me-2"></i>Complete Profile
                </a>
            </div>
        </div>
    `;
    
    document.body.appendChild(overlay);
    
    let width = 0;
    const interval = setInterval(() => {
        if (width >= 100) {
            clearInterval(interval);
            window.location.href = "{{ route('profile') }}";
        } else {
            width += 2;
            const progressBar = document.getElementById('blockProgress');
            if (progressBar) progressBar.style.width = width + '%';
        }
    }, 100);
    
    document.body.style.overflow = 'hidden';
})();
@endif
    });

    // ===== BACK TO TOP =====
    const backToTop = document.getElementById('backToTop');
    if (backToTop) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });
        
        backToTop.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // ===== LOAD USER FAVORITES =====
    function loadUserFavorites() {
        fetch('/my-favorites', {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success && data.favorites) {
                favorites = data.favorites.map(f => f.id);
            }
        })
        .catch(error => console.error('Error loading favorites:', error));
    }

    // ===== TOGGLE FAVORITE =====
    function toggleFavorite(userId, element) {
        @auth
        const isFavorite = element.classList.contains('fas');
        
        // Store original classes
        const originalClasses = element.className;
        
        // Add loading animation
        element.classList.remove('fas', 'far');
        element.classList.add('fa-spinner', 'fa-spin', 'text-success');
        
        const url = isFavorite 
            ? '/remove-interest/ZAW1232' + userId + 'ygf676tyg'
            : '/send-interest/ZAW1232' + userId + 'ygf676tyg';
        
        fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            // Remove loading class
            element.classList.remove('fa-spinner', 'fa-spin', 'text-success');
            
            if (data.success) {
                if (isFavorite) {
                    element.classList.remove('fas');
                    element.classList.add('far');
                    element.style.color = '#9ca3af';
                    // Remove from favorites array
                    const index = favorites.indexOf(userId);
                    if (index > -1) favorites.splice(index, 1);
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'Removed from Favorites',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    
                    // If favorites are currently being shown, refresh them
                    if (showingFavorites) {
                        loadAndDisplayFavorites();
                    }
                } else {
                    element.classList.remove('far');
                    element.classList.add('fas');
                    element.style.color = '#dc2626';
                    // Add to favorites array
                    if (!favorites.includes(userId)) {
                        favorites.push(userId);
                    }
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'Added to Favorites',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    
                    // If favorites are currently being shown, refresh them
                    if (showingFavorites) {
                        loadAndDisplayFavorites();
                    }
                }
                
                // Add bounce animation
                element.classList.add('animate__animated', 'animate__heartBeat');
                setTimeout(() => {
                    element.classList.remove('animate__animated', 'animate__heartBeat');
                }, 1000);
                
            } else {
                // Revert to original state on error
                element.className = originalClasses;
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: data.message || 'Something went wrong',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            element.className = originalClasses;
            Swal.fire({
                icon: 'error',
                title: 'Network Error',
                text: 'Please try again later',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000
            });
        });
        @else
        window.location.href = '/login';
        @endauth
    }

    // ===== RENDER PROFILES =====
    function renderProfiles(profiles) {
        if (!profiles || profiles.length === 0) return '';

        let html = '';
        
        profiles.forEach(profile => {
            const lastSeenText = profile.last_seen_formatted ? 
                (profile.is_online ? 
                    '<span class="text-success fw-semibold"><i class="fas fa-circle me-1 small"></i>Online Now</span>' : 
                    '<span class="text-muted"><i class="far fa-clock me-1"></i>' + profile.last_seen_formatted + '</span>'
                ) : '<span class="text-muted">Not available</span>';
            
            const isFavorite = favorites.includes(profile.id);
            const heartClass = isFavorite ? 'fas' : 'far';
            const heartColor = isFavorite ? '#dc2626' : '#9ca3af';
            
            let imageUrl = profile.image_url;
            if (!imageUrl || imageUrl === '' || imageUrl.includes('dummy.jpg')) {
                imageUrl = '/assets/images/dummy.jpg';
            }
            if (imageUrl && !imageUrl.startsWith('http') && !imageUrl.startsWith('/')) {
                imageUrl = '/' + imageUrl;
            }
            
            const premiumClass = profile.is_premium ? 'premium-pulse' : '';
            
            html += `
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="premium-card bg-white rounded-4 shadow-sm overflow-hidden ${premiumClass}">
                        ${profile.is_premium ? 
                            '<div class="position-absolute top-0 end-0 m-3 z-1"><span class="badge bg-warning text-dark px-3 py-2 rounded-pill animate__animated animate__pulse animate__infinite"><i class="fas fa-crown me-1"></i>Premium</span></div>' 
                            : ''}
                        
                        <div class="position-relative">
                            <img src="${imageUrl}" 
                                 alt="${profile.name}" 
                                 class="w-100" 
                                 style="height: 250px; object-fit: cover;" 
                                 onerror="this.onerror=null; this.src='/assets/images/dummy.jpg'; this.style.objectFit='contain'; this.style.backgroundColor='#f8f9fa'; this.style.padding='20px';">
                            <div class="position-absolute bottom-0 start-0 m-3 d-flex gap-1">
                                ${profile.is_online ? '<span class="badge bg-success">Online</span>' : ''}
                                ${profile.is_verified ? '<span class="badge bg-primary">Verified</span>' : ''}
                                ${profile.has_ai_answers ? '<span class="badge" style="background: #8b5cf6;">AI Answers</span>' : ''}
                            </div>
                            <div class="online-indicator ${profile.is_online ? 'online' : 'offline'}" style="position: absolute; bottom: 10px; right: 10px;"></div>
                        </div>
                        
                        <div class="p-4">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div>
                                    <h5 class="fw-bold text-dark mb-0">${profile.formatted_id}</h5>
                                    <small class="text-muted">Age: ${profile.age}</small>
                                </div>
                                <i class="${heartClass} fa-heart heart-icon animate__animated" style="color: ${heartColor};" onclick="toggleFavorite(${profile.id}, this)"></i>
                            </div>
                            
                            <div class="mt-3 small">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-${profile.gender.toLowerCase() === 'male' ? 'mars' : 'venus'} text-success me-2" style="width: 16px;"></i>
                                    <span>${profile.gender}</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-map-marker-alt text-success me-2" style="width: 16px;"></i>
                                    <span class="text-truncate">${profile.location}</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-graduation-cap text-success me-2" style="width: 16px;"></i>
                                    <span class="text-truncate">${profile.education}</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-briefcase text-success me-2" style="width: 16px;"></i>
                                    <span class="text-truncate">${profile.profession}</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-pray text-success me-2" style="width: 16px;"></i>
                                    <span>${profile.religion}</span>
                                </div>
                            </div>
                            
                            <div class="d-flex gap-2 mt-4">
                                <a href="/profile/ZAW1232${profile.id}ygf676tyg" class="flex-fill btn btn-success btn-sm rounded-pill">
                                    <i class="fas fa-eye me-1"></i>View
                                </a>
                                <a href="/messages#chat-ZAW1232${profile.id}ygf676tyg" class="flex-fill btn btn-outline-success btn-sm rounded-pill">
                                    <i class="fas fa-message me-1"></i>Message
                                </a>
                            </div>
                            
                            <div class="mt-3 small text-muted d-flex align-items-center justify-content-center">
                                ${lastSeenText}
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });
        
        return html;
    }

    // ===== RENDER FAVORITES PROFILES =====
    function renderFavoritesProfiles(profiles) {
        if (!profiles || profiles.length === 0) return '';
        
        let html = '';
        
        profiles.forEach(profile => {
            const lastSeenText = profile.last_seen_formatted ? 
                (profile.is_online ? 
                    '<span class="text-success fw-semibold"><i class="fas fa-circle me-1 small"></i>Online Now</span>' : 
                    '<span class="text-muted"><i class="far fa-clock me-1"></i>' + profile.last_seen_formatted + '</span>'
                ) : '<span class="text-muted">Not available</span>';
            
            const isFavorite = favorites.includes(profile.id);
            const heartClass = isFavorite ? 'fas' : 'far';
            const heartColor = isFavorite ? '#dc2626' : '#9ca3af';
            
            let imageUrl = profile.image_url;
            if (!imageUrl || imageUrl === '' || imageUrl.includes('dummy.jpg')) {
                imageUrl = '/assets/images/dummy.jpg';
            }
            if (imageUrl && !imageUrl.startsWith('http') && !imageUrl.startsWith('/')) {
                imageUrl = '/' + imageUrl;
            }
            
            const premiumClass = profile.is_premium ? 'premium-pulse' : '';
            
            html += `
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="premium-card bg-white rounded-4 shadow-sm overflow-hidden ${premiumClass}">
                        ${profile.is_premium ? 
                            '<div class="position-absolute top-0 end-0 m-3 z-1"><span class="badge bg-warning text-dark px-3 py-2 rounded-pill animate__animated animate__pulse animate__infinite"><i class="fas fa-crown me-1"></i>Premium</span></div>' 
                            : ''}
                        
                        <div class="position-relative">
                            <img src="${imageUrl}" 
                                 alt="${profile.name}" 
                                 class="w-100" 
                                 style="height: 250px; object-fit: cover;" 
                                 onerror="this.onerror=null; this.src='/assets/images/dummy.jpg'; this.style.objectFit='contain'; this.style.backgroundColor='#f8f9fa'; this.style.padding='20px';">
                            <div class="position-absolute bottom-0 start-0 m-3 d-flex gap-1">
                                ${profile.is_online ? '<span class="badge bg-success">Online</span>' : ''}
                                ${profile.is_verified ? '<span class="badge bg-primary">Verified</span>' : ''}
                                ${profile.has_ai_answers ? '<span class="badge" style="background: #8b5cf6;">AI Answers</span>' : ''}
                            </div>
                            <div class="online-indicator ${profile.is_online ? 'online' : 'offline'}" style="position: absolute; bottom: 10px; right: 10px;"></div>
                        </div>
                        
                        <div class="p-4">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div>
                                    <h5 class="fw-bold text-dark mb-0">${profile.formatted_id || profile.id}</h5>
                                    <small class="text-muted">Age: ${profile.age}</small>
                                </div>
                                <i class="${heartClass} fa-heart heart-icon animate__animated" style="color: ${heartColor};" onclick="toggleFavorite(${profile.id}, this)"></i>
                            </div>
                            
                            <div class="mt-3 small">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-${profile.gender && profile.gender.toLowerCase() === 'male' ? 'mars' : 'venus'} text-success me-2" style="width: 16px;"></i>
                                    <span>${profile.gender || 'Not specified'}</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-map-marker-alt text-success me-2" style="width: 16px;"></i>
                                    <span class="text-truncate">${profile.location || 'Not specified'}</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-graduation-cap text-success me-2" style="width: 16px;"></i>
                                    <span class="text-truncate">${profile.education || 'Not specified'}</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-briefcase text-success me-2" style="width: 16px;"></i>
                                    <span class="text-truncate">${profile.profession || 'Not specified'}</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-pray text-success me-2" style="width: 16px;"></i>
                                    <span>${profile.religion || 'Not specified'}</span>
                                </div>
                            </div>
                            
                            <div class="d-flex gap-2 mt-4">
                                <a href="/profile/ZAW1232${profile.id}ygf676tyg" class="flex-fill btn btn-success btn-sm rounded-pill">
                                    <i class="fas fa-eye me-1"></i>View
                                </a>
                                <a href="/messages#chat-ZAW1232${profile.id}ygf676tyg" class="flex-fill btn btn-outline-success btn-sm rounded-pill">
                                    <i class="fas fa-message me-1"></i>Message
                                </a>
                            </div>
                            
                            <div class="mt-3 small text-muted d-flex align-items-center justify-content-center">
                                ${lastSeenText}
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });
        
        return html;
    }

    // ===== LOAD AND DISPLAY FAVORITES =====
// ===== LOAD AND DISPLAY FAVORITES =====
// ===== LOAD AND DISPLAY FAVORITES =====
function loadAndDisplayFavorites() {
    const favoritesContainer = document.getElementById('favorites-container');
    const favoritesList = document.getElementById('favorites-list');
    
    // Store current scroll position
    const currentScrollPos = window.pageYOffset || document.documentElement.scrollTop;
    
    favoritesList.innerHTML = `
        <div class="col-12 text-center py-4">
            <div class="spinner-border text-success" role="status">
                <span class="visually-hidden">Loading favorites...</span>
            </div>
            <p class="mt-2 text-muted">Loading your favorites...</p>
        </div>
    `;
    favoritesContainer.style.display = 'block';
    
    fetch('/my-favorites', {
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
        }
    })
    .then(response => {
        console.log('Response status:', response.status);
        return response.json();
    })
    .then(data => {
        console.log('Favorites response:', data);
        
        if (data.success && data.favorites && data.favorites.length > 0) {
            favoritesList.innerHTML = renderFavoritesProfiles(data.favorites);
        } else {
            favoritesList.innerHTML = `
                <div class="col-12 text-center py-4">
                    <i class="fas fa-heart-broken fa-3x text-muted mb-3"></i>
                    <p class="text-muted">No favorites added yet. Click the heart icon on profiles to add them to favorites.</p>
                    ${data.message ? `<p class="text-danger small mt-2">Debug: ${data.message}</p>` : ''}
                </div>
            `;
        }
        
        // Restore scroll position after content is loaded
        setTimeout(() => {
            window.scrollTo({
                top: currentScrollPos,
                behavior: 'instant'
            });
        }, 50);
    })
    .catch(error => {
        console.error('Error loading favorites:', error);
        favoritesList.innerHTML = `
            <div class="col-12 text-center py-4">
                <i class="fas fa-exclamation-triangle fa-3x text-danger mb-3"></i>
                <p class="text-muted">Error loading favorites: ${error.message}</p>
                <button onclick="loadAndDisplayFavorites()" class="btn btn-sm btn-outline-success mt-2">
                    <i class="fas fa-redo me-1"></i>Try Again
                </button>
            </div>
        `;
        
        // Restore scroll position even on error
        setTimeout(() => {
            window.scrollTo({
                top: currentScrollPos,
                behavior: 'instant'
            });
        }, 50);
    });
}

// ===== SHOW FAVORITES (No Scroll Version) =====
function showFavorites() {
    if (!showingFavorites) {
        loadAndDisplayFavorites();
        showingFavorites = true;
        const btn = document.getElementById('show-favorites-btn');
        btn.innerHTML = '<i class="fas fa-times me-2"></i>Hide Favorites';
    } else {
        const favoritesContainer = document.getElementById('favorites-container');
        if (favoritesContainer) {
            favoritesContainer.style.display = 'none';
        }
        showingFavorites = false;
        const btn = document.getElementById('show-favorites-btn');
        btn.innerHTML = '<i class="fas fa-heart me-2"></i>Show Favorites';
    }
}

    // ===== RESET FILTERS =====
    function resetFilters() {
        document.getElementById('gender').value = '';
        document.getElementById('age-min').value = '18';
        document.getElementById('age-max').value = '70';
        document.getElementById('height-min').value = '';
        document.getElementById('height-max').value = '';
        document.getElementById('marital-status').value = '';
        document.getElementById('religion').value = '';
        document.getElementById('caste').value = '';
        document.getElementById('country').value = '';
        document.getElementById('city').value = '';
        document.getElementById('education').value = '';
        document.getElementById('profession').value = '';
        document.getElementById('online-now').checked = false;
        document.getElementById('photo-only').checked = false;
        document.getElementById('global-search').value = '';
    }

    // ===== LOAD PROFILES =====
    function loadProfiles(page = 1, append = false, callback = null) {
        // Hide favorites container when searching
        const favoritesContainer = document.getElementById('favorites-container');
        if (favoritesContainer && showingFavorites) {
            favoritesContainer.style.display = 'none';
            showingFavorites = false;
            const btn = document.getElementById('show-favorites-btn');
            if (btn) {
                btn.innerHTML = '<i class="fas fa-heart me-2"></i>Show Favorites';
            }
        }

        if (!append) {
            document.getElementById('search-loader').style.display = 'block';
        }
        document.getElementById('no-results').classList.add('d-none');

        const searchTerm = document.getElementById('global-search').value.trim();
        let profileId = null;
        if (searchTerm) {
            const match = searchTerm.match(/ZWJ(\d+)/i) || searchTerm.match(/(\d+)/);
            if (match) {
                profileId = match[1];
            }
        }

        const filters = {
            gender: document.getElementById('gender').value,
            age_min: document.getElementById('age-min').value,
            age_max: document.getElementById('age-max').value,
            height_min: document.getElementById('height-min').value,
            height_max: document.getElementById('height-max').value,
            marital_status: document.getElementById('marital-status').value,
            religion: document.getElementById('religion').value,
            caste: document.getElementById('caste').value,
            country: document.getElementById('country').value,
            city: document.getElementById('city').value,
            education: document.getElementById('education').value,
            profession: document.getElementById('profession').value,
            profile_id: profileId,
            online_now: document.getElementById('online-now').checked ? 1 : 0,
            photo_only: document.getElementById('photo-only').checked ? 1 : 0,
            page: page
        };

        Object.keys(filters).forEach(key => {
            if (filters[key] === '' || filters[key] === null || filters[key] === undefined) {
                delete filters[key];
            }
        });

        const params = new URLSearchParams(filters);

        fetch(`/search/profiles?${params.toString()}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
            }
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('search-loader').style.display = 'none';
            document.getElementById('total-results').textContent = data.total || 0;

            if (data.total > 0) {
                if (append) {
                    document.getElementById('results-container').innerHTML += renderProfiles(data.profiles);
                } else {
                    document.getElementById('results-container').innerHTML = renderProfiles(data.profiles);
                }

                if (data.next_page) {
                    document.getElementById('load-more-container').style.display = 'block';
                    document.getElementById('load-more-btn').setAttribute('data-page', page);
                } else {
                    document.getElementById('load-more-container').style.display = 'none';
                }
                document.getElementById('no-results').classList.add('d-none');
            } else {
                document.getElementById('results-container').innerHTML = '';
                document.getElementById('load-more-container').style.display = 'none';
                document.getElementById('no-results').classList.remove('d-none');
            }
            
            if (callback) callback();
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('search-loader').style.display = 'none';
            document.getElementById('results-container').innerHTML = `
                <div class="col-12">
                    <div class="no-results text-center py-5 bg-white rounded-4 shadow-sm">
                        <i class="fas fa-exclamation-triangle fa-4x text-danger mb-3"></i>
                        <h4 class="fw-bold text-dark">Something went wrong</h4>
                        <p class="text-muted mb-4">Please try again later</p>
                        <button onclick="loadProfiles(1, false)" class="btn btn-success px-4 py-2 rounded-pill">
                            Try Again
                        </button>
                    </div>
                </div>
            `;
            if (callback) callback();
        });
    }

    @auth
    function updateOnlineStatus() {
        setInterval(() => {
            if (document.visibilityState === 'visible') {
                fetch('/update-online-status', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    }
                });
            }
        }, 30000);
    }
    @endauth

    // ===== DOM CONTENT LOADED =====
    document.addEventListener('DOMContentLoaded', function() {
        // Load initial profiles
        loadProfiles();

        // Search button click
        document.getElementById('search-btn').addEventListener('click', function(e) {
            e.preventDefault();
            loadProfiles(1);
        });

        // Apply filters button click
        document.getElementById('apply-filters').addEventListener('click', function(e) {
            e.preventDefault();
            loadProfiles(1);
        });

        // Reset button click
        document.getElementById('reset-btn').addEventListener('click', function(e) {
            e.preventDefault();
            resetFilters();
            loadProfiles(1);
        });

        // Show Favorites button click
        const showFavoritesBtn = document.getElementById('show-favorites-btn');
        if (showFavoritesBtn) {
            showFavoritesBtn.addEventListener('click', function(e) {
                e.preventDefault();
                showFavorites();
            });
        }

        // Load more button
        document.getElementById('load-more-btn').addEventListener('click', function() {
            const currentPage = parseInt(this.getAttribute('data-page') || '1');
            const btn = this;
            
            btn.classList.add('loading');
            const spinner = btn.querySelector('.fa-spinner');
            const text = btn.querySelector('.btn-text');
            if (spinner) spinner.classList.remove('d-none');
            if (text) text.textContent = 'Loading...';
            
            loadProfiles(currentPage + 1, true, function() {
                btn.classList.remove('loading');
                if (spinner) spinner.classList.add('d-none');
                if (text) text.textContent = 'Load More Profiles';
            });
        });

        // Enter key press in search input
        document.getElementById('global-search').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                loadProfiles(1);
            }
        });
        
        @auth
        updateOnlineStatus();
        @endauth
    });
</script>
</body>
</html>