<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Dr. Ahmed Raza | Matrimony Elite</title>
    <link rel="stylesheet" href="assets/style.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

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

    <!-- Profile Header -->
    <div class="profile-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 text-center">
                    <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         alt="Profile" class="profile-image-large mb-3">
                </div>
                <div class="col-md-9 profile-main-info">
                    <div class="d-flex flex-wrap align-items-center mb-3">
                        <h1 class="me-3 mb-2">Dr. Ahmed Raza</h1>
                        <span class="profile-badge badge-match">95% Match</span>
                        <span class="profile-badge badge-premium">Premium Member</span>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p class="mb-2"><i class="fas fa-user me-2"></i>32 Years | Male | Never Married</p>
                            <p class="mb-2"><i class="fas fa-map-marker-alt me-2"></i>London, UK | Lahore, Pakistan</p>
                            <p class="mb-2"><i class="fas fa-graduation-cap me-2"></i>MBBS, MRCP (UK)</p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-2"><i class="fas fa-briefcase me-2"></i>Consultant Physician</p>
                            <p class="mb-2"><i class="fas fa-home me-2"></i>Business Family | Sunni</p>
                            <p class="mb-2"><i class="fas fa-clock me-2"></i>Last Active: Today</p>
                        </div>
                    </div>
                    
                    <div class="action-buttons">
                        <button class="btn btn-primary">
                            <i class="fas fa-heart me-2"></i> Express Interest
                        </button>
                        <button class="btn btn-outline-primary">
                            <i class="fas fa-comment me-2"></i> Send Message
                        </button>
                        <button class="btn btn-outline-primary">
                            <i class="fas fa-phone me-2"></i> Request Contact
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container py-5">
        <div class="row">
            <!-- Left Column - Profile Details -->
            <div class="col-lg-8">
                <div class="profile-content">
                    <!-- About Section -->
                    <div class="profile-section">
                        <h3 class="section-title">About Me</h3>
                        <p>I am a Consultant Physician based in London with extensive experience in internal medicine. I believe in maintaining a balance between professional life and personal relationships. Family values are very important to me.</p>
                        <p>I enjoy traveling, reading medical journals, playing cricket on weekends, and exploring different cultures. Looking for a partner who values education, family, and has a modern outlook with traditional values.</p>
                    </div>
                    
                    <!-- Education & Career -->
                    <div class="profile-section">
                        <h3 class="section-title">Education & Career</h3>
                        <div class="info-item">
                            <i class="fas fa-graduation-cap"></i>
                            <div>
                                <h6 class="mb-1">MBBS - King Edward Medical University</h6>
                                <p class="text-muted mb-0">2008-2013 | Lahore, Pakistan</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-user-md"></i>
                            <div>
                                <h6 class="mb-1">MRCP (UK) - Royal College of Physicians</h6>
                                <p class="text-muted mb-0">2016-2019 | London, UK</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-briefcase"></i>
                            <div>
                                <h6 class="mb-1">Consultant Physician - Royal London Hospital</h6>
                                <p class="text-muted mb-0">2020-Present | London, UK</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Family Background -->
                    <div class="profile-section">
                        <h3 class="section-title">Family Background</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-item">
                                    <i class="fas fa-home"></i>
                                    <div>
                                        <h6 class="mb-1">Family Type</h6>
                                        <p class="mb-0">Business Family</p>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-user-friends"></i>
                                    <div>
                                        <h6 class="mb-1">Father's Occupation</h6>
                                        <p class="mb-0">Businessman (Textile)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item">
                                    <i class="fas fa-heart"></i>
                                    <div>
                                        <h6 class="mb-1">Mother's Occupation</h6>
                                        <p class="mb-0">Homemaker</p>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-users"></i>
                                    <div>
                                        <h6 class="mb-1">Siblings</h6>
                                        <p class="mb-0">2 Brothers, 1 Sister (All Married)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Lifestyle & Interests -->
                    <div class="profile-section">
                        <h3 class="section-title">Lifestyle & Interests</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-item">
                                    <i class="fas fa-utensils"></i>
                                    <div>
                                        <h6 class="mb-1">Diet</h6>
                                        <p class="mb-0">Non-Vegetarian</p>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-smoking"></i>
                                    <div>
                                        <h6 class="mb-1">Smoking</h6>
                                        <p class="mb-0">Never</p>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-wine-glass"></i>
                                    <div>
                                        <h6 class="mb-1">Drinking</h6>
                                        <p class="mb-0">Never</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item">
                                    <i class="fas fa-heart"></i>
                                    <div>
                                        <h6 class="mb-1">Hobbies</h6>
                                        <p class="mb-0">Travel, Reading, Cricket, Photography</p>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-music"></i>
                                    <div>
                                        <h6 class="mb-1">Interests</h6>
                                        <p class="mb-0">Medical Research, Community Service</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Partner Preferences -->
                    <div class="profile-section">
                        <h3 class="section-title">Partner Preferences</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-item">
                                    <i class="fas fa-user"></i>
                                    <div>
                                        <h6 class="mb-1">Age</h6>
                                        <p class="mb-0">25-30 Years</p>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-graduation-cap"></i>
                                    <div>
                                        <h6 class="mb-1">Education</h6>
                                        <p class="mb-0">Graduate or Above</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item">
                                    <i class="fas fa-heart"></i>
                                    <div>
                                        <h6 class="mb-1">Profession</h6>
                                        <p class="mb-0">Professional/Teacher/Homemaker</p>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-home"></i>
                                    <div>
                                        <h6 class="mb-1">Values</h6>
                                        <p class="mb-0">Family Oriented, Educated, Religious</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Photo Gallery -->
                    <div class="profile-section">
                        <h3 class="section-title">Photo Gallery</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="gallery-item">
                                    <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Profile">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="gallery-item">
                                    <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Family">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="gallery-item">
                                    <img src="https://images.unsplash.com/photo-1544725176-7c40e5a71c5e?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Travel">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Column - Sidebar -->
            <div class="col-lg-4">
                <div class="profile-sidebar">
                    <!-- Compatibility Card -->
                    <div class="sidebar-card">
                        <h5 class="section-title mb-4">Compatibility Score</h5>
                        <div class="text-center mb-4">
                            <div class="display-1 fw-bold text-primary mb-2">95%</div>
                            <p class="text-muted">Excellent Match Potential</p>
                        </div>
                        
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Values & Beliefs</span>
                                <span>92%</span>
                            </div>
                            <div class="compatibility-meter">
                                <div class="compatibility-fill" style="width: 92%"></div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Lifestyle Match</span>
                                <span>85%</span>
                            </div>
                            <div class="compatibility-meter">
                                <div class="compatibility-fill" style="width: 85%"></div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Family Compatibility</span>
                                <span>88%</span>
                            </div>
                            <div class="compatibility-meter">
                                <div class="compatibility-fill" style="width: 88%"></div>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Career Goals</span>
                                <span>78%</span>
                            </div>
                            <div class="compatibility-meter">
                                <div class="compatibility-fill" style="width: 78%"></div>
                            </div>
                        </div>
                        
                        <button class="btn btn-primary w-100">
                            <i class="fas fa-robot me-2"></i> View Detailed AI Analysis
                        </button>
                    </div>
                    
                    <!-- Contact Info -->
                    <div class="sidebar-card">
                        <h5 class="section-title mb-4">Contact Information</h5>
                        <div class="info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <h6 class="mb-1">Current Location</h6>
                                <p class="mb-0">London, United Kingdom</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-home"></i>
                            <div>
                                <h6 class="mb-1">Hometown</h6>
                                <p class="mb-0">Lahore, Pakistan</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-globe"></i>
                            <div>
                                <h6 class="mb-1">Citizenship</h6>
                                <p class="mb-0">British & Pakistani</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-language"></i>
                            <div>
                                <h6 class="mb-1">Languages</h6>
                                <p class="mb-0">English, Urdu, Punjabi</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Verified Information -->
                    <div class="sidebar-card">
                        <h5 class="section-title mb-4">
                            <i class="fas fa-shield-alt me-2"></i>Verified Information
                        </h5>
                        <div class="info-item">
                            <i class="fas fa-check-circle text-success"></i>
                            <div>
                                <h6 class="mb-1">Identity Verified</h6>
                                <p class="text-muted mb-0">ID Proof Verified</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-check-circle text-success"></i>
                            <div>
                                <h6 class="mb-1">Education Verified</h6>
                                <p class="text-muted mb-0">Degrees Verified</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-check-circle text-success"></i>
                            <div>
                                <h6 class="mb-1">Employment Verified</h6>
                                <p class="text-muted mb-0">Job Verified</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-check-circle text-success"></i>
                            <div>
                                <h6 class="mb-1">Background Check</h6>
                                <p class="text-muted mb-0">Clear</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include('footer.php'); ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/script.js"></script>
    
    <script>
        // Page Loader
        window.addEventListener("load", function () {
            const loader = document.getElementById("page-loader");
            setTimeout(() => {
                loader.style.display = "none";
            }, 500);
        });

        // Express Interest Button
        document.querySelector('.btn-primary').addEventListener('click', function() {
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Sending...';
            this.disabled = true;
            
            setTimeout(() => {
                this.innerHTML = '<i class="fas fa-check me-2"></i> Interest Sent';
                this.style.background = '#059669';
                alert('Interest has been sent successfully! You will be notified when they respond.');
            }, 1500);
        });

        // Send Message Button
        document.querySelectorAll('.btn-outline-primary')[0].addEventListener('click', function() {
            const message = prompt('Enter your message:');
            if (message) {
                alert('Message sent successfully!');
            }
        });

        // Request Contact Button
        document.querySelectorAll('.btn-outline-primary')[1].addEventListener('click', function() {
            const phone = prompt('Enter your phone number for contact request:');
            if (phone) {
                alert('Contact request has been sent!');
            }
        });
           window.addEventListener("load", function () {
    const loader = document.getElementById("page-loader");

    setTimeout(() => {
        loader.classList.add("hidden");

        // Optional: DOM se hata bhi de
        setTimeout(() => {
            loader.style.display = "none";
        }, 500);
    }, 800);
});
    </script>
</body>
</html>