@extends('layouts.app')

@section('title', 'Family Mediation | Zawjahaa – Harmony & Understanding Since 2010')

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
    
    .service-card {
        background: #f8f9fa;
        border-radius: 15px;
        padding: 30px 20px;
        text-align: center;
        height: 100%;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }
    
    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        border-color: var(--primary);
        background: white;
    }
    
    .service-card i {
        font-size: 3rem;
        color: var(--primary);
        margin-bottom: 20px;
    }
    
    .service-card h5 {
        font-weight: 700;
        margin-bottom: 15px;
        color: var(--dark);
    }
    
    .service-card p {
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
    
    .mediation-info {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border-radius: 15px;
        padding: 40px;
    }
    
    .contact-info-box {
        background: var(--gradient-green);
        color: white;
        padding: 20px;
        border-radius: 10px;
        margin-top: 20px;
    }
    
    .contact-info-box a {
        color: white;
        text-decoration: none;
    }
    
    .contact-info-box a:hover {
        text-decoration: underline;
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
        
        .service-card {
            margin-bottom: 15px;
        }
    }
</style>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <h1 class="mb-3">
            <span class="brand-highlight">Family Mediation</span>
        </h1>
        <p class="lead mb-4">Building Bridges, Healing Bonds – Since 2010</p>
        <p class="mb-0">Confidential, respectful, and Islamic‑principled mediation for families & couples</p>
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
                        <div class="stat-number">1,200+</div>
                        <div class="stat-label">Families Mediated</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item text-center">
                        <div class="stat-number">3,000+</div>
                        <div class="stat-label">Counseling Sessions</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item text-center">
                        <div class="stat-number">95%</div>
                        <div class="stat-label">Resolution Rate</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item text-center">
                        <div class="stat-number">15+</div>
                        <div class="stat-label">Years of Trust</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mediation Info Section -->
    <div class="contact-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h3 class="mb-4" style="color: var(--primary);">Your Safe Space for Family Harmony</h3>
                    <p class="lead mb-4">Whether it's pre‑marital concerns, parental involvement, or post‑marriage misunderstandings – our trained mediators listen without judgment and guide toward mutual respect.</p>
                    
                    <div class="row mt-5">
                        <div class="col-md-4 mb-4">
                            <div class="service-card">
                                <i class="fas fa-hand-holding-heart"></i>
                                <h5>Pre‑Marriage Mediation</h5>
                                <p>Align expectations, involve both families, discuss Mahr, living arrangements, and future planning.</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="service-card">
                                <i class="fas fa-users"></i>
                                <h5>Family & In‑Law Mediation</h5>
                                <p>Address misunderstandings between spouses, parents, and in‑laws with respect and confidentiality.</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="service-card">
                                <i class="fas fa-balance-scale"></i>
                                <h5>Conflict Resolution</h5>
                                <p>Neutral, Islamic‑based mediation for disputes related to children, finances, or separation.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="contact-info-box mt-4">
                        <p class="mb-2">
                            <i class="fas fa-phone-alt me-2"></i> Call or WhatsApp: 
                            <a href="tel:+923176065004">+92 317 6065004</a> 
                            |  
                            <i class="fas fa-envelope me-2"></i> 
                            <a href="mailto:mediation@zawjahaa.com">mediation@zawjahaa.com</a>
                        </p>
                        <p class="text-white-50 small mb-0">
                            <i class="fas fa-lock me-1"></i> No forms – just a confidential conversation. We'll schedule a session at your convenience.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Stories / Testimonials -->
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="text-center mb-5" style="color: var(--primary);">Real Stories of Reconciliation</h3>
        </div>
        <div class="col-md-6 mb-4">
            <div class="testimonial-card h-100">
                <i class="fas fa-quote-right fa-2x text-success opacity-50 mb-2"></i>
                <p class="mb-3">"Our families were at a deadlock before the wedding. Fatima Apa mediated with such wisdom and patience – she helped both sides understand each other. Today we are happily married, thanks to Zawjahaa."</p>
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0 fw-bold">Hira & Usman</h6>
                        <small class="text-muted">Lahore | Pre‑marriage mediation 2024</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="testimonial-card h-100">
                <i class="fas fa-quote-right fa-2x text-success opacity-50 mb-2"></i>
                <p class="mb-3">"After a serious misunderstanding with my in‑laws, we were on the verge of separation. The mediator listened to everyone without bias and helped us rebuild trust. Forever grateful."</p>
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0 fw-bold">Ayesha & Bilal</h6>
                        <small class="text-muted">Karachi | Family mediation 2023</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Map -->
    <div class="map-container mt-5">
        <h4 class="mb-4" style="color: var(--primary);">Our Mediation Centre – Lahore</h4>
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
        <h3 class="text-center mb-5" style="color: var(--primary);">Meet Your Mediation Team</h3>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="team-card">
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Fatima Khan" class="team-img">
                    <h5 class="fw-bold">Fatima Khan</h5>
                    <p class="text-muted mb-2">Lead Family Mediator</p>
                    <p class="mb-3">12+ years in family counselling, certified mediator, expert in Islamic family law.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-card">
                    <img src="https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Ali Raza" class="team-img">
                    <h5 class="fw-bold">Ali Raza</h5>
                    <p class="text-muted mb-2">Pre‑Marriage & Couples Counsellor</p>
                    <p class="mb-3">Specializes in婚前 counseling, communication skills, and conflict de‑escalation.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-card">
                    <img src="https://images.unsplash.com/photo-1551836026-d5c2c3af8d88?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Sarah Ahmed" class="team-img">
                    <h5 class="fw-bold">Sarah Ahmed</h5>
                    <p class="text-muted mb-2">Senior Family Consultant</p>
                    <p class="mb-3">15+ years mediating complex family disputes with empathy and neutrality.</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Peace of Mind Section -->
    <div class="mediation-info mt-5 text-center">
        <i class="fas fa-heart fa-3x text-success mb-3"></i>
        <h4 style="color: var(--primary);">We're Here to Listen, Not to Judge</h4>
        <p class="lead mb-0">Every conversation is confidential. Every session is a step toward understanding.</p>
    </div>
</div>

<script>
    // Page loader script (if needed)
    document.addEventListener("DOMContentLoaded", function() {
        // Any additional JavaScript can go here
        console.log("Family Mediation page loaded");
    });
</script>
@endsection