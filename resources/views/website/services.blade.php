<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5, user-scalable=yes">
    <title>Marriage Services | Zojah & Jorha - Pakistan's Trusted Marriage Bureau</title>
          <link rel="icon" type="image/png" href="assets/header.png">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700;800;900&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #10B981;
            --primary-dark: #059669;
            --secondary: #F59E0B;
            --accent: #F59E0B;
            --dark: #111827;
            --dark-light: #1F2937;
            --light: #F9FAFB;
            --light-gray: #F3F4F6;
            --gray: #6B7280;
            --gradient-green: linear-gradient(135deg, #10B981 0%, #059669 100%);
            --gradient-gold: linear-gradient(135deg, #F59E0B 0%, #FBBF24 100%);
            --gradient-dark: linear-gradient(135deg, #111827 0%, #1F2937 100%);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: #f8fafc;
            color: #334155;
            line-height: 1.6;
        }
        
        /* ===== NAVIGATION STYLES ===== */
        .navbar {
            background: white;
            padding: 0.75rem 0;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
            border-bottom: 3px solid var(--primary);
        }
        
        .header-logo {
            height: 40px;
            width: auto;
            object-fit: contain;
        }
        
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 700;
            color: #111827 !important;
        }
        
        .nav-link {
            color: #4b5563 !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            margin: 0 0.25rem;
            border-radius: 6px;
            transition: all 0.3s;
        }
        
        .nav-link:hover,
        .nav-link.active {
            color: #10B981 !important;
            background: rgba(16, 185, 129, 0.1);
        }
        
        /* ===== HERO SECTION - MARRIAGE BUREAU STYLE ===== */
        .hero-section {
            background: linear-gradient(135deg, #111827 0%, #1F2937 100%);
            color: white;
            padding: 120px 0 100px;
            margin-top: 4.7rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%2310B981" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
            background-size: cover;
            background-position: center;
        }
        
        .hero-section h1 {
            font-size: 3.2rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            font-family: 'Playfair Display', serif;
            position: relative;
        }
        
        .hero-section h1 span {
            color: #34D399;
        }
        
        .hero-section p {
            font-size: 1.2rem;
            opacity: 0.95;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .hero-badge {
            display: inline-block;
            background: rgba(255,255,255,0.1);
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(255,255,255,0.2);
        }
        
        /* ===== STATS BANNER ===== */
        .stats-banner {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            margin-top: -3rem;
            margin-bottom: 3rem;
            box-shadow: 0 15px 40px rgba(0,0,0,0.08);
            position: relative;
            z-index: 10;
            border-top: 5px solid var(--primary);
        }
        
        .stat-item {
            text-align: center;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 0.25rem;
        }
        
        .stat-label {
            font-size: 0.95rem;
            color: var(--gray);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        /* ===== SERVICE CARDS ===== */
        .service-card {
            background: white;
            border-radius: 24px;
            padding: 40px 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border: 2px solid transparent;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
            height: 100%;
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            border-color: var(--primary);
            box-shadow: 0 20px 40px rgba(16, 185, 129, 0.1);
        }
        
        .service-icon {
            width: 90px;
            height: 90px;
            background: rgba(16, 185, 129, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            color: var(--primary);
            margin: 0 auto 25px;
            transition: all 0.3s;
        }
        
        .service-card:hover .service-icon {
            background: var(--primary);
            color: white;
            transform: scale(1.1);
        }
        
        .service-title {
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 15px;
            text-align: center;
        }
        
        .service-description {
            color: var(--gray);
            margin-bottom: 20px;
            text-align: center;
        }
        
        .service-features {
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }
        
        .service-features li {
            padding: 10px 0;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            align-items: center;
        }
        
        .service-features li i {
            color: var(--primary);
            margin-right: 12px;
            font-size: 1rem;
        }
        
        .service-badge {
            position: absolute;
            top: 20px;
            right: -35px;
            background: var(--gradient-gold);
            color: #333;
            padding: 8px 40px;
            font-size: 0.8rem;
            font-weight: 700;
            transform: rotate(45deg);
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        
        /* ===== PRICING CARDS - MARRIAGE BUREAU STYLE ===== */
        .pricing-card {
            background: white;
            border-radius: 24px;
            padding: 50px 30px;
            margin: 20px 0;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border: 2px solid #E5E7EB;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
            height: 100%;
        }
        
        .pricing-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        
        .pricing-card.popular {
            border-color: var(--primary);
            transform: scale(1.05);
            box-shadow: 0 15px 40px rgba(16, 185, 129, 0.15);
        }
        
        .pricing-card.popular:hover {
            transform: scale(1.05) translateY(-10px);
        }
        
        .popular-badge {
            position: absolute;
            top: 20px;
            right: -35px;
            background: var(--primary);
            color: white;
            padding: 8px 40px;
            font-size: 0.9rem;
            font-weight: 700;
            transform: rotate(45deg);
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        }
        
        .pricing-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .pricing-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 10px;
        }
        
        .pricing-price {
            font-size: 3.5rem;
            font-weight: 800;
            color: var(--primary);
            margin: 20px 0;
        }
        
        .pricing-price span {
            font-size: 1.2rem;
            color: #6B7280;
            font-weight: 400;
        }
        
        .pricing-features {
            list-style: none;
            padding: 0;
            margin-bottom: 40px;
        }
        
        .pricing-features li {
            padding: 12px 0;
            border-bottom: 1px solid #E5E7EB;
            display: flex;
            align-items: center;
        }
        
        .pricing-features li i {
            margin-right: 12px;
            font-size: 1.1rem;
        }
        
        /* ===== BUTTONS ===== */
        .btn-primary {
            background: var(--gradient-green);
            border: none;
            padding: 14px 35px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
            color: white;
            width: 100%;
            box-shadow: 0 5px 15px rgba(16, 185, 129, 0.2);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.4);
        }
        
        .btn-outline-primary {
            border: 2px solid var(--primary);
            color: var(--primary);
            padding: 14px 35px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
            width: 100%;
            background: transparent;
        }
        
        .btn-outline-primary:hover {
            background: var(--primary);
            color: white;
        }
        
        .btn-outline-success {
            border: 2px solid var(--primary);
            color: var(--primary);
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-outline-success:hover {
            background: var(--primary);
            color: white;
        }
        
        /* ===== FAQ SECTION ===== */
        .faq-section {
            background: white;
            border-radius: 24px;
            padding: 50px;
            margin: 40px 0;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border: 1px solid #f0f0f0;
        }
        
        .faq-item {
            margin-bottom: 30px;
            padding: 20px;
            border-radius: 12px;
            transition: all 0.3s;
            border: 1px solid #f0f0f0;
        }
        
        .faq-item:hover {
            background: #f9fafb;
            border-color: var(--primary);
        }
        
        .faq-question {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        
        .faq-question i {
            color: var(--primary);
            margin-right: 12px;
        }
        
        /* ===== PROCESS STEPS ===== */
        .process-step {
            text-align: center;
            padding: 30px;
            position: relative;
        }
        
        .process-step:not(:last-child):after {
            content: '→';
            position: absolute;
            top: 50%;
            right: -15px;
            font-size: 2rem;
            color: var(--primary);
            transform: translateY(-50%);
        }
        
        .step-number {
            width: 60px;
            height: 60px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0 auto 20px;
        }
        
        .step-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        /* ===== TESTIMONIAL CARD ===== */
        .testimonial-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border-left: 5px solid var(--primary);
            transition: all 0.3s;
        }
        
        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }
        
        .testimonial-card i {
            color: var(--primary);
            font-size: 1.5rem;
            margin-bottom: 15px;
        }
        
        /* ===== FOOTER ===== */
        footer {
            background: linear-gradient(135deg, #1F2937 0%, #111827 100%);
            color: white;
            padding: 70px 0 30px;
            margin-top: 80px;
        }
        
        .footer-links a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            display: block;
            margin-bottom: 12px;
            transition: all 0.3s;
        }
        
        .footer-links a:hover {
            color: white;
            padding-left: 20px;
        }
        
        .text-green-light {
            color: #34D399 !important;
        }
        
        /* ===== LOADER CSS ===== */
        #loader-img {
            width: 100px;
            height: 100px;
            animation: blink 1s infinite;
            object-fit: contain;
        }

        .loader-ring {
            border: 6px solid transparent;
            border-top: 6px solid #00a157;
            border-bottom: 6px solid #00a157;
            animation: spin 1s linear infinite;
            z-index: 1;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.3; }
        }

        #page-loader {
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        #page-loader.hidden {
            opacity: 0;
            visibility: hidden;
        }
        
        /* ===== NAVBAR TOGGLE FIX - MOBILE ===== */
        @media (max-width: 991px) {
            .navbar .container {
                display: flex;
                align-items: center;
                justify-content: space-between;
                position: relative;
            }
            
            .navbar-brand {
                z-index: 9999;
            }
            
            .navbar-toggler {
                display: flex !important;
                align-items: center;
                justify-content: center;
                border: 1px solid #10B981;
                padding: 8px 12px;
                border-radius: 6px;
                background: white;
                z-index: 9999;
            }
            
            .navbar-toggler:focus {
                outline: none;
                box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
            }
            
            .navbar-collapse {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                width: 100%;
                background: white;
                padding: 0;
                border-radius: 0 0 12px 12px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.1);
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease, padding 0.3s ease;
                z-index: 9998;
            }
            
            .navbar-collapse.show {
                max-height: 80vh;
                padding: 20px;
            }
            
            .navbar-nav {
                width: 100%;
            }
            
            .nav-item {
                width: 100%;
                margin: 2px 0;
            }
            
            .nav-link {
                display: block;
                padding: 12px 15px !important;
                margin: 0 !important;
            }
            
            .nav-link.active {
                background: rgba(16, 185, 129, 0.1);
                color: #10B981 !important;
            }
            
            .hero-section h1 {
                font-size: 2.2rem;
            }
            
            .stats-banner {
                padding: 1.5rem;
            }
            
            .stat-number {
                font-size: 1.8rem;
            }
            
            .process-step:not(:last-child):after {
                display: none;
            }
        }

        @media (min-width: 992px) {
            .navbar-collapse {
                display: flex !important;
                max-height: none !important;
                padding: 0 !important;
                position: static;
                box-shadow: none;
            }
        }
        
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 1.8rem;
            }
            
            .hero-section p {
                font-size: 1rem;
            }
            
            .service-card {
                padding: 30px 20px;
            }
            
            .service-title {
                font-size: 1.4rem;
            }
            
            .pricing-card.popular {
                transform: scale(1);
            }
            
            .pricing-card.popular:hover {
                transform: translateY(-10px);
            }
            
            .faq-section {
                padding: 30px;
            }
        }
        /* Logout Icon Button */
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

