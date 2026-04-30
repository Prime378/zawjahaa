@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="user-logged-in" content="{{ Auth::check() ? 'true' : 'false' }}">
@section('title', 'Terms of Service | Zawjahaa - Marriage Bureau')

@section('content')
<style>
    :root {
        --primary: #10B981;
        --primary-dark: #059669;
        --secondary: #F59E0B;
        --dark: #111827;
        --light: #F9FAFB;
        --gray: #6B7280;
    }

    /* Page Header */
    .page-header {
        background: linear-gradient(135deg, #10B981 0%, #059669 100%);
        color: white;
        padding: 4rem 0;
        text-align: center;
        position: relative;
        overflow: hidden;
        margin-top: 0;
    }

    .page-header:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
        background-size: cover;
        background-position: center;
    }

    .page-header h1 {
        font-family: 'Playfair Display', serif;
        font-weight: 800;
        font-size: 3rem;
        margin-bottom: 1rem;
        position: relative;
    }

    .page-header .brand-highlight {
        color: #a7f3d0;
    }

    /* Content Card */
    .terms-card {
        background: white;
        border: 1px solid #E5E7EB;
        border-radius: 16px;
        padding: 2.5rem;
        margin: -2rem 0 2rem 0;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        position: relative;
        z-index: 10;
    }

    .terms-card h2 {
        color: var(--primary);
        font-weight: 700;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #E5E7EB;
        font-size: 1.8rem;
    }

    .terms-card h3 {
        color: var(--dark);
        font-weight: 600;
        margin: 2rem 0 1rem;
        font-size: 1.4rem;
    }

    .terms-card h4 {
        color: var(--dark);
        font-weight: 600;
        margin: 1.5rem 0 1rem;
        font-size: 1.2rem;
    }

    .terms-card p {
        color: var(--gray);
        line-height: 1.8;
        margin-bottom: 1rem;
    }

    .terms-card ul {
        color: var(--gray);
        line-height: 1.8;
        margin-bottom: 1.5rem;
        padding-left: 1.5rem;
    }

    .terms-card li {
        margin-bottom: 0.5rem;
    }

    .terms-card li i {
        color: var(--primary);
        margin-right: 0.5rem;
    }

    .badge-success {
        background: rgba(16, 185, 129, 0.1);
        color: var(--primary);
        padding: 0.5rem 1rem;
        border-radius: 30px;
        font-size: 0.8rem;
    }

    .badge-warning {
        background: rgba(245, 158, 11, 0.1);
        color: var(--secondary);
        padding: 0.5rem 1rem;
        border-radius: 30px;
        font-size: 0.8rem;
    }

    .badge-primary {
        background: rgba(79, 70, 229, 0.1);
        color: #4F46E5;
        padding: 0.5rem 1rem;
        border-radius: 30px;
        font-size: 0.8rem;
    }

    .contact-card {
        background: linear-gradient(135deg, #f0fdf4, #dcfce7);
        border-radius: 16px;
        padding: 2rem;
        margin-top: 2rem;
        text-align: center;
    }

    .contact-icon {
        width: 50px;
        height: 50px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
    }

    .contact-icon i {
        font-size: 24px;
        color: var(--primary);
    }

    .acceptance-section {
        background: var(--light);
        border-radius: 12px;
        padding: 1.5rem;
        margin-top: 2rem;
        border: 1px solid #E5E7EB;
    }

    .form-check-input:checked {
        background-color: var(--primary);
        border-color: var(--primary);
    }

    @media (max-width: 768px) {
        .page-header h1 {
            font-size: 2.2rem;
        }
        
        .terms-card {
            padding: 1.5rem;
        }
    }
</style>

<!-- Hero Section -->
<div class="page-header">
    <div class="container">
        <h1>
            <span class="brand-highlight">Terms of Service</span><br>
            Our Commitment to You
        </h1>
        <p>Last Updated: January 2024 • Please Read Carefully</p>
    </div>
</div>

<!-- Main Content -->
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="terms-card">
                
                <!-- Agreement to Terms -->
                <div class="mb-5">
                    <h2><i class="fas fa-handshake me-2"></i>1. Agreement to Terms</h2>
                    <p>By accessing or using Zawjahaa's matrimonial services, you agree to be bound by these Terms of Service. If you disagree with any part of the terms, you may not access the service. These terms constitute a legally binding agreement between you and Zawjahaa.</p>
                    
                    <div class="d-flex gap-3 mt-3">
                        <span class="badge-success"><i class="fas fa-check-circle me-1"></i>Legal Agreement</span>
                        <span class="badge-warning"><i class="fas fa-exclamation-circle me-1"></i>Read Carefully</span>
                    </div>
                </div>

                <!-- Eligibility -->
                <div class="mb-5">
                    <h2><i class="fas fa-user-check me-2"></i>2. Eligibility</h2>
                    <p>By using our services, you represent and warrant that:</p>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> You are at least 18 years of age</li>
                        <li><i class="fas fa-check-circle"></i> You are legally eligible to marry under applicable laws</li>
                        <li><i class="fas fa-check-circle"></i> You are single, divorced, or widowed (no currently married individuals)</li>
                        <li><i class="fas fa-check-circle"></i> You will provide accurate and truthful information</li>
                        <li><i class="fas fa-check-circle"></i> You are using the service for genuine matrimonial purposes</li>
                        <li><i class="fas fa-check-circle"></i> You have the legal capacity to enter into this agreement</li>
                    </ul>
                </div>

                <!-- Account Registration -->
                <div class="mb-5">
                    <h2><i class="fas fa-user-plus me-2"></i>3. Account Registration</h2>
                    
                    <h3>3.1 Account Creation</h3>
                    <p>To access certain features, you must register for an account. You agree to:</p>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> Provide accurate, current, and complete information</li>
                        <li><i class="fas fa-check-circle"></i> Maintain and update your information promptly</li>
                        <li><i class="fas fa-check-circle"></i> Keep your password confidential and secure</li>
                        <li><i class="fas fa-check-circle"></i> Notify us immediately of any unauthorized access</li>
                        <li><i class="fas fa-check-circle"></i> Not share your account credentials with others</li>
                    </ul>

                    <h3>3.2 Account Responsibility</h3>
                    <p>You are solely responsible for all activities that occur under your account. We reserve the right to suspend or terminate accounts that violate these terms or provide false information.</p>
                </div>

                <!-- User Conduct -->
                <div class="mb-5">
                    <h2><i class="fas fa-gavel me-2"></i>4. User Conduct</h2>
                    <p>You agree not to:</p>
                    <ul>
                        <li><i class="fas fa-times-circle text-danger"></i> Provide false or misleading information</li>
                        <li><i class="fas fa-times-circle text-danger"></i> Create fake profiles or impersonate others</li>
                        <li><i class="fas fa-times-circle text-danger"></i> Harass, abuse, or harm other users</li>
                        <li><i class="fas fa-times-circle text-danger"></i> Post offensive, obscene, or inappropriate content</li>
                        <li><i class="fas fa-times-circle text-danger"></i> Use the service for commercial purposes or solicitation</li>
                        <li><i class="fas fa-times-circle text-danger"></i> Attempt to hack, disrupt, or compromise the platform</li>
                        <li><i class="fas fa-times-circle text-danger"></i> Share contact information in public areas</li>
                        <li><i class="fas fa-times-circle text-danger"></i> Engage in fraudulent or deceptive practices</li>
                        <li><i class="fas fa-times-circle text-danger"></i> Violate any applicable laws or regulations</li>
                        <li><i class="fas fa-times-circle text-danger"></i> Collect user information without consent</li>
                    </ul>
                </div>

                <!-- Verification Process -->
                <div class="mb-5">
                    <h2><i class="fas fa-shield-alt me-2"></i>5. Profile Verification</h2>
                    <p>We strive to verify profiles, but we cannot guarantee the authenticity of any user. You agree that:</p>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> We may request additional verification documents</li>
                        <li><i class="fas fa-check-circle"></i> We reserve the right to reject or remove any profile</li>
                        <li><i class="fas fa-check-circle"></i> We are not liable for false information provided by users</li>
                        <li><i class="fas fa-check-circle"></i> You will verify information independently before marriage</li>
                    </ul>
                </div>

                <!-- Privacy and Communication -->
                <div class="mb-5">
                    <h2><i class="fas fa-lock me-2"></i>6. Privacy and Communication</h2>
                    
                    <h3>6.1 Privacy</h3>
                    <p>Your privacy is important. Our Privacy Policy explains how we collect and use your information. By using our service, you consent to such processing.</p>
                    
                    <h3>6.2 Communications</h3>
                    <p>You agree to receive communications from us, including emails, notifications, and messages about matches and service updates. You can opt-out of marketing communications but will still receive essential service-related messages.</p>
                </div>

                <!-- Subscription and Payments -->
                <div class="mb-5">
                    <h2><i class="fas fa-credit-card me-2"></i>7. Subscription and Payments</h2>
                    
                    <h3>7.1 Fees</h3>
                    <p>Some services require payment of fees. All fees are non-refundable except as required by law or as expressly stated. We reserve the right to change our fees with reasonable notice.</p>
                    
                    <h3>7.2 Auto-Renewal</h3>
                    <p>Subscriptions automatically renew unless cancelled before the renewal date. You can manage or cancel your subscription in account settings.</p>
                    
                    <h3>7.3 Payment Processing</h3>
                    <p>Payments are processed by third-party payment processors. We do not store your payment information.</p>
                </div>

                <!-- Termination -->
                <div class="mb-5">
                    <h2><i class="fas fa-ban me-2"></i>8. Termination</h2>
                    <p>We may terminate or suspend your account immediately, without prior notice, for conduct that we believe violates these Terms or is harmful to other users, us, or third parties, or for any other reason. You may terminate your account at any time through account settings.</p>
                </div>

                <!-- Limitation of Liability -->
                <div class="mb-5">
                    <h2><i class="fas fa-exclamation-triangle me-2"></i>9. Limitation of Liability</h2>
                    <p>To the maximum extent permitted by law, Zawjahaa shall not be liable for any indirect, incidental, special, consequential, or punitive damages, including without limitation, loss of profits, data, use, goodwill, or other intangible losses, resulting from:</p>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> Your use or inability to use the service</li>
                        <li><i class="fas fa-check-circle"></i> Any conduct or content of any third party on the service</li>
                        <li><i class="fas fa-check-circle"></i> Unauthorized access, use, or alteration of your content</li>
                        <li><i class="fas fa-check-circle"></i> Matches or interactions with other users</li>
                    </ul>
                </div>

                <!-- Disclaimer of Warranties -->
                <div class="mb-5">
                    <h2><i class="fas fa-file-contract me-2"></i>10. Disclaimer of Warranties</h2>
                    <p>The service is provided on an "AS IS" and "AS AVAILABLE" basis. We make no warranties that:</p>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> The service will meet your requirements</li>
                        <li><i class="fas fa-check-circle"></i> The service will be uninterrupted or error-free</li>
                        <li><i class="fas fa-check-circle"></i> Results from the service will be accurate or reliable</li>
                        <li><i class="fas fa-check-circle"></i> Any matches will lead to marriage</li>
                    </ul>
                </div>

                <!-- Governing Law -->
                <div class="mb-5">
                    <h2><i class="fas fa-globe me-2"></i>11. Governing Law</h2>
                    <p>These Terms shall be governed and construed in accordance with the laws of Pakistan, without regard to its conflict of law provisions. Any disputes shall be resolved in the courts of Karachi, Pakistan.</p>
                </div>

                <!-- Changes to Terms -->
                <div class="mb-5">
                    <h2><i class="fas fa-sync-alt me-2"></i>12. Changes to Terms</h2>
                    <p>We reserve the right to modify or replace these Terms at any time. If a revision is material, we will provide at least 30 days' notice prior to any new terms taking effect. By continuing to access or use our service after revisions become effective, you agree to be bound by the revised terms.</p>
                </div>

                <!-- Contact Information -->
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3 class="fw-bold mb-3">Questions About Terms?</h3>
                    <p class="mb-3">We're here to help! Contact us at:</p>
                    <div class="d-flex justify-content-center align-items-center gap-3">
                        <div>
                            <i class="fas fa-envelope text-success me-2"></i>
                            <a href="mailto:info@zawjahaa.com" class="text-success fw-bold">info@zawjahaa.com</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Hide page loader after 1 second
        setTimeout(function() {
            const loader = document.getElementById('page-loader');
            if (loader) {
                loader.classList.add('hidden');
                setTimeout(() => {
                    loader.style.display = 'none';
                }, 500);
            }
        }, 1000);
        
        // Terms acceptance tracking (optional)
        const acceptCheckbox = document.getElementById('acceptTerms');
        if (acceptCheckbox) {
            acceptCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    console.log('User accepted terms');
                    // You can store this in session or local storage
                    localStorage.setItem('terms_accepted', 'true');
                    localStorage.setItem('terms_accepted_date', new Date().toISOString());
                }
            });
            
            // Check if previously accepted
            if (localStorage.getItem('terms_accepted') === 'true') {
                acceptCheckbox.checked = true;
            }
        }
    });
</script>
@endsection