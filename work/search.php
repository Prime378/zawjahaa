<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Advanced Search | Matrimony Elite</title>
  
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="assets/style.css">
  
  <style>
    :root {
      --primary: #10B981;
      --primary-dark: #059669;
      --secondary: #F59E0B;
      --dark: #111827;
      --light: #F9FAFB;
      --gray: #6B7280;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background: #f8fafc;
      color: #334155;
      line-height: 1.6;
    }
    

    /* Page Header */
    .page-header {
      background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
      color: white;
      margin-top: 4.7rem;
      padding: 3rem 0;
      text-align: center;
      position: relative;
      overflow: hidden;
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
      font-family: 'Montserrat', sans-serif;
      font-weight: 700;
      font-size: 2.5rem;
      margin-bottom: 1rem;
      position: relative;
    }
    
    .page-header p {
      font-size: 1.1rem;
      opacity: 0.9;
      max-width: 600px;
      margin: 0 auto;
    }
    
    /* Main Content */
    .main-content {
      padding: 3rem 0;
    }
    
    /* Filter Sidebar */
    .filter-sidebar {
      background: white;
      padding: 1.75rem;
      border: 1px solid #E5E7EB;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
      position: sticky;
      top: 100px;
    }
    
    .filter-sidebar h5 {
      color: var(--primary);
      font-weight: 700;
      margin-bottom: 1.5rem;
      padding-bottom: 1rem;
      border-bottom: 2px solid #E5E7EB;
      font-family: 'Montserrat', sans-serif;
    }
    
    .form-label {
      font-weight: 600;
      color: #374151;
      margin-bottom: 0.5rem;
      font-size: 0.95rem;
    }
    
    .form-select, .form-control {
      border: 2px solid #E5E7EB;
      border-radius: 8px;
      padding: 0.75rem;
      font-size: 0.95rem;
      transition: all 0.3s ease;
    }
    
    .form-select:focus, .form-control:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
      outline: none;
    }
    
    /* Buttons */
    .btn-success {
      background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
      border: none;
      padding: 0.875rem;
      font-weight: 600;
      border-radius: 8px;
      transition: all 0.3s ease;
    }
    
    .btn-success:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(16, 185, 129, 0.3);
    }
    
    .btn-secondary {
      background: #6B7280;
      border: none;
      padding: 0.875rem;
      font-weight: 600;
      border-radius: 8px;
      transition: all 0.3s ease;
    }
    
    .btn-secondary:hover {
      background: #4B5563;
      transform: translateY(-2px);
    }
    
    /* Profile Cards */
    .profile-card {
      background: white;
      border: 1px solid #E5E7EB;
      border-radius: 12px;
      padding: 1.5rem;
      margin-bottom: 1rem;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 1.5rem;
    }
    
    .profile-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
      border-color: var(--primary);
    }
    
    .profile-img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid var(--primary);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    .profile-info h5 {
      font-family: 'Montserrat', sans-serif;
      font-weight: 700;
      color: var(--dark);
      margin-bottom: 0.5rem;
    }
    
    .profile-info p {
      color: var(--gray);
      margin-bottom: 0.5rem;
      font-size: 0.95rem;
    }
    
    .profile-badges {
      display: flex;
      gap: 0.5rem;
      margin-top: 0.75rem;
    }
    
    .badge {
      padding: 0.4rem 0.8rem;
      font-weight: 600;
      border-radius: 20px;
      font-size: 0.8rem;
    }
    
    .badge-success {
      background: rgba(16, 185, 129, 0.1);
      color: var(--primary);
    }
    
    .badge-warning {
      background: rgba(245, 158, 11, 0.1);
      color: #F59E0B;
    }
    
    /* Results Header */
    .results-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1.5rem;
      padding: 1rem 0;
    }
    
    .results-count {
      font-family: 'Montserrat', sans-serif;
      font-weight: 700;
      color: var(--primary);
      font-size: 1.25rem;
    }
    
    .sort-select {
      width: 200px;
    }
    
    /* Footer */
    footer {
      background: linear-gradient(135deg, #1F2937 0%, #111827 100%);
      color: white;
      padding: 3rem 0 1.5rem;
      margin-top: 4rem;
    }
    
    .footer-content {
      text-align: center;
    }
    
    .footer-links {
      display: flex;
      justify-content: center;
      gap: 2rem;
      margin: 2rem 0;
    }
    
    .footer-links a {
      color: #D1D5DB;
      text-decoration: none;
      transition: all 0.3s ease;
    }
    
    .footer-links a:hover {
      color: white;
      text-decoration: underline;
    }
    
    .copyright {
      color: #9CA3AF;
      font-size: 0.9rem;
      margin-top: 2rem;
      padding-top: 1rem;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
      .page-header h1 {
        font-size: 2rem;
      }
      
      .profile-card {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
      }
      
      .profile-badges {
        justify-content: center;
      }
      
      .footer-links {
        flex-direction: column;
        gap: 1rem;
      }
      
      .results-header {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
      }
      
      .sort-select {
        width: 100%;
      }
    }
    
    /* Loading Animation */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    .profile-card {
      animation: fadeIn 0.5s ease-out;
    }
    
    /* Custom Checkbox */
    .form-check-input:checked {
      background-color: var(--primary);
      border-color: var(--primary);
    }
    
    /* Additional Filters Section */
    .additional-filters {
      margin-top: 2rem;
      padding-top: 1.5rem;
      border-top: 1px solid #E5E7EB;
    }
    
    .filter-option {
      display: flex;
      align-items: center;
      margin-bottom: 0.75rem;
    }
    
    .filter-option input {
      margin-right: 0.75rem;
    }
    
    .filter-option label {
      margin-bottom: 0;
      cursor: pointer;
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
  
  <div class="page-header">
    <div class="container">
      <h1>Find Your Perfect Match</h1>
      <p>Advanced search with simple yet powerful filters to connect you with compatible partners</p>
    </div>
  </div>

  <!-- Main Content -->
  <div class="container main-content">
    <div class="row">
      <!-- Filters -->
      <div class="col-lg-4 mb-4">
        <div class="filter-sidebar">
          <h5><i class="fas fa-filter me-2"></i>Search Filters</h5>
          
          <div class="mb-3">
            <label class="form-label">Looking for</label>
            <select class="form-select">
              <option value="">Select Gender</option>
              <option value="male">Groom</option>
              <option value="female">Bride</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Age Range</label>
            <div class="row g-2">
              <div class="col-6">
                <input type="number" class="form-control" placeholder="Min Age" min="18" max="70">
              </div>
              <div class="col-6">
                <input type="number" class="form-control" placeholder="Max Age" min="18" max="70">
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Marital Status</label>
            <select class="form-select">
              <option value="">Select Status</option>
              <option value="single">Never Married</option>
              <option value="divorced">Divorced</option>
              <option value="widowed">Widowed</option>
            </select>
          </div>
          
          <div class="mb-3">
            <label class="form-label">Education Level</label>
            <select class="form-select">
              <option value="">Select Education</option>
              <option value="graduate">Graduate</option>
              <option value="postgraduate">Post Graduate</option>
              <option value="doctorate">Doctorate</option>
            </select>
          </div>
          
          <div class="mb-3">
            <label class="form-label">Profession</label>
            <select class="form-select">
              <option value="">Select Profession</option>
              <option value="doctor">Doctor</option>
              <option value="engineer">Engineer</option>
              <option value="teacher">Teacher</option>
              <option value="business">Business</option>
            </select>
          </div>
          
          <!-- Additional Filters -->
          <div class="additional-filters">
            <label class="form-label mb-3">Additional Options</label>
            <div class="filter-option">
              <input type="checkbox" class="form-check-input" id="verifiedOnly">
              <label for="verifiedOnly">Verified Profiles Only</label>
            </div>
            <div class="filter-option">
              <input type="checkbox" class="form-check-input" id="photoOnly">
              <label for="photoOnly">With Photos Only</label>
            </div>
            <div class="filter-option">
              <input type="checkbox" class="form-check-input" id="premiumOnly">
              <label for="premiumOnly">Premium Members Only</label>
            </div>
          </div>

          <button class="btn btn-success w-100 mt-3">
            <i class="fas fa-search me-2"></i> Apply Filters
          </button>
          <button class="btn btn-secondary w-100 mt-2">
            <i class="fas fa-redo me-2"></i> Reset Filters
          </button>
        </div>
      </div>

      <!-- Results -->
      <div class="col-lg-8">
        <!-- Results Header -->
        <div class="results-header">
          <div class="results-count">
            <i class="fas fa-users me-2"></i>248 Matches Found
          </div>
          <div>
            <select class="form-select sort-select">
              <option>Sort by: Relevance</option>
              <option>Newest First</option>
              <option>Highest Match</option>
              <option>Recently Active</option>
            </select>
          </div>
        </div>

        <!-- Profile Cards -->
        <div class="profile-card">
          <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
               alt="Profile" class="profile-img">
          <div class="profile-info">
            <h5>Dr. Ahmed Raza</h5>
            <p><i class="fas fa-map-marker-alt me-2"></i>32 Years • Never Married • London, UK</p>
            <p><i class="fas fa-graduation-cap me-2"></i>MBBS, MRCP (UK) • Consultant Physician</p>
            <div class="profile-badges">
              <span class="badge badge-success">Premium Member</span>
              <span class="badge badge-warning">95% Match</span>
            </div>
          </div>
        </div>

        <div class="profile-card">
          <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
               alt="Profile" class="profile-img">
          <div class="profile-info">
            <h5>Sana Khan</h5>
            <p><i class="fas fa-map-marker-alt me-2"></i>28 Years • Never Married • Karachi, PK</p>
            <p><i class="fas fa-graduation-cap me-2"></i>MBA (LUMS) • Banking Executive</p>
            <div class="profile-badges">
              <span class="badge badge-success">Verified</span>
              <span class="badge badge-warning">92% Match</span>
            </div>
          </div>
        </div>
        
        <!-- Add more profile cards as needed -->
      </div>
    </div>
  </div>

  <!-- Footer -->
   <?php include('footer.php'); ?>
   
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/script.js"></script>
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
  </script>
</body>
</html>