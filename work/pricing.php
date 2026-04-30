<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Plans | Matrimony Elite</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
           <link rel="stylesheet" href="assets/style.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700;800;900&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
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
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background: var(--light);
            color: #333;
        }
        
        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-bottom: 3px solid var(--primary);
        }
        
        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary);
        }
        
        .navbar-brand i {
            color: var(--secondary);
        }
        
        .nav-link {
            color: var(--dark) !important;
            font-weight: 600;
            margin: 0 5px;
        }
        
        .nav-link.active {
            color: var(--primary) !important;
        }
        
        .hero-section {
            background: linear-gradient(135deg, #111827 0%, #1F2937 100%);
            color: white;
            padding: 100px 0;
            text-align: center;
        }
        
        .pricing-card {
            background: white;
            border-radius: 15px;
            padding: 40px 30px;
            margin: 20px 0;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: 2px solid #E5E7EB;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }
        
        .pricing-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }
        
        .pricing-card.popular {
            border-color: var(--primary);
            transform: scale(1.05);
        }
        
        .pricing-card.popular:hover {
            transform: scale(1.05) translateY(-10px);
        }
        
        .popular-badge {
            position: absolute;
            top: 20px;
            right: -35px;
            background: var(--primary);
            color: white;
            padding: 8px 40px;
            font-size: 0.9rem;
            font-weight: 700;
            transform: rotate(45deg);
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        }
        
        .pricing-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .pricing-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 10px;
        }
        
        .pricing-price {
            font-size: 3.5rem;
            font-weight: 800;
            color: var(--primary);
            margin: 20px 0;
        }
        
        .pricing-price span {
            font-size: 1.2rem;
            color: #6B7280;
            font-weight: 400;
        }
        
        .pricing-features {
            list-style: none;
            padding: 0;
            margin-bottom: 40px;
        }
        
        .pricing-features li {
            padding: 12px 0;
            border-bottom: 1px solid #E5E7EB;
            display: flex;
            align-items: center;
        }
        
        .pricing-features li i {
            margin-right: 10px;
            font-size: 1.1rem;
        }
        
        .faq-section {
            background: white;
            border-radius: 15px;
            padding: 40px;
            margin: 40px 0;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .faq-item {
            margin-bottom: 30px;
            border-bottom: 1px solid #E5E7EB;
            padding-bottom: 20px;
        }
        
        .faq-question {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 10px;
        }
        
        .btn-primary {
            background: var(--gradient-green);
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
            width: 100%;
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
        }
        
        .btn-outline-primary {
            color: var(--primary);
            border: 2px solid var(--primary);
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
            width: 100%;
        }
        
        .btn-outline-primary:hover {
            background: var(--primary);
            color: white;
        }
        
        footer {
            background: var(--dark);
            color: white;
            padding: 60px 0 30px;
            margin-top: 80px;
        }
        
        .footer-links a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
            transition: all 0.3s;
        }
        
        .footer-links a:hover {
            color: white;
            padding-left: 10px;
        }
        
        @media (max-width: 768px) {
            .pricing-card.popular {
                transform: scale(1);
            }
            
            .pricing-card.popular:hover {
                transform: translateY(-10px);
            }
        }
    </style>
