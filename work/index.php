<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zawjahaa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700;800;900&family=Dancing+Script:wght@400;500;600;700&family=Cinzel:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <style>
        .register-modal-content {
            display: flex;
            min-height: 600px;
            border-radius: 15px;
            overflow: hidden;
        }

        .register-left-col {
            flex: 0 0 40%;
            background: linear-gradient(135deg, #198754 0%, #0d6efd 100%);
            color: white;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .register-heart-box {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            border: 3px solid rgba(255, 255, 255, 0.3);
        }

        .register-left-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .register-left-text {
            font-size: 0.9rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        .register-features {
            width: 100%;
            text-align: left;
        }

        .register-feature {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }

        .register-feature i {
            font-size: 1.2rem;
            margin-right: 1rem;
            margin-top: 0.25rem;
            color: #4cd964;
        }

        .register-feature h6 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .register-feature p {
            font-size: 0.85rem;
            opacity: 0.8;
            margin-bottom: 0;
        }

        .register-stats {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: auto;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .register-stat {
            text-align: center;
        }

        .register-stat h4 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .register-stat p {
            font-size: 0.85rem;
            opacity: 0.9;
            margin-bottom: 0;
        }

        /* Right Column - White Form */
        .register-right-col {
            flex: 0 0 60%;
            background: white;
            display: flex;
            flex-direction: column;
        }

        .register-form-header {
            padding: 1.5rem 2rem 1rem;
            border-bottom: 1px solid #dee2e6;
            position: relative;
        }

        .register-form-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #198754;
            margin-bottom: 0.25rem;
        }

        .register-form-subtitle {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 0;
        }

        .register-form-header .btn-close {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
        }

        .register-form-scroll {
            flex: 1;
            overflow-y: auto;
            padding: 1.5rem 2rem;
        }

        /* Form Styles */
        #registerForm {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .form-row-two {
            display: flex;
            gap: 1rem;
            margin-bottom: 0.25rem;
        }

        .form-group-two {
            flex: 1;
        }

        .form-group-full {
            width: 100%;
        }

        .form-label-two {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.375rem;
        }

        .form-control-two {
            width: 100%;
            padding: 0.625rem 0.75rem;
            font-size: 0.9rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 6px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control-two:focus {
            border-color: #198754;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.25);
        }

        .form-control-two::placeholder {
            color: #6c757d;
            opacity: 0.7;
        }

        /* File Input */
        .file-input-wrapper {
            position: relative;
            display: flex;
        }

        .file-input {
            opacity: 0;
            position: absolute;
            width: 100%;
            height: 100%;
            cursor: pointer;
            z-index: 2;
        }

        .file-label {
            width: 100%;
            padding: 0.625rem 0.75rem;
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 6px;
            color: #6c757d;
            font-size: 0.9rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .file-label:hover {
            background-color: #e9ecef;
        }

        /* Textarea */
        .textarea-two {
            resize: vertical;
            min-height: 60px;
        }

        /* Terms Checkbox */
        .terms-checkbox {
            display: flex;
            align-items: flex-start;
            margin: 0.5rem 0;
        }

        .terms-checkbox input[type="checkbox"] {
            margin-right: 0.75rem;
            margin-top: 0.25rem;
            width: 1rem;
            height: 1rem;
            accent-color: #198754;
        }

        .terms-checkbox label {
            font-size: 0.85rem;
            color: #495057;
            line-height: 1.4;
        }

        .terms-checkbox a {
            color: #198754;
            text-decoration: none;
            font-weight: 500;
        }

        .terms-checkbox a:hover {
            text-decoration: underline;
        }

        /* Submit Button */
        .register-submit-btn {
            background: linear-gradient(135deg, #198754 0%, #0d6efd 100%);
            color: white;
            border: none;
            padding: 0.875rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 0.5rem;
        }

        .register-submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(25, 135, 84, 0.3);
        }

        /* Login Link */
        .login-link {
            text-align: center;
            font-size: 0.9rem;
            color: #6c757d;
            margin-top: 1rem;
            margin-bottom: 0;
        }

        .login-link a {
            color: #198754;
            font-weight: 600;
            text-decoration: none;
            margin-left: 0.25rem;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* Scrollbar */
        .register-form-scroll::-webkit-scrollbar {
            width: 6px;
        }

        .register-form-scroll::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }

        .register-form-scroll::-webkit-scrollbar-thumb {
            background: #198754;
            border-radius: 3px;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .register-modal-content {
                flex-direction: column;
            }

            .register-left-col,
            .register-right-col {
                flex: 0 0 100%;
            }

            .register-left-col {
                padding: 1.5rem;
            }

            .register-right-col {
                max-height: 500px;
            }
        }
         /* ===== MOBILE NAVIGATION FIX - IMPORTANT ===== */
@media (max-width: 991px) {
    .navbar {
        padding: 10px 0;
        background: white !important;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    }
    
    .navbar .container {
        position: relative;
        width: 100%;
        padding: 0 15px;
    }
    
    .navbar-brand {
        display: flex;
        align-items: center;
        gap: 8px;
        z-index: 999;
    }
    
    .header-logo {
        width: 35px;
        height: 35px;
    }
    
    .navbar-toggler {
        display: flex !important;
        align-items: center;
        justify-content: center;
        border: 1px solid #10B981;
        padding: 8px 12px;
        border-radius: 8px;
        background: white;
        z-index: 999;
        margin-left: auto;
    }
    
    .navbar-toggler:focus,
    .navbar-toggler:active {
        outline: none;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.25);
    }
    
    .navbar-toggler-icon {
        width: 20px;
        height: 20px;
    }
    
    .d-flex.align-items-center.d-lg-none {
        display: flex !important;
        align-items: center;
        margin-left: auto;
    }
    
    .navbar-collapse {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        width: 100%;
        background: white;
        padding: 20px;
        border-radius: 0 0 16px 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        max-height: 80vh;
        overflow-y: auto;
        z-index: 1000;
        margin-top: 10px;
    }
    
    .navbar-collapse.show {
        display: block !important;
    }
    
    .navbar-nav {
        width: 100%;
        margin: 0;
        padding: 0;
    }
    
    .nav-item {
        width: 100%;
        margin: 5px 0;
    }
    
    .nav-link {
        display: block;
        padding: 12px 15px !important;
        font-size: 16px;
        font-weight: 500;
        color: #333 !important;
        border-radius: 8px;
        transition: all 0.3s;
        width: 100%;
    }
    
    .nav-link:hover,
    .nav-link:focus {
        background: rgba(16, 185, 129, 0.1);
        color: #10B981 !important;
    }
    
    .nav-link.active {
        background: rgba(16, 185, 129, 0.15);
        color: #10B981 !important;
        font-weight: 600;
    }
    
    .nav-link.active:after {
        display: none;
    }
    
    .dropdown {
        width: 100%;
    }
    
    .dropdown-toggle {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
    }
    
    .dropdown-menu {
        position: static !important;
        width: 100%;
        margin-top: 5px;
        margin-bottom: 5px;
        padding: 10px;
        background: #f8f9fa;
        border: none;
        border-radius: 8px;
        box-shadow: none;
    }
    
    .dropdown-item {
        padding: 10px 15px;
        font-size: 15px;
        border-radius: 6px;
    }
    
    .notification-badge {
        position: absolute;
        top: -5px;
        right: -5px;
        width: 18px;
        height: 18px;
        font-size: 10px;
    }
    
    .nav-item.position-relative {
        margin-top: 15px !important;
        width: 100%;
    }
    
    .nav-item .btn-primary {
        width: 100%;
        padding: 12px 20px !important;
        font-size: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        margin: 0;
    }
    
    .nav-item .notification-badge {
        position: absolute;
        top: -8px;
        right: -8px;
        display: flex;
    }
}

@media (max-width: 576px) {
    .navbar-brand {
        font-size: 18px;
    }
    
    .header-logo {
        width: 32px;
        height: 32px;
    }
    
    .navbar-toggler {
        padding: 6px 10px;
    }
    
    .nav-link {
        padding: 10px 12px !important;
        font-size: 15px;
    }
    
    .dropdown-item {
        padding: 8px 12px;
        font-size: 14px;
    }
    
    .nav-item .btn-primary {
        padding: 10px 15px !important;
        font-size: 15px;
    }
}
        @media (max-width: 576px) {
            .form-row-two {
                flex-direction: column;
                gap: 0.75rem;
            }

            .register-form-header,
            .register-form-scroll {
                padding: 1rem;
            }

            .register-stats {
                flex-direction: column;
                gap: 1rem;
            }
        }
        /* ===== LOADER FIX - MOBILE PE CENTER MEIN ===== */
#page-loader {
    position: fixed !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 100% !important;
    background: white !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    z-index: 999999 !important;
    margin: 0 !important;
    padding: 0 !important;
    inset: 0 !important;
}

.loader-wrapper {
    position: relative !important;
    width: 120px !important;
    height: 120px !important;
    margin: 0 auto !important;
    transform: translateY(0) !important;
}

#loader-img {
    position: absolute !important;
    top: 50% !important;
    left: 50% !important;
    transform: translate(-50%, -50%) !important;
    width: 70px !important;
    height: 70px !important;
    object-fit: contain !important;
}

.loader-ring {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 100% !important;
    border: 6px solid transparent;
    border-top: 6px solid #198754;
    border-bottom: 6px solid #198754;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

@keyframes blink {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.3; }
}

#page-loader.hidden {
    opacity: 0 !important;
    visibility: hidden !important;
    transition: opacity 0.5s ease, visibility 0.5s ease !important;
}

