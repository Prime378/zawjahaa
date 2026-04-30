{{-- resources/views/website/index.blade.php --}}
@extends('layouts.app')
@section('content')
<style>

.urdu{
    font-family: "Noto Nastaliq Urdu", serif;
    direction: rtl;
}
.invalid-feedback-custom {
    color: #dc3545;
    font-size: 12px;
    margin-top: 5px;
    display: block;
}
.valid-feedback-custom {
    color: #198754;
    font-size: 12px;
    margin-top: 5px;
    display: block;
}
.english{
    font-family: Arial, sans-serif;
    direction: ltr;
}
.is-invalid {
    border-color: #dc3545 !important;
}
.is-valid {
    border-color: #198754 !important;
}

/* Premium Modal Styling */
.premium-modal {
    border: none;
    border-radius: 28px;
    overflow: hidden;
    box-shadow: 0 30px 50px -20px rgba(0, 0, 0, 0.4);
    background: transparent;
}

.premium-modal .modal-content {
    background: #ffffff;
    border-radius: 28px;
    border: none;
}

.premium-modal-header {
    background: linear-gradient(135deg, #0f2b1f 0%, #198754 100%);
    padding: 24px 30px;
    border-bottom: none;
    position: relative;
}

.premium-modal-header .modal-title {
    font-size: 26px;
    font-weight: 700;
    color: white;
    letter-spacing: -0.3px;
}

.premium-modal-header .modal-subtitle {
    font-size: 14px;
    color: rgba(255,255,255,0.8);
    margin-top: 6px;
}

.premium-modal-header .modal-icon-badge {
    position: absolute;
    right: 25px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 55px;
    opacity: 0.12;
    color: white;
}

.premium-modal-body {
    padding: 30px 32px;
    background: #ffffff;
}

/* Step Indicator */
.step-indicator {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 30px;
    padding: 0 10px;
}

.step-item {
    text-align: center;
    flex: 1;
    position: relative;
}

.step-number {
    width: 40px;
    height: 40px;
    background: #e9ecef;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 8px;
    font-weight: 700;
    color: #6c757d;
    transition: all 0.3s;
}

.step-item.active .step-number {
    background: linear-gradient(135deg, #198754, #0d6e3f);
    color: white;
    box-shadow: 0 5px 12px rgba(25,135,84,0.3);
}

.step-item.completed .step-number {
    background: #198754;
    color: white;
}

.step-label {
    font-size: 12px;
    font-weight: 600;
    color: #6c757d;
}

.step-item.active .step-label {
    color: #198754;
    font-weight: 700;
}

.step-connector {
    position: absolute;
    top: 20px;
    left: 50%;
    width: 100%;
    height: 2px;
    background: #e9ecef;
    z-index: 0;
}

.step-item:last-child .step-connector {
    display: none;
}

/* Premium Option Buttons */
.premium-option-btn {
    width: 100%;
    background: white;
    border: 2px solid #e8f5e9;
    border-radius: 20px;
    padding: 18px 12px;
    text-align: center;
    transition: all 0.3s ease;
    cursor: pointer;
    background: #fefefe;
}

.premium-option-btn:hover {
    transform: translateY(-4px);
    border-color: #198754;
    box-shadow: 0 12px 22px -10px rgba(25,135,84,0.25);
}

.premium-option-btn.active {
    background: linear-gradient(135deg, #198754, #0d6e3f);
    border-color: #198754;
    color: white;
}

.premium-option-btn.active .option-icon {
    background: rgba(255,255,255,0.2);
    color: white;
}

.premium-option-btn.active span {
    color: white;
}

.option-icon {
    width: 55px;
    height: 55px;
    background: #f0fdf4;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 12px;
    font-size: 26px;
    color: #198754;
    transition: all 0.3s;
}

.premium-option-btn span {
    display: block;
    font-size: 15px;
    font-weight: 700;
    color: #1f2937;
}

/* Form Fields */
.premium-input, .premium-select {
    width: 100%;
    padding: 12px 16px;
    border: 1.5px solid #e2e8f0;
    border-radius: 16px;
    font-size: 14px;
    transition: all 0.2s;
    background: #fafcff;
}

.premium-input:focus, .premium-select:focus {
    border-color: #198754;
    outline: none;
    box-shadow: 0 0 0 3px rgba(25,135,84,0.15);
}

.premium-input.is-invalid, .premium-select.is-invalid {
    border-color: #dc3545;
    background-color: #fff5f5;
}
.premium-input.is-valid, .premium-select.is-valid {
    border-color: #198754;
    background-color: #f0fdf4;
}

/* Modal Footer */
.premium-modal-footer {
    padding: 20px 30px 28px;
    background: white;
    border-top: 1px solid #eef2f0;
    display: flex;
    justify-content: space-between;
    gap: 15px;
}

.btn-premium-prev {
    background: #f1f5f9;
    border: none;
    padding: 12px 28px;
    border-radius: 40px;
    font-weight: 600;
    color: #1e293b;
    transition: all 0.2s;
}

.btn-premium-prev:hover {
    background: #e2e8f0;
    transform: translateX(-3px);
}

.btn-premium-next {
    background: linear-gradient(135deg, #198754, #0d6e3f);
    border: none;
    padding: 12px 32px;
    border-radius: 40px;
    font-weight: 600;
    color: white;
    transition: all 0.2s;
    box-shadow: 0 4px 10px rgba(25,135,84,0.3);
}

.btn-premium-next:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 22px -8px rgba(25,135,84,0.4);
}

.btn-premium-next:disabled {
    opacity: 0.6;
    transform: none;
    cursor: not-allowed;
}

/* Loading Spinner */
.btn-premium-next.loading {
    position: relative;
    pointer-events: none;
    opacity: 0.7;
}

.btn-premium-next.loading::after {
    content: "";
    position: absolute;
    width: 20px;
    height: 20px;
    top: 50%;
    right: 15px;
    margin-top: -10px;
    border: 2px solid white;
    border-radius: 50%;
    border-top-color: transparent;
    animation: spin 0.8s linear infinite;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

/* Animations */
@keyframes fadeSlideUp {
    from {
        opacity: 0;
        transform: translateY(12px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.step {
    animation: fadeSlideUp 0.3s ease-out;
}



.btn-outline-light {
    border: 2px solid white;
    color: white;
    padding: 12px 30px;
    border-radius: 50px;
    font-weight: 600;
}

.btn-outline-light:hover {
    background: white;
    color: #0a2b1a;
}

.trust-indicator {
    padding: 20px;
    border-radius: 16px;
    transition: all 0.3s;
}

.trust-indicator:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.trust-icon {
    width: 60px;
    height: 60px;
    background: #e8f5e9;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px;
    font-size: 24px;
    color: #198754;
}

.journey-step {
    text-align: center;
    padding: 30px;
}

.journey-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #198754, #0d6e3f);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 32px;
    color: white;
}
@media (max-width: 576px) {
    .premium-modal-body .col-6 {
        flex: 0 0 100%;
        max-width: 100%;
    }
}
.cta-section {
    background: linear-gradient(135deg, #198754, #0d6e3f);
    border-radius: 30px;
    padding: 60px 40px;
    text-align: center;
    color: white;
    margin: 60px auto;
}

.cta-title {
    font-size: 36px;
    font-weight: 800;
    margin-bottom: 20px;
}

.gallery-item {
    position: relative;
    border-radius: 16px;
    overflow: hidden;
    cursor: pointer;
}

.gallery-item img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    transition: transform 0.3s;
}

.gallery-item:hover img {
    transform: scale(1.05);
}

.gallery-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0,0,0,0.8));
    color: white;
    padding: 20px;
    transform: translateY(100%);
    transition: transform 0.3s;
}

.gallery-item:hover .gallery-overlay {
    transform: translateY(0);
}

@media (max-width: 768px) {
    .premium-modal-body {
        padding: 20px;
    }
    .premium-option-btn {
        padding: 12px 8px;
    }
    .option-icon {
        width: 42px;
        height: 42px;
        font-size: 20px;
    }
    
}
</style>

<section class="hero-section" id="home">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="hero-content">
                    <span class="hero-badge">
                        <i class="fas fa-star me-2"></i> Trusted by the Trust Worthies.
                    </span>
                    <h1 class="hero-title">
                        Find Perfect Match Today – <span>Start Blissful Life Tomorrow!</span>
                    </h1>
                    <p class="hero-subtitle">
                        <marquee class="hero-line urdu" behavior="scroll" direction="right" scrollamount="3">
                            <span>نکاح آسان کریں، شیطان دفع دور کریں</span>
                        </marquee>
                        <marquee class="hero-line english" behavior="scroll" direction="left" scrollamount="4">
                            <span>Adopt the Sunnah way, drive Satan away.</span>
                        </marquee>
                    </p>
                    <div class="btn-group-custom">
                        <a href="{{ route('ai-match') }}" class="btn btn-gold btn-lg">
                            <i class="fas fa-robot me-2"></i> AI Compatibility Test
                        </a>
                        @guest
                        <a href="#" class="btn btn-outline-light btn-lg" id="registerBtn">
                            <i class="fas fa-user-plus me-2"></i> Register Free
                        </a>
                        @endguest
                    </div>
                    <div class="hero-stats mt-5">
                        <div class="row">
                            <div class="col-md-3 col-6">
                                <div class="hero-stat">
                                    <div class="hero-stat-number">5,000+</div>
                                    <div class="hero-stat-text">Successful Matches</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="hero-stat">
                                    <div class="hero-stat-number">25K+</div>
                                    <div class="hero-stat-text">Elite Members</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="hero-stat">
                                    <div class="hero-stat-number">35+</div>
                                    <div class="hero-stat-text">Countries</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="hero-stat">
                                    <div class="hero-stat-number">95%</div>
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
        <div class="row g-4 justify-content-center">
            <div class="col-md-4 col-6 mb-4">
                <div class="trust-indicator text-center">
                    <div class="trust-icon"><i class="fas fa-shield-alt"></i></div>
                    <h5>100% Verified</h5>
                    <p class="text-muted mb-0">All profiles verified</p>
                </div>
            </div>
            <div class="col-md-4 col-6 mb-4">
                <div class="trust-indicator text-center">
                    <div class="trust-icon"><i class="fas fa-lock"></i></div>
                    <h5>Secure & Private</h5>
                    <p class="text-muted mb-0">Your privacy protected</p>
                </div>
            </div>
            <div class="col-md-4 col-6 mb-4">
                <div class="trust-indicator text-center">
                    <div class="trust-icon"><i class="fas fa-users"></i></div>
                    <h5>Personal Matchmaker</h5>
                    <p class="text-muted mb-0">Dedicated consultant</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container">
        <div class="section-title text-center">
            <h2>Our Matchmaking Journey</h2>
            <p class="text-muted mt-3">Three simple steps to find your perfect match</p>
        </div>
        <div class="row">
            <div class="col-md-4 journey-step">
                <div class="journey-icon"><i class="fas fa-user-edit"></i></div>
                <h4 class="text-success">Register & Create Profile</h4>
                <p class="text-muted">Tell us about yourself, your preferences, and what you're looking for in a partner</p>
            </div>
            <div class="col-md-4 journey-step">
                <div class="journey-icon"><i class="fas fa-heart"></i></div>
                <h4 class="text-success">AI Compatibility Matching</h4>
                <p class="text-muted">Our advanced AI finds your most compatible matches based on 100+ factors</p>
            </div>
            <div class="col-md-4 journey-step">
                <div class="journey-icon"><i class="fas fa-ring"></i></div>
                <h4 class="text-success">Meet & Marry</h4>
                <p class="text-muted">Connect with your matches, involve families, and begin your happily ever after</p>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="cta-section">
        <div class="container">
            <h2 class="cta-title">Ready to Find Your Perfect Match?</h2>
            <p class="lead mb-4">Join thousands of happy couples who found love through Zawjahaa</p>
            <div class="cta-buttons">
                @guest
                <a class="btn btn-dark btn-lg px-5" id="ctaRegisterBtn" href="#">
                    <i class="fas fa-user-plus me-2"></i>Register
                </a>
                @endguest
            </div>
        </div>
    </div>
</div>

<section class="gallery-section" id="stories">
    <div class="container">
        <div class="section-title text-center">
            <h2>Success Stories</h2>
            <p class="opacity-75 mt-3">Real couples who found their soulmates through our service</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4 mb-4">
                <div class="gallery-item">
                    <img src="{{ asset('assets/images/photo-1534528741775-53994a69daeb.avif') }}" alt="Happy Couple">
                    <div class="gallery-overlay">
                        <h5>Ahmed & Sana</h5>
                        <p class="mb-2">Married: 2024 | Karachi</p>
                        <p class="mb-0"><i>"Found each other within a month!"</i></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="gallery-item">
                    <img src="{{asset('assets/images/photo-1511988617509-a57c8a288659.avif')}}" alt="Happy Couple">
                    <div class="gallery-overlay">
                        <h5>Usman & Ayesha</h5>
                        <p class="mb-2">Married: 2023 | London</p>
                        <p class="mb-0"><i>"AI matching got it perfectly!"</i></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="gallery-item">
                    <img src="{{ asset('assets/images/photo-1544005313-94ddf0286df2.avif')}}" alt="Happy Couple">
                    <div class="gallery-overlay">
                        <h5>Zain & Fatima</h5>
                        <p class="mb-2">Married: 2023 | Dubai</p>
                        <p class="mb-0"><i>"Personal matchmaker made the difference!"</i></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-5">
            <button class="btn btn-primary px-5 py-3">
                <i class="fas fa-book-open me-2"></i> View All Success Stories
            </button>
        </div>
    </div>
</section>

<!-- FEEDBACK SECTION -->
<section class="py-5 bg-light" id="feedback">
<div class="container">
<h2 class="text-center mb-4">Send Us Feedback</h2>
<div class="row justify-content-center">
<div class="col-lg-6">
<div id="feedback-msg"></div>
<script>
    var isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
</script>
<form id="feedbackForm">
@csrf
<div class="mb-3">
<textarea name="message" class="form-control" rows="4" placeholder="Write your feedback..." required></textarea>
</div>
<button type="submit" class="btn btn-success w-100">Submit Feedback</button>
</form>
</div>
</div>
</div>
</section>

<!-- PREMIUM REGISTRATION MODAL -->
<div class="modal fade" id="premiumRegisterModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content premium-modal">
            <div class="premium-modal-header">
                <div class="modal-icon-badge">
                    <i class="fas fa-crown"></i>
                </div>
                <h5 class="modal-title">Begin Your Journey ✨</h5>
                <div class="modal-subtitle">Join the elite matchmaking experience</div>
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="premium-modal-body">
                <div class="step-indicator" id="stepIndicator">
                    <div class="step-item active" data-step="1">
                        <div class="step-number">1</div>
                        <div class="step-label">Profile For</div>
                        <div class="step-connector"></div>
                    </div>
                    <div class="step-item" data-step="2">
                        <div class="step-number">2</div>
                        <div class="step-label">Basic Info</div>
                        <div class="step-connector"></div>
                    </div>
                    <div class="step-item" data-step="3">
                        <div class="step-number">3</div>
                        <div class="step-label">Complete</div>
                    </div>
                </div>

                <form id="premiumMultiStepForm" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="step" id="step1">
                        <h6 class="mb-4 fw-bold" style="color:#1e4620;">
                            <i class="fas fa-user-friends me-2 text-success"></i> 
                            Who is this profile for?
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-3 col-6">
                                <div class="premium-option-btn" data-value="Self">
                                    <div class="option-icon"><i class="fas fa-user-check"></i></div>
                                    <span>Myself</span>
                                    <small class="option-desc">For your own profile</small>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="premium-option-btn" data-value="Son">
                                    <div class="option-icon"><i class="fas fa-male"></i></div>
                                    <span>Son</span>
                                    <small class="option-desc">For your son</small>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="premium-option-btn" data-value="Daughter">
                                    <div class="option-icon"><i class="fas fa-female"></i></div>
                                    <span>Daughter</span>
                                    <small class="option-desc">For your daughter</small>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="premium-option-btn" data-value="Brother">
                                    <div class="option-icon"><i class="fas fa-user-plus"></i></div>
                                    <span>Brother</span>
                                    <small class="option-desc">For your brother</small>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="premium-option-btn" data-value="Sister">
                                    <div class="option-icon"><i class="fas fa-user-friends"></i></div>
                                    <span>Sister</span>
                                    <small class="option-desc">For your sister</small>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="premium-option-btn" data-value="Friend">
                                    <div class="option-icon"><i class="fas fa-handshake"></i></div>
                                    <span>Friend</span>
                                    <small class="option-desc">For a friend</small>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="premium-option-btn" data-value="Relative">
                                    <div class="option-icon"><i class="fas fa-tree"></i></div>
                                    <span>Relative</span>
                                    <small class="option-desc">For a relative</small>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="on_behalf" id="onBehalfPremium">
                    </div>

                    <div class="step d-none" id="step2">
                        <h6 class="mb-3 fw-bold text-success"><i class="fas fa-address-card me-2"></i> Basic Information</h6>
                        <div class="row g-3">
                            <div class="col-12 col-md-6 col-lg-3">
                                <input type="text" name="first_name" class="premium-input" placeholder="First Name">
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <input type="text" name="last_name" class="premium-input" placeholder="Last Name">
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <select name="gender" class="premium-select">
                                    <option value="">Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <input type="file" name="profile_image" class="premium-input" accept="image/*">
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <input type="date" name="dob" class="premium-input" placeholder="Date of Birth">
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <input type="email" name="email" id="premiumEmail" class="premium-input" placeholder="Email Address">
                                <div class="email-check-status"></div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <input type="text" name="phone" id="premiumPhone" class="premium-input" placeholder="Phone Number (03XXXXXXXXX)">
                                <div class="phone-check-status"></div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <input type="text" name="cnic" id="premiumCnic" class="premium-input" placeholder="CNIC (xxxxx-xxxxxxx-x)">
                                <div class="cnic-check-status"></div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <select name="living_country" id="livingCountryPremium" class="premium-select">
                                    <option value="">Select Living Country</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <select name="country" id="originCountryPremium" class="premium-select">
                                    <option value="">Select Origin Country</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <select name="city" id="cityPremium" class="premium-select">
                                    <option value="">Select City</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="step d-none" id="step3">
                        <h6 class="mb-3 fw-bold text-success"><i class="fas fa-chart-line me-2"></i> Complete Profile</h6>
                        <div class="row g-3">
                            <div class="col-12 col-md-6 col-lg-3">
                                <select name="marital_status" id="maritalStatusPremium" class="premium-select">
                                    <option value="">Marital Status</option>
                                    <option value="Unmarried">Unmarried</option>
                                    <option value="Nikah_Only">Nikah Only</option>
                                    <option value="Married_No_Children">Married (No Children)</option>
                                    <option value="Married_With_Children">Married (Has Children)</option>
                                    <option value="Divorced_No_Children">Divorced (No Children)</option>
                                    <option value="Divorced_With_Children">Divorced (Has Children)</option>
                                    <option value="Widowed_No_Children">Widowed (No Children)</option>
                                    <option value="Widowed_With_Children">Widowed (Has Children)</option>
                                    <option value="separated_No_children">Separated (No Children)</option>
                                    <option value="separated_With_children">Separated (Has Children)</option>
                                    <option value="Infertile">Infertile</option>
                                </select>
                            </div>
                            <div class="col-md-4 d-none" id="childrenBoxPremium">
                                <input type="text" name="children_details" class="premium-input" placeholder="Children Details">
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <input type="text" name="religion" class="premium-input" placeholder="Religion">
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <input type="text" name="education" class="premium-input" placeholder="Education">
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <input type="text" name="profession" class="premium-input" placeholder="Profession">
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <input type="text" name="height" class="premium-input" placeholder="Height (e.g. 5.8 ft)">
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <input type="text" name="caste" class="premium-input" placeholder="Caste">
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <select name="religious_sect" class="premium-select">
                                    <option value="">Select Sect</option>
                                    <option value="All">All</option>
                                    <option value="sunni">Sunni</option>
                                    <option value="shia">Shia</option>
                                    <option value="deobandi">Deobandi</option>
                                    <option value="barelvi">Barelvi</option>
                                    <option value="ahl_e_hadith">Ahl-e-Hadith</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <input type="text" name="income" class="premium-input" placeholder="Monthly Income">
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <input type="text" name="ownership" class="premium-input" placeholder="Home Ownership (Own/Rent)">
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <input type="text" name="father_occupation" class="premium-input" placeholder="Father Occupation">
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <input type="text" name="mother_occupation" class="premium-input" placeholder="Mother Occupation">
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <input type="text" name="siblings" class="premium-input" placeholder="Siblings (e.g. 2 brothers)">
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <select name="family_type" class="premium-select">
                                    <option value="">Select Family Type</option>
                                    <option value="joint">Joint Family</option>
                                    <option value="extended">Extended Family</option>
                                    <option value="single_parent">Single Parent Family</option>
                                    <option value="blended">Blended Family</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <select name="family_status" class="premium-select">
                                    <option value="">Select Family Status</option>
                                    <option value="upper_class">Upper Class</option>
                                    <option value="upper_middle">Upper Middle Class</option>
                                    <option value="middle">Middle Class</option>
                                    <option value="lower_middle">Lower Middle Class</option>
                                    <option value="lower_class">Lower Class</option>
                                </select>
                            </div>
                           
                            <div class="col-12 col-md-6 col-lg-3">
                                <select name="disease_status" id="diseaseStatusPremium" class="premium-select">
                                    <option value="No">Any Disease? No</option>
                                    <option value="Yes">Yes</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6 d-none" id="diseaseBoxPremium">
                                <input type="text" name="disease_detail" class="premium-input" placeholder="Disease details">
                            </div>
                             <div class="col-md-12">
                                <textarea name="about_me" class="premium-input" placeholder="About Me" rows="3"></textarea>
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="password" class="premium-input" placeholder="Password">
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="password_confirmation" class="premium-input" placeholder="Confirm Password">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="premium-modal-footer">
                <button type="button" id="prevBtnPremium" class="btn-premium-prev"><i class="fas fa-arrow-left me-2"></i>Back</button>
                <button type="button" id="nextBtnPremium" class="btn-premium-next">Next <i class="fas fa-arrow-right ms-2"></i></button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {
    // Feedback form submit
    $('#feedbackForm').submit(function(e){
        e.preventDefault();
        if(!isLoggedIn){
            $('#feedback-msg').html('<div class="alert alert-danger">Please login and submit feedback</div>');
            return false;
        }
        $.ajax({
            url:"{{ route('feedback.store') }}",
            method:"POST",
            data:$(this).serialize(),
            success:function(response){
                if(response.status){
                    $('#feedback-msg').html('<div class="alert alert-success">'+response.message+'</div>');
                    $('#feedbackForm')[0].reset();
                }
            },
            error:function(){
                $('#feedback-msg').html('<div class="alert alert-danger">Something went wrong</div>');
            }
        });
    });

    // Initialize modal
    let premiumModal = new bootstrap.Modal(document.getElementById('premiumRegisterModal'));
    
    $('#registerBtn, #ctaRegisterBtn').on('click', function(e) {
        e.preventDefault();
        resetFormState();
        premiumModal.show();
    });

    function resetFormState() {
        $('#premiumMultiStepForm')[0].reset();
        $('.premium-input, .premium-select').removeClass('is-invalid is-valid');
        $('.invalid-feedback-custom, .valid-feedback-custom').remove();
        $('.email-check-status, .phone-check-status, .cnic-check-status').html('');
        $('#onBehalfPremium').val('');
        $('.premium-option-btn').removeClass('active');
        currentStep = 1;
        showStep(1);
    }

    let currentStep = 1;
    const totalSteps = 3;

    function showStep(step) {
        $('.step').addClass('d-none');
        $('#step' + step).removeClass('d-none');
        currentStep = step;

        $('.step-item').removeClass('active completed');
        $('.step-item').each(function() {
            let s = parseInt($(this).data('step'));
            if (s === step) $(this).addClass('active');
            if (s < step) $(this).addClass('completed');
        });

        if (step === totalSteps) {
            $('#nextBtnPremium').html('Submit ✅');
        } else {
            $('#nextBtnPremium').html('Next →');
        }
    }

    function showError(input, message) {
        let $input = $(input);
        $input.removeClass('is-valid').addClass('is-invalid');
        let $statusDiv = $input.siblings('.email-check-status, .phone-check-status, .cnic-check-status');
        if ($statusDiv.length) {
            $statusDiv.html('<div class="invalid-feedback-custom">' + message + '</div>');
        } else if ($input.next('.invalid-feedback-custom').length === 0) {
            $input.after('<div class="invalid-feedback-custom">' + message + '</div>');
        } else {
            $input.next('.invalid-feedback-custom').text(message);
        }
    }

    function showValid(input, message) {
        let $input = $(input);
        $input.removeClass('is-invalid').addClass('is-valid');
        let $statusDiv = $input.siblings('.email-check-status, .phone-check-status, .cnic-check-status');
        if ($statusDiv.length) {
            $statusDiv.html('<div class="valid-feedback-custom">' + message + '</div>');
        }
    }

    function clearErrors() {
        $('.premium-input, .premium-select').removeClass('is-invalid is-valid');
        $('.invalid-feedback-custom, .valid-feedback-custom').remove();
        $('.email-check-status, .phone-check-status, .cnic-check-status').html('');
    }

    // Function to check all three fields before moving to next step
    async function checkAllDuplicates() {
        let email = $('#premiumEmail').val().trim();
        let phone = $('#premiumPhone').val().trim();
        let cnic = $('#premiumCnic').val().trim();
        
        let emailValid = true;
        let phoneValid = true;
        let cnicValid = true;
        let hasError = false;
        
        // Check Email
        if (!email) {
            showError('#premiumEmail', 'Email is required');
            emailValid = false;
            hasError = true;
        } else {
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                showError('#premiumEmail', 'Please enter a valid email address');
                emailValid = false;
                hasError = true;
            } else {
                try {
                    let emailRes = await $.ajax({
                        url: '{{ route("check.email") }}',
                        method: 'POST',
                        data: { email: email, _token: '{{ csrf_token() }}' },
                        async: false
                    });
                    if (emailRes.exists) {
                        showError('#premiumEmail', 'This email is already registered! Please use another email.');
                        emailValid = false;
                        hasError = true;
                    } else {
                        showValid('#premiumEmail', '✓ Email is available');
                    }
                } catch(e) {
                    console.log('Email check error:', e);
                    showError('#premiumEmail', 'Error checking email. Please try again.');
                    emailValid = false;
                    hasError = true;
                }
            }
        }
        
        // Check Phone
        if (!phone) {
            showError('#premiumPhone', 'Phone number is required');
            phoneValid = false;
            hasError = true;
        } else {
            let phonePattern = /^03[0-9]{9}$/;
            if (!phonePattern.test(phone)) {
                showError('#premiumPhone', 'Please enter a valid phone number (03XXXXXXXXX)');
                phoneValid = false;
                hasError = true;
            } else {
                try {
                    let phoneRes = await $.ajax({
                        url: '{{ route("check.phone") }}',
                        method: 'POST',
                        data: { phone: phone, _token: '{{ csrf_token() }}' },
                        async: false
                    });
                    if (phoneRes.exists) {
                        showError('#premiumPhone', 'This phone number is already registered! Please use another number.');
                        phoneValid = false;
                        hasError = true;
                    } else {
                        showValid('#premiumPhone', '✓ Phone number is available');
                    }
                } catch(e) {
                    console.log('Phone check error:', e);
                    showError('#premiumPhone', 'Error checking phone. Please try again.');
                    phoneValid = false;
                    hasError = true;
                }
            }
        }
        
        // Check CNIC
        if (!cnic) {
            showError('#premiumCnic', 'CNIC is required');
            cnicValid = false;
            hasError = true;
        } else {
            let cnicPattern = /^[0-9]{5}-[0-9]{7}-[0-9]{1}$/;
            if (!cnicPattern.test(cnic)) {
                showError('#premiumCnic', 'Please enter valid CNIC (xxxxx-xxxxxxx-x)');
                cnicValid = false;
                hasError = true;
            } else {
                try {
                    let cnicRes = await $.ajax({
                        url: '{{ route("check.cnic") }}',
                        method: 'POST',
                        data: { cnic: cnic, _token: '{{ csrf_token() }}' },
                        async: false
                    });
                    if (cnicRes.exists) {
                        showError('#premiumCnic', 'This CNIC is already registered! Please use another CNIC.');
                        cnicValid = false;
                        hasError = true;
                    } else {
                        showValid('#premiumCnic', '✓ CNIC is available');
                    }
                } catch(e) {
                    console.log('CNIC check error:', e);
                    showError('#premiumCnic', 'Error checking CNIC. Please try again.');
                    cnicValid = false;
                    hasError = true;
                }
            }
        }
        
        // Agar koi error hai to alert dikhao
        if (hasError) {
            return false;
        }
        
        return emailValid && phoneValid && cnicValid;
    }

    function validateOtherFields() {
        let valid = true;
        
        let img = $('input[name="profile_image"]')[0].files[0];
        if (!img) {
            showError('input[name="profile_image"]', 'Profile image is required');
            valid = false;
        } else {
            let allowed = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
            if (!allowed.includes(img.type)) {
                showError('input[name="profile_image"]', 'Only JPG, PNG, WEBP images allowed');
                valid = false;
            }
            if (img.size > 2 * 1024 * 1024) {
                showError('input[name="profile_image"]', 'Image must be less than 2MB');
                valid = false;
            }
        }

        let fname = $('input[name="first_name"]').val().trim();
        if (!fname) {
            showError('input[name="first_name"]', 'First name required');
            valid = false;
        }

        let lname = $('input[name="last_name"]').val().trim();
        if (!lname) {
            showError('input[name="last_name"]', 'Last name required');
            valid = false;
        }

        let gender = $('select[name="gender"]').val();
        if (!gender) {
            showError('select[name="gender"]', 'Gender required');
            valid = false;
        }

        let dob = $('input[name="dob"]').val();
        if (!dob) {
            showError('input[name="dob"]', 'Date of birth required');
            valid = false;
        } else {
            let age = new Date().getFullYear() - new Date(dob).getFullYear();
            if (age < 18) {
                showError('input[name="dob"]', 'You must be at least 18 years old');
                valid = false;
            }
        }

        if (!$('#livingCountryPremium').val()) {
            showError('#livingCountryPremium', 'Living country required');
            valid = false;
        }
        if (!$('#originCountryPremium').val()) {
            showError('#originCountryPremium', 'Origin country required');
            valid = false;
        }
        if (!$('#cityPremium').val()) {
            showError('#cityPremium', 'City required');
            valid = false;
        }
        
        return valid;
    }

    async function validateStep() {
        clearErrors();
        
        if (currentStep === 1) {
            if (!$('#onBehalfPremium').val()) {
                alert('Please select who this profile is for');
                return false;
            }
            return true;
        }

        if (currentStep === 2) {
            $('#nextBtnPremium').addClass('loading');
            let duplicatesValid = await checkAllDuplicates();
            $('#nextBtnPremium').removeClass('loading');
            
            if (!duplicatesValid) {
                return false;
            }
            
            let otherValid = validateOtherFields();
            return otherValid;
        }

        if (currentStep === 3) {
            let valid = true;
            
            let required = ['religion', 'education', 'profession', 'height', 'caste', 'income', 'ownership', 'father_occupation', 'mother_occupation', 'siblings'];
            for (let field of required) {
                if (!$(`input[name="${field}"]`).val().trim()) {
                    showError(`input[name="${field}"]`, field.replace('_', ' ') + ' required');
                    valid = false;
                }
            }

            if (!$('select[name="religious_sect"]').val()) {
                showError('select[name="religious_sect"]', 'Religious sect required');
                valid = false;
            }
            if (!$('select[name="family_type"]').val()) {
                showError('select[name="family_type"]', 'Family type required');
                valid = false;
            }
            if (!$('select[name="family_status"]').val()) {
                showError('select[name="family_status"]', 'Family status required');
                valid = false;
            }

            let about = $('textarea[name="about_me"]').val().trim();
            if (!about) {
                showError('textarea[name="about_me"]', 'About me required');
                valid = false;
            } else if (about.length < 20) {
                showError('textarea[name="about_me"]', 'Please write at least 20 characters');
                valid = false;
            }

            let marital = $('#maritalStatusPremium').val();
            if (!marital) {
                showError('#maritalStatusPremium', 'Marital status required');
                valid = false;
            }

            if (marital && (marital.includes('With_Children'))) {
                if (!$('input[name="children_details"]').val().trim()) {
                    showError('input[name="children_details"]', 'Children details required');
                    valid = false;
                }
            }

            if ($('#diseaseStatusPremium').val() === 'Yes') {
                if (!$('input[name="disease_detail"]').val().trim()) {
                    showError('input[name="disease_detail"]', 'Disease details required');
                    valid = false;
                }
            }

            let pass = $('input[name="password"]').val();
            let confirm = $('input[name="password_confirmation"]').val();
            if (!pass) {
                showError('input[name="password"]', 'Password required');
                valid = false;
            } else if (pass.length < 6) {
                showError('input[name="password"]', 'Password must be at least 6 characters');
                valid = false;
            }
            if (!confirm) {
                showError('input[name="password_confirmation"]', 'Confirm password required');
                valid = false;
            } else if (pass !== confirm) {
                showError('input[name="password_confirmation"]', 'Passwords do not match');
                valid = false;
            }
            
            return valid;
        }
        
        return true;
    }

    let isProcessing = false;

    $('#nextBtnPremium').click(async function() {
        if (isProcessing) return;
        isProcessing = true;
        
        let isValid = await validateStep();
        
        if (!isValid) {
            isProcessing = false;
            return;
        }

        if (currentStep < totalSteps) {
            showStep(currentStep + 1);
        } else {
            $('#premiumMultiStepForm').submit();
        }
        
        isProcessing = false;
    });

    $('#prevBtnPremium').click(function() {
        if (currentStep > 1) {
            showStep(currentStep - 1);
        }
    });

    $('.premium-option-btn').click(function() {
        $('.premium-option-btn').removeClass('active');
        $(this).addClass('active');
        $('#onBehalfPremium').val($(this).data('value'));
    });

    $('#premiumCnic').on('input', function() {
        let val = this.value.replace(/\D/g, '');
        if (val.length > 5) val = val.slice(0, 5) + '-' + val.slice(5);
        if (val.length > 13) val = val.slice(0, 13) + '-' + val.slice(13, 14);
        this.value = val;
        $(this).removeClass('is-invalid is-valid');
        $(this).siblings('.cnic-check-status').html('');
    });

    $('#premiumEmail, #premiumPhone').on('input', function() {
        $(this).removeClass('is-invalid is-valid');
        $(this).siblings('.email-check-status, .phone-check-status').html('');
    });

    $('#maritalStatusPremium').change(function() {
        let val = $(this).val();
        if (val && val.includes('With_Children')) {
            $('#childrenBoxPremium').removeClass('d-none');
        } else {
            $('#childrenBoxPremium').addClass('d-none');
        }
    });

    $('#diseaseStatusPremium').change(function() {
        if ($(this).val() === 'Yes') {
            $('#diseaseBoxPremium').removeClass('d-none');
        } else {
            $('#diseaseBoxPremium').addClass('d-none');
        }
    });

    $('#premiumMultiStepForm').on('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        
        $('#nextBtnPremium').addClass('loading').prop('disabled', true);
        
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) {
    if (res.status) {
        Swal.fire({
            toast: true,
            position: 'top-end', // right side
            icon: 'success',
            title: 'Registration Successful!',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });

        setTimeout(() => {
            window.location.href = '/login';
        }, 3000);
    }
},
            error: function(xhr) {
                $('#nextBtnPremium').removeClass('loading').prop('disabled', false);
                clearErrors();
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        let input = $(`[name="${key}"]`);
                        if (key === 'country') input = $('#originCountryPremium');
                        if (key === 'living_country') input = $('#livingCountryPremium');
                        if (key === 'city') input = $('#cityPremium');
                        if (key === 'email') input = $('#premiumEmail');
                        if (key === 'phone') input = $('#premiumPhone');
                        if (key === 'cnic') input = $('#premiumCnic');
                        input.addClass('is-invalid');
                        if (input.next('.invalid-feedback-custom').length === 0) {
                            input.after('<div class="invalid-feedback-custom">' + value[0] + '</div>');
                        } else {
                            input.next('.invalid-feedback-custom').text(value[0]);
                        }
                    });
                } else {
                    alert('Registration failed: ' + (xhr.responseJSON?.message || 'Unknown error'));
                }
            }
        });
    });

    // Load countries
    function loadCountries() {
        $.ajax({
            url: 'https://countriesnow.space/api/v0.1/countries',
            method: 'GET',
            success: function(res) {
                if (res.data) {
                    let options = '<option value="">Select Country</option>';
                    res.data.forEach(c => {
                        options += `<option value="${c.country}">${c.country}</option>`;
                    });
                    $('#livingCountryPremium, #originCountryPremium').html(options);
                }
            }
        });
    }

    function loadCities(country) {
        $.ajax({
            url: 'https://countriesnow.space/api/v0.1/countries/cities',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({ country: country }),
            success: function(res) {
                let options = '<option value="">Select City</option>';
                if (res.data) {
                    res.data.forEach(city => {
                        options += `<option value="${city}">${city}</option>`;
                    });
                }
                $('#cityPremium').html(options);
            }
        });
    }
const urlParams = new URLSearchParams(window.location.search);

if (urlParams.get('openRegister') === '1') {
    let premiumModal = new bootstrap.Modal(document.getElementById('premiumRegisterModal'));
    premiumModal.show();
}
    $('#livingCountryPremium').change(function() {
        let country = $(this).val();
        if (country) loadCities(country);
    });

    loadCountries();
    showStep(1);
});
</script>

@endsection