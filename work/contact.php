<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Matrimony Elite</title>
           <link rel="stylesheet" href="assets/style.css">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
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
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), 
                        url('https://images.unsplash.com/photo-1560439514-4e9645039924?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            text-align: center;
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
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(16, 185, 129, 0.25);
        }
        
        .contact-info {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
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
        }
        
        .map-container {
            border-radius: 15px;
            overflow: hidden;
            margin: 40px 0;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
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
            .contact-container {
                padding: 30px 20px;
            }
            
            .contact-form {
                padding: 20px;
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
         <h1 class="mb-3">Connect with Our Expert Matchmakers</h1>
<p class="lead mb-4">Personalized guidance to help you find the love of your life</p>
<p class="mb-0">Your journey to the perfect match starts here – we’re with you every step of the way!</p>

        </div>
    </div>

    <!-- Main Content -->
    <div class="container py-5">
        <div class="contact-container">
            <div class="row">
                <!-- Contact Form -->
                <div class="col-lg-8">
                    <div class="contact-form">
                        <h3 class="mb-4" style="color: var(--primary);">Send us a Message</h3>
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Full Name *</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Phone Number *</label>
                                        <input type="tel" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Email Address *</label>
                                <input type="email" class="form-control" required>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Gender</label>
                                        <select class="form-select">
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Age</label>
                                        <input type="number" class="form-control" min="18" max="70">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Subject</label>
                                <select class="form-select">
                                    <option>General Inquiry</option>
                                    <option>Membership Questions</option>
                                    <option>Profile Assistance</option>
                                    <option>Technical Support</option>
                                    <option>Other</option>
                                </select>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label fw-bold">Your Message *</label>
                                <textarea class="form-control" rows="5" required></textarea>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-5">
                                    <i class="fas fa-paper-plane me-2"></i> Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Contact Information -->
                <div class="col-lg-4">
                    <div class="contact-info">
                        <h3 class="mb-4">Contact Information</h3>
                        
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <h5>Phone Numbers</h5>
                                <p class="mb-0">+92 317 6065004</p>
                                <p class="mb-0">+92 42 1234567</p>
                            </div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h5>Email Addresses</h5>
                                <p class="mb-0">info@alliedtajar.com</p>
                                <p class="mb-0">support@matrimonyelite.com</p>
                            </div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h5>Office Address</h5>
                                <p class="mb-0">123 Main Boulevard, Gulberg</p>
                                <p class="mb-0">Lahore, Pakistan</p>
                            </div>
                        </div>
                        
                        <div class="info-item" style="border-bottom: none; padding-bottom: 0;">
                            <div class="info-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <h5>Business Hours</h5>
                                <p class="mb-0">Monday - Saturday: 10:00 AM - 8:00 PM</p>
                                <p class="mb-0">Sunday: 12:00 PM - 6:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Map -->
        <div class="map-container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13606.230303429896!2d74.32987512414417!3d31.481633860768056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391903d4d940f12b%3A0xdb8c83fa1f2d7f5a!2sGulberg%2C%20Lahore%2C%20Punjab%2C%20Pakistan!5e0!3m2!1sen!2s!4v1692281234567!5m2!1sen!2s" 
                width="100%" 
                height="400" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        
        <!-- Team Section -->
        <div class="mt-5">
            <h3 class="text-center mb-5" style="color: var(--primary);">Our Matchmaking Team</h3>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="team-card">
                        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             alt="Team Member" class="team-img">
                        <h5>Sarah Ahmed</h5>
                        <p class="text-muted mb-2">Senior Matchmaker</p>
                        <p class="mb-3">With 10+ years of experience, Sarah has successfully matched over 500 couples.</p>
                        <p class="mb-0"><i class="fas fa-envelope me-2"></i>sarah@matrimonyelite.com</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="team-card">
                        <img src="https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             alt="Team Member" class="team-img">
                        <h5>Ali Raza</h5>
                        <p class="text-muted mb-2">International Matchmaker</p>
                        <p class="mb-3">Specializes in international matches, particularly UK, USA, and UAE.</p>
                        <p class="mb-0"><i class="fas fa-envelope me-2"></i>ali@matrimonyelite.com</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="team-card">
                        <img src="https://images.unsplash.com/photo-1551836026-d5c2c3af8d88?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             alt="Team Member" class="team-img">
                        <h5>Fatima Khan</h5>
                        <p class="text-muted mb-2">Family Counselor</p>
                        <p class="mb-3">Provides family mediation and counseling services for successful matches.</p>
                        <p class="mb-0"><i class="fas fa-envelope me-2"></i>fatima@matrimonyelite.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include('footer.php'); ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="assets/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
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
        document.addEventListener('DOMContentLoaded', function() {
            const contactForm = document.getElementById('contactForm');
            
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                
                // Show loading
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Sending...';
                submitBtn.disabled = true;
                
                // Simulate form submission
                setTimeout(() => {
                    // Reset button
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    
                    // Show success message
                    const successHTML = `
                        <div class="alert alert-success text-center">
                            <i class="fas fa-check-circle fa-2x mb-3"></i>
                            <h4>Message Sent Successfully!</h4>
                            <p>Thank you for contacting us. Our team will get back to you within 24 hours.</p>
                            <button class="btn btn-primary mt-2" onclick="this.closest('.alert').remove(); contactForm.reset();">
                                Send Another Message
                            </button>
                        </div>
                    `;
                    
                    contactForm.insertAdjacentHTML('beforebegin', successHTML);
                    contactForm.reset();
                    
                    // Scroll to success message
                    window.scrollTo({
                        top: contactForm.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }, 2000);
            });
        });
    </script>
</body>
</html>