/* Hover Effect */
.logout-icon-btn:hover {
    background: #ef4444;
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(239, 68, 68, 0.3);
}

/* Remove default button styling */
.logout-icon-btn:focus {
    outline: none;
    box-shadow: none;
}

    </style>
</head>
<body>
    <!-- Page Loader with Image -->
    <div id="page-loader"
        class="position-fixed top-0 start-0 w-100 h-100 bg-white d-flex justify-content-center align-items-center"
        style="z-index: 9999;">
        <div class="loader-wrapper position-relative" style="width: 120px; height: 120px;">
            <div class="loader-ring position-absolute top-0 start-0 w-100 h-100 rounded-circle"></div>
            <img src="assets/zawjahaa_logo.png" alt="Loading..." id="loader-img"
                class="position-absolute top-50 start-50 translate-middle" />
        </div>
    </div>
 
    <!-- Navigation - FIXED TOGGLE -->
   <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('website') }}">
            <img src="{{ asset('assets/zawjahaa_logo.png')}}" alt="Logo" class="header-logo">
            <span class="fw-bold text-dark"> </span>
            <span class="fw-bold text-success">زوجھا</span>
        </a>

        <div class="d-flex align-items-center d-lg-none">
            <!--<span class="notification-badge">3</span>-->
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
               <a class="nav-link" href="{{ route('website') }}#feedback">Feedback </a>
               </li>
                <!--<li class="nav-item">-->
                <!--    <a class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}">Profiles</a>-->
                <!--</li>-->
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

    <!-- Hero Section - Marriage Bureau Style -->
    <div class="hero-section">
        <div class="container">
            <span class="hero-badge">
                <i class="fas fa-ring me-2"></i> Zawjahaa Marriage Bureau
            </span>
            <h1>Complete <span>Zawjahaa</span> Services</h1>
            <p class="lead">From finding the perfect match to wedding planning - we handle everything with care, integrity, and professionalism since 2010</p>
        </div>
    </div>

    <!-- Stats Banner -->
    <div class="container">
        <div class="stats-banner">
            <div class="row">
                <div class="col-md-3 col-6 mb-3 mb-md-0">
                    <div class="stat-item">
                        <div class="stat-number">5,000+</div>
                        <div class="stat-label">Successful Marriages</div>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-3 mb-md-0">
                    <div class="stat-item">
                        <div class="stat-number">25,000+</div>
                        <div class="stat-label">Active Members</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-number">35+</div>
                        <div class="stat-label">Countries</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-number">15+</div>
                        <div class="stat-label">Years Experience</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container py-5">
        
        <!-- Our Marriage Services Section -->
        <div class="text-center mb-5">
            <h2 style="color: var(--primary); font-weight: 700; font-size: 2.5rem;">Our Complete Marriage Services</h2>
            <p class="text-muted lead">End-to-end solutions for your marriage journey</p>
        </div>
        
        <div class="row g-4">
            <!-- Service 1: Personal Matchmaking -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="service-badge">Most Popular</div>
                    <div class="service-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3 class="service-title">Personal Matchmaking</h3>
                    <p class="service-description">One-on-one consultation with expert matchmakers who understand your family values and preferences.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check-circle"></i> Dedoted personal matchmaker</li>
                        <li><i class="fas fa-check-circle"></i> Family background verification</li>
                        <li><i class="fas fa-check-circle"></i> Personalized rishta suggestions</li>
                        <li><i class="fas fa-check-circle"></i> Family meeting coordination</li>
                        <li><i class="fas fa-check-circle"></i> Post-match support</li>
                    </ul>
                    <div class="mt-4">
                        <button class="btn btn-outline-primary w-100" onclick="selectService('Personal Matchmaking')">
                            Learn More <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Service 2: International Rishta Service -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-globe-asia"></i>
                    </div>
                    <h3 class="service-title">International Rishta</h3>
                    <p class="service-description">Connect with Pakistani singles worldwide - UK, USA, Canada, UAE, and 30+ countries.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check-circle"></i> UK/Pakistani matches</li>
                        <li><i class="fas fa-check-circle"></i> USA/Canadian matches</li>
                        <li><i class="fas fa-check-circle"></i> UAE/Gulf matches</li>
                        <li><i class="fas fa-check-circle"></i> Video rishta meetings</li>
                        <li><i class="fas fa-check-circle"></i> Immigration guidance</li>
                    </ul>
                    <div class="mt-4">
                        <button class="btn btn-outline-primary w-100" onclick="selectService('International Rishta')">
                            Learn More <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Service 3: Family Mediation -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-family"></i>
                    </div>
                    <h3 class="service-title">Family Mediation</h3>
                    <p class="service-description">Professional counseling and mediation services for successful rishta negotiations.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check-circle"></i> Family meeting facilitation</li>
                        <li><i class="fas fa-check-circle"></i> Dowry/Mahr negotiation</li>
                        <li><i class="fas fa-check-circle"></i> Conflict resolution</li>
                        <li><i class="fas fa-check-circle"></i> Pre-marriage counseling</li>
                        <li><i class="fas fa-check-circle"></i> Family harmony sessions</li>
                    </ul>
                    <div class="mt-4">
                        <button class="btn btn-outline-primary w-100" onclick="selectService('Family Mediation')">
                            Learn More <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Service 4: Background Verification -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="service-title">Background Verification</h3>
                    <p class="service-description">Thorough verification of education, profession, and family background for complete peace of mind.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check-circle"></i> Education verification</li>
                        <li><i class="fas fa-check-circle"></i> Employment verification</li>
                        <li><i class="fas fa-check-circle"></i> CNIC/Passport check</li>
                        <li><i class="fas fa-check-circle"></i> Family reference check</li>
                        <li><i class="fas fa-check-circle"></i> Criminal record check</li>
                    </ul>
                    <div class="mt-4">
                        <button class="btn btn-outline-primary w-100" onclick="selectService('Background Verification')">
                            Learn More <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Service 5: Wedding Planning -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-ring"></i>
                    </div>
                    <h3 class="service-title">Wedding Planning</h3>
                    <p class="service-description">End-to-end wedding planning services from nikkah to walima, with trusted vendors and competitive packages.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check-circle"></i> Venue booking</li>
                        <li><i class="fas fa-check-circle"></i> Catering services</li>
                        <li><i class="fas fa-check-circle"></i> Photography/videography</li>
                        <li><i class="fas fa-check-circle"></i> Bridal wear & grooming</li>
                        <li><i class="fas fa-check-circle"></i> Event decoration</li>
                    </ul>
                    <div class="mt-4">
                        <button class="btn btn-outline-primary w-100" onclick="selectService('Wedding Planning')">
                            Learn More <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Service 6: VIP Concierge -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-crown"></i>
                    </div>
                    <h3 class="service-title">VIP Concierge</h3>
                    <p class="service-description">Exclusive matchmaking service for elite clients with personalized attention and premium experience.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check-circle"></i> Dedicated VIP matchmaker</li>
                        <li><i class="fas fa-check-circle"></i> Ultra-premium matches</li>
                        <li><i class="fas fa-check-circle"></i> Complete privacy</li>
                        <li><i class="fas fa-check-circle"></i> Priority processing</li>
                        <li><i class="fas fa-check-circle"></i> 24/7 personal assistant</li>
                    </ul>
                    <div class="mt-4">
                        <button class="btn btn-outline-primary w-100" onclick="selectService('VIP Concierge')">
                            Learn More <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- How It Works - Process Steps -->
        <div class="mt-5 pt-5">
            <div class="text-center mb-5">
                <h2 style="color: var(--primary); font-weight: 700;">Our Matchmaking Process</h2>
                <p class="text-muted">Simple, transparent, and effective</p>
            </div>
            
            <div class="row">
                <div class="col-md-3 process-step">
                    <div class="step-number">1</div>
                    <div class="step-title">Registration</div>
                    <p class="text-muted">Create your profile with our matchmaking team</p>
                </div>
                <div class="col-md-3 process-step">
                    <div class="step-number">2</div>
                    <div class="step-title">Verification</div>
                    <p class="text-muted">We verify your documents and preferences</p>
                </div>
                <div class="col-md-3 process-step">
                    <div class="step-number">3</div>
                    <div class="step-title">Matching</div>
                    <p class="text-muted">AI + Human matchmakers find compatible rishtas</p>
                </div>
                <div class="col-md-3 process-step">
                    <div class="step-number">4</div>
                    <div class="step-title">Meeting</div>
                    <p class="text-muted">Facilitated family meetings and nikkah</p>
                </div>
            </div>
        </div>
        
        <!-- Membership Plans Section -->
        <div class="mt-5 pt-5">
            <div class="text-center mb-5">
                <h2 style="color: var(--primary); font-weight: 700;">Membership Plans</h2>
                <p class="text-muted">Choose the perfect plan for your marriage journey</p>
            </div>
            
            <div class="row justify-content-center">
                <!-- Basic Plan -->
                <div class="col-lg-4 mb-4">
                    <div class="pricing-card">
                        <div class="pricing-header">
                            <h3 class="pricing-title">Basic Rishta</h3>
                            <p class="text-muted">For those starting their search</p>
                            <div class="pricing-price">PKR 4,999<span>/month</span></div>
                        </div>
                        
                        <ul class="pricing-features">
                            <li><i class="fas fa-check text-success me-2"></i> Browse 50 profiles daily</li>
                            <li><i class="fas fa-check text-success me-2"></i> Basic search filters</li>
                            <li><i class="fas fa-check text-success me-2"></i> Send 5 interests/month</li>
                            <li><i class="fas fa-check text-success me-2"></i> Profile verification</li>
                            <li><i class="fas fa-times text-danger me-2"></i> AI Compatibility Test</li>
                            <li><i class="fas fa-times text-danger me-2"></i> Personal Matchmaker</li>
                            <li><i class="fas fa-times text-danger me-2"></i> Background verification</li>
                        </ul>
                        
                        <button class="btn btn-outline-primary w-100 py-3" onclick="selectPlan('Basic Rishta')">
                            Choose Basic Plan
                        </button>
                    </div>
                </div>
                
                <!-- Premium Plan (Most Popular) -->
                <div class="col-lg-4 mb-4">
                    <div class="pricing-card popular">
                        <div class="popular-badge">MOST POPULAR</div>
                        <div class="pricing-header">
                            <h3 class="pricing-title">Premium Rishta</h3>
                            <p class="text-muted">Best value for serious seekers</p>
                            <div class="pricing-price">PKR 9,999<span>/month</span></div>
                        </div>
                        
                        <ul class="pricing-features">
                            <li><i class="fas fa-check text-success me-2"></i> Unlimited profile access</li>
                            <li><i class="fas fa-check text-success me-2"></i> Advanced search filters</li>
                            <li><i class="fas fa-check text-success me-2"></i> Unlimited interests</li>
                            <li><i class="fas fa-check text-success me-2"></i> AI Compatibility Test</li>
                            <li><i class="fas fa-check text-success me-2"></i> Personal Matchmaker</li>
                            <li><i class="fas fa-check text-success me-2"></i> Background verification</li>
                            <li><i class="fas fa-check text-success me-2"></i> Priority support</li>
                        </ul>
                        
                        <button class="btn btn-primary w-100 py-3" onclick="selectPlan('Premium Rishta')">
                            Choose Premium Plan
                        </button>
                    </div>
                </div>
                
                <!-- Elite Plan -->
                <div class="col-lg-4 mb-4">
                    <div class="pricing-card">
                        <div class="pricing-header">
                            <h3 class="pricing-title">Elite VIP</h3>
                            <p class="text-muted">For discerning clients</p>
                            <div class="pricing-price">PKR 19,999<span>/month</span></div>
                        </div>
                        
                        <ul class="pricing-features">
                            <li><i class="fas fa-check text-success me-2"></i> Everything in Premium</li>
                            <li><i class="fas fa-check text-success me-2"></i> VIP matchmaker</li>
                            <li><i class="fas fa-check text-success me-2"></i> Profile highlighting</li>
                            <li><i class="fas fa-check text-success me-2"></i> Complete background check</li>
                            <li><i class="fas fa-check text-success me-2"></i> Wedding planning consultation</li>
                            <li><i class="fas fa-check text-success me-2"></i> Family mediation</li>
                            <li><i class="fas fa-check text-success me-2"></i> 24/7 VIP support</li>
                        </ul>
                        
                        <button class="btn btn-outline-primary w-100 py-3" onclick="selectPlan('Elite VIP')">
                            Choose Elite Plan
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Comparison Table -->
        <div class="faq-section mt-5">
            <h3 class="text-center mb-5" style="color: var(--primary);">Service Comparison</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="background: #F9FAFB;">Features</th>
                            <th class="text-center">Basic Rishta</th>
                            <th class="text-center" style="background: rgba(16, 185, 129, 0.1);">Premium Rishta</th>
                            <th class="text-center">Elite VIP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Daily Profile Access</td>
                            <td class="text-center">50/day</td>
                            <td class="text-center" style="background: rgba(16, 185, 129, 0.05);">Unlimited</td>
                            <td class="text-center">Unlimited</td>
                        </tr>
                        <tr>
                            <td>AI Compatibility Test</td>
                            <td class="text-center"><i class="fas fa-times text-danger"></i></td>
                            <td class="text-center" style="background: rgba(16, 185, 129, 0.05);"><i class="fas fa-check text-success"></i></td>
                            <td class="text-center"><i class="fas fa-check text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Personal Matchmaker</td>
                            <td class="text-center"><i class="fas fa-times text-danger"></i></td>
                            <td class="text-center" style="background: rgba(16, 185, 129, 0.05);"><i class="fas fa-check text-success"></i></td>
                            <td class="text-center"><i class="fas fa-check text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Background Verification</td>
                            <td class="text-center"><i class="fas fa-times text-danger"></i></td>
                            <td class="text-center" style="background: rgba(16, 185, 129, 0.05);"><i class="fas fa-check text-success"></i></td>
                            <td class="text-center"><i class="fas fa-check text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Wedding Planning</td>
                            <td class="text-center"><i class="fas fa-times text-danger"></i></td>
                            <td class="text-center" style="background: rgba(16, 185, 129, 0.05);"><i class="fas fa-check text-success"></i></td>
                            <td class="text-center"><i class="fas fa-check text-success"></i></td>
                        </tr>
                        <tr>
                            <td>VIP Support</td>
                            <td class="text-center">Email</td>
                            <td class="text-center" style="background: rgba(16, 185, 129, 0.05);">Priority</td>
                            <td class="text-center">24/7 VIP</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p class="text-muted text-center mt-4">All plans include 7-day free trial. Cancel anytime.</p>
        </div>
        
        <!-- Success Stories / Testimonials -->
        <div class="mt-5">
            <div class="text-center mb-5">
                <h2 style="color: var(--primary); font-weight: 700;">Success Stories</h2>
                <p class="text-muted">Real couples who found their life partners through our services</p>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="testimonial-card">
                        <i class="fas fa-quote-right"></i>
                        <p class="mb-3">"After 2 years of searching on other platforms, زوجھا & Jorha found me my perfect match within 3 weeks. Their personal matchmaking service is exceptional!"</p>
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0 fw-bold">Aisha & Bilal</h6>
                                <small class="text-muted">Married 2024 | Premium Rishta Plan</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="testimonial-card">
                        <i class="fas fa-quote-right"></i>
                        <p class="mb-3">"Living in London, I was worried about finding someone with similar values. Their international matchmaking service connected me with my wife from Karachi. Truly grateful!"</p>
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0 fw-bold">Dr. Usman & Sara</h6>
                                <small class="text-muted">Married 2023 | Elite VIP Plan</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FAQ Section -->
        <div class="faq-section">
            <h3 class="text-center mb-5" style="color: var(--primary);">Frequently Asked Questions</h3>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="faq-item">
                        <div class="faq-question">
                            <i class="fas fa-question-circle"></i>
                            How does Zawjahaa match people?
                        </div>
                        <p class="mb-0">We combine AI technology with experienced matchmakers. You create your profile, we verify it, and our system suggests compatible matches based on your preferences and values.</p>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question">
                            <i class="fas fa-question-circle"></i>
                            Are all profiles verified?
                        </div>
                        <p class="mb-0">Yes! Every profile undergoes strict verification including ID checks, education verification, and reference validation. Your safety is our priority.</p>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question">
                            <i class="fas fa-question-circle"></i>
                            What is your success rate?
                        </div>
                        <p class="mb-0">We have facilitated over 5,000 successful marriages with a 95% client satisfaction rate. Our AI-powered matching ensures high compatibility.</p>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="faq-item">
                        <div class="faq-question">
                            <i class="fas fa-question-circle"></i>
                            Do you offer international matchmaking?
                        </div>
                        <p class="mb-0">Yes! We have members from 35+ countries and specialize in connecting Pakistani diaspora with matches in Pakistan, UK, USA, Canada, and UAE.</p>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question">
                            <i class="fas fa-question-circle"></i>
                            Is my information private?
                        </div>
                        <p class="mb-0">Absolutely. Your personal information is completely confidential and only shared with potential matches after mutual interest is expressed.</p>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question">
                            <i class="fas fa-question-circle"></i>
                            Can I change my membership plan?
                        </div>
                        <p class="mb-0">Yes, you can upgrade or downgrade your plan anytime. Changes take effect in your next billing cycle with no hidden fees.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer - Zojah & Jorha Branding -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5">
                    <div class="footer-logo">
                        <i class="fas fa-heart"></i>
                        <span></span><span class="text-green-light">Zawjahaa</span>
                    </div>
                    <p class="opacity-75 mb-4">Pakistan's Most Trusted Marriage Bureau since 2010. Connecting hearts across the globe with integrity, excellence, and care.</p>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/zawjahaa" target="_blank"><i class="fab fa-facebook-f"></i></a>
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
                        <!--<p><i class="fas fa-phone me-2 text-green-light"></i> +92 317 6065004</p>-->
                        <p><i class="fas fa-envelope me-2 text-green-light"></i> info@Zawjahaa.com</p>
                        <p><i class="fas fa-map-marker-alt me-2 text-green-light"></i> Punjab Pakistan</p>
                        <p><i class="fas fa-clock me-2 text-green-light"></i> Mon-Sat: 10AM - 8PM</p>
                    </div>
                </div>
            </div>

            <div class="copyright">
                <p>&copy; 2025 Zawjahaa Marriage Bureau. All rights reserved. | Since 2010 | <a href="{{ route('privacy.policy') }}" class="text-green-light">Privacy Policy</a> | <a href="{{ route('terms.service') }}" class="text-green-light">Terms of Service</a> |  <a class="text-green-light" href="{{ route('faq') }}">FAQ</a></p>
                <p class="mt-2">Designed with <i class="fas fa-heart text-danger"></i> Zawjahaa</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/script.js"></script>
    
    <script>
        // ===== PAGE LOADER =====
        window.addEventListener("load", function () {
            const loader = document.getElementById("page-loader");
            if (loader) {
                setTimeout(() => {
                    loader.classList.add("hidden");
                    setTimeout(() => {
                        loader.style.display = "none";
                    }, 500);
                }, 800);
            }
        });

        // ===== NAVBAR TOGGLE FIX - 1 CLICK = 1 TOGGLE =====
        document.addEventListener('DOMContentLoaded', function() {
            const navbarToggler = document.getElementById('customNavbarToggler');
            const navbarCollapse = document.getElementById('navbarNav');
            
            if (navbarToggler && navbarCollapse) {
                const newToggler = navbarToggler.cloneNode(true);
                navbarToggler.parentNode.replaceChild(newToggler, navbarToggler);
                newToggler.id = 'customNavbarToggler';
                
                newToggler.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    navbarCollapse.classList.toggle('show');
                });
                
                navbarCollapse.querySelectorAll('.nav-link').forEach(link => {
                    link.addEventListener('click', function() {
                        if (window.innerWidth < 992) {
                            navbarCollapse.classList.remove('show');
                        }
                    });
                });
                
                window.addEventListener('resize', function() {
                    if (window.innerWidth >= 992) {
                        navbarCollapse.classList.add('show');
                    } else {
                        navbarCollapse.classList.remove('show');
                    }
                });
            }
        });

        // ===== PLAN SELECTION FUNCTION =====
        function selectPlan(planName) {
            const planModal = `
                <div class="modal fade" id="planModal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header" style="background: linear-gradient(135deg, #10B981, #059669); color: white;">
                                <h5 class="modal-title">Select ${planName} Plan</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-center py-5">
                                <i class="fas fa-check-circle text-success fa-4x mb-4"></i>
                                <h4 class="mb-3">${planName} Plan Selected!</h4>
                                <p class="text-muted mb-4">You will be redirected to the registration page to complete your signup. A matchmaker will contact you within 24 hours.</p>
                                <div class="d-flex justify-content-center gap-3">
                                    <button class="btn btn-primary" onclick="proceedToSignup('${planName}')">
                                        Proceed to Signup
                                    </button>
                                    <button class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            const existingModal = document.getElementById('planModal');
            if (existingModal) existingModal.remove();
            
            document.body.insertAdjacentHTML('beforeend', planModal);
            
            const modal = new bootstrap.Modal(document.getElementById('planModal'));
            modal.show();
        }
        
        function proceedToSignup(planName) {
            alert(`Redirecting to ${planName} plan signup...`);
            // window.location.href = `signup.html?plan=${planName}`;
        }
        
        // ===== SERVICE SELECTION =====
        function selectService(serviceName) {
            alert(`Thank you for your interest in ${serviceName}. Our team will contact you shortly.`);
        }
    </script>
</body>
</html>