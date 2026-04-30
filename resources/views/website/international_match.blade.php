@extends('layouts.app')

@section('title', 'International Rishta | Zawjahaa – Global Matchmaking Since 2010')

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
    
    .btn-outline-success {
        border: 2px solid var(--primary);
        color: var(--primary);
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s;
    }
    
    .btn-outline-success:hover {
        background: var(--gradient-green);
        border-color: transparent;
        color: white;
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
    }
    
    .country-card {
        background: #f8f9fa;
        border-radius: 15px;
        padding: 30px 20px;
        text-align: center;
        height: 100%;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }
    
    .country-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        border-color: var(--primary);
        background: white;
    }
    
    .country-card i {
        font-size: 3rem;
        color: var(--primary);
        margin-bottom: 20px;
    }
    
    .country-card h5 {
        font-weight: 700;
        margin-bottom: 15px;
        color: var(--dark);
    }
    
    .country-card p {
        color: #6b7280;
        font-size: 0.9rem;
        margin-bottom: 0;
    }
    
    .map-container {
        border-radius: 15px;
        overflow: hidden;
        margin: 40px 0;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .global-contact-box {
        background: var(--gradient-green);
        color: white;
        padding: 30px;
        border-radius: 15px;
        margin-top: 30px;
    }
    
    .global-contact-box a {
        color: white;
        text-decoration: none;
        font-weight: 600;
    }
    
    .global-contact-box a:hover {
        text-decoration: underline;
    }
    
    .flag-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 10px;
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
        
        .stat-number { 
            font-size: 2.2rem; 
        }
        
        .stats-section {
            padding: 40px 20px;
        }
        
        .team-card {
            margin-bottom: 20px;
        }
        
        .country-card {
            margin-bottom: 15px;
        }
    }
