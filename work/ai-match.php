<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Matchmaking | Matrimony Elite</title>
    
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
        
        .ai-features {
            background: white;
            border-radius: 15px;
            padding: 40px;
            margin: 40px 0;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .ai-icon {
            width: 80px;
            height: 80px;
            background: rgba(16, 185, 129, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: var(--primary);
            margin: 0 auto 20px;
        }
        
        .test-card {
            background: white;
            border-radius: 15px;
            padding: 40px;
            margin: 30px 0;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: 2px solid transparent;
            transition: all 0.3s;
        }
        
        .test-card:hover {
            border-color: var(--primary);
            transform: translateY(-5px);
        }
        
        .question-item {
            background: #F9FAFB;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border-left: 4px solid var(--primary);
        }
        
        .progress {
            height: 12px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        
        .progress-bar {
            background: var(--gradient-green);
            border-radius: 10px;
        }
        
        .result-card {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            color: white;
            border-radius: 15px;
            padding: 40px;
            margin: 30px 0;
            text-align: center;
        }
        
        .compatibility-score {
            font-size: 4rem;
            font-weight: 800;
            margin: 20px 0;
        }
        
        .match-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border: 2px solid transparent;
            transition: all 0.3s;
        }
        
        .match-card:hover {
            border-color: var(--primary);
            transform: translateY(-3px);
        }
        
        .match-percentage {
            background: var(--primary);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
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
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
           <a class="navbar-brand d-flex align-items-center gap-2" href="index.html">
    <img src="assets/logo.jpeg" alt="Allied Bureau Logo" class="header-logo">
     <span class="fw-bold text-dark">Zojah </span>
                <span class="fw-bold text-success"> Jorha</span>
</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="search.html">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.html">Profiles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="ai-match.html">AI Match</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pricing.html">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container">
            <h1 class="mb-3">AI-Powered Matchmaking</h1>
            <p class="lead mb-4">Our advanced AI analyzes 100+ compatibility factors to find your perfect match</p>
            <a href="#ai-test" class="btn btn-primary btn-lg">
                <i class="fas fa-robot me-2"></i> Take AI Compatibility Test
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container py-5">
        <!-- AI Features -->
        <div class="ai-features">
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="ai-icon">
                        <i class="fas fa-brain"></i>
                    </div>
                    <h4 class="mb-3" style="color: var(--primary);">Personality Analysis</h4>
                    <p>Deep learning algorithms analyze personality traits and compatibility factors</p>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="ai-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <h4 class="mb-3" style="color: var(--primary);">Values Matching</h4>
                    <p>Match based on core values, beliefs, and lifestyle preferences</p>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="ai-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h4 class="mb-3" style="color: var(--primary);">Success Prediction</h4>
                    <p>Predict long-term relationship success with 95% accuracy</p>
                </div>
            </div>
        </div>
        
        <!-- AI Compatibility Test -->
        <div class="test-card" id="ai-test">
            <h2 class="text-center mb-4" style="color: var(--primary);">AI Compatibility Test</h2>
            <p class="text-center mb-5">Answer these questions to get your personalized compatibility profile</p>
            
            <!-- Test Progress -->
            <div class="mb-4">
                <div class="d-flex justify-content-between mb-2">
                    <span>Test Progress</span>
                    <span>2/10 Questions</span>
                </div>
                <div class="progress">
                    <div class="progress-bar" style="width: 20%;"></div>
                </div>
            </div>
            
            <!-- Questions -->
            <div class="question-item">
                <h5 class="mb-3">1. What are your most important values in a relationship?</h5>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="q1" id="q1a">
                    <label class="form-check-label" for="q1a">Trust and Honesty</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="q1" id="q1b">
                    <label class="form-check-label" for="q1b">Communication and Understanding</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="q1" id="q1c">
                    <label class="form-check-label" for="q1c">Shared Goals and Ambitions</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1d">
                    <label class="form-check-label" for="q1d">Emotional Support and Care</label>
                </div>
            </div>
            
            <div class="question-item">
                <h5 class="mb-3">2. What type of lifestyle do you prefer?</h5>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="q2" id="q2a">
                    <label class="form-check-label" for="q2a">Traditional and Family-oriented</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="q2" id="q2b">
                    <label class="form-check-label" for="q2b">Modern and Progressive</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="q2" id="q2c">
                    <label class="form-check-label" for="q2c">Balanced - Mix of traditional and modern</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q2" id="q2d">
                    <label class="form-check-label" for="q2d">Flexible and Adaptive</label>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <button class="btn btn-primary" id="calculateScore">
                    <i class="fas fa-calculator me-2"></i> Calculate My Compatibility Score
                </button>
            </div>
        </div>
        
        <!-- Results Section -->
        <div class="result-card" id="results" style="display: none;">
            <h2 class="mb-3">Your AI Compatibility Results</h2>
            <div class="compatibility-score" id="scoreDisplay">92%</div>
            <p class="mb-4">Excellent Match Potential</p>
            
            <div class="row">
                <div class="col-md-3 mb-3">
                    <h5>Values Match</h5>
                    <div class="progress mb-2">
                        <div class="progress-bar" style="width: 94%;"></div>
                    </div>
                    <span>94%</span>
                </div>
                <div class="col-md-3 mb-3">
                    <h5>Lifestyle Match</h5>
                    <div class="progress mb-2">
                        <div class="progress-bar" style="width: 88%;"></div>
                    </div>
                    <span>88%</span>
                </div>
                <div class="col-md-3 mb-3">
                    <h5>Personality Match</h5>
                    <div class="progress mb-2">
                        <div class="progress-bar" style="width: 91%;"></div>
                    </div>
                    <span>91%</span>
                </div>
                <div class="col-md-3 mb-3">
                    <h5>Goals Match</h5>
                    <div class="progress mb-2">
                        <div class="progress-bar" style="width: 95%;"></div>
                    </div>
                    <span>95%</span>
                </div>
            </div>
            
            <p class="mt-4">Based on your responses, we have found <strong>15 highly compatible matches</strong> for you!</p>
            <a href="search.html" class="btn btn-light mt-3">
                <i class="fas fa-users me-2"></i> View Your AI Matches
            </a>
        </div>
        
        <!-- AI Matches -->
        <div class="mt-5">
            <h3 class="mb-4" style="color: var(--primary);">Your AI Recommended Matches</h3>
            
            <div class="match-card">
                <div class="row align-items-center">
                    <div class="col-md-2 text-center">
                        <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                             class="rounded-circle" width="80" height="80" alt="Profile">
                    </div>
                    <div class="col-md-7">
                        <h5>Dr. Ahmed Raza</h5>
                        <p class="text-muted mb-2">32 years | Consultant Physician | London</p>
                        <p><strong>AI Match Factors:</strong> Similar values (94%), Career goals (92%), Family orientation (96%)</p>
                    </div>
                    <div class="col-md-3 text-center">
                        <span class="match-percentage mb-2 d-inline-block">95% Match</span>
                        <br>
                        <button class="btn btn-sm btn-primary mt-2">View Profile</button>
                    </div>
                </div>
            </div>
            
            <div class="match-card">
                <div class="row align-items-center">
                    <div class="col-md-2 text-center">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                             class="rounded-circle" width="80" height="80" alt="Profile">
                    </div>
                    <div class="col-md-7">
                        <h5>Sana Khan</h5>
                        <p class="text-muted mb-2">28 years | Banking Executive | Karachi</p>
                        <p><strong>AI Match Factors:</strong> Lifestyle compatibility (92%), Educational background (95%), Values alignment (93%)</p>
                    </div>
                    <div class="col-md-3 text-center">
                        <span class="match-percentage mb-2 d-inline-block">92% Match</span>
                        <br>
                        <button class="btn btn-sm btn-primary mt-2">View Profile</button>
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
        document.addEventListener('DOMContentLoaded', function() {
            const calculateBtn = document.getElementById('calculateScore');
            const resultsSection = document.getElementById('results');
            const scoreDisplay = document.getElementById('scoreDisplay');
            
            calculateBtn.addEventListener('click', function() {
                // Show loading
                this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Calculating...';
                
                // Simulate AI calculation
                setTimeout(() => {
                    // Hide test and show results
                    document.querySelector('.test-card').style.display = 'none';
                    resultsSection.style.display = 'block';
                    
                    // Scroll to results
                    resultsSection.scrollIntoView({ behavior: 'smooth' });
                    
                    // Animate score counter
                    let score = 0;
                    const targetScore = 92;
                    const counter = setInterval(() => {
                        if (score < targetScore) {
                            score++;
                            scoreDisplay.textContent = score + '%';
                        } else {
                            clearInterval(counter);
                        }
                    }, 30);
                }, 2000);
            });
        });
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