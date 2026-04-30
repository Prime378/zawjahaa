@extends('layouts.app')

@section('title', 'AI Rishta Matchmaking | Zawjahaa - Marriage Bureau')

@section('content')
<style>
    :root {
        --primary: #10B981;
        --primary-dark: #059669;
        --secondary: #F59E0B;
        --accent: #F59E0B;
        --dark: #111827;
        --dark-light: #1F2937;
        --light: #F9FAFB;
        --light-gray: #F3F4F6;
        --gray: #6B7280;
        --gradient-green: linear-gradient(135deg, #10B981 0%, #059669 100%);
        --gradient-gold: linear-gradient(135deg, #F59E0B 0%, #FBBF24 100%);
        --gradient-dark: linear-gradient(135deg, #111827 0%, #1F2937 100%);
    }
    
    /* ===== HERO SECTION ===== */
    .hero-section {
        background: linear-gradient(135deg, #111827 0%, #1F2937 100%);
        color: white;
        padding: 100px 0 80px;
        text-align: center;
        position: relative;
        overflow: hidden;
        margin-top: 0;
    }
    
    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%2310B981" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
        background-size: cover;
        background-position: center;
    }
    
    .hero-section h1 {
        font-size: 3.2rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
        font-family: 'Playfair Display', serif;
        position: relative;
    }
    
    .hero-section h1 span {
        color: #34D399;
    }
    
    .hero-section p {
        font-size: 1.2rem;
        opacity: 0.95;
        max-width: 800px;
        margin: 0 auto 2rem;
    }
    
    .hero-badge {
        display: inline-block;
        background: rgba(255,255,255,0.1);
        padding: 0.75rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        margin-bottom: 1.5rem;
        border: 1px solid rgba(255,255,255,0.2);
        backdrop-filter: blur(10px);
    }
    
    /* ===== STATS BANNER ===== */
    .stats-banner {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        margin-top: -3rem;
        margin-bottom: 3rem;
        box-shadow: 0 15px 40px rgba(0,0,0,0.08);
        position: relative;
        z-index: 10;
        border-top: 5px solid var(--primary);
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 0.25rem;
    }
    
    .stat-label {
        font-size: 0.95rem;
        color: var(--gray);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    
    /* ===== AI FEATURES ===== */
    .test-card {
        background: white;
        border-radius: 30px;
        padding: 40px;
        margin: 40px 0;
        box-shadow: 0 15px 40px rgba(0,0,0,0.08);
        border: 2px solid transparent;
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }
    
    .test-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: var(--gradient-green);
    }
    
    .question-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin: 30px 0;
    }
    
    @media (max-width: 768px) {
        .question-grid {
            grid-template-columns: 1fr;
        }
    }
    
    .question-item {
        background: #F9FAFB;
        border-radius: 16px;
        padding: 25px;
        border-left: 6px solid var(--primary);
        transition: all 0.3s ease;
        height: 100%;
        box-shadow: 0 2px 10px rgba(0,0,0,0.03);
    }
    
    .question-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(16, 185, 129, 0.1);
    }
    
    .question-item h5 {
        color: var(--dark);
        font-weight: 700;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px dashed var(--primary-light);
    }
    
    .form-check {
        margin-bottom: 12px;
        padding-left: 2rem;
    }
    
    .form-check-input {
        width: 1.2rem;
        height: 1.2rem;
        margin-left: -2rem;
        border: 2px solid #d1d5db;
        transition: all 0.2s;
    }
    
    .form-check-input:checked {
        background-color: var(--primary);
        border-color: var(--primary);
    }
    
    .form-check-label {
        font-size: 1rem;
        color: #374151;
        cursor: pointer;
        line-height: 1.5;
    }
    
    .progress {
        height: 12px;
        border-radius: 10px;
        background: #e5e7eb;
        overflow: hidden;
    }
    
    .progress-bar {
        background: var(--gradient-green);
        border-radius: 10px;
        transition: width 0.5s ease;
    }
    
    /* ===== RESULT CARD ===== */
    .result-card {
        background: linear-gradient(135deg, #10B981 0%, #059669 100%);
        color: white;
        border-radius: 30px;
        padding: 50px;
        margin: 40px 0;
        text-align: center;
        box-shadow: 0 20px 40px rgba(16, 185, 129, 0.2);
        animation: fadeIn 0.5s ease;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .compatibility-score {
        font-size: 5rem;
        font-weight: 800;
        margin: 20px 0;
        text-shadow: 0 5px 15px rgba(0,0,0,0.1);
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }
    
    /* ===== MATCH CARDS - WITHOUT LOCK ===== */
    .match-card {
        background: white;
        border-radius: 20px;
        padding: 25px;
        margin-bottom: 20px;
        border: 2px solid transparent;
        transition: all 0.3s;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .match-card:hover {
        border-color: var(--primary);
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(16, 185, 129, 0.1);
    }
    
    .match-percentage {
        background: var(--gradient-green);
        color: white;
        padding: 8px 20px;
        border-radius: 30px;
        font-weight: 700;
        display: inline-block;
    }
    
    /* ===== PROFILE IMAGE - WITHOUT LOCK ===== */
    .profile-image-wrapper {
        position: relative;
        width: 90px;
        height: 90px;
        margin: 0 auto;
        display: inline-block;
    }
    
    .profile-image {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--primary);
        transition: all 0.3s;
    }
    
    .profile-image:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
    }
    
    /* ===== PROFILE ID STYLES ===== */
    .profile-id {
        font-family: monospace;
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--dark);
        letter-spacing: 0.5px;
    }
    
    /* ===== BUTTONS ===== */
    .btn-primary {
        background: var(--gradient-green);
        border: none;
        padding: 14px 35px;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s;
        color: white;
    }
    
    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(16, 185, 129, 0.4);
    }
    
    .btn-outline-primary {
        border: 2px solid var(--primary);
        color: var(--primary);
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s;
        background: transparent;
        text-decoration: none;
        display: inline-block;
    }
    
    .btn-outline-primary:hover {
        background: var(--primary);
        color: white;
        text-decoration: none;
    }
    
    .btn-outline-light {
        border: 2px solid white;
        color: white;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s;
        background: transparent;
        text-decoration: none;
        display: inline-block;
    }
    
    .btn-outline-light:hover {
        background: white;
        color: var(--primary);
        text-decoration: none;
    }
    
    .btn-success {
        background: var(--gradient-green);
        border: none;
        color: white;
    }
    
    .category-card {
        background: rgba(255,255,255,0.1);
        border-radius: 20px;
        padding: 15px;
        backdrop-filter: blur(10px);
        transition: all 0.3s;
    }
    
    .category-card:hover {
        transform: translateY(-3px);
        background: rgba(255,255,255,0.15);
    }
