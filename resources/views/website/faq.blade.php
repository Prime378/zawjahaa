@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="user-logged-in" content="{{ Auth::check() ? 'true' : 'false' }}">
@section('title', 'Frequently Asked Questions | Zawjahaa - Marriage Bureau')

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

    /* Stats Banner */
    .stats-banner {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        margin: -2rem 0 2rem 0;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        position: relative;
        z-index: 10;
    }

    .stat-number {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--primary);
    }

    .stat-label {
        font-size: 0.9rem;
        color: var(--gray);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* FAQ Card */
    .faq-card {
        background: white;
        border: 1px solid #E5E7EB;
        border-radius: 16px;
        padding: 2.5rem;
        margin: -2rem 0 2rem 0;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        position: relative;
        z-index: 10;
    }

    .faq-category {
        margin-bottom: 3rem;
    }

    .faq-category h2 {
        color: var(--primary);
        font-weight: 700;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #E5E7EB;
        font-size: 1.8rem;
    }

    .faq-item {
        margin-bottom: 1.5rem;
        border: 1px solid #E5E7EB;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .faq-item:hover {
        border-color: var(--primary);
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.1);
    }

    .faq-question {
        background: var(--light);
        padding: 1.25rem 1.5rem;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: 600;
        color: var(--dark);
        transition: all 0.3s ease;
    }

    .faq-question:hover {
        background: #f0fdf4;
    }

    .faq-question i {
        color: var(--primary);
        transition: transform 0.3s ease;
    }

    .faq-question[aria-expanded="true"] i {
        transform: rotate(180deg);
    }

    .faq-answer {
        padding: 1.5rem;
        background: white;
        color: var(--gray);
        line-height: 1.8;
        border-top: 1px solid #E5E7EB;
    }

    .faq-answer p:last-child {
        margin-bottom: 0;
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

    .search-box {
        position: relative;
        margin-bottom: 2rem;
    }

    .search-box input {
        width: 100%;
        padding: 1rem 1rem 1rem 3rem;
        border: 2px solid #E5E7EB;
        border-radius: 50px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .search-box input:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
        outline: none;
    }

    .search-box i {
        position: absolute;
        left: 1.25rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--gray);
        font-size: 1.2rem;
    }

    .popular-topics {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
        margin-bottom: 2rem;
        justify-content: center;
    }

    .topic-tag {
        background: var(--light);
        color: var(--dark);
        padding: 0.5rem 1.25rem;
        border-radius: 30px;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
        border: 1px solid #E5E7EB;
    }

    .topic-tag:hover {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
    }

    .topic-tag i {
        margin-right: 0.5rem;
    }

    @media (max-width: 768px) {
        .page-header h1 {
            font-size: 2.2rem;
        }
        
        .faq-card {
            padding: 1.5rem;
        }
        
        .stat-number {
            font-size: 1.8rem;
        }
    }
</style>

<!-- Hero Section -->
<div class="page-header">
    <div class="container">
        <h1>
            <span class="brand-highlight">Frequently Asked Questions</span><br>
            Find Answers to Common Questions
        </h1>
        <p>Everything you need to know about Zawjahaa • 24/7 Support Available</p>
    </div>
</div>

