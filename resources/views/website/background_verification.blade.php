@extends('layouts.app')

@section('title', 'Background Verification | Zawjahaa – Trust & Transparency Since 2010')

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
    .hero-section {
        background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), 
                    url('https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
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
    
    .process-step {
        text-align: center;
        padding: 30px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        height: 100%;
        transition: all 0.3s ease;
    }
    
    .process-step:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    
    .step-icon {
        width: 80px;
        height: 80px;
        background: rgba(16, 185, 129, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
    }
    
    .step-icon i {
        font-size: 2rem;
        color: var(--primary);
    }
    
    .feature-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        height: 100%;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }
    
    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        border-color: var(--primary);
    }
    
    .feature-icon {
        font-size: 2.5rem;
        color: var(--primary);
        margin-bottom: 20px;
    }
    
    .verification-item {
        background: white;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        height: 100%;
        box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }
    
    .verification-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .verification-item i {
        font-size: 2rem;
        color: var(--primary);
        margin-bottom: 15px;
    }
    
    .verification-item h6 {
        font-weight: 700;
        margin-bottom: 10px;
        color: var(--dark);
    }
    
    .verification-item small {
        color: #6b7280;
        font-size: 0.85rem;
    }
    
    .cta-section {
        background: white;
        border-radius: 20px;
        padding: 50px;
        margin-top: 50px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        border-bottom: 5px solid var(--primary);
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
        
        .cta-section {
            padding: 30px 20px;
        }
        
        .btn-primary, .btn-outline-success {
            width: 100%;
            margin: 5px 0 !important;
        }
    }