</style>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <span class="hero-badge">
            <i class="fas fa-robot me-2"></i> Zawjahaa AI Technology
        </span>
        <h1>AI-Powered <span>Rishta Matchmaking</span></h1>
        <p class="lead">Pakistan's First AI Marriage Bureau • 95% Accuracy Rate • 5,000+ Successful Matches</p>
        <div class="mt-4">
            <a href="#ai-test" class="btn btn-primary btn-lg px-5 py-3">
                <i class="fas fa-robot me-2"></i> Start Your AI Compatibility Test
            </a>
        </div>
    </div>
</div>

<!-- Stats Banner -->
<div class="container">
    <div class="stats-banner">
        <div class="row g-4">
            <div class="col-md-3 col-6">
                <div class="stat-item text-center">
                    <div class="stat-number">5,000+</div>
                    <div class="stat-label">Successful Marriages</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item text-center">
                    <div class="stat-number">35+</div>
                    <div class="stat-label">Countries Worldwide</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item text-center">
                    <div class="stat-number">95%</div>
                    <div class="stat-label">AI Accuracy Rate</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item text-center">
                    <div class="stat-number">15+</div>
                    <div class="stat-label">Years of Experience</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="container py-4">
    <!-- AI Compatibility Test -->
    <div class="test-card" id="ai-test">
        <div class="text-center mb-4">
            <span class="badge bg-success px-4 py-2 mb-3 rounded-pill">Free AI Compatibility Test</span>
            <h2 style="color: var(--primary); font-weight: 700;">Find Your Perfect Rishta Match</h2>
            <p class="text-muted">Answer these 4 questions and our AI will find your most compatible matches</p>
        </div>
        
        <!-- Test Progress -->
        <div class="mb-5">
            <div class="d-flex justify-content-between mb-2">
                <span class="fw-bold">Test Progress</span>
                <span class="fw-bold" id="progressText">0/4 Questions</span>
            </div>
            <div class="progress">
                <div class="progress-bar" id="progressBar" style="width: 0%;"></div>
            </div>
        </div>
        
        <!-- Questions Grid -->
        <div class="question-grid">
            <!-- Question 1 -->
            <div class="question-item">
                <h5>1. What are your most important values in a marriage?</h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1a" value="trust">
                    <label class="form-check-label" for="q1a">Trust, Honesty & Transparency</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1b" value="communication">
                    <label class="form-check-label" for="q1b">Communication & Mutual Understanding</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1c" value="goals">
                    <label class="form-check-label" for="q1c">Shared Goals & Life Vision</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1d" value="family">
                    <label class="form-check-label" for="q1d">Family Values & Religious Beliefs</label>
                </div>
            </div>
            
            <!-- Question 2 -->
            <div class="question-item">
                <h5>2. What type of lifestyle do you prefer?</h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q2" id="q2a" value="traditional">
                    <label class="form-check-label" for="q2a">Traditional & Family-oriented</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q2" id="q2b" value="modern">
                    <label class="form-check-label" for="q2b">Modern & Progressive</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q2" id="q2c" value="balanced">
                    <label class="form-check-label" for="q2c">Balanced - Mix of both</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q2" id="q2d" value="flexible">
                    <label class="form-check-label" for="q2d">Flexible & Adaptive</label>
                </div>
            </div>
            
            <!-- Question 3 -->
            <div class="question-item">
                <h5>3. What is your preference for partner's education & career?</h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q3" id="q3a" value="professional">
                    <label class="form-check-label" for="q3a">Professional (Doctor/Engineer/CA etc.)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q3" id="q3b" value="business">
                    <label class="form-check-label" for="q3b">Business / Entrepreneur</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q3" id="q3c" value="government">
                    <label class="form-check-label" for="q3c">Government / Teaching</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q3" id="q3d" value="any">
                    <label class="form-check-label" for="q3d">Any / Not Important</label>
                </div>
            </div>
            
            <!-- Question 4 -->
            <div class="question-item">
                <h5>4. How important is family and religious compatibility?</h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q4" id="q4a" value="very">
                    <label class="form-check-label" for="q4a">Very Important - Same values</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q4" id="q4b" value="moderate">
                    <label class="form-check-label" for="q4b">Moderately Important</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q4" id="q4c" value="flexible">
                    <label class="form-check-label" for="q4c">Flexible / Open-minded</label>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <button class="btn btn-primary px-5 py-3" id="calculateScore">
                <i class="fas fa-calculator me-2"></i> Calculate My Compatibility Score
            </button>
            <p class="text-muted mt-3 small">
                <i class="fas fa-lock me-1"></i> Your information is 100% confidential and secure
            </p>
        </div>
    </div>
    
    <!-- Results Section -->
    <div class="result-card" id="results" style="display: none;">
        <i class="fas fa-heart fa-3x mb-4"></i>
        <h2 class="mb-3">Your AI Compatibility Results</h2>
        <div class="compatibility-score" id="scoreDisplay">0%</div>
        <p class="h4 mb-4" id="resultMessage"></p>
        
        <div class="row mt-5 g-3" id="categoryScores"></div>
        
        <div class="mt-5">
            <p class="h5" id="matchesFoundText"></p>
            <div class="mt-4 d-flex flex-wrap gap-3 justify-content-center">
                <a href="{{ route('search') }}" class="btn btn-light px-4 py-2 rounded-pill" id="viewMatchesBtn">
                    <i class="fas fa-users me-2"></i> View Your AI Matches
                </a>
                <button class="btn btn-outline-light px-4 py-2 rounded-pill" id="retakeTest">
                    <i class="fas fa-redo me-2"></i> Retake Test
                </button>
            </div>
        </div>
    </div>
    
    <!-- AI Recommended Matches - WITHOUT LOCKS -->
    <div class="mt-5" id="ai-matches-section">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <h3 style="color: var(--primary); font-weight: 700;">Your AI Recommended Rishta Matches</h3>
            <span class="badge bg-success px-4 py-2 rounded-pill">Updated Today</span>
        </div>
        
        <div id="recommended-profiles-container">
            @forelse($recommendedProfiles ?? [] as $profile)
                @php
                    $age = $profile->dob ? \Carbon\Carbon::parse($profile->dob)->age : 'N/A';
                    $formattedId = 'ZWJ' . str_pad($profile->id, 5, '0', STR_PAD_LEFT);
                    $location = trim(($profile->city ?? '') . ', ' . ($profile->country ?? ''), ', ');
                    $location = $location ?: 'Location not specified';
                    
                    $matchPercentage = 85;
                    if (!empty($profile->education)) $matchPercentage += 3;
                    if (!empty($profile->profession)) $matchPercentage += 3;
                    if (!empty($profile->city)) $matchPercentage += 2;
                    if (!empty($profile->religion)) $matchPercentage += 3;
                    $matchPercentage = min(98, $matchPercentage);
                    
                    $imageUrl = $profile->profile_image 
                        ? asset('uploads/profiles/' . basename($profile->profile_image)) 
                        : 'https://ui-avatars.com/api/?name=' . urlencode($formattedId) . '&size=90&background=10B981&color=fff';
                    
                    $maritalStatus = ucfirst(str_replace('_', ' ', $profile->marital_status ?? 'Not specified'));
                    $education = $profile->education ?? 'Education not specified';
                    $profession = $profile->profession ?? 'Profession not specified';
                @endphp
                <div class="match-card">
                    <div class="row align-items-center">
                        <div class="col-md-2 text-center mb-3 mb-md-0">
                            <div class="profile-image-wrapper">
                                <img src="{{ $imageUrl }}" 
                                     class="profile-image" 
                                     width="90" height="90" 
                                     alt="{{ $formattedId }}">
                                <!-- LOCK COMPLETELY REMOVED - Image directly visible -->
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h4 class="fw-bold mb-2 profile-id">{{ $formattedId }}</h4>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2 text-success"></i>{{ $age }} Years • {{ $maritalStatus }} • {{ $location }}
                            </p>
                            <p class="mb-2">
                                <i class="fas fa-graduation-cap me-2 text-success"></i>{{ $education }} • {{ $profession }}
                            </p>
                        </div>
                        <div class="col-md-3 text-center mt-3 mt-md-0">
                            <span class="match-percentage mb-3 d-inline-block">{{ $matchPercentage }}% Match</span>
                            <br>
                            <!-- VIEW PROFILE BUTTON - Direct link -->
                            <a href="{{ route('profile.show', $profile->id) }}" class="btn btn-primary btn-sm mt-2 px-4 rounded-pill">
                                <i class="fas fa-eye me-1"></i> View Profile
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <i class="fas fa-users fa-3x text-muted mb-3"></i>
                    <h4>No Profiles Found</h4>
                    <p class="text-muted">Check back later or adjust your filters</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Load More Button -->