</style>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <h1 class="mb-3">
            <span class="brand-highlight">International Rishta</span>
        </h1>
        <p class="lead mb-4">Zawjahaa – connecting overseas Pakistanis since 2010</p>
        <p class="mb-0">Serving UK, USA, Canada, UAE, Australia & 35+ countries</p>
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
                        <div class="stat-number">4,500+</div>
                        <div class="stat-label">Cross‑border Nikkahs</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item text-center">
                        <div class="stat-number">20,000+</div>
                        <div class="stat-label">Diaspora Members</div>
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
                        <div class="stat-label">Years Global</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- International Info Section -->
    <div class="contact-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h3 class="mb-4" style="color: var(--primary);">Your International Rishta Partner</h3>
                    <p class="lead mb-4">We personally introduce you to compatible families in your country of residence or back home. Our team understands the nuances of cross-border rishta: visa, time zones, and cultural adaptation.</p>
                    
                    <div class="row mt-5">
                        <div class="col-md-4 mb-4">
                            <div class="country-card">
                                <i class="fas fa-plane"></i>
                                <h5>UK & Europe</h5>
                                <p>London, Manchester, Birmingham, Paris – strong network of professionals.</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="country-card">
                                <i class="fas fa-globe-americas"></i>
                                <h5>USA & Canada</h5>
                                <p>From New York to Toronto, we connect you with like-minded Pakistanis.</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="country-card">
                                <i class="fas fa-umbrella-beach"></i>
                                <h5>UAE / Middle East</h5>
                                <p>Dubai, Abu Dhabi, Riyadh – expat community rishta specialists.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="global-contact-box mt-4">
                        <p class="mb-3">
                            <i class="fas fa-phone-alt me-2"></i> WhatsApp us: 
                            <a href="https://wa.me/923176065004" target="_blank">+92 317 6065004</a> 
                            |  
                            <i class="fas fa-envelope me-2"></i> 
                            <a href="mailto:global@zawjahaa.com">global@zawjahaa.com</a>
                        </p>
                        <p class="text-white-50 small mb-0">
                            <i class="fas fa-lock me-1"></i> No form needed – just reach out. We'll schedule a confidential call.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Stories / Testimonials -->
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="text-center mb-5" style="color: var(--primary);">Global Rishta Successes</h3>
        </div>
        <div class="col-md-6 mb-4">
            <div class="testimonial-card h-100">
                <i class="fas fa-quote-right fa-2x text-success opacity-50 mb-2"></i>
                <p class="mb-3">"I was in New Jersey, my family in Lahore. Zawjahaa found a wonderful girl also in the US, just three hours away. They handled everything with such professionalism and care."</p>
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0 fw-bold">Haris & Aiman</h6>
                        <small class="text-muted">USA – USA | Married 2024</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="testimonial-card h-100">
                <i class="fas fa-quote-right fa-2x text-success opacity-50 mb-2"></i>
                <p class="mb-3">"From Manchester to Islamabad – they made the distance feel small. Regular video calls, family involvement, and finally our nikkah. Truly international service."</p>
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0 fw-bold">Zainab & Usman</h6>
                        <small class="text-muted">UK – Pakistan | Married 2023</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Map -->
    <div class="map-container mt-5">
        <h4 class="mb-4" style="color: var(--primary);">Our Global HQ – Lahore, Pakistan</h4>
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
        <h3 class="text-center mb-5" style="color: var(--primary);">Meet Your International Rishta Team</h3>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="team-card">
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Sarah Ahmed" class="team-img">
                    <h5 class="fw-bold">Sarah Ahmed</h5>
                    <p class="text-muted mb-2">Head of Global Matchmaking</p>
                    <p class="mb-3">15+ years connecting Pakistanis in UK, Europe & beyond</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-card">
                    <img src="https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Ali Raza" class="team-img">
                    <h5 class="fw-bold">Ali Raza</h5>
                    <p class="text-muted mb-2">North America & GCC Specialist</p>
                    <p class="mb-3">10+ years handling USA, Canada, UAE rishta with care</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-card">
                    <img src="https://images.unsplash.com/photo-1551836026-d5c2c3af8d88?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Fatima Khan" class="team-img">
                    <h5 class="fw-bold">Fatima Khan</h5>
                    <p class="text-muted mb-2">Cross‑Cultural Family Counselor</p>
                    <p class="mb-3">Expert in diaspora family mediation & long‑distance rishta</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Global Reach Section -->
    <div class="row mt-5 pt-3">
        <div class="col-12">
            <div class="bg-light p-5 rounded-4 text-center">
                <i class="fas fa-globe fa-4x text-success mb-4"></i>
                <h4 style="color: var(--primary);">We Speak Your Language, Wherever You Are</h4>
                <p class="lead mb-4">With trusted partners and representatives across the globe, we make international rishta simple and transparent.</p>
                <!--<div class="d-flex justify-content-center flex-wrap gap-3">-->
                <!--    <span class="badge bg-success bg-opacity-10 text-success p-3"><i class="fas fa-check-circle me-2"></i>UK</span>-->
                <!--    <span class="badge bg-success bg-opacity-10 text-success p-3"><i class="fas fa-check-circle me-2"></i>USA</span>-->
                <!--    <span class="badge bg-success bg-opacity-10 text-success p-3"><i class="fas fa-check-circle me-2"></i>Canada</span>-->
                <!--    <span class="badge bg-success bg-opacity-10 text-success p-3"><i class="fas fa-check-circle me-2"></i>UAE</span>-->
                <!--    <span class="badge bg-success bg-opacity-10 text-success p-3"><i class="fas fa-check-circle me-2"></i>Australia</span>-->
                <!--    <span class="badge bg-success bg-opacity-10 text-success p-3"><i class="fas fa-check-circle me-2"></i>Germany</span>-->
                <!--    <span class="badge bg-success bg-opacity-10 text-success p-3"><i class="fas fa-check-circle me-2"></i>Norway</span>-->
                <!--</div>-->
            </div>
        </div>
    </div>
</div>

<script>
    // Page loader script (if needed)
    document.addEventListener("DOMContentLoaded", function() {
        console.log("International Rishta page loaded");
    });
</script>
@endsection