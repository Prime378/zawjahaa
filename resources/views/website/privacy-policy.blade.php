@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="user-logged-in" content="{{ Auth::check() ? 'true' : 'false' }}">
@section('title', 'Privacy Policy | Zawjahaa - Marriage Bureau')

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
    .policy-card {
        background: white;
        border: 1px solid #E5E7EB;
        border-radius: 16px;
        padding: 2.5rem;
        margin: -2rem 0 2rem 0;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        position: relative;
        z-index: 10;
    }

    .policy-card h2 {
        color: var(--primary);
        font-weight: 700;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #E5E7EB;
        font-size: 1.8rem;
    }

    .policy-card h3 {
        color: var(--dark);
        font-weight: 600;
        margin: 2rem 0 1rem;
        font-size: 1.4rem;
    }

    .policy-card h4 {
        color: var(--dark);
        font-weight: 600;
        margin: 1.5rem 0 1rem;
        font-size: 1.2rem;
    }

    .policy-card p {
        color: var(--gray);
        line-height: 1.8;
        margin-bottom: 1rem;
    }

    .policy-card ul {
        color: var(--gray);
        line-height: 1.8;
        margin-bottom: 1.5rem;
        padding-left: 1.5rem;
    }

    .policy-card li {
        margin-bottom: 0.5rem;
    }

    .policy-card li i {
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

    @media (max-width: 768px) {
        .page-header h1 {
            font-size: 2.2rem;
        }
        
        .policy-card {
            padding: 1.5rem;
        }
    }
</style>

<!-- Hero Section -->
<div class="page-header">
    <div class="container">
        <h1>
            <span class="brand-highlight">Privacy Policy</span><br>
            Your Privacy Matters to Us
        </h1>
        <p>Last Updated: January 2024 • Protecting Your Personal Information</p>
    </div>
</div>

<!-- Main Content -->
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="policy-card">
                
                <!-- Introduction -->
                <div class="mb-5">
                    <h2><i class="fas fa-shield-alt me-2"></i>1. Introduction</h2>
                    <p>At Zawjahaa, we take your privacy seriously. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our matrimonial website and use our services. Please read this privacy policy carefully. If you do not agree with the terms of this privacy policy, please do not access the site.</p>
                    <p>We are committed to protecting your personal information and your right to privacy. If you have any questions or concerns about this policy, please contact us at info@zawjahaa.com</p>
                    
                    <div class="d-flex gap-3 mt-3">
                        <span class="badge-success"><i class="fas fa-check-circle me-1"></i>GDPR Compliant</span>
                        <span class="badge-success"><i class="fas fa-check-circle me-1"></i>Data Protection</span>
                    </div>
                </div>

                <!-- Information Collection -->
                <div class="mb-5">
                    <h2><i class="fas fa-database me-2"></i>2. Information We Collect</h2>
                    
                    <h3>2.1 Personal Information</h3>
                    <p>We may collect personal information that you voluntarily provide to us when you register on the website, express an interest in obtaining information about us or our services, or otherwise contact us. The personal information we collect may include:</p>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> Name and contact information (email, phone number)</li>
                        <li><i class="fas fa-check-circle"></i> Date of birth and age</li>
                        <li><i class="fas fa-check-circle"></i> Gender and marital status</li>
                        <li><i class="fas fa-check-circle"></i> Religious and cultural background</li>
                        <li><i class="fas fa-check-circle"></i> Educational and professional details</li>
                        <li><i class="fas fa-check-circle"></i> Photographs and preferences</li>
                        <li><i class="fas fa-check-circle"></i> Family information</li>
                    </ul>

                    <h3>2.2 Automatically Collected Information</h3>
                    <p>When you visit our website, we automatically collect certain information about your device, including:</p>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> IP address and browser type</li>
                        <li><i class="fas fa-check-circle"></i> Device information and operating system</li>
                        <li><i class="fas fa-check-circle"></i> Usage patterns and preferences</li>
                        <li><i class="fas fa-check-circle"></i> Cookies and tracking technologies</li>
                    </ul>
                </div>

                <!-- How We Use Information -->
                <div class="mb-5">
                    <h2><i class="fas fa-cog me-2"></i>3. How We Use Your Information</h2>
                    <p>We use the information we collect to:</p>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> Create and manage your account</li>
                        <li><i class="fas fa-check-circle"></i> Provide matchmaking services and AI compatibility</li>
                        <li><i class="fas fa-check-circle"></i> Verify your identity and profile information</li>
                        <li><i class="fas fa-check-circle"></i> Communicate with you about matches and services</li>
                        <li><i class="fas fa-check-circle"></i> Improve our algorithms and user experience</li>
                        <li><i class="fas fa-check-circle"></i> Ensure platform security and prevent fraud</li>
                        <li><i class="fas fa-check-circle"></i> Comply with legal obligations</li>
                    </ul>
                </div>

                <!-- Information Sharing -->
                <div class="mb-5">
                    <h2><i class="fas fa-share-alt me-2"></i>4. Sharing Your Information</h2>
                    
                    <h3>4.1 Other Users</h3>
                    <p>Your profile information will be visible to other registered members as part of the matchmaking service. You can control what information is visible in your privacy settings.</p>
                    
                    <h3>4.2 Third-Party Service Providers</h3>
                    <p>We may share data with trusted third parties who assist in operating our website, conducting our business, or servicing you, as long as they agree to keep this information confidential.</p>
                    
                    <h3>4.3 Legal Requirements</h3>
                    <p>We may disclose your information if required by law or in response to valid requests by public authorities.</p>
                </div>

                <!-- Data Security -->
                <div class="mb-5">
                    <h2><i class="fas fa-lock me-2"></i>5. Data Security</h2>
                    <p>We implement a variety of security measures to maintain the safety of your personal information:</p>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> 256-bit SSL encryption for data transmission</li>
                        <li><i class="fas fa-check-circle"></i> Secure servers and firewalls</li>
                        <li><i class="fas fa-check-circle"></i> Regular security audits and updates</li>
                        <li><i class="fas fa-check-circle"></i> Strict access controls and authentication</li>
                        <li><i class="fas fa-check-circle"></i> 24/7 monitoring for suspicious activity</li>
                    </ul>
                </div>

                <!-- Your Rights -->
                <div class="mb-5">
                    <h2><i class="fas fa-gavel me-2"></i>6. Your Privacy Rights</h2>
                    <p>You have the right to:</p>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> Access and receive a copy of your personal information</li>
                        <li><i class="fas fa-check-circle"></i> Rectify or update inaccurate information</li>
                        <li><i class="fas fa-check-circle"></i> Delete your account and associated data</li>
                        <li><i class="fas fa-check-circle"></i> Object to or restrict processing</li>
                        <li><i class="fas fa-check-circle"></i> Data portability</li>
                        <li><i class="fas fa-check-circle"></i> Withdraw consent at any time</li>
                    </ul>
                </div>

                <!-- Cookies -->
                <div class="mb-5">
                    <h2><i class="fas fa-cookie-bite me-2"></i>7. Cookies Policy</h2>
                    <p>We use cookies to enhance your experience on our website. Cookies are small files that a site or its service provider transfers to your computer's hard drive through your web browser that enables the site's systems to recognize your browser and capture certain information.</p>
                    <p>You can choose to have your computer warn you each time a cookie is being sent, or you can choose to turn off all cookies through your browser settings.</p>
                </div>

                <!-- Children's Privacy -->
                <div class="mb-5">
                    <h2><i class="fas fa-child me-2"></i>8. Children's Privacy</h2>
                    <p>Our services are not intended for individuals under the age of 18. We do not knowingly collect personal information from children under 18. If we become aware that a child under 18 has provided us with personal information, we will take steps to delete such information.</p>
                </div>

                <!-- Policy Updates -->
                <div class="mb-5">
                    <h2><i class="fas fa-sync-alt me-2"></i>9. Updates to This Policy</h2>
                    <p>We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last Updated" date. You are advised to review this Privacy Policy periodically for any changes.</p>
                </div>

                <!-- Contact Us -->
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3 class="fw-bold mb-3">Questions About Privacy?</h3>
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
    });
</script>
@endsection