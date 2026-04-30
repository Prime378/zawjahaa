@extends('layouts.app')

@section('title', 'Wedding Planning | Zawjahaa – Since 2010')

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
        --blush: #FFE5E5;
        --gold: #D4AF37;
    }
    
    /* ===== HERO SECTION ===== */
    .hero-section {
        background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), 
                    url('https://images.unsplash.com/photo-1519741497674-611481863552?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
        background-size: cover;
        background-position: center 30%;
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
        color: #10B981;
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
    
    /* Wedding specific styles */
    .wedding-card {
        background: #F0FDF4;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.05);
        border: 1px solid rgba(16, 185, 129, 0.15);
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .wedding-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(16, 185, 129, 0.15);
        border-color: rgba(16, 185, 129, 0.3);
    }
    
    .service-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #10B98120, #05966910);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 2.2rem;
        color: var(--primary);
        border: 2px solid var(--primary);
        transition: all 0.3s ease;
    }
    
    .wedding-card:hover .service-icon {
        background: var(--primary);
        color: white;
    }
    
    .process-circle {
        background: #F0FDF4;
        border: 2px solid var(--primary);
        border-radius: 50%;
        width: 80px;
        height: 80px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
    }
    
    .process-circle:hover {
        background: var(--primary);
        border-color: white;
    }
    
    .process-circle:hover span {
        color: white;
    }
    
    .process-circle span {
        color: var(--primary);
        font-weight: 800;
        font-size: 2rem;
        transition: all 0.3s ease;
    }
    
    .destination-card {
        background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), 
                    url('https://images.unsplash.com/photo-1469371670807-013ccf25f16a?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
        background-size: cover;
        background-position: center;
        border-radius: 20px;
        min-height: 350px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 40px 0;
        transition: all 0.3s ease;
    }
    
    .destination-card:hover {
        transform: scale(1.02);
        box-shadow: 0 20px 40px rgba(0,0,0,0.2);
    }
    
    .btn-outline-primary-custom {
        border: 2px solid var(--primary);
        color: var(--primary);
        border-radius: 50px;
        padding: 12px 30px;
        font-weight: 600;
        background: transparent;
        transition: all 0.3s;
        display: inline-block;
        text-decoration: none;
    }
    
    .btn-outline-primary-custom:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.2);
        text-decoration: none;
    }
    
    .divider-primary {
        width: 80px;
        height: 3px;
        background: var(--primary);
        margin: 20px auto;
    }
    
    .feature-list {
        list-style: none;
        padding: 0;
    }
    
    .feature-list li {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        font-size: 1.1rem;
    }
    
    .feature-list i {
        color: var(--primary);
        font-size: 1.3rem;
        margin-right: 15px;
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
        
        .process-circle {
            width: 60px;
            height: 60px;
        }
        
        .process-circle span {
            font-size: 1.5rem;
        }
        
        .destination-card {
            min-height: 250px;
        }
        
        .btn-primary, .btn-outline-primary-custom {
            width: 100%;
            margin: 5px 0;
        }
    }
