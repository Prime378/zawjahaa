@extends('layouts.app')

@section('title', 'Personal Matchmaking | Zawjahaa – 1-on-1 since 2010')

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
    }
    
    .info-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
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
    
    .map-container {
        border-radius: 15px;
        overflow: hidden;
        margin: 40px 0;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .feature-badge {
        position: absolute;
        top: -10px;
        right: 20px;
        background: var(--primary);
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
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
    }
</style>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <h1 class="mb-3">
            <span class="brand-highlight">Personal Matchmaking</span>
        </h1>
        <p class="lead mb-4">Your Personal Matchmaking Partner Since 2010</p>
        <p class="mb-0">One-on-one attention, family values, and handcrafted rishtas</p>
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
                        <div class="stat-label">Personally Matched</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item text-center">
                        <div class="stat-number">25,000+</div>
                        <div class="stat-label">1-on-1 Members</div>
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
                        <div class="stat-label">Years Personal Touch</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Container - Personal Matchmaking Form -->
    <div class="contact-container position-relative">
        <div class="feature-badge">Limited Slots Available</div>
        <div class="row g-4">
            <!-- Personal Matchmaking Form -->
            <div class="col-lg-8">
                <div class="contact-form">
                    <h3 class="mb-4" style="color: var(--primary);">Start Your Personal Matchmaking Journey</h3>
                    <p class="text-muted mb-4">Tell us about yourself. A dedicated matchmaker will understand your family, values & preferences.</p>
                    
                    <form id="contactForm" method="POST" action="{{ route('contact.submit') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Full Name *</label>
                                    <input type="text" name="full_name" class="form-control" placeholder="e.g. Muhammad Ali" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Phone / WhatsApp *</label>
                                    <input type="tel" name="phone" class="form-control" placeholder="+92 300 1234567" required>
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
                                    <label class="form-label fw-bold">I'm a *</label>
                                    <select name="looking_for" class="form-select" required>
                                        <option value="">Select</option>
                                        <option value="Groom (looking for bride)">Groom (looking for bride)</option>
                                        <option value="Bride (looking for groom)">Bride (looking for groom)</option>
                                        <option value="Parent / Guardian">Parent / Guardian</option>
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
                            <label class="form-label fw-bold">Personal matchmaking service</label>
                            <select name="service" class="form-select">
                                <option value="">Select Service</option>
                                <option value="Exclusive 1-on-1 matchmaking">Exclusive 1-on-1 matchmaking</option>
                                <option value="Family‑led introduction">Family‑led introduction</option>
                                <option value="Confidential premium search">Confidential premium search</option>
                                <option value="Widow / divorcee support">Widow / divorcee support</option>
                                <option value="Parents‑only consultation">Parents‑only consultation</option>
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold">Specific requirements / preferences</label>
                            <textarea name="message" class="form-control" rows="4" placeholder="Deen, lifestyle, family background, any deal‑breakers..."></textarea>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-5 py-3">
                                <i class="fas fa-hand-holding-heart me-2"></i> Request Personal Matchmaker
                            </button>
                        </div>
                        <p class="text-muted text-center mt-3 small">
                            <i class="fas fa-lock me-1"></i> 100% confidential – only your dedicated matchmaker sees this
                        </p>
                    </form>
                </div>
            </div>
            
            <!-- Contact Information -->
            <div class="col-lg-4">
                <div class="contact-info">
                    <h3 class="mb-4">Zawjahaa</h3>
                    <p class="mb-4">Your dedicated personal matchmaking team</p>
                    
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div>
                            <h5>Your personal expert</h5>
                            <p class="mb-0">Fatima / Ali (by assignment)</p>
                            <p class="mb-0">
                                <a href="mailto:personal@zawjahaa.pk" class="text-white text-decoration-none">
                                    personal@zawjahaa.pk
                                </a>
                            </p>
                            <small>reply within 4 hours</small>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>
                            <h5>Matchmaking helpline</h5>
                            <p class="mb-0">
                                <a href="tel:+923176065004" class="text-white text-decoration-none">
                                    +92 317 6065004
                                </a>
                            </p>
                            <p class="mb-0">(10am – 8pm, Mon‑Sat)</p>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h5>Personal meeting lounge</h5>
                            <p class="mb-0">24 Main Boulevard, Gulberg III</p>
                            <p class="mb-0">Lahore, Pakistan (by appointment)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Success Stories / Testimonials -->
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="text-center mb-5" style="color: var(--primary);">Success Stories – Personal Matchmaking</h3>
        </div>
        <div class="col-md-6 mb-4">
            <div class="testimonial-card">
                <i class="fas fa-quote-right fa-2x text-success opacity-50 mb-2"></i>
                <p class="mb-3">"After two years of searching, Zawjahaa's personal matchmaker truly listened to my family's values. Within weeks, they introduced us to the perfect match. It felt like family."</p>
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
                <p class="mb-3">"Living in London, I worried about finding someone with similar values. Their personal matchmaker understood my background and connected me with my wife from Karachi. Incredible care."</p>
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
        <h4 class="mb-4" style="color: var(--primary);">Visit Our Personal Matchmaking Lounge</h4>
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
        <h3 class="text-center mb-5" style="color: var(--primary);">Your Personal Matchmaking Team</h3>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="team-card">
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Sarah Ahmed" class="team-img">
                    <h5 class="fw-bold">Sarah Ahmed</h5>
                    <p class="text-muted mb-2">Lead Personal Matchmaker</p>
                    <p class="mb-3">15+ years one‑on‑one rishta experience, 500+ personally matched.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-card">
                    <img src="https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Ali Raza" class="team-img">
                    <h5 class="fw-bold">Ali Raza</h5>
                    <p class="text-muted mb-2">Personal Matchmaker (diaspora)</p>
                    <p class="mb-3">Specialist in UK, USA, UAE – handles every case personally.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-card">
                    <img src="https://images.unsplash.com/photo-1551836026-d5c2c3af8d88?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Fatima Khan" class="team-img">
                    <h5 class="fw-bold">Fatima Khan</h5>
                    <p class="text-muted mb-2">Personal & Family Counsellor</p>
                    <p class="mb-3">Family mediation, pre‑marriage guidance, personal support.</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Trust Badges -->
    <div class="row mt-5 pt-3">
        <div class="col-12">
            <div class="bg-light p-5 rounded-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 style="color: var(--primary);">Why Choose Personal Matchmaking?</h4>
                        <p class="mb-md-0">Because your rishta deserves individual attention, not algorithms. Every profile is reviewed by a real person who understands your family's unique needs.</p>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <i class="fas fa-hand-holding-heart fa-4x text-success opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Page Loader
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

    // Personal Matchmaking Form - AJAX Submission
    document.addEventListener('DOMContentLoaded', function() {
        const contactForm = document.getElementById('contactForm');
        
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                const formData = new FormData(this);
                
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Contacting your matchmaker...';
                submitBtn.disabled = true;
                
                // AJAX request
                fetch(this.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Remove old alert
                        const oldAlert = document.querySelector('.alert-success');
                        if (oldAlert) oldAlert.remove();
                        
                        // Show success message
                        const successHTML = `
                            <div class="alert alert-success text-center mt-3">
                                <i class="fas fa-check-circle fa-3x mb-3" style="color: var(--primary);"></i>
                                <h4>Personal Request Received!</h4>
                                <p>Thank you for trusting Zawjahaa. Your dedicated matchmaker will contact you within 24 hours.</p>
                                <p class="mb-0"><strong>JazakAllah!</strong></p>
                            </div>
                        `;
                        
                        contactForm.insertAdjacentHTML('beforebegin', successHTML);
                        contactForm.reset();
                        
                        // Scroll to success message
                        window.scrollTo({
                            top: contactForm.offsetTop - 100,
                            behavior: 'smooth'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    
                    // Show error message
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
        }
    });
</script>
@endsection