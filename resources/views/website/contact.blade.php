@extends('layouts.app')

@section('title', 'Contact Us | Zawjahaa - Matchmaking Since 2010')

@section('content')
<style>
    :root {
        --primary: #10B981;
        --primary-dark: #059669;
        --secondary: #059669;
        --accent: #F59E0B;
        --dark: #111827;
        --light: #F9FAFB;
        --gradient-green: linear-gradient(135deg, #10B981 0%, #059669 100%);
    }
    
    /* ===== HERO SECTION ===== */
    .hero-section {
        background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), 
                    url('{{ asset("assets/images/header.png") }}');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 100px 0;
        text-align: center;
        position: relative;
        margin-top: 0;
    }
    
    .hero-section h1 {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
        font-family: 'Playfair Display', serif;
    }
    
    .hero-section .brand-highlight {
        color: #34D399;
    }
    
    .hero-section .lead {
        font-size: 1.3rem;
        font-weight: 300;
    }
    
    .contact-container {
        background: white;
        border-radius: 20px;
        padding: 50px;
        margin: 40px 0;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        border-top: 5px solid var(--primary);
    }
    
    .contact-form {
        padding: 30px;
    }
    
    .form-control, .form-select {
        border: 2px solid #E5E7EB;
        border-radius: 10px;
        padding: 12px;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 0.25rem rgba(16, 185, 129, 0.25);
    }
    
    .contact-info {
        background: var(--gradient-green);
        color: white;
        border-radius: 15px;
        padding: 40px;
        height: 100%;
    }
    
    .info-item {
        display: flex;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid rgba(255,255,255,0.1);
        transition: all 0.3s ease;
    }
    
    .info-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }
    
    .info-item:hover {
        transform: translateX(5px);
    }
    
    .info-icon {
        width: 60px;
        height: 60px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-right: 20px;
        transition: all 0.3s ease;
    }
    
    .info-item:hover .info-icon {
        background: rgba(255,255,255,0.2);
        transform: scale(1.1);
    }
    
    .map-container {
        border-radius: 15px;
        overflow: hidden;
        margin: 40px 0;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    
    .map-container:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }
    
    .team-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        margin-bottom: 30px;
        transition: all 0.3s;
        border: 2px solid transparent;
        height: 100%;
    }
    
    .team-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        border-color: var(--primary);
    }
    
    .team-img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid var(--primary);
        margin: 0 auto 20px;
        transition: all 0.3s ease;
    }
    
    .team-card:hover .team-img {
        transform: scale(1.05);
    }
    
    .btn-primary {
        background: var(--gradient-green);
        border: none;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s;
    }
    
    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
    }
    
    .stats-section {
        background: white;
        padding: 60px 0;
        margin: 40px 0;
        border-radius: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .stat-number {
        font-size: 3rem;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 10px;
    }
    
    .stat-label {
        font-size: 1.1rem;
        color: var(--dark);
        font-weight: 600;
    }
    
    .testimonial-card {
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        margin-bottom: 20px;
        border-left: 5px solid var(--primary);
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    
    @media (max-width: 768px) {
        .hero-section h1 { 
            font-size: 2.2rem; 
        }
        
        .hero-section .lead {
            font-size: 1.1rem;
        }
        
        .contact-container { 
            padding: 30px 20px; 
        }
        
        .contact-form {
            padding: 15px;
        }
        
        .stat-number { 
            font-size: 2.2rem; 
        }
        
        .stats-section {
            padding: 40px 20px;
        }
        
        .team-card {
            margin-bottom: 20px;
        }
        
        .info-item {
            flex-direction: column;
            text-align: center;
        }
        
        .info-icon {
            margin-right: 0;
            margin-bottom: 15px;
        }
        
        .map-container iframe {
            height: 300px;
        }
    }
</style>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <h1 class="mb-3">
            <span class="brand-highlight">Contact Zawjahaa</span>
        </h1>
        <p class="lead mb-4">Pakistan's Most Trusted Marriage Bureau Since 2010</p>
        <p class="mb-0">Connecting Hearts, Uniting Families, Creating Lifelong Bonds</p>
    </div>
</div>

<!-- Main Content -->
<div class="container py-5">
    <!-- Stats Section -->
    <div class="stats-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3 col-6">
                    <div class="stat-item text-center">
                        <div class="stat-number">5,000+</div>
                        <div class="stat-label">Happy Marriages</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item text-center">
                        <div class="stat-number">25,000+</div>
                        <div class="stat-label">Active Members</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item text-center">
                        <div class="stat-number">35+</div>
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

    <!-- Contact Container -->
    <div class="contact-container">
        <div class="row g-4">
            <!-- Contact Form -->
            <div class="col-lg-8">
                <div class="contact-form">
                    <h3 class="mb-4" style="color: var(--primary);">Register Your Profile</h3>
                    <p class="text-muted mb-4">Fill this form and our matchmaker will contact you within 24 hours</p>
                    
                    <form id="contactForm" method="POST" action="{{ route('contact.submit') }}">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Full Name *</label>
                                    <input type="text" name="full_name" class="form-control" placeholder="Enter your full name" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Phone Number *</label>
                                    <input type="tel" name="phone" class="form-control" placeholder="+92 XXX XXXXXXX" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Email Address *</label>
                            <input type="email" name="email" class="form-control" placeholder="your@email.com" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">I'm Looking For</label>
                                    <select name="looking_for" class="form-select">
                                        <option value="">Select</option>
                                        <option value="Groom (Male)">Groom (Male)</option>
                                        <option value="Bride (Female)">Bride (Female)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Age</label>
                                    <input type="number" name="age" class="form-control" placeholder="Your age" min="18" max="70">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">City / Country</label>
                            <input type="text" name="location" class="form-control" placeholder="e.g., Lahore, Pakistan">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Education / Profession</label>
                            <input type="text" name="profession" class="form-control" placeholder="e.g., Doctor, Engineer, Business">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">I'm interested in</label>
                            <select name="service" class="form-select">
                                <option value="">Select Service</option>
                                <option value="Personal Matchmaking">Personal Matchmaking</option>
                                <option value="International Matchmaking">International Matchmaking</option>
                                <option value="Family Mediation">Family Mediation</option>
                                <option value="Background Verification">Background Verification</option>
                                <option value="Wedding Planning">Wedding Planning</option>
                                <option value="VIP Concierge Service">VIP Concierge Service</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Additional Information / Requirements</label>
                            <textarea name="message" class="form-control" rows="4"
                                placeholder="Tell us about your preferences, family background, or any specific requirements..."></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-5 py-3">
                                <i class="fas fa-heart me-2"></i> Request Matchmaking
                            </button>
                        </div>

                        <p class="text-muted text-center mt-3 small">
                            <i class="fas fa-lock me-1"></i> Your information is 100% confidential and secure
                        </p>
                    </form>
                </div>
            </div>
            
            <!-- Contact Information -->
               <div class="col-lg-4">
    <div class="contact-info">
        <h3 class="mb-4">Zawjahaa</h3>
        <p class="mb-4">Pakistan's Premier Matchmaking Service</p>
        
        <!-- About Zawjahaa -->
        <div class="bg-white bg-opacity-10 p-3 rounded-3 mb-4">
            <h5><i class="fas fa-heart me-2 text-danger"></i>About Us</h5>
            <p class="small mb-0">
                Zawjahaa is Pakistan's most trusted matrimonial platform, helping thousands of Muslims find their perfect life partners since 2010.
            </p>
        </div>
        
        <!-- Email -->
        <div class="d-flex gap-3 mb-3 p-2 rounded-3">
            <div class="bg-warning bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                <i class="fas fa-envelope text-warning"></i>
            </div>
            <div>
                <h5 class="mb-1">Email</h5>
                <p class="mb-0">
                    <a href="mailto:info@zawjahaa.com" class="text-white text-decoration-none">
                        info@zawjahaa.com
                    </a>
                </p>
               
            </div>
        </div>
        
        <!-- Phone -->
        <div class="d-flex gap-3 mb-3 p-2 rounded-3">
            <div class="bg-warning bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                <i class="fas fa-phone-alt text-warning"></i>
            </div>
            <div>
                <h5 class="mb-1">Phone</h5>
                <p class="mb-0">
                    <a href="tel:+924211111111" class="text-white text-decoration-none">
                        +92 42 111 111 111
                    </a>
                </p>
                <small class="text-white-50"></small>
            </div>
        </div>
        
        <!-- Address -->
        <div class="d-flex gap-3 mb-3 p-2 rounded-3">
            <div class="bg-warning bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                <i class="fas fa-map-marker-alt text-warning"></i>
            </div>
            <div>
                <h5 class="mb-1">Head Office</h5>
                <p class="mb-0">Pakistan, Lahore</p>
                <small class="text-white-50"></small>
                <div class="mt-2">
                    <span class="badge bg-light text-dark me-1">Karachi</span>
                    <span class="badge bg-light text-dark">Islamabad</span>
                </div>
            </div>
        </div>
        
        <!-- Working Hours -->
        <div class="d-flex gap-3 mb-3 p-2 rounded-3">
            <div class="bg-warning bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                <i class="fas fa-clock text-warning"></i>
            </div>
            <div>
                <h5 class="mb-1">Working Hours</h5>
                <p class="mb-0">Mon-Sat: 10AM - 8PM</p>
                <small class="text-white-50">Sunday: 12PM - 6PM</small>
                <p class="mb-0 mt-2 small text-warning">
                    <i class="fas fa-headset me-1"></i>24/7 Email Support
                </p>
            </div>
        </div>
        
        <!-- Stats -->
        <div class="row mt-4 g-2">
            <div class="col-4">
                <div class="bg-white bg-opacity-10 p-2 rounded-3 text-center">
                    <h4 class="mb-0 text-warning">50K+</h4>
                    <small class="text-white-50">Couples</small>
                </div>
            </div>
            <div class="col-4">
                <div class="bg-white bg-opacity-10 p-2 rounded-3 text-center">
                    <h4 class="mb-0 text-warning">100K+</h4>
                    <small class="text-white-50">Profiles</small>
                </div>
            </div>
            <div class="col-4">
                <div class="bg-white bg-opacity-10 p-2 rounded-3 text-center">
                    <h4 class="mb-0 text-warning">15+</h4>
                    <small class="text-white-50">Years</small>
                </div>
            </div>
        </div>
        
        <!-- Verified Badge -->
        <div class="mt-4 text-center p-3 bg-success bg-opacity-25 rounded-3">
            <i class="fas fa-shield-alt fa-2x mb-2"></i>
            <p class="small mb-0">
                <strong>✓ Verified since 2010</strong><br>
                <span class="text-white-50 small">SECP Registered</span>
            </p>
        </div>
        
        <!-- Footer Links -->
        <div class="mt-3 text-center">
            <a href="{{ route('privacy.policy') }}" class="text-white-50 text-decoration-none small me-2">Privacy</a>
            <span class="text-white-50">|</span>
            <a href="{{ route('terms.service') }}" class="text-white-50 text-decoration-none small ms-2">Terms</a>
            <span class="text-white-50 mx-2">|</span>
            <a href="{{ route('faq') }}" class="text-white-50 text-decoration-none small">FAQs</a>
        </div>
    </div>
</div>
        </div>
    </div>
    
    <!-- Success Stories / Testimonials -->
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="text-center mb-5" style="color: var(--primary);">Success Stories from Happy Couples</h3>
        </div>
        <div class="col-md-6 mb-4">
            <div class="testimonial-card">
                <i class="fas fa-quote-right fa-2x text-success opacity-50 mb-2"></i>
                <p class="mb-3">"After 2 years of searching, Zawjahaa found me my perfect match within just 3 weeks. Their team understood exactly what my family was looking for. Forever grateful!"</p>
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0 fw-bold">Aisha & Bilal</h6>
                        <small class="text-muted">Married 2024 | Lahore</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="testimonial-card">
                <i class="fas fa-quote-right fa-2x text-success opacity-50 mb-2"></i>
                <p class="mb-3">"Living in London, I was worried about finding someone with similar values. Zawjahaa's international matchmaking service connected me with my wife from Karachi. Truly amazing service!"</p>
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0 fw-bold">Dr. Usman & Sara</h6>
                        <small class="text-muted">Married 2023 | London</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Map -->
    <div class="map-container mt-5">
        <h4 class="mb-4" style="color: var(--primary);">Visit Our Lahore Office</h4>
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13606.230303429896!2d74.32987512414417!3d31.481633860768056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391903d4d940f12b%3A0xdb8c83fa1f2d7f5a!2sGulberg%2C%20Lahore%2C%20Punjab%2C%20Pakistan!5e0!3m2!1sen!2s!4v1692281234567!5m2!1sen!2s" 
            width="100%" 
            height="400" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy">
        </iframe>
    </div>
    
    <!-- Team Section -->
    <div class="mt-5">
        <h3 class="text-center mb-5" style="color: var(--primary);">Meet Our Expert Matchmakers</h3>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="team-card">
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Sarah Ahmed" class="team-img">
                    <h5 class="fw-bold">Sarah Ahmed</h5>
                    <p class="text-muted mb-2">Senior Matchmaker</p>
                    <p class="mb-3">15+ years experience | 500+ successful marriages</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-card">
                    <img src="https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Ali Raza" class="team-img">
                    <h5 class="fw-bold">Ali Raza</h5>
                    <p class="text-muted mb-2">International Matchmaker</p>
                    <p class="mb-3">Specialist in UK, USA, UAE matches | 10+ years</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-card">
                   <img src="{{ asset('assets/images/young2.jpg') }}" alt="Fatima Khan" class="team-img">

                    <h5 class="fw-bold">Fatima Khan</h5>
                    <p class="text-muted mb-2">Family Counselor</p>
                    <p class="mb-3">Family mediation, pre-marriage counseling | 12+ years</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Trust Badges -->
    <div class="row mt-5 pt-3">
        <div class="col-12">
            <div class="bg-light p-5 rounded-4 text-center">
                <div class="row align-items-center">
                    <div class="col-md-8 text-md-start">
                        <h4 style="color: var(--primary);">Why Choose Zawjahaa?</h4>
                        <p class="mb-md-0">15+ years of trusted matchmaking • 5,000+ successful marriages • 35+ countries served</p>
                    </div>
                    <div class="col-md-4 text-md-end mt-3 mt-md-0">
                        <i class="fas fa-shield-heart fa-4x text-success opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // ===== PAGE LOADER =====
    window.addEventListener("load", function() {
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
    
    // ===== CONTACT FORM - ENHANCED AJAX =====
    document.addEventListener('DOMContentLoaded', function() {
        const contactForm = document.getElementById('contactForm');
        
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                const formData = new FormData(this);
                
                // Basic validation
                let isValid = true;
                const requiredFields = this.querySelectorAll('[required]');
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        field.classList.add('is-invalid');
                        isValid = false;
                    } else {
                        field.classList.remove('is-invalid');
                    }
                });
                
                if (!isValid) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Please fill all required fields',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    return;
                }
                
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Submitting...';
                submitBtn.disabled = true;
                
                fetch(this.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        // Remove old alert
                        const oldAlert = document.querySelector('.alert-success');
                        if (oldAlert) oldAlert.remove();
                        
                        // Show success message
                        const successHTML = `
                            <div class="alert alert-success text-center mt-3" role="alert" style="animation: slideIn 0.5s ease;">
                                <i class="fas fa-check-circle fa-3x mb-3" style="color: var(--primary);"></i>
                                <h4>Request Received!</h4>
                                <p>Thank you for choosing Zawjahaa. One of our expert matchmakers will contact you within 24 hours.</p>
                                <p class="mb-0"><strong>JazakAllah!</strong></p>
                            </div>
                        `;
                        
                        contactForm.insertAdjacentHTML('beforebegin', successHTML);
                        contactForm.reset();
                        
                        // Smooth scroll to message
                        window.scrollTo({
                            top: contactForm.offsetTop - 100,
                            behavior: 'smooth'
                        });
                        
                        // Optional: Show SweetAlert as well
                        Swal.fire({
                            icon: 'success',
                            title: 'Request Received!',
                            text: 'Our matchmaker will contact you within 24 hours.',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        
                        console.log('User ID saved:', data.user_id_saved);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    
                    Swal.fire({
                        icon: 'error',
                        title: 'Something went wrong!',
                        text: 'Please try again or contact support.',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                })
                .finally(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                });
            });
            
            // Real-time validation
            const inputs = contactForm.querySelectorAll('input, select, textarea');
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (this.hasAttribute('required') && this.value.trim()) {
                        this.classList.remove('is-invalid');
                    }
                });
            });
        }
    });
</script>

<!-- Add this to your head section if needed -->
<style>
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .is-invalid {
        border-color: #dc3545 !important;
    }
    
    .is-invalid:focus {
        box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25) !important;
    }
</style>
@endsection