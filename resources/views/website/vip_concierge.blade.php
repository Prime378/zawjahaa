@extends('layouts.app')

@section('title', 'VIP Concierge | Zawjahaa – Since 2010')

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
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                    url('https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
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
    
    /* VIP specific styles */
    .vip-card {
        background: #FFFFFF;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        border: 1px solid rgba(16, 185, 129, 0.15);
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .vip-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 45px rgba(16, 185, 129, 0.15);
        border-color: rgba(16, 185, 129, 0.3);
    }
    
    .vip-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(145deg, #F0FDF4, #FFFFFF);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 2.5rem;
        color: var(--primary);
        border: 2px solid var(--primary);
        transition: all 0.3s ease;
    }
    
    .vip-card:hover .vip-icon {
        background: var(--primary);
        color: white;
    }
    
    .concierge-hero {
        font-family: 'Playfair Display', serif;
        letter-spacing: 1px;
    }
    
    .divider-primary {
        width: 80px;
        height: 3px;
        background: var(--primary);
        margin: 20px auto;
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
    
    .membership-card {
        background: linear-gradient(145deg, #F0FDF4, #FFFFFF);
        border: 2px solid var(--primary);
        border-radius: 30px;
        padding: 50px;
    }
    
    .btn-gold {
        background: var(--primary);
        color: white;
        border-radius: 50px;
        padding: 12px 30px;
        font-weight: 600;
        transition: all 0.3s;
        border: none;
        display: inline-block;
        text-decoration: none;
    }
    
    .btn-gold:hover {
        background: var(--primary-dark);
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
        color: white;
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
    
    .brand-gradient {
        background: var(--gradient-green);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .partner-badge {
        font-size: 1.3rem;
        font-weight: 300;
        color: #777;
        padding: 10px 20px;
        background: #f8f9fa;
        border-radius: 50px;
        transition: all 0.3s ease;
    }
    
    .partner-badge:hover {
        background: var(--primary);
        color: white;
        transform: scale(1.05);
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
        
        .vip-card {
            padding: 20px;
        }
        
        .process-circle {
            width: 60px;
            height: 60px;
        }
        
        .process-circle span {
            font-size: 1.5rem;
        }
        
        .membership-card {
            padding: 30px 20px;
        }
        
        .btn-gold, .btn-outline-primary-custom {
            width: 100%;
            margin: 5px 0;
        }
    }
</style>

<!-- Hero Section - VIP Concierge -->
<div class="hero-section">
    <div class="container">
        <h1 class="mb-3 concierge-hero">
            <span class="brand-highlight">VIP Concierge</span>
        </h1>
        <p class="lead mb-4">Beyond Expectations — Bespoke Services for Discerning Families</p>
        <p class="mb-0">Personalized assistance, exclusive access, and white-glove service since 2010</p>
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
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">Dedicated Support</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item text-center">
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Global Partners</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item text-center">
                        <div class="stat-number">100%</div>
                        <div class="stat-label">Discretion</div>
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

    <!-- INTRO: The VIP Experience -->
    <div class="contact-container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h3 class="mb-4" style="color: var(--primary); font-weight: 700;">The Art of Attentive Service</h3>
                <p class="lead">Zawjahaa VIP Concierge is more than a service — it's a relationship built on trust, anticipation, and flawless execution.</p>
                <p>Whether it's securing a reservation at the world's most exclusive restaurant, arranging private jet travel, or curating a unique family experience, our team handles every request with utmost confidentiality and precision.</p>
                <div class="divider-primary"></div>
                <div class="row mt-4">
                    <div class="col-6">
                        <p><i class="fas fa-check-circle" style="color: var(--primary);"></i> Personal shopper</p>
                        <p><i class="fas fa-check-circle" style="color: var(--primary);"></i> Travel & accommodation</p>
                    </div>
                    <div class="col-6">
                        <p><i class="fas fa-check-circle" style="color: var(--primary);"></i> Event access</p>
                        <p><i class="fas fa-check-circle" style="color: var(--primary);"></i> Gift sourcing</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=2080&q=80" alt="Luxury service" class="img-fluid rounded-4 shadow-lg w-100">
            </div>
        </div>
    </div>

    <!-- SERVICES GRID -->
    <div class="row my-5">
        <div class="col-12 text-center mb-5">
            <h3 style="color: var(--primary);">Tailored Just for You</h3>
            <p class="lead">No request is too extraordinary</p>
            <div class="divider-primary"></div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="vip-card text-center">
                <div class="vip-icon">
                    <i class="fas fa-plane-departure"></i>
                </div>
                <h4 class="fw-bold">Luxury Travel</h4>
                <p class="text-muted">Private jets, yacht charters, villa rentals, and bespoke itineraries worldwide.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="vip-card text-center">
                <div class="vip-icon">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <h4 class="fw-bold">Exclusive Events</h4>
                <p class="text-muted">Front-row seats at fashion weeks, VIP passes to galas, and sold-out concerts.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="vip-card text-center">
                <div class="vip-icon">
                    <i class="fas fa-shopping-bag"></i>
                </div>
                <h4 class="fw-bold">Personal Shopping</h4>
                <p class="text-muted">Curated collections, rare finds, and luxury gifting handled with discretion.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="vip-card text-center">
                <div class="vip-icon">
                    <i class="fas fa-car-side"></i>
                </div>
                <h4 class="fw-bold">Chauffeur & Fleet</h4>
                <p class="text-muted">Rolls Royce, Maybach, or classic cars — professional drivers at your service.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="vip-card text-center">
                <div class="vip-icon">
                    <i class="fas fa-umbrella-beach"></i>
                </div>
                <h4 class="fw-bold">Destination Weddings</h4>
                <p class="text-muted">End-to-end planning for the most exclusive destination celebrations.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="vip-card text-center">
                <div class="vip-icon">
                    <i class="fas fa-concierge-bell"></i>
                </div>
                <h4 class="fw-bold">24/7 Assistance</h4>
                <p class="text-muted">A dedicated concierge available anytime, anywhere, for any request.</p>
            </div>
        </div>
    </div>

    <!-- HOW IT WORKS -->
    <div class="bg-white p-5 rounded-4 shadow-sm my-5">
        <h3 class="text-center mb-5" style="color: var(--primary);">The Concierge Process</h3>
        <div class="row g-4">
            <div class="col-md-3 text-center">
                <div class="process-circle">
                    <span>1</span>
                </div>
                <h5 class="fw-bold mt-3">Enquire</h5>
                <p class="text-muted">Share your request via phone, app, or personal meeting.</p>
            </div>
            <div class="col-md-3 text-center">
                <div class="process-circle">
                    <span>2</span>
                </div>
                <h5 class="fw-bold mt-3">Curate</h5>
                <p class="text-muted">We craft options tailored to your preferences and lifestyle.</p>
            </div>
            <div class="col-md-3 text-center">
                <div class="process-circle">
                    <span>3</span>
                </div>
                <h5 class="fw-bold mt-3">Execute</h5>
                <p class="text-muted">We handle all arrangements with precision and secrecy.</p>
            </div>
            <div class="col-md-3 text-center">
                <div class="process-circle">
                    <span>4</span>
                </div>
                <h5 class="fw-bold mt-3">Delight</h5>
                <p class="text-muted">You enjoy a flawless, unforgettable experience.</p>
            </div>
        </div>
    </div>

    <!-- TESTIMONIALS -->
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="text-center mb-5" style="color: var(--primary);">What Our Clients Say</h3>
        </div>
        <div class="col-md-6 mb-4">
            <div class="testimonial-card">
                <i class="fas fa-quote-right fa-2x" style="color: var(--primary); opacity: 0.5; margin-bottom: 10px;"></i>
                <p class="mb-3">"I needed a last-minute birthday gift for my wife — something truly special. The Zawjahaa team sourced a limited-edition piece from Paris within 48 hours. Unbelievable service."</p>
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0 fw-bold">Mr. Farid A.</h6>
                        <small class="text-muted">Dubai | VIP Member since 2022</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="testimonial-card">
                <i class="fas fa-quote-right fa-2x" style="color: var(--primary); opacity: 0.5; margin-bottom: 10px;"></i>
                <p class="mb-3">"They arranged a private iftar on the rooftop of a historical building for our family of 30. Every detail, from the menu to the traditional music, was perfect."</p>
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0 fw-bold">Reham & Bilal</h6>
                        <small class="text-muted">Lahore | Family Event 2024</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- GLOBAL PARTNERS -->
    <div class="bg-white p-5 rounded-4 shadow-sm my-5 text-center">
        <h4 style="color: var(--primary);">Trusted by Discerning Families Worldwide</h4>
        <p class="mb-4">Partnered with luxury brands and hotels across the globe</p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <span class="partner-badge">Four Seasons</span>
            <span class="partner-badge">The Ritz-Carlton</span>
            <span class="partner-badge">Emirates</span>
            <span class="partner-badge">Mercedes-Benz</span>
            <span class="partner-badge">Cartier</span>
        </div>
    </div>

    <!-- TEAM -->
    <div class="mt-5">
        <h3 class="text-center mb-5" style="color: var(--primary);">Your Personal Concierge Team</h3>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="team-card">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Omar Farooq" class="team-img">
                    <h5 class="fw-bold">Omar Farooq</h5>
                    <p class="text-muted mb-2">Head of Concierge</p>
                    <p class="mb-3">15 years in luxury service management, former director at a 5-star hotel.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-card">
                    <img src="https://images.unsplash.com/photo-1488426862026-3ee34a7d66df?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Nadia Saeed" class="team-img">
                    <h5 class="fw-bold">Nadia Saeed</h5>
                    <p class="text-muted mb-2">Lifestyle & Travel Specialist</p>
                    <p class="mb-3">Crafts bespoke travel experiences and secures exclusive access worldwide.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-card">
                    <img src="https://images.unsplash.com/photo-1531427186626-4fd9a5f0c9b7?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Ahmed Raza" class="team-img">
                    <h5 class="fw-bold">Ahmed Raza</h5>
                    <p class="text-muted mb-2">Events & Acquisitions</p>
                    <p class="mb-3">Specializes in high-profile events and sourcing rare luxury items.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- VIP MEMBERSHIP TEASER -->
    <div class="text-center mt-5 p-5 rounded-4 membership-card">
        <h4 style="color: var(--primary);">Exclusive Membership</h4>
        <p class="lead">Priority access, no request too large or small. Join a select circle of families who demand the extraordinary.</p>
        <a href="#" class="btn-gold btn-lg px-5 py-3">Enquire About Membership</a>
        <p class="text-muted small mt-3">
            <i class="fas fa-lock me-1" style="color: var(--primary);"></i> All inquiries handled with utmost discretion.
        </p>
    </div>

    <!-- FINAL CTA -->
    <div class="text-center mt-5 p-5 bg-white rounded-4 shadow-sm">
        <h4 style="color: var(--primary);">Begin Your VIP Journey</h4>
        <p class="lead">Your personal concierge is just a message away.</p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <!--<a href="tel:+923176065004" class="btn-gold btn-lg"><i class="fas fa-phone-alt me-2"></i>+92 317 6065004</a>-->
            <a href="mailto:info@zawjahaa.com" class="btn-outline-primary-custom btn-lg"><i class="fas fa-envelope me-2"></i>info@zawjahaa.com</a>
        </div>
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