/* Mobile Specific Fix */
@media (max-width: 768px) {
    #page-loader {
        position: fixed !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }
    
    .loader-wrapper {
        width: 100px !important;
        height: 100px !important;
        margin: 0 auto !important;
        position: relative !important;
        top: auto !important;
        left: auto !important;
        transform: none !important;
    }
    
    #loader-img {
        width: 60px !important;
        height: 60px !important;
    }
}

@media (max-width: 576px) {
    .loader-wrapper {
        width: 90px !important;
        height: 90px !important;
    }
    
    #loader-img {
        width: 50px !important;
        height: 50px !important;
    }
    
    .loader-ring {
        border-width: 5px;
    }
}
    </style>
</head>

<body>
    <div id="page-loader"
        class="position-fixed top-0 start-0 w-100 h-100 bg-white d-flex justify-content-center align-items-center"
        style="z-index: 9999;">
        <div class="loader-wrapper position-relative" style="width: 120px; height: 120px;">
            <div class="loader-ring position-absolute top-0 start-0 w-100 h-100 rounded-circle"></div>
            <img src="assets/logo.jpeg" alt="Loading..." id="loader-img"
                class="position-absolute top-50 start-50 translate-middle" />
        </div>
    </div>

    <div class="floating-element" style="top: 10%; left: 5%;"></div>
    <div class="floating-element" style="top: 60%; right: 5%; animation-delay: 2s;"></div>
    <div class="floating-element" style="top: 30%; right: 15%; width: 200px; height: 200px; animation-delay: 1s;"></div>
    <div class="floating-element" style="top: 10%; left: 5%;"></div>
    <div class="floating-element" style="top: 60%; right: 5%; animation-delay: 2s;"></div>
    <div class="floating-element" style="top: 30%; right: 15%; width: 200px; height: 200px; animation-delay: 1s;"></div>

    <!-- Navigation -->
   <?php include('header.php');?>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="hero-bg-pattern"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <div class="hero-content" data-aos="fade-up">
                        <div class="mb-4">
                            <span class="badge-featured animate__animated animate__pulse animate__infinite">
                                <i class="fas fa-star me-1"></i>Trusted Since 2010
                            </span>
                        </div>

                        <h1 class="hero-title">Start Your Journey Today – Find Your Perfect Match!</h1>
                        <p class="hero-subtitle">Find love that truly fits with Zojah & Jorha – blending cutting-edge AI
                            with personal care to connect hearts. Thousands have found their perfect match; now it’s
                            your turn!</p>

                        <div class="mt-5">
                            <a href="#search"
                                class="btn btn-primary btn-lg me-3 animate__animated animate__pulse animate__delay-2s animate__infinite">
                                <i class="fas fa-search me-2"></i> Find Your Match
                            </a>
                            <a href="#ai-match" class="btn btn-gold btn-lg">
                                <i class="fas fa-robot me-2"></i> AI Compatibility Test
                            </a>
                        </div>

                        <div class="hero-stats mt-5" data-aos="fade-up" data-aos-delay="200">
                            <div class="row">
                                <div class="col-md-3 col-6">
                                    <div class="hero-stat">
                                        <div class="hero-stat-number" data-count="5000">0</div>
                                        <div class="hero-stat-text">Successful Matches</div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="hero-stat">
                                        <div class="hero-stat-number" data-count="25000">0</div>
                                        <div class="hero-stat-text">Elite Members</div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="hero-stat">
                                        <div class="hero-stat-number" data-count="35">0</div>
                                        <div class="hero-stat-text">Countries</div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="hero-stat">
                                        <div class="hero-stat-number" data-count="95">0</div>
                                        <div class="hero-stat-text">Success Rate</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6 mb-4" data-aos="fade-up">
                    <div class="trust-indicator">
                        <div class="trust-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h5>100% Verified</h5>
                        <p class="text-muted mb-0">All profiles verified</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="trust-indicator">
                        <div class="trust-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h5>Secure & Private</h5>
                        <p class="text-muted mb-0">Your privacy protected</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="trust-indicator">
                        <div class="trust-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h5>Personal Matchmaker</h5>
                        <p class="text-muted mb-0">Dedicated consultant</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="trust-indicator">
                        <div class="trust-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <h5>Award Winning</h5>
                        <p class="text-muted mb-0">Best service 2023</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
   



        <!-- Matchmaking Journey -->
        <section class="py-5 bg-white">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <h2>Our Matchmaking Journey</h2>
                    <p class="text-muted mt-3">Simple steps to find your perfect match</p>
                </div>

                <div class="row">
                    <div class="col-md-4 journey-step" data-aos="fade-up">
                        <div class="journey-icon">
                            <i class="fas fa-user-edit"></i>
                        </div>
                        <h4 class="text-success">Register & Create Profile</h4>
                        <p>Tell us about yourself and your preferences</p>
                    </div>

                    <div class="col-md-4 journey-step" data-aos="fade-up" data-aos-delay="100">
                        <div class="journey-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h4 class="text-success">AI Compatibility Matching</h4>
                        <p>Our AI finds your most compatible matches</p>
                    </div>

                    <div class="col-md-4 journey-step" data-aos="fade-up" data-aos-delay="200">
                        <div class="journey-icon">
                            <i class="fas fa-ring"></i>
                        </div>
                        <h4 class="text-success">Meet & Marry</h4>
                        <p>Connect with matches and start your journey</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- AI Matchmaking Section -->
        <section class="ai-section" id="ai-match">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6" data-aos="fade-right">
                        <h2 class="mb-4">AI-Powered Matchmaking</h2>
                        <p class="mb-4 text-gray-300">Our advanced artificial intelligence analyzes 100+ compatibility
                            factors to find your perfect match with 95% accuracy rate.</p>
                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                    style="width: 60px; height: 60px;">
                                    <i class="fas fa-brain text-success fa-lg"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0 text-white">Personality Analysis</h5>
                                    <p class="mb-0 opacity-75">Deep learning algorithms analyze personality traits</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                    style="width: 60px; height: 60px;">
                                    <i class="fas fa-heartbeat text-success fa-lg"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0 text-white">Compatibility Score</h5>
                                    <p class="mb-0 opacity-75">Calculate compatibility based on values and lifestyle</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                    style="width: 60px; height: 60px;">
                                    <i class="fas fa-chart-line text-success fa-lg"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0 text-white">Success Prediction</h5>
                                    <p class="mb-0 opacity-75">Predict long-term relationship success probability</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">

                            <button class="btn btn-gold px-5 py-3 me-3" id="aiTestBtn">
                                <i class="fas fa-robot me-2"></i> Take AI Test
                            </button>
                            <button class="btn btn-outline-light px-5 py-3" id="viewMatchesBtn">
                                <i class="fas fa-users me-2"></i> View AI Matches
                            </button>
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                        <div class="bg-white rounded-4 p-5 shadow-lg border border-success">
                            <h4 class="mb-4 text-center text-success">Your Compatibility Profile</h4>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-success">Values & Beliefs</span>
                                    <span class="text-success fw-bold">92%</span>
                                </div>
                                <div class="progress" style="height: 12px;">
                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"
                                        style="width: 92%"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-success">Lifestyle Match</span>
                                    <span class="text-success fw-bold">85%</span>
                                </div>
                                <div class="progress" style="height: 12px;">
                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"
                                        style="width: 85%"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-success">Family Compatibility</span>
                                    <span class="text-success fw-bold">88%</span>
                                </div>
                                <div class="progress" style="height: 12px;">
                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"
                                        style="width: 88%"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-success">Career Goals</span>
                                    <span class="text-success fw-bold">78%</span>
                                </div>
                                <div class="progress" style="height: 12px;">
                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"
                                        style="width: 78%"></div>
                                </div>
                            </div>

                            <div class="text-center mt-5 pt-3 border-top border-success">
                                <h3 class="text-success mb-2">Overall Score: 86%</h3>
                                <p class="text-muted mb-0">High Compatibility - Excellent Match Potential</p>
                                <div class="mt-3">
                                    <span class="badge bg-success me-2">Family Oriented</span>
                                    <span class="badge bg-success me-2">Career Focused</span>
                                    <span class="badge bg-success">Traditional Values</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pricing Plans -->
        <section class="pricing-section" id="pricing">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <h2>Premium Membership Plans</h2>
                    <p class="text-muted mt-3">Choose the perfect plan for your matchmaking journey</p>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="pricing-card">
                            <div class="pricing-title text-success">Basic</div>
                            <div class="pricing-price">$49<span>/month</span></div>
                            <p class="text-muted mb-4">For those starting their search</p>

                            <ul class="pricing-features">
                                <li><i class="fas fa-check text-success me-2"></i> Browse 50 profiles daily</li>
                                <li><i class="fas fa-check text-success me-2"></i> Basic search filters</li>
                                <li><i class="fas fa-check text-success me-2"></i> Send 5 interests/month</li>
                                <li><i class="fas fa-times text-danger me-2"></i> AI Compatibility Test</li>
                                <li><i class="fas fa-times text-danger me-2"></i> Personal Matchmaker</li>
                                <li><i class="fas fa-times text-danger me-2"></i> Profile Highlighting</li>
                            </ul>

                            <button class="btn btn-outline-primary w-100 py-3" data-bs-toggle="modal"
                                data-bs-target="#registerModal">Choose Plan</button>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="pricing-card popular">
                            <div class="popular-badge">MOST POPULAR</div>
                            <div class="pricing-title text-success">Premium</div>
                            <div class="pricing-price">$99<span>/month</span></div>
                            <p class="text-muted mb-4">Best value for serious seekers</p>

                            <ul class="pricing-features">
                                <li><i class="fas fa-check text-success me-2"></i> Unlimited profile access</li>
                                <li><i class="fas fa-check text-success me-2"></i> Advanced search filters</li>
                                <li><i class="fas fa-check text-success me-2"></i> Unlimited interests</li>
                                <li><i class="fas fa-check text-success me-2"></i> AI Compatibility Test</li>
                                <li><i class="fas fa-check text-success me-2"></i> Personal Matchmaker</li>
                                <li><i class="fas fa-check text-success me-2"></i> Priority support</li>
                            </ul>

                            <button class="btn btn-primary w-100 py-3" data-bs-toggle="modal"
                                data-bs-target="#registerModal">Choose Plan</button>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="pricing-card">
                            <div class="pricing-title text-success">Elite</div>
                            <div class="pricing-price">$199<span>/month</span></div>
                            <p class="text-muted mb-4">VIP service for discerning clients</p>

                            <ul class="pricing-features">
                                <li><i class="fas fa-check text-success me-2"></i> Everything in Premium</li>
                                <li><i class="fas fa-check text-success me-2"></i> Profile Highlighting</li>
                                <li><i class="fas fa-check text-success me-2"></i> VIP customer support</li>
                                <li><i class="fas fa-check text-success me-2"></i> Verified badge</li>
                                <li><i class="fas fa-check text-success me-2"></i> Monthly progress reports</li>
                                <li><i class="fas fa-check text-success me-2"></i> Background verification</li>
                            </ul>

                            <button class="btn btn-outline-primary w-100 py-3" data-bs-toggle="modal"
                                data-bs-target="#registerModal">Choose Plan</button>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-5" data-aos="fade-up">
                    <p class="text-muted">All plans include 7-day free trial. Cancel anytime.</p>
                </div>
            </div>
        </section>

        <!-- Success Stories Gallery -->
        <section class="gallery-section" id="stories">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <h2>Success Stories</h2>
                    <p class="opacity-75 mt-3">Real couples who found love through our service</p>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="gallery-item">
                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=700&q=80"
                                alt="Couple 1">
                            <div class="gallery-overlay">
                                <h5>Ahmed & Sana</h5>
                                <p class="mb-2 opacity-75">Married: 2021 | Karachi</p>
                                <p class="mb-0"><i>"Found each other within a month of joining!"</i></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="gallery-item">
                            <img src="https://images.unsplash.com/photo-1511988617509-a57c8a288659?ixlib=rb-4.0.3&auto=format&fit=crop&w=700&q=80"
                                alt="Couple 2">
                            <div class="gallery-overlay">
                                <h5>Usman & Ayesha</h5>
                                <p class="mb-2 opacity-75">Married: 2022 | London</p>
                                <p class="mb-0"><i>"AI matching got our compatibility perfectly right!"</i></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="gallery-item">
                            <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-4.0.3&auto=format&fit=crop&w=700&q=80"
                                alt="Couple 3">
                            <div class="gallery-overlay">
                                <h5>Zain & Fatima</h5>
                                <p class="mb-2 opacity-75">Married: 2023 | Dubai</p>
                                <p class="mb-0"><i>"Personal matchmaker made all the difference!"</i></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-5" data-aos="fade-up">
                    <button class="btn btn-primary px-5 py-3" data-bs-toggle="modal" data-bs-target="#storiesModal">
                        <i class="fas fa-book-open me-2"></i> View More Success Stories
                    </button>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="faq-section" id="faq">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <h2>Frequently Asked Questions</h2>
                    <p class="text-muted mt-3">Everything you need to know about finding your perfect match with Zojah &
                        Jorha</p>
                </div>

                <div class="row">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="faq-card">
                            <div class="faq-question">
                                How does Zojah & Jorha match people?
                                <i class="fas fa-plus text-success"></i>
                            </div>
                            <div class="faq-answer">
                                Our matchmaking combines personal guidance and AI technology. You create your profile,
                                our team reviews it, and we suggest compatible matches. Then, we help you connect safely
                                and confidently.
                            </div>
                        </div>

                        <div class="faq-card">
                            <div class="faq-question">
                                Are all profiles genuine?
                                <i class="fas fa-plus text-success"></i>
                            </div>
                            <div class="faq-answer">
                                Absolutely! Every profile is verified through ID checks, interviews, and reference
                                validation to ensure safety and authenticity.
                            </div>
                        </div>

                        <div class="faq-card">
                            <div class="faq-question">
                                How successful is your service?
                                <i class="fas fa-plus text-success"></i>
                            </div>
                            <div class="faq-answer">
                                Thousands of happy couples have found their life partners with us. Our clients
                                consistently report high satisfaction, and our expert matchmakers guide you every step
                                of the way.
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="faq-card">
                            <div class="faq-question">
                                How does AI matchmaking help?
                                <i class="fas fa-plus text-success"></i>
                            </div>
                            <div class="faq-answer">
                                Our AI technology evaluates personality traits, lifestyle choices, values, and
                                preferences to suggest matches with high compatibility. It works hand-in-hand with our
                                matchmakers for the best results.
                            </div>
                        </div>

                        <div class="faq-card">
                            <div class="faq-question">
                                Can I meet matches outside Pakistan?
                                <i class="fas fa-plus text-success"></i>
                            </div>
                            <div class="faq-answer">
                                Yes! Our international network connects Pakistanis worldwide, so you can find love no
                                matter where you are.
                            </div>
                        </div>

                        <div class="faq-card">
                            <div class="faq-question">
                                Is my information safe and private?
                                <i class="fas fa-plus text-success"></i>
                            </div>
                            <div class="faq-answer">
                                Completely. Your personal information is secure and only shared with potential matches
                                after mutual consent. Privacy and trust are our top priorities.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Contact Section -->
        <section class="contact-section" id="contact">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <h2>Contact Our Matchmakers</h2>
                    <p class="text-muted mt-3">Get personalized assistance from our expert team</p>
                </div>

                <div class="row">
                    <div class="col-lg-8 mx-auto" data-aos="fade-up" data-aos-delay="100">
                        <div class="contact-card">
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold text-success">Full Name *</label>
                                        <input type="text" class="form-control py-3" required>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold text-success">Phone Number *</label>
                                        <input type="tel" class="form-control py-3" required>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold text-success">Email Address *</label>
                                    <input type="email" class="form-control py-3" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold text-success">Gender</label>
                                        <select class="form-select py-3">
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold text-success">Age</label>
                                        <input type="number" class="form-control py-3" min="18" max="70">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold text-success">Your Message *</label>
                                    <textarea class="form-control" rows="5" required></textarea>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary px-5 py-3">
                                        <i class="fas fa-paper-plane me-2"></i> Send Message
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <?php include('footer.php'); ?>

        <!-- Back to Top Button -->
        <div class="back-to-top">
            <i class="fas fa-arrow-up"></i>
        </div>
        <a href="https://wa.me/923176065004" target="_blank" class="whatsapp-float">
            <i class="fab fa-whatsapp"></i>
        </a>
        <div class="modal fade" id="loginModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Login to Matrimony Elite</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="loginForm">
                            <div class="mb-3">
                                <label class="form-label text-success">Email Address</label>
                                <input type="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-success">Password</label>
                                <input type="password" class="form-control" required>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                <a href="#" class="float-end text-success">Forgot Password?</a>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-3">Login</button>
                        </form>
                        <div class="text-center mt-3">
                            <p>Don't have an account? <a href="#" class="text-success" data-bs-toggle="modal"
                                    data-bs-target="#registerModal" data-bs-dismiss="modal">Register here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Register Modal -->
        <div class="modal fade" id="registerModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content register-modal-content">
                    <!-- Left Column - Green Section -->
                    <div class="register-left-col">
                        <div class="register-heart-box">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3 class="register-left-title">Start Your Journey</h3>
                        <p class="register-left-text">Find your perfect match with our trusted matchmaking service</p>
                    </div>
                    <div class="register-right-col">
                        <div class="register-form-header">
                            <h4 class="register-form-title">Create Your Account</h4>
                            <p class="register-form-subtitle">Fill in your details to get started</p>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="register-form-scroll">
                            <form id="registerForm">
                                <!-- Row 1 -->
                                <div class="form-row-two">
                                    <div class="form-group-two">
                                        <label class="form-label-two">First Name *</label>
                                        <input type="text" class="form-control-two" required>
                                    </div>
                                    <div class="form-group-two">
                                        <label class="form-label-two">Last Name *</label>
                                        <input type="text" class="form-control-two" required>
                                    </div>
                                </div>

                                <!-- Row 2 -->
                                <div class="form-row-two">
                                    <div class="form-group-two">
                                        <label class="form-label-two">Father's Name</label>
                                        <input type="text" class="form-control-two">
                                    </div>
                                    <div class="form-group-two">
                                        <label class="form-label-two">Mother's Name</label>
                                        <input type="text" class="form-control-two">
                                    </div>
                                </div>

                                <!-- Row 3 -->
                                <div class="form-group-full">
                                    <label class="form-label-two">CNIC *</label>
                                    <input type="text" class="form-control-two" placeholder="XXXXX-XXXXXXX-X" required>
                                </div>

                                <!-- Row 4 -->
                                <div class="form-row-two">
                                    <div class="form-group-two">
                                        <label class="form-label-two">Phone *</label>
                                        <input type="tel" class="form-control-two" required>
                                    </div>
                                    <div class="form-group-two">
                                        <label class="form-label-two">Email *</label>
                                        <input type="email" class="form-control-two" required>
                                    </div>
                                </div>

                                <!-- Row 5 -->
                                <div class="form-group-full">
                                    <label class="form-label-two">Password *</label>
                                    <input type="password" class="form-control-two" required>
                                </div>

                                <!-- Row 6 -->
                                <div class="form-row-two">
                                    <div class="form-group-two">
                                        <label class="form-label-two">Marital Status *</label>
                                        <select class="form-control-two" required>
                                            <option value="">Select</option>
                                            <option>Unmarried</option>
                                            <option>Married</option>
                                            <option>Divorced</option>
                                            <option>Widowed</option>
                                        </select>
                                    </div>
                                    <div class="form-group-two">
                                        <label class="form-label-two">Gender *</label>
                                        <select class="form-control-two" required>
                                            <option value="">Select</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Row 7 -->
                                <div class="form-row-two">
                                    <div class="form-group-two">
                                        <label class="form-label-two">Age *</label>
                                        <input type="number" class="form-control-two" min="18" max="70" required>
                                    </div>
                                    <div class="form-group-two">
                                        <label class="form-label-two">Profile Image</label>
                                        <div class="file-input-wrapper">
                                            <input type="file" class="form-control-two file-input" accept="image/*">
                                            <span class="file-label">Choose File</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Row 8 -->
                                <div class="form-row-two">
                                    <div class="form-group-two">
                                        <label class="form-label-two">Work/Profession *</label>
                                        <input type="text" class="form-control-two" required>
                                    </div>
                                    <div class="form-group-two">
                                        <label class="form-label-two">Annual Income</label>
                                        <select class="form-control-two">
                                            <option value="">Select Income</option>
                                            <option>Under 1M</option>
                                            <option>1-3M</option>
                                            <option>3-5M</option>
                                            <option>5M+</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Row 9 -->
                                <div class="form-row-two">
                                    <div class="form-group-two">
                                        <label class="form-label-two">City *</label>
                                        <input type="text" class="form-control-two" required>
                                    </div>
                                    <div class="form-group-two">
                                        <label class="form-label-two">Country *</label>
                                        <select class="form-control-two" required>
                                            <option value="">Select Country</option>
                                            <option>Pakistan</option>
                                            <option>UK</option>
                                            <option>USA</option>
                                            <option>UAE</option>
                                            <option>Canada</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Row 10 -->
                                <div class="form-row-two">
                                    <div class="form-group-two">
                                        <label class="form-label-two">Reference 1</label>
                                        <input type="text" class="form-control-two" placeholder="Name & Contact">
                                    </div>
                                    <div class="form-group-two">
                                        <label class="form-label-two">Reference 2</label>
                                        <input type="text" class="form-control-two" placeholder="Name & Contact">
                                    </div>
                                </div>

                                <!-- Row 11 -->
                                <div class="form-group-full">
                                    <label class="form-label-two">Address *</label>
                                    <textarea class="form-control-two textarea-two" rows="2" required></textarea>
                                </div>

                                <!-- Terms -->
                                <div class="terms-checkbox">
                                    <input type="checkbox" id="registerTerms" required>
                                    <label for="registerTerms">
                                        I agree to the <a href="#">Terms & Conditions</a> and <a href="#">Privacy
                                            Policy</a> *
                                    </label>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="register-submit-btn">
                                    <i class="fas fa-user-plus me-2"></i> Create Account
                                </button>

                                <div class="login-link">
                                    Already have an account?
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal"
                                        data-bs-dismiss="modal">
                                        Login here
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stories Modal -->
        <div class="modal fade" id="storiesModal" tabindex="-1">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Success Stories</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="card h-100 card-highlight">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                                class="rounded-circle me-3" width="60" height="60">
                                            <div>
                                                <h6 class="mb-0 text-success">Ali & Sara</h6>
                                                <small class="text-muted">Married: 2022 | Karachi</small>
                                            </div>
                                        </div>
                                        <p>"Miles apart, yet perfectly matched! Thanks to Zojah & Jorha, we found each
                                            other through their international matchmaking and caring team."</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="card h-100 card-highlight">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                                class="rounded-circle me-3" width="60" height="60">
                                            <div>
                                                <h6 class="mb-0 text-success">Usman & Ayesha</h6>
                                                <small class="text-muted">Married: 2021 | London</small>
                                            </div>
                                        </div>
                                        <p>"Living in different countries, we never thought we'd find the perfect match.
                                            Matrimony Elite made it possible with their international matching!"</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        <script src="assets/script.js"></script>
        <script>
    // Page Loader - Mobile Fixed
    window.addEventListener("load", function() {
        const loader = document.getElementById("page-loader");
        
        // Force loader to be visible initially
        if (loader) {
            loader.style.display = "flex";
            loader.style.opacity = "1";
            loader.style.visibility = "visible";
            
            // Hide loader after page loads
            setTimeout(() => {
                loader.classList.add("hidden");
                setTimeout(() => {
                    loader.style.display = "none";
                }, 500);
            }, 800);
        }
    });
    
    // Fallback for slow loading
    document.addEventListener("DOMContentLoaded", function() {
        const loader = document.getElementById("page-loader");
        if (loader) {
            // Ensure loader is visible on mobile
            loader.style.display = "flex";
            loader.style.alignItems = "center";
            loader.style.justifyContent = "center";
        }
    });

            window.addEventListener("load", function () {
                const loader = document.getElementById("page-loader");

                setTimeout(() => {
                    loader.classList.add("hidden");

                    // Optional: DOM se hata bhi de
                    setTimeout(() => {
                        loader.style.display = "none";
                    }, 500);

                }, 800);
            });
        </script>
</body>

</html>