</style>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <h1 class="mb-3">
            <span class="brand-highlight">Background Verification</span>
        </h1>
        <p class="lead mb-4">Trust, but Verify – Your Peace of Mind, Our Priority</p>
        <p class="mb-0">Discreet, thorough, and confidential checks for marriage proposals since 2010</p>
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
                        <div class="stat-number">8,500+</div>
                        <div class="stat-label">Verifications Done</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item text-center">
                        <div class="stat-number">100%</div>
                        <div class="stat-label">Confidential</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item text-center">
                        <div class="stat-number">7-10</div>
                        <div class="stat-label">Days Turnaround</div>
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

    <!-- Verification Process Section -->
    <div class="contact-container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h3 class="mb-4" style="color: var(--primary); font-weight: 700;">Our Verification Process</h3>
                <p class="lead mb-4">A systematic, discreet approach to bring you complete clarity.</p>
                
                <div class="d-flex mb-4">
                    <div class="flex-shrink-0">
                        <span class="badge bg-success rounded-circle p-3" style="width: 50px; height: 50px; font-size: 1.2rem; display: flex; align-items: center; justify-content: center;">1</span>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5>Confidential Intake</h5>
                        <p class="text-muted">You share the profile details with us under a strict NDA. We only need the basic info to initiate checks.</p>
                    </div>
                </div>
                
                <div class="d-flex mb-4">
                    <div class="flex-shrink-0">
                        <span class="badge bg-success rounded-circle p-3" style="width: 50px; height: 50px; font-size: 1.2rem; display: flex; align-items: center; justify-content: center;">2</span>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5>Multi-Layer Verification</h5>
                        <p class="text-muted">Our team cross-verifies education, employment, residence, and references through independent sources.</p>
                    </div>
                </div>
                
                <div class="d-flex mb-4">
                    <div class="flex-shrink-0">
                        <span class="badge bg-success rounded-circle p-3" style="width: 50px; height: 50px; font-size: 1.2rem; display: flex; align-items: center; justify-content: center;">3</span>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5>Detailed Report & Consultation</h5>
                        <p class="text-muted">You receive a comprehensive, easy-to-understand report. We also offer a consultation to discuss findings.</p>
                    </div>
                </div>
                
                <a href="#" class="btn btn-primary btn-lg mt-3"><i class="fas fa-file-alt me-2"></i>Request Free Consultation</a>
            </div>
            <div class="col-lg-6">
                <div class="bg-light p-5 rounded-4 shadow-sm">
                    <h4 class="mb-4 text-center">What We Verify</h4>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="verification-item">
                                <i class="fas fa-university"></i>
                                <h6>Education</h6>
                                <small>Degrees, Diplomas, Certifications</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="verification-item">
                                <i class="fas fa-briefcase"></i>
                                <h6>Employment</h6>
                                <small>Current Role, Salary, Tenure</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="verification-item">
                                <i class="fas fa-home"></i>
                                <h6>Residence</h6>
                                <small>Address Verification, Neighbors</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="verification-item">
                                <i class="fas fa-hand-holding-heart"></i>
                                <h6>Character</h6>
                                <small>References, Social Reputation</small>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="verification-item">
                                <i class="fas fa-globe"></i>
                                <h6>International Checks</h6>
                                <small>Verified partners in 15+ countries</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us -->
    <div class="row my-5">
        <div class="col-12 text-center mb-4">
            <h3 style="color: var(--primary);">Why Families Trust Zawjahaa Verification</h3>
            <p class="lead">We combine experience with empathy to deliver truth.</p>
        </div>
        <div class="col-md-4 mb-3">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-user-secret"></i>
                </div>
                <h5 class="card-title">Absolute Discretion</h5>
                <p class="card-text text-muted">No information is ever shared with the subject or any third party without your written consent.</p>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-balance-scale"></i>
                </div>
                <h5 class="card-title">Unbiased Reporting</h5>
                <p class="card-text text-muted">We present facts as they are. Our findings are objective and sourced from multiple angles.</p>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h5 class="card-title">Fast Turnaround</h5>
                <p class="card-text text-muted">Most domestic verifications completed within 7-10 days. International checks within 2 weeks.</p>
            </div>
        </div>
    </div>

    <!-- How It Works -->
    <div class="bg-white p-5 rounded-4 shadow-sm my-5">
        <h3 class="text-center mb-5" style="color: var(--primary);">Simple 3-Step Process</h3>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="process-step">
                    <div class="step-icon">
                        <i class="fas fa-file-signature"></i>
                    </div>
                    <h5 class="fw-bold mb-3">1. Request</h5>
                    <p class="text-muted mb-0">Fill a simple form or call us. We'll guide you through the process.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="process-step">
                    <div class="step-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h5 class="fw-bold mb-3">2. Verification</h5>
                    <p class="text-muted mb-0">We conduct checks discreetly and keep you updated on progress.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="process-step">
                    <div class="step-icon">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <h5 class="fw-bold mb-3">3. Report</h5>
                    <p class="text-muted mb-0">Receive a detailed verified report via secure channel.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="text-center mb-5" style="color: var(--primary);">How Verification Brought Peace of Mind</h3>
        </div>
        <div class="col-md-6">
            <div class="testimonial-card">
                <i class="fas fa-quote-right fa-2x text-success opacity-50 mb-2"></i>
                <p class="mb-3">"We were unsure about an overseas proposal. Zawjahaa's team verified the boy's employment and education in just 8 days. Everything matched – today they are happily married. We are so grateful."</p>
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0 fw-bold">Amina's Mother</h6>
                        <small class="text-muted">Lahore | Overseas verification 2024</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="testimonial-card">
                <i class="fas fa-quote-right fa-2x text-success opacity-50 mb-2"></i>
                <p class="mb-3">"A profile seemed too good to be true. Background verification revealed discrepancies in education. It saved us from a huge mistake. Their service is professional and sensitive."</p>
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0 fw-bold">Bilal's Family</h6>
                        <small class="text-muted">Karachi | Pre‑match verification 2023</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Final CTA -->
    <div class="cta-section text-center">
        <h4 style="color: var(--primary);">Ready to proceed with confidence?</h4>
        <p class="lead mb-4">Contact our verification team for a confidential discussion.</p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="tel:+923176065004" class="btn btn-primary btn-lg"><i class="fas fa-phone-alt me-2"></i>+92 317 6065004</a>
            <a href="mailto:verify@zawjahaa.com" class="btn btn-outline-success btn-lg"><i class="fas fa-envelope me-2"></i>verify@zawjahaa.com</a>
        </div>
        <p class="text-muted small mt-3">
            <i class="fas fa-lock me-1"></i> All inquiries are kept strictly confidential.
        </p>
    </div>
</div>

<script>
    // Page loader script (if needed)
    document.addEventListener("DOMContentLoaded", function() {
        // Any additional JavaScript can go here
    });
</script>
@endsection