</head>
<body>
    <div id="page-loader"
        class="position-fixed top-0 start-0 w-100 h-100 bg-white d-flex justify-content-center align-items-center"
        style="z-index: 9999;">
        <div class="loader-wrapper position-relative" style="width: 120px; height: 120px;">
            <div class="loader-ring position-absolute top-0 start-0 w-100 h-100 rounded-circle"></div>
            <img src="assets/logo.jpeg" alt="Loading..." id="loader-img"
                class="position-absolute top-50 start-50 translate-middle" />
        </div>
    </div>
    <!-- Navigation -->
    <?php include('header.php');?>

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container">
            <h1 class="mb-3">Choose Your Perfect Plan</h1>
            <p class="lead mb-4">Start your journey to finding the perfect match with our premium plans</p>
            <p class="mb-0">All plans include 7-day free trial</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container py-5">
        <!-- Pricing Plans -->
        <div class="row justify-content-center">
            <!-- Basic Plan -->
            <div class="col-lg-4 mb-4">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3 class="pricing-title">Basic</h3>
                        <p class="text-muted">For those starting their search</p>
                        <div class="pricing-price">$49<span>/month</span></div>
                    </div>
                    
                    <ul class="pricing-features">
                        <li><i class="fas fa-check text-success me-2"></i> Browse 50 profiles daily</li>
                        <li><i class="fas fa-check text-success me-2"></i> Basic search filters</li>
                        <li><i class="fas fa-check text-success me-2"></i> Send 5 interests/month</li>
                        <li><i class="fas fa-check text-success me-2"></i> Profile creation</li>
                        <li><i class="fas fa-times text-danger me-2"></i> AI Compatibility Test</li>
                        <li><i class="fas fa-times text-danger me-2"></i> Personal Matchmaker</li>
                        <li><i class="fas fa-times text-danger me-2"></i> Profile Highlighting</li>
                    </ul>
                    
                    <button class="btn btn-outline-primary" onclick="selectPlan('Basic')">Choose Basic Plan</button>
                </div>
            </div>
            
            <!-- Premium Plan (Most Popular) -->
            <div class="col-lg-4 mb-4">
                <div class="pricing-card popular">
                    <div class="popular-badge">MOST POPULAR</div>
                    <div class="pricing-header">
                        <h3 class="pricing-title">Premium</h3>
                        <p class="text-muted">Best value for serious seekers</p>
                        <div class="pricing-price">$99<span>/month</span></div>
                    </div>
                    
                    <ul class="pricing-features">
                        <li><i class="fas fa-check text-success me-2"></i> Unlimited profile access</li>
                        <li><i class="fas fa-check text-success me-2"></i> Advanced search filters</li>
                        <li><i class="fas fa-check text-success me-2"></i> Unlimited interests</li>
                        <li><i class="fas fa-check text-success me-2"></i> AI Compatibility Test</li>
                        <li><i class="fas fa-check text-success me-2"></i> Personal Matchmaker</li>
                        <li><i class="fas fa-check text-success me-2"></i> Priority customer support</li>
                        <li><i class="fas fa-check text-success me-2"></i> Verified badge</li>
                    </ul>
                    
                    <button class="btn btn-primary" onclick="selectPlan('Premium')">Choose Premium Plan</button>
                </div>
            </div>
            
            <!-- Elite Plan -->
            <div class="col-lg-4 mb-4">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3 class="pricing-title">Elite</h3>
                        <p class="text-muted">VIP service for discerning clients</p>
                        <div class="pricing-price">$199<span>/month</span></div>
                    </div>
                    
                    <ul class="pricing-features">
                        <li><i class="fas fa-check text-success me-2"></i> Everything in Premium</li>
                        <li><i class="fas fa-check text-success me-2"></i> Profile Highlighting</li>
                        <li><i class="fas fa-check text-success me-2"></i> VIP customer support</li>
                        <li><i class="fas fa-check text-success me-2"></i> Background verification</li>
                        <li><i class="fas fa-check text-success me-2"></i> Monthly progress reports</li>
                        <li><i class="fas fa-check text-success me-2"></i> Wedding planning consultation</li>
                        <li><i class="fas fa-check text-success me-2"></i> Family mediation services</li>
                    </ul>
                    
                    <button class="btn btn-outline-primary" onclick="selectPlan('Elite')">Choose Elite Plan</button>
                </div>
            </div>
        </div>
        
        <!-- Comparison Table -->
        <div class="faq-section">
            <h3 class="text-center mb-5" style="color: var(--primary);">Plan Comparison</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="background: #F9FAFB;">Feature</th>
                            <th class="text-center">Basic</th>
                            <th class="text-center" style="background: rgba(16, 185, 129, 0.1);">Premium</th>
                            <th class="text-center">Elite</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Profile Access</td>
                            <td class="text-center">50/day</td>
                            <td class="text-center" style="background: rgba(16, 185, 129, 0.05);">Unlimited</td>
                            <td class="text-center">Unlimited</td>
                        </tr>
                        <tr>
                            <td>AI Compatibility Test</td>
                            <td class="text-center"><i class="fas fa-times text-danger"></i></td>
                            <td class="text-center" style="background: rgba(16, 185, 129, 0.05);"><i class="fas fa-check text-success"></i></td>
                            <td class="text-center"><i class="fas fa-check text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Personal Matchmaker</td>
                            <td class="text-center"><i class="fas fa-times text-danger"></i></td>
                            <td class="text-center" style="background: rgba(16, 185, 129, 0.05);"><i class="fas fa-check text-success"></i></td>
                            <td class="text-center"><i class="fas fa-check text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Background Verification</td>
                            <td class="text-center"><i class="fas fa-times text-danger"></i></td>
                            <td class="text-center" style="background: rgba(16, 185, 129, 0.05);"><i class="fas fa-check text-success"></i></td>
                            <td class="text-center"><i class="fas fa-check text-success"></i></td>
                        </tr>
                        <tr>
                            <td>VIP Support</td>
                            <td class="text-center"><i class="fas fa-times text-danger"></i></td>
                            <td class="text-center" style="background: rgba(16, 185, 129, 0.05);">Priority</td>
                            <td class="text-center">24/7 VIP</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- FAQ Section -->
        <div class="faq-section">
            <h3 class="text-center mb-5" style="color: var(--primary);">Frequently Asked Questions</h3>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="faq-item">
                        <div class="faq-question">Can I change my plan later?</div>
                        <p>Yes, you can upgrade or downgrade your plan at any time. Changes will take effect in your next billing cycle.</p>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question">Is there a free trial?</div>
                        <p>Yes, all plans come with a 7-day free trial. You can cancel anytime during the trial period without any charges.</p>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question">How do I cancel my subscription?</div>
                        <p>You can cancel your subscription anytime from your account settings. No cancellation fees apply.</p>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="faq-item">
                        <div class="faq-question">What payment methods do you accept?</div>
                        <p>We accept all major credit cards, PayPal, and bank transfers for Pakistani customers.</p>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question">Is my payment information secure?</div>
                        <p>Yes, we use industry-standard encryption and secure payment processors to protect your information.</p>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question">Do you offer refunds?</div>
                        <p>We offer a 30-day money-back guarantee if you're not satisfied with our service.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include('footer.php'); ?>

    <!-- Bootstrap JS -->
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="assets/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function selectPlan(planName) {
            const planModal = `
                <div class="modal fade" id="planModal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header" style="background: var(--primary); color: white;">
                                <h5 class="modal-title">Select ${planName} Plan</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-center py-5">
                                <i class="fas fa-check-circle text-success fa-4x mb-4"></i>
                                <h4 class="mb-3">${planName} Plan Selected!</h4>
                                <p class="text-muted mb-4">You will be redirected to the registration page to complete your signup.</p>
                                <div class="d-flex justify-content-center gap-3">
                                    <button class="btn btn-primary" onclick="proceedToSignup('${planName}')">
                                        Proceed to Signup
                                    </button>
                                    <button class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            // Remove existing modal
            const existingModal = document.getElementById('planModal');
            if (existingModal) existingModal.remove();
            
            // Add modal to body
            document.body.insertAdjacentHTML('beforeend', planModal);
            
            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('planModal'));
            modal.show();
        }
        
        function proceedToSignup(planName) {
            alert(`Redirecting to ${planName} plan signup...`);
            // In real application, redirect to signup page with plan parameter
            // window.location.href = `signup.html?plan=${planName}`;
        }
        window.addEventListener("load", function () {
    const loader = document.getElementById("page-loader");

    setTimeout(() => {
        loader.classList.add("hidden");

        // Optional: DOM se hata bhi de
        setTimeout(() => {
            loader.style.display = "none";
        }, 500);

    }, 800); // thora smooth delay
});
    </script>
</body>
</html>