<div class="text-center mb-5" id="loadMoreContainer">
    <button class="btn btn-outline-primary px-5 py-3" id="loadMoreBtn" data-page="1">
        <i class="fas fa-sync-alt me-2"></i> Load More Matches
    </button>
</div>

<!-- ALL PREMIUM MODALS REMOVED - No lock modals needed -->

<script>
    // Make sure Bootstrap is loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Check if Bootstrap is available
        if (typeof bootstrap === 'undefined') {
            console.error('Bootstrap not loaded!');
        } else {
            console.log('Bootstrap loaded successfully');
        }

        const calculateBtn = document.getElementById('calculateScore');
        const resultsSection = document.getElementById('results');
        const testSection = document.querySelector('.test-card');
        const scoreDisplay = document.getElementById('scoreDisplay');
        const resultMessage = document.getElementById('resultMessage');
        const categoryScores = document.getElementById('categoryScores');
        const matchesFoundText = document.getElementById('matchesFoundText');
        const viewMatchesBtn = document.getElementById('viewMatchesBtn');
        const retakeBtn = document.getElementById('retakeTest');
        const progressBar = document.getElementById('progressBar');
        const progressText = document.getElementById('progressText');
        const loadMoreBtn = document.getElementById('loadMoreBtn');
        
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';
        
        // Progress bar update
        const radios = document.querySelectorAll('input[type="radio"]');
        radios.forEach(radio => {
            radio.addEventListener('change', updateProgress);
        });
        
        function updateProgress() {
            const answered = document.querySelectorAll('input[type="radio"]:checked').length;
            const total = 4;
            const percentage = (answered / total) * 100;
            progressBar.style.width = percentage + '%';
            progressText.textContent = answered + '/' + total + ' Questions';
        }
        
        if (calculateBtn) {
            calculateBtn.addEventListener('click', function() {
                const q1 = document.querySelector('input[name="q1"]:checked');
                const q2 = document.querySelector('input[name="q2"]:checked');
                const q3 = document.querySelector('input[name="q3"]:checked');
                const q4 = document.querySelector('input[name="q4"]:checked');
                
                if (!q1 || !q2 || !q3 || !q4) {
                    alert('Please answer all 4 questions before calculating your score.');
                    return;
                }
                
                const answers = {
                    q1: q1.value,
                    q2: q2.value,
                    q3: q3.value,
                    q4: q4.value
                };
                
                this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> AI Analyzing...';
                this.disabled = true;
                
                fetch('{{ route("ai.calculate") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(answers)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        testSection.style.display = 'none';
                        resultsSection.style.display = 'block';
                        resultsSection.scrollIntoView({ behavior: 'smooth' });
                        
                        let score = 0;
                        const targetScore = data.overall_score;
                        const counter = setInterval(() => {
                            if (score < targetScore) {
                                score++;
                                scoreDisplay.textContent = score + '%';
                            } else {
                                clearInterval(counter);
                            }
                        }, 30);
                        
                        resultMessage.textContent = data.message;
                        
                        let html = '';
                        for (const [category, score] of Object.entries(data.category_scores)) {
                            html += `
                                <div class="col-md-3 col-6">
                                    <div class="bg-white bg-opacity-10 rounded-4 p-3 category-card">
                                        <h6 class="text-white">${category}</h6>
                                        <div class="progress mb-2">
                                            <div class="progress-bar bg-white" style="width: ${score}%;"></div>
                                        </div>
                                        <span class="fw-bold">${score}%</span>
                                    </div>
                                </div>
                            `;
                        }
                        categoryScores.innerHTML = html;
                        
                        matchesFoundText.innerHTML = `Based on your responses, our AI found <strong class="text-warning">${data.matches_count} compatible rishta matches</strong> for you!`;
                        
                        viewMatchesBtn.href = data.search_url;
                        sessionStorage.setItem('aiAnswers', JSON.stringify(answers));
                        
                        // Reload profiles
                        setTimeout(loadRecommendedProfiles, 500);
                    }
                    
                    this.innerHTML = '<i class="fas fa-calculator me-2"></i> Calculate My Compatibility Score';
                    this.disabled = false;
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                    this.innerHTML = '<i class="fas fa-calculator me-2"></i> Calculate My Compatibility Score';
                    this.disabled = false;
                });
            });
        }
        
        function loadRecommendedProfiles() {
            console.log('Loading profiles...');
            fetch('/get-recommended-profiles', {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log('Profile data received:', data);
                if (data.html) {
                    document.getElementById('recommended-profiles-container').innerHTML = data.html;
                }
            })
            .catch(error => {
                console.error('Error loading profiles:', error);
            });
        }
        
        // Load More functionality
        if (loadMoreBtn) {
            loadMoreBtn.addEventListener('click', function() {
                let page = this.dataset.page || 1;
                page = parseInt(page) + 1;
                
                this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Loading...';
                this.disabled = true;
                
                fetch('/load-more-matches?page=' + page, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.html) {
                        document.getElementById('recommended-profiles-container').insertAdjacentHTML('beforeend', data.html);
                        this.dataset.page = page;
                    }
                    
                    if (data.next_page) {
                        this.innerHTML = '<i class="fas fa-sync-alt me-2"></i> Load More Matches';
                        this.disabled = false;
                    } else {
                        this.innerHTML = '<i class="fas fa-check me-2"></i> No More Matches';
                        this.disabled = true;
                    }
                })
                .catch(error => {
                    console.error('Error loading more profiles:', error);
                    this.innerHTML = '<i class="fas fa-sync-alt me-2"></i> Load More Matches';
                    this.disabled = false;
                });
            });
        }
        
        if (retakeBtn) {
            retakeBtn.addEventListener('click', function() {
                testSection.style.display = 'block';
                resultsSection.style.display = 'none';
                document.querySelectorAll('input[type="radio"]').forEach(r => r.checked = false);
                progressBar.style.width = '0%';
                progressText.textContent = '0/4 Questions';
                sessionStorage.removeItem('aiAnswers');
                testSection.scrollIntoView({ behavior: 'smooth' });
            });
        }
        
        // Load stored answers
        const stored = sessionStorage.getItem('aiAnswers');
        if (stored) {
            try {
                const answers = JSON.parse(stored);
                Object.keys(answers).forEach(key => {
                    const radio = document.querySelector(`input[name="${key}"][value="${answers[key]}"]`);
                    if (radio) radio.checked = true;
                });
                updateProgress();
            } catch (e) {
                console.error('Error loading stored answers:', e);
            }
        }
        
        // Initial load
        loadRecommendedProfiles();
    });
</script>
@endsection