</style>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <h1 class="mb-3">
            <span class="brand-highlight">Wedding Planning</span>
        </h1>
        <p class="lead mb-4">Crafting your perfect day, with grace and every detail imagined.</p>
        <p class="mb-0">Bespoke celebrations • Stress-free coordination • Since 2010</p>
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
                        <div class="stat-number">450+</div>
                        <div class="stat-label">Weddings Planned</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item text-center">
                        <div class="stat-number">100%</div>
                        <div class="stat-label">Stress-Free*</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item text-center">
                        <div class="stat-number">30+</div>
                        <div class="stat-label">Vendors Network</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item text-center">
                        <div class="stat-number">15+</div>
                        <div class="stat-label">Years of Excellence</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- INTRO Section -->
    <div class="contact-container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h3 class="mb-4" style="color: var(--primary); font-weight: 700;">Your dream, flawlessly executed</h3>
                <p class="lead">At Zawjahaa, we believe a wedding is not just an event—it's the beginning of a legacy. Our wedding planning service is designed to reflect your unique story, culture, and personality.</p>
                <p>From intimate gatherings to grand celebrations, our team manages every detail with precision, creativity, and heart. You enjoy every moment, we handle the rest.</p>
                <div class="divider-primary"></div>
                <div class="mt-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-check-circle text-success fs-4 me-3"></i>
                        <span>Bespoke design & themes</span>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-check-circle text-success fs-4 me-3"></i>
                        <span>Vendor negotiation & management</span>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-check-circle text-success fs-4 me-3"></i>
                        <span>Guest list & invitation coordination</span>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-check-circle text-success fs-4 me-3"></i>
                        <span>On-the-day coordination</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Wedding planning" class="img-fluid rounded-4 shadow w-100">
            </div>
        </div>
    </div>

    <!-- SERVICES GRID -->
    <div class="row my-5">
        <div class="col-12 text-center mb-5">
            <h3 style="color: var(--primary);">Complete Wedding Planning Services</h3>
            <p class="lead">Every detail, thoughtfully curated</p>
            <div class="divider-primary"></div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="wedding-card text-center">
                <div class="service-icon">
                    <i class="fas fa-rings"></i>
                </div>
                <h4 class="fw-bold">Full Planning</h4>
                <p class="text-muted">From venue selection to the final dance — we handle everything. Perfect for busy couples.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="wedding-card text-center">
                <div class="service-icon">
                    <i class="fas fa-paint-brush"></i>
                </div>
                <h4 class="fw-bold">Design & Styling</h4>
                <p class="text-muted">Theme creation, decor, lighting, and floral design that brings your vision to life.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="wedding-card text-center">
                <div class="service-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <h4 class="fw-bold">Day-of Coordination</h4>
                <p class="text-muted">Already have vendors? We'll ensure everything runs smoothly on the big day.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="wedding-card text-center">
                <div class="service-icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <h4 class="fw-bold">Catering & Menu</h4>
                <p class="text-muted">Work with top chefs to design a menu that delights your guests.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="wedding-card text-center">
                <div class="service-icon">
                    <i class="fas fa-camera-retro"></i>
                </div>
                <h4 class="fw-bold">Photography & Films</h4>
                <p class="text-muted">Capture emotions with the best wedding photographers and cinematographers.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="wedding-card text-center">
                <div class="service-icon">
                    <i class="fas fa-music"></i>
                </div>
                <h4 class="fw-bold">Entertainment</h4>
                <p class="text-muted">Live bands, DJs, traditional performances — we curate the perfect vibe.</p>
            </div>
        </div>
    </div>

    <!-- PROCESS -->
    <div class="bg-white p-5 rounded-4 shadow-sm my-5">
        <h3 class="text-center mb-5" style="color: var(--primary);">Our Planning Process</h3>
        <div class="row g-4">
            <div class="col-md-3 text-center">
                <div class="process-circle">
                    <span>1</span>
                </div>
                <h5 class="fw-bold mt-3">Discovery</h5>
                <p class="text-muted">We listen to your vision, style, and budget.</p>
            </div>
            <div class="col-md-3 text-center">
                <div class="process-circle">
                    <span>2</span>
                </div>
                <h5 class="fw-bold mt-3">Design</h5>
                <p class="text-muted">Mood boards, vendor shortlist, venue scouting.</p>
            </div>
            <div class="col-md-3 text-center">
                <div class="process-circle">
                    <span>3</span>
                </div>
                <h5 class="fw-bold mt-3">Execution</h5>
                <p class="text-muted">We coordinate everything — you relax.</p>
            </div>
            <div class="col-md-3 text-center">
                <div class="process-circle">
                    <span>4</span>
                </div>
                <h5 class="fw-bold mt-3">Celebration</h5>
                <p class="text-muted">Your flawless wedding day, stress-free.</p>
            </div>
        </div>
    </div>

    <!-- TESTIMONIALS -->
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="text-center mb-5" style="color: var(--primary);">Happily Ever Afters</h3>
        </div>
        <div class="col-md-6 mb-4">
            <div class="testimonial-card">
                <i class="fas fa-quote-right fa-2x text-success opacity-50 mb-2"></i>
                <p class="mb-3">"Zawjahaa turned our vision into reality. Every guest complimented the seamless flow and beautiful decor. We didn't worry about a single thing."</p>
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0 fw-bold">Sara & Usman</h6>
                        <small class="text-muted">Wedding: April 2024, Lahore</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="testimonial-card">
                <i class="fas fa-quote-right fa-2x text-success opacity-50 mb-2"></i>
                <p class="mb-3">"As an overseas couple, planning a wedding in Pakistan seemed daunting. The Zawjahaa team managed everything virtually and onsite — outstanding coordination!"</p>
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0 fw-bold">Fatima & Ali</h6>
                        <small class="text-muted">UK-based, Wedding Dec 2023</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DESTINATION WEDDING -->
    <div class="destination-card">
        <div class="text-center text-white p-4" style="background: rgba(0,0,0,0.4); border-radius: 20px;">
            <h3 style="color: #10B981;">Destination Weddings</h3>
            <p class="lead">We plan weddings across Pakistan and worldwide — from the valleys of Hunza to the beaches of Thailand.</p>
            <a href="#" class="btn btn-primary btn-lg mt-2">Explore Destinations</a>
        </div>
    </div>

    <!-- TEAM -->
    <div class="mt-5">
        <h3 class="text-center mb-5" style="color: var(--primary);">Meet Your Wedding Planners</h3>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="team-card">
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Zara Tariq" class="team-img">
                    <h5 class="fw-bold">Zara Tariq</h5>
                    <p class="text-muted mb-2">Lead Wedding Designer</p>
                    <p class="mb-3">10+ years creating ethereal wedding designs with a contemporary touch.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-card">
                    <img src="https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Hassan Shah" class="team-img">
                    <h5 class="fw-bold">Hassan Shah</h5>
                    <p class="text-muted mb-2">Operations & Vendor Manager</p>
                    <p class="mb-3">Ensures every logistical detail is flawless, from catering to transportation.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-card">
                    <img src="https://images.unsplash.com/photo-1551836026-d5c2c3af8d88?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Maria Khan" class="team-img">
                    <h5 class="fw-bold">Maria Khan</h5>
                    <p class="text-muted mb-2">Guest Experience & Coordination</p>
                    <p class="mb-3">Specializes in guest journeys and on-the-day seamless flow.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- FINAL CTA -->
    <div class="text-center mt-5 p-5 bg-white rounded-4 shadow-sm">
        <h4 style="color: var(--primary);">Let's start planning your dream wedding</h4>
        <p class="lead">No obligation consultation — we'd love to hear your ideas.</p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="#" class="btn btn-primary btn-lg"><i class="fas fa-calendar-alt me-2"></i>Book a call</a>
            <a href="mailto:weddings@zawjahaa.com" class="btn-outline-primary-custom btn-lg"><i class="fas fa-envelope me-2"></i>weddings@zawjahaa.com</a>
        </div>
        <p class="text-muted small mt-3">
            <i class="fas fa-heart me-1 text-danger"></i> Your story deserves the perfect beginning.
        </p>
    </div>
</div>

<script>
    // Page loader
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
</script>
@endsection