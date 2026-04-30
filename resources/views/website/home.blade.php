<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Zawjahaa | Premium Islamic Matrimonial</title>
    <!-- Google Fonts: Luxury Serif + Clean Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700;800&family=Inter:opsz,wght@14..32,300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #FEFCF8;
            color: #1F2E28;
            overflow-x: hidden;
        }

        /* custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #EDE8DE;
        }
        ::-webkit-scrollbar-thumb {
            background: #C8A24A;
            border-radius: 10px;
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 32px;
        }

        /* typography */
        h1, h2, h3, .logo {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 700;
            letter-spacing: -0.01em;
        }

        h2 {
            font-size: 2.8rem;
            margin-bottom: 1rem;
            color: #0B4F2F;
            position: relative;
            display: inline-block;
        }
        h2:after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 0;
            width: 70px;
            height: 3px;
            background: linear-gradient(90deg, #C8A24A, #0B6B3A);
            border-radius: 3px;
        }
        .section-subhead {
            font-size: 1.1rem;
            color: #5B6E62;
            margin-bottom: 3rem;
            max-width: 600px;
        }

        /* premium buttons */
        .btn-primary {
            background: linear-gradient(105deg, #0B6B3A, #0A8A48);
            color: white;
            border: none;
            padding: 14px 36px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.35s ease;
            box-shadow: 0 12px 22px -8px rgba(11, 107, 58, 0.35);
            display: inline-flex;
            align-items: center;
            gap: 10px;
            position: relative;
            overflow: hidden;
        }
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }
        .btn-primary:hover::before {
            left: 100%;
        }
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 28px -10px rgba(11, 107, 58, 0.5);
        }

        .btn-secondary {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(200, 162, 74, 0.7);
            color: #0B6B3A;
            padding: 12px 32px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-secondary:hover {
            background: #C8A24A;
            border-color: #C8A24A;
            color: white;
            transform: translateY(-2px);
        }

        /* navbar */
        .navbar {
            padding: 24px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            border-bottom: 1px solid rgba(200, 162, 74, 0.2);
        }
        .logo {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #0B6B3A, #C8A24A);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }
        .nav-links {
            display: flex;
            gap: 36px;
            align-items: center;
        }
        .nav-links a {
            text-decoration: none;
            color: #2E4A3C;
            font-weight: 500;
            transition: 0.2s;
            position: relative;
        }
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 0;
            width: 0;
            height: 2px;
            background: #C8A24A;
            transition: width 0.3s;
        }
        .nav-links a:hover::after {
            width: 100%;
        }
        .nav-login {
            border: 1px solid #C8A24A;
            padding: 8px 26px;
            border-radius: 40px;
            background: rgba(200,162,74,0.05);
        }
        .nav-login:hover {
            background: #C8A24A;
            color: white;
        }
        .nav-login:hover::after {
            width: 0;
        }

        /* hero */
        .hero {
            position: relative;
            background: linear-gradient(115deg, #FCF8EF 0%, #FEFAF2 100%);
            border-radius: 0 0 60px 60px;
            margin-bottom: 40px;
            overflow: hidden;
        }
        .hero-bg-shape {
            position: absolute;
            top: -30%;
            right: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(200,162,74,0.08) 0%, rgba(11,107,58,0.02) 70%);
            border-radius: 50%;
            z-index: 0;
        }
        .hero-content {
            position: relative;
            z-index: 2;
            padding: 90px 0 80px;
            max-width: 720px;
        }
        .hero h1 {
            font-size: 4rem;
            line-height: 1.2;
            margin-bottom: 24px;
            color: #0B3B2A;
        }
        .hero h1 span {
            background: linear-gradient(135deg, #0B6B3A, #C8A24A);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }
        .hero p {
            font-size: 1.2rem;
            color: #4A6355;
            margin-bottom: 40px;
        }
        .hero-buttons {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        /* glass search panel */
        .search-glass {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(12px);
            border-radius: 48px;
            box-shadow: 0 30px 45px -20px rgba(0, 0, 0, 0.12), 0 0 0 1px rgba(200, 162, 74, 0.2);
            padding: 38px 42px;
            margin: 20px 0 80px;
        }
        .search-glass h3 {
            font-size: 2rem;
            font-family: 'Cormorant Garamond', serif;
            color: #1F4D38;
            font-weight: 700;
        }
        .filter-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
            gap: 28px;
            margin: 32px 0 30px;
        }
        .input-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .input-group label {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #C8A24A;
        }
        .input-group select, .input-group input {
            padding: 14px 20px;
            border-radius: 40px;
            border: 1px solid #EADCC8;
            background: white;
            font-family: 'Inter', sans-serif;
            font-size: 0.95rem;
            transition: 0.2s;
        }
        .input-group select:focus, .input-group input:focus {
            border-color: #C8A24A;
            box-shadow: 0 0 0 3px rgba(200, 162, 74, 0.2);
            outline: none;
        }
        .search-btn {
            background: linear-gradient(95deg, #0B6B3A, #0D8C4C);
            border: none;
            padding: 15px;
            border-radius: 50px;
            font-weight: 800;
            font-size: 1rem;
            color: white;
            cursor: pointer;
            width: 100%;
            transition: 0.2s;
            box-shadow: 0 6px 14px rgba(11,107,58,0.3);
        }
        .search-btn:hover {
            transform: scale(0.98);
            background: linear-gradient(95deg, #0A5A31, #0C7E44);
        }

        /* feature cards */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 36px;
            margin: 60px 0 50px;
        }
        .feature-card {
            background: white;
            padding: 36px 28px;
            border-radius: 38px;
            text-align: center;
            transition: all 0.35s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            box-shadow: 0 12px 24px -12px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(200, 162, 74, 0.2);
            position: relative;
        }
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 40px -16px rgba(0, 0, 0, 0.15);
            border-color: #C8A24A;
        }
        .feature-icon {
            font-size: 2.8rem;
            background: linear-gradient(135deg, #0B6B3A, #C8A24A);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            margin-bottom: 22px;
        }
        .feature-card h4 {
            font-size: 1.6rem;
            font-family: 'Cormorant Garamond', serif;
            font-weight: 700;
            margin-bottom: 12px;
        }

        /* horizontal scroll profiles */
        .profiles-scroll {
            margin: 50px 0 80px;
        }
        .scroll-container {
            display: flex;
            overflow-x: auto;
            gap: 32px;
            padding: 16px 8px 28px;
            scrollbar-width: thin;
        }
        .scroll-container::-webkit-scrollbar {
            height: 6px;
        }
        .scroll-container::-webkit-scrollbar-track {
            background: #ECE3D5;
            border-radius: 10px;
        }
        .scroll-container::-webkit-scrollbar-thumb {
            background: #C8A24A;
            border-radius: 10px;
        }
        .profile-card {
            flex: 0 0 290px;
            background: white;
            border-radius: 38px;
            padding: 28px 20px;
            transition: all 0.3s;
            box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.05);
            border: 1px solid #F2E9DE;
            text-align: center;
        }
        .profile-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 28px 35px -12px rgba(0, 0, 0, 0.2);
            border-color: #C8A24A;
        }
        .profile-img {
            width: 110px;
            height: 110px;
            background: linear-gradient(145deg, #F8F2E8, #FFFBF5);
            border-radius: 50%;
            margin: 0 auto 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.6rem;
            color: #0B6B3A;
            border: 2px solid #C8A24A;
            box-shadow: 0 8px 18px rgba(0,0,0,0.05);
        }
        .view-btn {
            background: transparent;
            border: 1.5px solid #C8A24A;
            color: #0B6B3A;
            width: 100%;
            padding: 10px 0;
            border-radius: 40px;
            font-weight: 700;
            margin-top: 16px;
            transition: 0.25s;
            cursor: pointer;
        }
        .view-btn:hover {
            background: #C8A24A;
            color: white;
        }

        /* steps with gold numbers */
        .steps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 48px;
            margin: 55px 0 70px;
        }
        .step-item {
            text-align: center;
        }
        .step-number {
            width: 70px;
            height: 70px;
            background: linear-gradient(145deg, #FFF5E8, #FFFDF8);
            border-radius: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
            font-weight: 800;
            color: #C8A24A;
            font-family: 'Cormorant Garamond', serif;
            border: 1px solid rgba(200, 162, 74, 0.4);
        }
        .step-item i {
            font-size: 2rem;
            color: #0B6B3A;
            margin-bottom: 16px;
        }

        /* trust islamic section */
        .trust-section {
            background: linear-gradient(115deg, #EAF6EF 0%, #FCF8F0 100%);
            border-radius: 60px;
            padding: 72px 48px;
            margin: 70px 0;
            text-align: center;
            position: relative;
        }
        .trust-quote {
            font-size: 2.2rem;
            font-family: 'Cormorant Garamond', serif;
            font-weight: 700;
            color: #1C4D36;
        }
        .trust-decoration {
            margin: 24px 0;
            font-size: 2rem;
            color: #C8A24A;
            letter-spacing: 6px;
        }

        /* final cta */
        .final-cta {
            background: linear-gradient(125deg, #FFFFFF, #FEFAF3);
            border-radius: 60px;
            padding: 72px 40px;
            text-align: center;
            box-shadow: 0 25px 40px -18px rgba(0,0,0,0.08);
            margin-bottom: 80px;
            border: 1px solid rgba(200, 162, 74, 0.3);
        }
        .final-cta h3 {
            font-size: 2.8rem;
            font-family: 'Cormorant Garamond', serif;
            font-weight: 800;
            background: linear-gradient(135deg, #0B562F, #C8A24A);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }
        .btn-large {
            padding: 18px 52px;
            font-size: 1.2rem;
            background: linear-gradient(105deg, #0B6B3A, #0E8448);
            border: none;
            border-radius: 70px;
            color: white;
            font-weight: 800;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 20px 25px -12px rgba(11,107,58,0.5);
        }
        .btn-large:hover {
            transform: translateY(-5px);
            box-shadow: 0 28px 32px -12px rgba(11,107,58,0.6);
        }

        /* footer */
        footer {
            border-top: 1px solid #EADFCB;
            padding: 55px 0 40px;
            background: #FDFBF7;
        }
        .footer-inner {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 32px;
            align-items: center;
        }
        .footer-links {
            display: flex;
            gap: 38px;
            flex-wrap: wrap;
        }
        .footer-links a {
            text-decoration: none;
            color: #4A6A5A;
            font-weight: 500;
            transition: 0.2s;
        }
        .footer-links a:hover {
            color: #C8A24A;
        }
        .social-icons i {
            font-size: 1.3rem;
            margin-left: 24px;
            color: #7B8E82;
            transition: 0.2s;
            cursor: pointer;
        }
        .social-icons i:hover {
            color: #C8A24A;
            transform: translateY(-2px);
        }
        .copyright {
            text-align: center;
            margin-top: 40px;
            font-size: 0.85rem;
            color: #8FA291;
        }

        @media (max-width: 780px) {
            .container { padding: 0 24px; }
            .hero h1 { font-size: 2.6rem; }
            .hero-content { padding: 60px 0; }
            .search-glass { padding: 28px; }
            .trust-quote { font-size: 1.6rem; }
            .final-cta h3 { font-size: 2rem; }
            .navbar { flex-direction: column; }
            .nav-links { gap: 24px; }
            .footer-inner { flex-direction: column; text-align: center; }
            .footer-links { justify-content: center; }
        }

        /* subtle animation */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade {
            animation: fadeUp 0.8s ease forwards;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="navbar">
        <div class="logo">Zawjahaa<span style="color:#C8A24A;">.</span></div>
        <div class="nav-links">
            <a href="#">About</a>
            <a href="#">Guidance</a>
            <a href="#">Stories</a>
            <a href="#" class="nav-login">Sign In</a>
        </div>
    </div>
</div>

<section class="hero">
    <div class="hero-bg-shape"></div>
    <div class="container">
        <div class="hero-content">
            <h1>Find Your <span>Perfect Life Partner</span> with Zawjahaa</h1>
            <p>A trusted Islamic matrimonial platform built on respect, privacy, and values. Guided by faith, designed for modern Pakistani families.</p>
            <div class="hero-buttons">
                <button class="btn-primary" id="heroFind"><i class="fas fa-heart"></i> Find Your Match</button>
                <button class="btn-secondary" id="heroReg"><i class="fas fa-user-plus"></i> Register Free</button>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <!-- Premium Search Panel -->
    <div class="search-glass">
        <h3>Begin your blessed search</h3>
        <p style="color:#6C8776;">Refine intentions with premium filters</p>
        <div class="filter-grid">
            <div class="input-group"><label><i class="far fa-calendar-alt"></i> Age Range</label><div style="display: flex; gap: 12px;"><select id="minAge"><option>22</option><option>25</option><option>28</option><option>30</option><option>32</option><option>35</option></select><select id="maxAge"><option>28</option><option>32</option><option>35</option><option>38</option><option>40</option><option>45</option></select></div></div>
            <div class="input-group"><label><i class="fas fa-city"></i> City (Pakistan)</label><select id="city"><option>Lahore</option><option>Karachi</option><option>Islamabad</option><option>Rawalpindi</option><option>Faisalabad</option><option>Multan</option><option>Peshawar</option></select></div>
            <div class="input-group"><label><i class="fas fa-graduation-cap"></i> Education</label><select id="education"><option>Bachelor’s</option><option>Master’s</option><option>PhD</option><option>Professional</option></select></div>
            <div class="input-group"><label><i class="fas fa-mosque"></i> Religion</label><select id="religion"><option selected>Islam (Sunni)</option><option>Islam (Shia)</option></select></div>
        </div>
        <button class="search-btn" id="searchProfilesBtn"><i class="fas fa-search"></i> Search Profiles</button>
    </div>

    <!-- Why Zawjahaa -->
    <div style="text-align: center;">
        <h2>Why Zawjahaa</h2>
        <div class="section-subhead" style="margin-left: auto; margin-right: auto;">A sanctuary for sincere souls seeking barakah in marriage</div>
    </div>
    <div class="features-grid">
        <div class="feature-card"><div class="feature-icon"><i class="fas fa-shield-alt"></i></div><h4>Verified & Trusted</h4><p>Manual verification & background checks ensure authenticity.</p></div>
        <div class="feature-card"><div class="feature-icon"><i class="fas fa-hand-holding-heart"></i></div><h4>Halal Matching System</h4><p>Matchmaking guided by Sharia & family values.</p></div>
        <div class="feature-card"><div class="feature-icon"><i class="fas fa-lock"></i></div><h4>Privacy Protection</h4><p>Your data is sacred. Advanced encryption & control.</p></div>
        <div class="feature-card"><div class="feature-icon"><i class="fas fa-users"></i></div><h4>Family-Oriented</h4><p>Designed with wali/guardian involvement & respect.</p></div>
    </div>

    <!-- Featured Profiles Horizontal Scroll -->
    <div class="profiles-scroll">
        <h2>Featured Profiles</h2>
        <div class="section-subhead">Honest hearts seeking a blessed union — discover inspiring individuals</div>
        <div class="scroll-container" id="profileScroll">
            <div class="profile-card"><div class="profile-img"><i class="fas fa-user-circle"></i></div><h4>Ayesha Khan</h4><div style="margin: 8px 0; color:#6D5C4B;"><i class="fas fa-map-marker-alt"></i> Lahore · 24 yrs</div><div style="font-size:0.85rem; color:#7D6E5C;">"Teacher, kind-hearted & family-oriented"</div><button class="view-btn">View Profile</button></div>
            <div class="profile-card"><div class="profile-img"><i class="fas fa-user-circle"></i></div><h4>Omar Tariq</h4><div style="margin: 8px 0; color:#6D5C4B;"><i class="fas fa-map-marker-alt"></i> Karachi · 31 yrs</div><div style="font-size:0.85rem; color:#7D6E5C;">"Entrepreneur, practicing Salah"</div><button class="view-btn">View Profile</button></div>
            <div class="profile-card"><div class="profile-img"><i class="fas fa-user-circle"></i></div><h4>Fatima Zafar</h4><div style="margin: 8px 0; color:#6D5C4B;"><i class="fas fa-map-marker-alt"></i> Islamabad · 27 yrs</div><div style="font-size:0.85rem; color:#7D6E5C;">"Doctor, values deen & dunya balance"</div><button class="view-btn">View Profile</button></div>
            <div class="profile-card"><div class="profile-img"><i class="fas fa-user-circle"></i></div><h4>Hamza Ali</h4><div style="margin: 8px 0; color:#6D5C4B;"><i class="fas fa-map-marker-alt"></i> Lahore · 29 yrs</div><div style="font-size:0.85rem; color:#7D6E5C;">"Engineer, Hafiz Quran"</div><button class="view-btn">View Profile</button></div>
            <div class="profile-card"><div class="profile-img"><i class="fas fa-user-circle"></i></div><h4>Zainab Rizvi</h4><div style="margin: 8px 0; color:#6D5C4B;"><i class="fas fa-map-marker-alt"></i> Rawalpindi · 26 yrs</div><div style="font-size:0.85rem; color:#7D6E5C;">"Graphic designer, charity & family"</div><button class="view-btn">View Profile</button></div>
            <div class="profile-card"><div class="profile-img"><i class="fas fa-user-circle"></i></div><h4>Bilal Chaudhry</h4><div style="margin: 8px 0; color:#6D5C4B;"><i class="fas fa-map-marker-alt"></i> Multan · 33 yrs</div><div style="font-size:0.85rem; color:#7D6E5C;">"Professor, grounded in Islamic values"</div><button class="view-btn">View Profile</button></div>
        </div>
    </div>

    <!-- How It Works -->
    <div style="text-align: center;"><h2>How It Works</h2><div class="section-subhead" style="margin-left: auto; margin-right: auto;">A blessed journey in four steps</div></div>
    <div class="steps-grid">
        <div class="step-item"><div class="step-number">1</div><i class="fas fa-user-edit"></i><h4>Create Profile</h4><p>Share authentic self with Islamic values.</p></div>
        <div class="step-item"><div class="step-number">2</div><i class="fas fa-handshake"></i><h4>Get Verified Matches</h4><p>AI + halal compatibility suggests righteous matches.</p></div>
        <div class="step-item"><div class="step-number">3</div><i class="fas fa-comments"></i><h4>Connect Respectfully</h4><p>Private chat with family oversight.</p></div>
        <div class="step-item"><div class="step-number">4</div><i class="fas fa-ring"></i><h4>Begin Your Journey</h4><p>Move towards nikah with blessings.</p></div>
    </div>

    <!-- Trust & Islamic Values -->
    <div class="trust-section">
        <div class="trust-quote">“Built on Islamic values, respect, and family trust.”</div>
        <div class="trust-decoration">✦ ﷽ ✦</div>
        <p style="margin-top: 26px; color:#376B52; max-width: 550px; margin-left: auto; margin-right: auto;">At Zawjahaa, every union is rooted in sincerity, modesty, and the pursuit of half your deen. No compromise on ethics.</p>
    </div>

    <!-- Final Call to Action -->
    <div class="final-cta">
        <h3>Start Your Journey Towards a Blessed Marriage</h3>
        <p style="margin: 20px 0 35px; color: #5D7D6B;">Thousands of Pakistani families trust Zawjahaa — begin your halal search today.</p>
        <button class="btn-large" id="finalJoinBtn">Join Zawjahaa Today <i class="fas fa-arrow-right"></i></button>
    </div>
</div>

<footer>
    <div class="container">
        <div class="footer-inner">
            <div class="footer-links">
                <a href="#">About Zawjahaa</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Contact</a>
                <a href="#">FAQs</a>
            </div>
            <div class="social-icons">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-x-twitter"></i>
                <i class="fab fa-linkedin-in"></i>
            </div>
        </div>
        <div class="copyright">
            © 2026 Zawjahaa. All rights reserved. A premium Islamic matrimonial service for Pakistan.
        </div>
    </div>
</footer>

<script>
    const showMsg = (msg) => alert(msg);
    document.getElementById('heroFind')?.addEventListener('click', () => showMsg('✨ Begin your search for a blessed partner. Explore profiles with pure intentions.'));
    document.getElementById('heroReg')?.addEventListener('click', () => showMsg('📝 Register Free — Join Zawjahaa and find your naseeb with barakah.'));
    document.getElementById('searchProfilesBtn')?.addEventListener('click', () => {
        const minAge = document.getElementById('minAge')?.value;
        const maxAge = document.getElementById('maxAge')?.value;
        const city = document.getElementById('city')?.value;
        showMsg(`🔍 Searching profiles: Age ${minAge}-${maxAge}, City: ${city}. Our premium algorithm will show compatible matches.`);
    });
    document.getElementById('finalJoinBtn')?.addEventListener('click', () => showMsg('💚 Join Zawjahaa today — Start your blessed journey towards marriage.'));
    document.querySelectorAll('.view-btn').forEach(btn => {
        btn.addEventListener('click', () => showMsg('🕌 View profile — With respect and privacy, registration required for connection.'));
    });
</script>
</body>
</html>