<!-- Stats Banner -->
<div class="container">
    <div class="stats-banner">
        <div class="row g-4">
            <div class="col-md-3 col-6">
                <div class="stat-item text-center">
                    <div class="stat-number">5,000+</div>
                    <div class="stat-label">Happy Couples</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item text-center">
                    <div class="stat-number">25K+</div>
                    <div class="stat-label">Active Members</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item text-center">
                    <div class="stat-number">98%</div>
                    <div class="stat-label">Satisfaction Rate</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item text-center">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Support</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="faq-card">
                
                <!-- Search Box -->
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="faq-search" placeholder="Search your question... e.g., registration, payment, verification">
                </div>

                <!-- Popular Topics -->
                <div class="popular-topics">
                    <span class="topic-tag" data-category="all"><i class="fas fa-star"></i> All Topics</span>
                    <span class="topic-tag" data-category="registration"><i class="fas fa-user-plus"></i> Registration</span>
                    <span class="topic-tag" data-category="payment"><i class="fas fa-credit-card"></i> Payment</span>
                    <span class="topic-tag" data-category="verification"><i class="fas fa-shield-alt"></i> Verification</span>
                    <span class="topic-tag" data-category="privacy"><i class="fas fa-lock"></i> Privacy</span>
                    <span class="topic-tag" data-category="matching"><i class="fas fa-heart"></i> Matching</span>
                </div>

                <!-- FAQ Categories -->
                <div class="faq-category" data-category="registration">
                    <h2><i class="fas fa-user-plus me-2"></i>Registration & Account</h2>
                    
                    <div class="faq-item">
                        <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="false">
                            <span><i class="fas fa-question-circle me-2 text-success"></i>How do I register on Zawjahaa?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div id="faq1" class="collapse faq-answer">
                            <p>Registering on Zawjahaa is simple and free! Click on the "Register Free" button on the homepage. Fill in your basic information including name, email, phone number, and create a password. After registration, you can complete your profile with details about yourself, preferences, and upload photos. Your profile will be verified within 24-48 hours.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false">
                            <span><i class="fas fa-question-circle me-2 text-success"></i>Is registration really free?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div id="faq2" class="collapse faq-answer">
                            <p>Yes! Basic registration and profile creation is completely free. You can create your profile, upload photos, and search for matches without any cost. Premium features like unlimited messaging, contact details, and advanced filters are available with our paid plans.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false">
                            <span><i class="fas fa-question-circle me-2 text-success"></i>Can I delete my account?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div id="faq3" class="collapse faq-answer">
                            <p>Yes, you can delete your account at any time. Go to Account Settings → Privacy → Delete Account. Please note that this action is permanent and all your data will be removed from our active database. However, we may retain certain information as required by law.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false">
                            <span><i class="fas fa-question-circle me-2 text-success"></i>I forgot my password. What should I do?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div id="faq4" class="collapse faq-answer">
                            <p>Click on "Forgot Password" on the login page. Enter your registered email address, and we'll send you a password reset link. Follow the instructions in the email to create a new password. If you don't receive the email, check your spam folder or contact support.</p>
                        </div>
                    </div>
                </div>

                <div class="faq-category" data-category="verification">
                    <h2><i class="fas fa-shield-alt me-2"></i>Profile Verification</h2>
                    
                    <div class="faq-item">
                        <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq5" aria-expanded="false">
                            <span><i class="fas fa-question-circle me-2 text-success"></i>How does profile verification work?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div id="faq5" class="collapse faq-answer">
                            <p>We verify profiles through multiple steps:</p>
                            <ul>
                                <li>Email verification</li>
                                <li>Phone number verification via OTP</li>
                                <li>ID card/document verification (for premium members)</li>
                                <li>Photo verification to ensure authenticity</li>
                                <li>Manual review by our team</li>
                            </ul>
                            <p class="mt-2">Verified profiles get a special "Verified" badge.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq6" aria-expanded="false">
                            <span><i class="fas fa-question-circle me-2 text-success"></i>How long does verification take?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div id="faq6" class="collapse faq-answer">
                            <p>Basic verification (email and phone) is instant. Document verification typically takes 24-48 hours. During peak times, it may take up to 72 hours. You'll receive a notification once your profile is verified.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq7" aria-expanded="false">
                            <span><i class="fas fa-question-circle me-2 text-success"></i>Why was my profile rejected?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div id="faq7" class="collapse faq-answer">
                            <p>Common reasons for profile rejection include:</p>
                            <ul>
                                <li>Incomplete or false information</li>
                                <li>Inappropriate photos or content</li>
                                <li>Unable to verify identity</li>
                                <li>Duplicate profiles</li>
                                <li>Underage registration</li>
                            </ul>
                            <p>You'll receive an email explaining the reason and instructions on how to fix the issue.</p>
                        </div>
                    </div>
                </div>

                <div class="faq-category" data-category="matching">
                    <h2><i class="fas fa-heart me-2"></i>Matching & Communication</h2>
                    
                    <div class="faq-item">
                        <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq8" aria-expanded="false">
                            <span><i class="fas fa-question-circle me-2 text-success"></i>How does AI matching work?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div id="faq8" class="collapse faq-answer">
                            <p>Our AI matching algorithm analyzes over 100 factors including your preferences, lifestyle, education, family background, and interests. It learns from successful matches and continuously improves to suggest highly compatible profiles. The more information you provide, the better your matches will be!</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq9" aria-expanded="false">
                            <span><i class="fas fa-question-circle me-2 text-success"></i>How do I express interest in someone?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div id="faq9" class="collapse faq-answer">
                            <p>You can send an interest by clicking the "Send Interest" button on a profile. Free members can send up to 5 interests per day. Premium members get unlimited interests. If the other person accepts your interest, you can start communicating.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq10" aria-expanded="false">
                            <span><i class="fas fa-question-circle me-2 text-success"></i>Can I contact matches directly?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div id="faq10" class="collapse faq-answer">
                            <p>Direct messaging is available for premium members. Free members can express interest and use our in-app chat after mutual interest is confirmed. We recommend keeping all communication within our platform until you're comfortable sharing personal contact details.</p>
                        </div>
                    </div>
                </div>

                <div class="faq-category" data-category="payment">
                    <h2><i class="fas fa-credit-card me-2"></i>Payment & Subscriptions</h2>
                    
                    <div class="faq-item">
                        <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq11" aria-expanded="false">
                            <span><i class="fas fa-question-circle me-2 text-success"></i>What payment methods do you accept?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div id="faq11" class="collapse faq-answer">
                            <p>We accept multiple payment methods:</p>
                            <ul>
                                <li>Credit/Debit Cards (Visa, Mastercard, American Express)</li>
                                <li>JazzCash & EasyPaisa</li>
                                <li>Bank Transfer</li>
                                <li>International payments via PayPal</li>
                            </ul>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq12" aria-expanded="false">
                            <span><i class="fas fa-question-circle me-2 text-success"></i>How do I cancel my subscription?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div id="faq12" class="collapse faq-answer">
                            <p>To cancel your subscription:</p>
                            <ol>
                                <li>Log in to your account</li>
                                <li>Go to Account Settings → Subscription</li>
                                <li>Click on "Cancel Subscription"</li>
                                <li>Follow the confirmation steps</li>
                            </ol>
                            <p>Your subscription will remain active until the end of the current billing period.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq13" aria-expanded="false">
                            <span><i class="fas fa-question-circle me-2 text-success"></i>Are payments refundable?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div id="faq13" class="collapse faq-answer">
                            <p>Generally, subscription fees are non-refundable as per our terms of service. However, we handle refund requests on a case-by-case basis for technical issues or exceptional circumstances. Please contact our support team within 7 days of payment for assistance.</p>
                        </div>
                    </div>
                </div>

                <div class="faq-category" data-category="privacy">
                    <h2><i class="fas fa-lock me-2"></i>Privacy & Security</h2>
                    
                    <div class="faq-item">
                        <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq14" aria-expanded="false">
                            <span><i class="fas fa-question-circle me-2 text-success"></i>Is my information secure?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div id="faq14" class="collapse faq-answer">
                            <p>Yes! We take security seriously:</p>
                            <ul>
                                <li>256-bit SSL encryption for all data</li>
                                <li>Secure servers with firewalls</li>
                                <li>Regular security audits</li>
                                <li>Strict access controls</li>
                                <li>We never share your data without consent</li>
                            </ul>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq15" aria-expanded="false">
                            <span><i class="fas fa-question-circle me-2 text-success"></i>Can I hide my profile?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div id="faq15" class="collapse faq-answer">
                            <p>Yes, you can hide your profile from search results. Go to Privacy Settings and enable "Hide Profile" mode. Your profile won't appear in searches, but you can still log in and message your existing connections. This is useful when you're taking a break or have found a match.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq16" aria-expanded="false">
                            <span><i class="fas fa-question-circle me-2 text-success"></i>How do I report a suspicious profile?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div id="faq16" class="collapse faq-answer">
                            <p>If you encounter a suspicious profile:</p>
                            <ul>
                                <li>Click on the "Report" button on their profile</li>
                                <li>Select the reason for reporting</li>
                                <li>Add any additional comments</li>
                                <li>Our team will review within 24 hours</li>
                            </ul>
                            <p>You can also email us directly at info@zawjahaa.com with details.</p>
                        </div>
                    </div>
                </div>

                <!-- Still Have Questions -->
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <h3 class="fw-bold mb-3">Still Have Questions?</h3>
                    <p class="mb-3">We're here to help! Contact our support team:</p>
                    <div class="d-flex justify-content-center align-items-center gap-3">
                        <div>
                            <i class="fas fa-envelope text-success me-2"></i>
                            <a href="mailto:info@zawjahaa.com" class="text-success fw-bold">info@zawjahaa.com</a>
                        </div>
                    </div>
                    <p class="mt-3 mb-0">
                        <small class="text-muted">Average response time: 2-4 hours</small>
                    </p>
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
        
        // FAQ Search functionality
        const searchInput = document.getElementById('faq-search');
        const faqItems = document.querySelectorAll('.faq-item');
        const faqCategories = document.querySelectorAll('.faq-category');
        
        if (searchInput) {
            searchInput.addEventListener('keyup', function() {
                const searchTerm = this.value.toLowerCase().trim();
                
                faqItems.forEach(item => {
                    const question = item.querySelector('.faq-question span').textContent.toLowerCase();
                    const answer = item.querySelector('.faq-answer').textContent.toLowerCase();
                    
                    if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
                
                // Show/hide categories based on visible items
                faqCategories.forEach(category => {
                    const visibleItems = category.querySelectorAll('.faq-item[style="display: block"]');
                    const allItems = category.querySelectorAll('.faq-item');
                    
                    if (searchTerm === '') {
                        category.style.display = 'block';
                    } else if (visibleItems.length > 0) {
                        category.style.display = 'block';
                    } else {
                        category.style.display = 'none';
                    }
                });
            });
        }
        
        // Category filter
        const topicTags = document.querySelectorAll('.topic-tag');
        topicTags.forEach(tag => {
            tag.addEventListener('click', function() {
                const category = this.getAttribute('data-category');
                
                // Update active state
                topicTags.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                
                if (category === 'all') {
                    faqCategories.forEach(cat => cat.style.display = 'block');
                    faqItems.forEach(item => item.style.display = 'block');
                } else {
                    faqCategories.forEach(cat => {
                        if (cat.getAttribute('data-category') === category) {
                            cat.style.display = 'block';
                        } else {
                            cat.style.display = 'none';
                        }
                    });
                }
                
                // Clear search
                if (searchInput) {
                    searchInput.value = '';
                }
            });
        });
        
        // Accordion functionality (handled by Bootstrap)
        // Add active class styling
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', function() {
                const expanded = this.getAttribute('aria-expanded') === 'true';
                this.setAttribute('aria-expanded', !expanded);
            });
        });
    });
</script>
@endsection