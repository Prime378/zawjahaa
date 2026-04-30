<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5, user-scalable=yes">
    <title>Zawjahaa · Register | Complete Global Cities Database</title>
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Font: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        body { background: radial-gradient(circle at 10% 20%, rgba(16,185,129,0.18) 0%, transparent 35%), radial-gradient(circle at 90% 75%, rgba(16,185,129,0.12) 0%, transparent 40%), linear-gradient(145deg, #0a1a1f 0%, #0c1e26 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 16px; position: relative; }
        .orb { position: fixed; width: 280px; height: 280px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, rgba(16,185,129,0.2), rgba(5,150,105,0.08)); filter: blur(70px); z-index: 0; }
        .orb-1 { top: -80px; left: -80px; }
        .orb-2 { bottom: -80px; right: -80px; width: 320px; height: 320px; background: rgba(2,132,199,0.08); }
        .glass-panel { width: 100%; max-width: 1000px; background: rgba(20, 30, 35, 0.55); backdrop-filter: blur(14px) saturate(180%); -webkit-backdrop-filter: blur(14px); border: 1px solid rgba(255,255,255,0.15); border-radius: 36px; padding: 40px 35px; box-shadow: 0 20px 40px -10px rgba(0,0,0,0.3); position: relative; z-index: 10; }
        .brand { display: flex; align-items: center; gap: 12px; margin-bottom: 25px; }
        .brand-icon { width: 52px; height: 52px; background: linear-gradient(145deg, #10B981, #059669); border-radius: 16px; display: flex; align-items: center; justify-content: center; overflow: hidden; flex-shrink: 0; box-shadow: 0 8px 16px -6px rgba(16,185,129,0.3); }
        .brand-icon img { width: 100%; height: 100%; object-fit: cover; background: #0f262c; }
        .brand-text { font-size: 1.8rem; font-weight: 700; letter-spacing: -0.02em; color: white; line-height: 1.1; }
        .brand-text span { color: #a7f3d0; font-weight: 400; }
        h2 { color: white; font-weight: 600; font-size: 2rem; margin-bottom: 6px; }
        .subhead { color: rgba(255,255,255,0.7); font-size: 0.95rem; margin-bottom: 28px; border-left: 3px solid #10B981; padding-left: 14px; }
        .form-label { color: rgba(255,255,255,0.9); font-weight: 600; font-size: 0.85rem; margin-bottom: 8px; }
        .form-control, .form-select {
            background: rgba(255,255,255,0.04);
            border: 1.5px solid rgba(255,255,255,0.1);
            border-radius: 10px;
            padding: 8px 12px;
            font-size: 0.85rem;
            height: 40px;
            color: white;
            transition: all 0.2s ease;
        }
        .form-control:focus, .form-select:focus {
            border-color: #10B981;
            background: rgba(255,255,255,0.07);
            box-shadow: 0 0 0 2px rgba(16,185,129,0.15);
            color: white;
        }
        .form-control::placeholder { color: rgba(255,255,255,0.4); }
        .form-select option { background: #0f262c; color: white; }
        .select2-container--default .select2-selection--single {
            background: rgba(255,255,255,0.04) !important;
            border: 1.5px solid rgba(255,255,255,0.1) !important;
            border-radius: 12px !important;
            height: 40px !important;
            padding: 6px 12px !important;
            display: flex;
            align-items: center;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #ffffff !important;
        }
        .select2-dropdown { background-color: #0f262c !important; border: 1px solid rgba(255,255,255,0.1) !important; }
        .select2-results__option { color: #ffffff !important; }
        .select2-results__option--highlighted { background-color: #10B981 !important; }
        .btn-primary {
            background: linear-gradient(105deg, #10B981, #059669);
            border: none;
            border-radius: 40px;
            padding: 14px 20px;
            color: white;
            font-weight: 600;
            font-size: 1rem;
            width: 100%;
            transition: all 0.15s;
            cursor: pointer;
            margin-top: 20px;
        }
        .form-select:disabled {
        color: #F52F07;
        background: rgba(255,255,255,0.04);
         }
        .btn-primary:hover { background: #0fad74; transform: translateY(-2px); }
        .btn-primary:disabled { opacity: 0.6; cursor: not-allowed; }
        .alert { border-radius: 12px; padding: 12px 18px; margin-bottom: 20px; backdrop-filter: blur(4px); }
        .alert-danger { background: rgba(239, 68, 68, 0.15); border: 1px solid rgba(239, 68, 68, 0.3); color: #fee2e2; }
        .alert-success { background: rgba(16, 185, 129, 0.15); border: 1px solid rgba(16, 185, 129, 0.3); color: #a7f3d0; }
        .login-link { text-align: center; margin-top: 30px; color: rgba(255,255,255,0.65); }
        .login-link a { color: white; font-weight: 600; text-decoration: none; border-bottom: 2px solid #10B981; }
        .invalid-feedback { color: #f87171; font-size: 0.75rem; margin-top: 4px; display: block; }
        .is-invalid { border-color: #ef4444 !important; }
        .info-note { font-size: 0.7rem; color: rgba(255,255,255,0.5); margin-top: 4px; }
        .city-hint { font-size: 0.7rem; color: #10B981; margin-top: 5px; display: none; }
        .city-hint.show { display: block; }
        .loading-spinner { display: inline-block; width: 16px; height: 16px; border: 2px solid rgba(255,255,255,0.3); border-radius: 50%; border-top-color: #10B981; animation: spin 0.6s linear infinite; margin-right: 8px; }
        @keyframes spin { to { transform: rotate(360deg); } }
        
        @media (max-width: 768px) { .glass-panel { padding: 30px 20px; } }
    </style>
</head>
<body>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <div class="glass-panel">
        <div class="brand">
            <div class="brand-icon">
                <img src="assets/logo1.png" alt="Logo" onerror="this.src='https://via.placeholder.com/52x52/10B981/ffffff?text=Z'">
            </div>
            <div class="brand-text">Zaw<span>jahaa</span></div>
        </div>
        <h2>Create Account</h2>
        <div class="subhead">Join 5,000+ couples — free & fast</div>

        <div id="alertContainer">
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <strong>Please fix the following errors:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <form method="POST" action="{{ route('register') }}" id="registerForm" enctype="multipart/form-data" novalidate>
            @csrf

            <div class="row">
                <div class="col-md-4 col-sm-6 mb-3">
                    <label class="form-label">First Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" placeholder="First name" required>
                    @error('first_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 col-sm-6 mb-3">
                    <label class="form-label">Last Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" placeholder="Last name" required>
                    @error('last_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 col-sm-6 mb-3">
                    <label class="form-label">Gender <span class="text-danger">*</span></label>
                    <select class="form-select @error('gender') is-invalid @enderror" name="gender" required>
                        <option value="">Select gender</option>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('gender')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-6 mb-3">
                    <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                    <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required>
                    @error('dob')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 col-sm-6 mb-3">
                    <label class="form-label">Marital Status <span class="text-danger">*</span></label>
                    <select class="form-select @error('marital_status') is-invalid @enderror" name="marital_status" id="maritalStatusSelect" required>
    <option value="">Select marital status</option>
    <option value="Unmarried" {{ old('marital_status') == 'Unmarried' ? 'selected' : '' }}>Unmarried</option>
    <option value="Nikah_Only" {{ old('marital_status') == 'Married_Nikah_Only' ? 'selected' : '' }}>
                  Nikah Only
    </option>
    <option value="Married_No_Children" {{ old('marital_status') == 'Married_No_Children' ? 'selected' : '' }}>Married (No Children)</option>
    <option value="Married_With_Children" {{ old('marital_status') == 'Married_With_Children' ? 'selected' : '' }}>Married (Has Children)</option>
    <option value="Divorced_No_Children" {{ old('marital_status') == 'Divorced_No_Children' ? 'selected' : '' }}>Divorced (No Children)</option>
    <option value="Divorced_With_Children" {{ old('marital_status') == 'Divorced_With_Children' ? 'selected' : '' }}>Divorced (Has Children)</option>
    <option value="Widowed_No_Children" {{ old('marital_status') == 'Widowed_No_Children' ? 'selected' : '' }}>Widowed (No Children)</option>
    <option value="Widowed_With_Children" {{ old('marital_status') == 'Widowed_With_Children' ? 'selected' : '' }}>Widowed (Has Children)</option>
    <option value="separated_No_children" {{ old('marital_status') == 'separated_No_children' ? 'selected' : '' }}>Separated (No Children)</option>
    <option value="separated_With_children" {{ old('marital_status') == 'separated_With_children' ? 'selected' : '' }}>Separated (Has Children)</option>
    <option value="Infertile" {{ old('marital_status') == 'Infertile' ? 'selected' : '' }}>Infertile</option>
</select>
                    @error('marital_status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 col-sm-6 mb-3" id="childrenDetailsBox" style="display:none;">
                    <label class="form-label">Children Details</label>
                    <input type="text" 
       class="form-control" 
       id="childrenDetails" 
       name="children_details" 
       value="{{ old('children_details') }}"
       placeholder="e.g. 2 children (Ages: 5, 8)">
                </div>
            </div>

          <div class="row">

    <!-- Email -->
    <div class="col-md-4 col-sm-6 mb-3">
        <label class="form-label">Email Address <span class="text-danger">*</span></label>
        <input type="email" class="form-control @error('email') is-invalid @enderror"
               name="email" value="{{ old('email') }}" placeholder="email@example.com" required>
        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <!-- Disease / Disability YES/NO -->
    <div class="col-md-4 col-sm-6 mb-3">
        <label class="form-label">Disease / Disability</label>
        <select class="form-select" name="disease_status" id="diseaseStatus">
            <option value="No">No</option>
            <option value="Yes">Yes</option>
        </select>
    </div>

    <!-- Detail Field -->
    <div class="col-md-4 col-sm-6 mb-3" id="diseaseDetailsBox" style="display: none;">
        <label class="form-label">Details</label>
        <input type="text" class="form-control"
               name="disease_detail"
               id="diseaseDetails"
               placeholder="Describe disease or disability">
    </div>

</div>
<div class="row">
    <!-- Education (user types) -->
    <div class="col-md-4 col-sm-6 mb-3">
        <label class="form-label">Education <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('education') is-invalid @enderror" name="education" value="{{ old('education') }}" placeholder="Enter your education" required>
        @error('education')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <!-- Religion (dropdown with 'All') -->
    <div class="col-md-4 col-sm-6 mb-3">
        <label class="form-label">Religion <span class="text-danger">*</span></label>
        <select class="form-select @error('religion') is-invalid @enderror" name="religion" required>
            <option value="">Select Religion</option>
            <option value="All">All</option>
            <option value="Islam">Islam</option>
            <option value="Christianity">Christianity</option>
            <option value="Hinduism">Hinduism</option>
            <option value="Buddhism">Buddhism</option>
            <option value="Sikhism">Sikhism</option>
            <option value="Other">Other</option>
        </select>
        @error('religion')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <!-- Profession (user types) -->
    <div class="col-md-4 col-sm-6 mb-3">
        <label class="form-label">Profession <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('profession') is-invalid @enderror" name="profession" value="{{ old('profession') }}" placeholder="Enter your profession" required>
        @error('profession')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>
            <div class="row">
                <div class="col-md-4 col-sm-6 mb-3">
                    <label class="form-label">Living Country (Residence) <span class="text-danger">*</span></label>
                    <select class="form-select @error('living_country') is-invalid @enderror" name="living_country" id="originCountrySelect" required>
                        <option value="">Loading countries from API...</option>
                    </select>
                     @error('living_country')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
                    <div class="info-note"><i class="fas fa-map-marker-alt me-1"></i> Where you currently live</div>
                </div>
                <div class="col-md-4 col-sm-6 mb-3">
                    <label class="form-label">Country of Origin <span class="text-danger">*</span></label>
                    <select class="form-select @error('country') is-invalid @enderror" name="country" id="livingCountrySelect" required>
                        <option value="">Loading countries from API...</option>
                    </select>
                     @error('country')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
                    <div class="info-note"><i class="fas fa-globe me-1"></i> Your nationality</div>
                </div>
                <div class="col-md-4 col-sm-6 mb-3">
                    <label class="form-label @error('profile_image') is-invalid @enderror">Profile Image <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="profile_image" accept="image/*" required>
                        @error('profile_image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-6 mb-3">
                    <label class="form-label">City <span class="text-danger">*</span></label>
                    <select class="form-select @error('city') is-invalid @enderror" name="city" id="citySelect" required disabled>
                        <option value="">First select a country above</option>
                    </select>
                    <div class="city-hint" id="cityHint"><i class="fas fa-check-circle"></i> Cities loaded!</div>
                    @error('city')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 col-sm-6 mb-3">
                    <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="0300-1234567" required>
                    @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 col-sm-6 mb-3">
                    <label class="form-label">CNIC / Passport <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('cnic') is-invalid @enderror" name="cnic" value="{{ old('cnic') }}" placeholder="12345-1234567-1" required>
                    @error('cnic')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12 mb-3">
                    <label class="form-label">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Strong password" required>
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 col-sm-12 mb-3">
                    <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Re-enter password" required>
                    @error('password_confirmation')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input @error('terms') is-invalid @enderror" name="terms" id="terms" value="1" required>
                <label class="form-check-label text-light" for="terms">I agree to the Terms & Conditions</label>
            </div>

            <button type="submit" class="btn-primary w-100" id="submitBtn">
                <i class="fas fa-user-plus me-2"></i>Create Account
            </button>
        </form>
        <div class="login-link">Already have an account? <a href="{{ route('login') }}">Login</a></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
<script>
document.addEventListener('DOMContentLoaded', async function() {
    const livingCountrySelect = document.getElementById('livingCountrySelect');
    const originCountrySelect = document.getElementById('originCountrySelect');
    const citySelect = document.getElementById('citySelect');
    const cityHint = document.getElementById('cityHint');
    
    // Comprehensive cities database for ALL countries
    const citiesDatabase = {
        'Pakistan': ['Karachi', 'Lahore', 'Islamabad', 'Rawalpindi', 'Faisalabad', 'Multan', 'Peshawar', 'Quetta', 'Sialkot', 'Gujranwala', 'Hyderabad', 'Bahawalpur', 'Sargodha', 'Sukkur', 'Larkana'],
        'India': ['Mumbai', 'Delhi', 'Bangalore', 'Hyderabad', 'Ahmedabad', 'Chennai', 'Kolkata', 'Pune', 'Jaipur', 'Surat', 'Lucknow', 'Kanpur', 'Nagpur', 'Indore', 'Thane'],
        'United States': ['New York', 'Los Angeles', 'Chicago', 'Houston', 'Phoenix', 'Philadelphia', 'San Antonio', 'San Diego', 'Dallas', 'Austin', 'San Jose', 'Seattle', 'Denver', 'Boston', 'Atlanta'],
        'United Kingdom': ['London', 'Manchester', 'Birmingham', 'Liverpool', 'Leeds', 'Glasgow', 'Sheffield', 'Bristol', 'Edinburgh', 'Leicester', 'Coventry', 'Nottingham', 'Newcastle', 'Cardiff', 'Belfast'],
        'Canada': ['Toronto', 'Montreal', 'Vancouver', 'Calgary', 'Edmonton', 'Ottawa', 'Winnipeg', 'Quebec City', 'Hamilton', 'Halifax', 'London', 'Victoria', 'Saskatoon', 'Regina', 'St. Johns'],
        'Australia': ['Sydney', 'Melbourne', 'Brisbane', 'Perth', 'Adelaide', 'Gold Coast', 'Canberra', 'Newcastle', 'Wollongong', 'Hobart', 'Darwin', 'Geelong', 'Townsville', 'Cairns', 'Toowoomba'],
        'Germany': ['Berlin', 'Munich', 'Hamburg', 'Cologne', 'Frankfurt', 'Stuttgart', 'Dusseldorf', 'Leipzig', 'Dortmund', 'Essen', 'Bremen', 'Dresden', 'Hannover', 'Nuremberg', 'Bochum'],
        'France': ['Paris', 'Marseille', 'Lyon', 'Toulouse', 'Nice', 'Nantes', 'Strasbourg', 'Montpellier', 'Bordeaux', 'Lille', 'Rennes', 'Reims', 'Le Havre', 'Saint-Etienne', 'Toulon'],
        'Italy': ['Rome', 'Milan', 'Naples', 'Turin', 'Palermo', 'Genoa', 'Bologna', 'Florence', 'Bari', 'Catania', 'Venice', 'Verona', 'Messina', 'Padua', 'Trieste'],
        'Spain': ['Madrid', 'Barcelona', 'Valencia', 'Seville', 'Zaragoza', 'Malaga', 'Murcia', 'Palma', 'Las Palmas', 'Bilbao', 'Alicante', 'Cordoba', 'Valladolid', 'Vigo', 'Gijon'],
        'China': ['Beijing', 'Shanghai', 'Guangzhou', 'Shenzhen', 'Chengdu', 'Tianjin', 'Wuhan', 'Hangzhou', 'Chongqing', 'Nanjing', 'Shenyang', 'Xian', 'Qingdao', 'Dalian', 'Suzhou'],
        'Japan': ['Tokyo', 'Osaka', 'Kyoto', 'Yokohama', 'Nagoya', 'Sapporo', 'Kobe', 'Fukuoka', 'Kawasaki', 'Saitama', 'Hiroshima', 'Sendai', 'Chiba', 'Okayama', 'Nara'],
        'South Korea': ['Seoul', 'Busan', 'Incheon', 'Daegu', 'Daejeon', 'Gwangju', 'Suwon', 'Ulsan', 'Changwon', 'Seongnam', 'Goyang', 'Yongin', 'Cheonan', 'Jeonju', 'Pohang'],
        'Turkey': ['Istanbul', 'Ankara', 'Izmir', 'Bursa', 'Antalya', 'Adana', 'Konya', 'Gaziantep', 'Mersin', 'Kayseri', 'Eskisehir', 'Diyarbakir', 'Samsun', 'Denizli', 'Sanliurfa'],
        'United Arab Emirates': ['Dubai', 'Abu Dhabi', 'Sharjah', 'Ajman', 'Ras Al Khaimah', 'Fujairah', 'Umm Al Quwain', 'Al Ain'],
        'Saudi Arabia': ['Riyadh', 'Jeddah', 'Mecca', 'Medina', 'Dammam', 'Khobar', 'Tabuk', 'Buraidah', 'Taif', 'Abha', 'Najran', 'Hail', 'Jizan', 'Al Khobar', 'Yanbu'],
        'Egypt': ['Cairo', 'Alexandria', 'Giza', 'Luxor', 'Aswan', 'Port Said', 'Suez', 'Mansoura', 'Tanta', 'Zagazig', 'Ismailia', 'Faiyum', 'Minya', 'Damietta', 'Beni Suef'],
        'Bangladesh': ['Dhaka', 'Chittagong', 'Khulna', 'Rajshahi', 'Sylhet', 'Barisal', 'Rangpur', 'Comilla', 'Narayanganj', 'Mymensingh'],
        'Afghanistan': ['Kabul', 'Kandahar', 'Herat', 'Mazar-i-Sharif', 'Jalalabad', 'Kunduz', 'Ghazni', 'Balkh', 'Baghlan', 'Farah'],
        'Iran': ['Tehran', 'Mashhad', 'Isfahan', 'Karaj', 'Shiraz', 'Tabriz', 'Qom', 'Ahvaz', 'Kermanshah', 'Urmia'],
        'Iraq': ['Baghdad', 'Basra', 'Mosul', 'Erbil', 'Sulaymaniyah', 'Kirkuk', 'Najaf', 'Karbala', 'Nasiriyah', 'Amara'],
        'Morocco': ['Casablanca', 'Rabat', 'Fes', 'Marrakech', 'Tangier', 'Agadir', 'Meknes', 'Oujda', 'Kenitra', 'Tetouan'],
        'South Africa': ['Johannesburg', 'Cape Town', 'Durban', 'Pretoria', 'Port Elizabeth', 'Bloemfontein', 'East London', 'Pietermaritzburg', 'Kimberley', 'Nelspruit'],
        'Nigeria': ['Lagos', 'Abuja', 'Kano', 'Ibadan', 'Port Harcourt', 'Benin City', 'Maiduguri', 'Zaria', 'Aba', 'Jos'],
        'Kenya': ['Nairobi', 'Mombasa', 'Kisumu', 'Nakuru', 'Eldoret', 'Thika', 'Malindi', 'Kitale', 'Garissa', 'Kakamega'],
        'Brazil': ['Sao Paulo', 'Rio de Janeiro', 'Brasilia', 'Salvador', 'Fortaleza', 'Belo Horizonte', 'Manaus', 'Curitiba', 'Recife', 'Porto Alegre'],
        'Mexico': ['Mexico City', 'Guadalajara', 'Monterrey', 'Puebla', 'Tijuana', 'Leon', 'Queretaro', 'Juarez', 'Cancun', 'Merida'],
        'Russia': ['Moscow', 'Saint Petersburg', 'Novosibirsk', 'Yekaterinburg', 'Kazan', 'Nizhny Novgorod', 'Chelyabinsk', 'Omsk', 'Rostov-on-Don', 'Ufa'],
        'Netherlands': ['Amsterdam', 'Rotterdam', 'The Hague', 'Utrecht', 'Eindhoven', 'Groningen', 'Tilburg', 'Almere', 'Breda', 'Nijmegen'],
        'Sweden': ['Stockholm', 'Gothenburg', 'Malmo', 'Uppsala', 'Vasteras', 'Orebro', 'Linkoping', 'Helsingborg', 'Jonkoping', 'Norrkoping'],
        'Norway': ['Oslo', 'Bergen', 'Trondheim', 'Stavanger', 'Drammen', 'Fredrikstad', 'Kristiansand', 'Sandnes', 'Tromso', 'Sarpsborg'],
        'Denmark': ['Copenhagen', 'Aarhus', 'Odense', 'Aalborg', 'Esbjerg', 'Randers', 'Kolding', 'Horsens', 'Vejle', 'Roskilde'],
        'Finland': ['Helsinki', 'Espoo', 'Tampere', 'Vantaa', 'Oulu', 'Turku', 'Jyvaskyla', 'Lahti', 'Kuopio', 'Pori'],
        'Switzerland': ['Zurich', 'Geneva', 'Basel', 'Bern', 'Lausanne', 'Lucerne', 'St. Gallen', 'Lugano', 'Biel', 'Thun'],
        'Austria': ['Vienna', 'Graz', 'Linz', 'Salzburg', 'Innsbruck', 'Klagenfurt', 'Wels', 'St. Polten', 'Dornbirn', 'Villach'],
        'Belgium': ['Brussels', 'Antwerp', 'Ghent', 'Charleroi', 'Liege', 'Bruges', 'Namur', 'Leuven', 'Mons', 'Aalst'],
        'Portugal': ['Lisbon', 'Porto', 'Braga', 'Coimbra', 'Setubal', 'Funchal', 'Amadora', 'Aveiro', 'Evora', 'Faro'],
        'Greece': ['Athens', 'Thessaloniki', 'Patras', 'Heraklion', 'Larissa', 'Volos', 'Ioannina', 'Chania', 'Kavala', 'Rhodes'],
        'Poland': ['Warsaw', 'Krakow', 'Wroclaw', 'Lodz', 'Poznan', 'Gdansk', 'Szczecin', 'Bydgoszcz', 'Lublin', 'Katowice'],
        'Czech Republic': ['Prague', 'Brno', 'Ostrava', 'Plzen', 'Liberec', 'Olomouc', 'Ceske Budejovice', 'Hradec Kralove', 'Usti nad Labem', 'Pardubice'],
        'Hungary': ['Budapest', 'Debrecen', 'Szeged', 'Miskolc', 'Pecs', 'Gyor', 'Nyiregyhaza', 'Kecskemet', 'Szekesfehervar', 'Szombathely'],
        'Romania': ['Bucharest', 'Cluj-Napoca', 'Timisoara', 'Iasi', 'Constanta', 'Craiova', 'Brasov', 'Galati', 'Ploiesti', 'Oradea'],
        'Ukraine': ['Kyiv', 'Kharkiv', 'Odesa', 'Dnipro', 'Donetsk', 'Lviv', 'Zaporizhzhia', 'Kryvyi Rih', 'Mykolaiv', 'Vinnytsia'],
        'Vietnam': ['Hanoi', 'Ho Chi Minh City', 'Da Nang', 'Haiphong', 'Can Tho', 'Nha Trang', 'Hue', 'Da Lat', 'Hai Duong', 'Bien Hoa'],
        'Thailand': ['Bangkok', 'Chiang Mai', 'Phuket', 'Pattaya', 'Khon Kaen', 'Nakhon Ratchasima', 'Udon Thani', 'Hat Yai', 'Chonburi', 'Rayong'],
        'Malaysia': ['Kuala Lumpur', 'George Town', 'Ipoh', 'Johor Bahru', 'Shah Alam', 'Petaling Jaya', 'Kuching', 'Kota Kinabalu', 'Malacca', 'Alor Setar'],
        'Singapore': ['Singapore'],
        'Indonesia': ['Jakarta', 'Surabaya', 'Bandung', 'Medan', 'Semarang', 'Makassar', 'Palembang', 'Denpasar', 'Yogyakarta', 'Malang'],
        'Philippines': ['Manila', 'Quezon City', 'Davao City', 'Cebu City', 'Caloocan', 'Zamboanga City', 'Taguig', 'Antipolo', 'Pasig', 'Cagayan de Oro'],
        'New Zealand': ['Auckland', 'Wellington', 'Christchurch', 'Hamilton', 'Tauranga', 'Dunedin', 'Palmerston North', 'Napier', 'Hastings', 'Nelson'],
        'Ireland': ['Dublin', 'Cork', 'Limerick', 'Galway', 'Waterford', 'Drogheda', 'Dundalk', 'Swords', 'Bray', 'Navan']
    };
    
   async function getCitiesFromAPI(country) {
    try {
        const res = await fetch('https://countriesnow.space/api/v0.1/countries/cities', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ country: country })
        });

        const data = await res.json();

        if (data.error) return [];
        return data.data;

    } catch (err) {
        console.error("City API error:", err);
        return [];
    }
}
    
    async function fetchCountriesFromAPI() {
        try {
            const response = await fetch('https://restcountries.com/v3.1/all?fields=name');
            if (!response.ok) throw new Error('Network response was not ok');
            const data = await response.json();
            const countries = data.map(c => c.name.common).sort();
            return countries;
        } catch (error) {
            console.error('Error fetching countries:', error);
            // Fallback countries if API fails
            return Object.keys(citiesDatabase).sort();
        }
    }
    
    function initSelect2(select, placeholder) {
        if (!select) return;
        if ($(select).hasClass('select2-hidden-accessible')) {
            $(select).select2('destroy');
        }
        $(select).select2({
            placeholder: placeholder,
            allowClear: true,
            width: '100%',
            dropdownParent: $(select).parent()
        });
    }
    
    async function populateCountrySelects() {
        const countries = await fetchCountriesFromAPI();
        
        [livingCountrySelect, originCountrySelect].forEach(select => {
            if (!select) return;
            select.innerHTML = '<option value="">Select country</option>';
            countries.forEach(country => {
                const option = document.createElement('option');
                option.value = country;
                option.textContent = country;
                select.appendChild(option);
            });
            initSelect2(select, "Search country");
        });
        
        // If there's a pre-selected value, trigger city update
        if (livingCountrySelect.value) {
            updateCityDropdown();
        }
    }
    
    async function updateCityDropdown() {
    const country = livingCountrySelect.value;
    citySelect.innerHTML = '';

    if (!country) {
        citySelect.disabled = true;
        citySelect.innerHTML = '<option value="">First select a country</option>';
        return;
    }

    citySelect.disabled = false;
    citySelect.innerHTML = '<option value="">Loading cities...</option>';

    const cities = await getCitiesFromAPI(country);

    citySelect.innerHTML = '<option value="">Select a city</option>';

    if (cities.length === 0) {
        citySelect.innerHTML = '<option value="">No cities found</option>';
        return;
    }

    cities.forEach(city => {
        const option = document.createElement('option');
        option.value = city;
        option.textContent = city;
        citySelect.appendChild(option);
    });

    // Select2 refresh
    if ($(citySelect).hasClass('select2-hidden-accessible')) {
        $(citySelect).select2('destroy');
    }

    $(citySelect).select2({
        placeholder: 'Search city',
        allowClear: true,
        width: '100%',
        dropdownParent: $(citySelect).parent()
    });
}
    
    // Populate countries from API
    await populateCountrySelects();
    
    // Add event listener for country change
    if (livingCountrySelect) {
      $('#livingCountrySelect').on('change', function () {
    updateCityDropdown();
});
    }
    // Marital status logic
 const maritalSelect = document.getElementById('maritalStatusSelect');
const childrenBox = document.getElementById('childrenDetailsBox');
const childrenInput = document.getElementById('childrenDetails');

function handleMaritalChange() {
    if (!maritalSelect) return;

    const value = maritalSelect.value;

    const hasChildren = value === "Married_With_Children" 
        || value === "Divorced_With_Children" 
        || value === "separated_With_children" 
        || value === "Widowed_With_Children";

    if (hasChildren) {
        childrenBox.style.display = 'block';
        childrenInput.setAttribute('required', 'required');
    } else {
        childrenBox.style.display = 'none';
        childrenInput.removeAttribute('required');
        childrenInput.value = '';
    }
}

// 🔥 IMPORTANT: Run on page load
    handleMaritalChange();


// On change
maritalSelect.addEventListener('change', handleMaritalChange);
    // CNIC formatting
    const cnicInput = document.querySelector('input[name="cnic"]');
    if (cnicInput) {
        cnicInput.addEventListener('input', function(e) {
            let val = e.target.value.replace(/\D/g, '');
            if (val.length > 5) val = val.slice(0,5) + '-' + val.slice(5);
            if (val.length > 13) val = val.slice(0,13) + '-' + val.slice(13);
            if (val.length > 15) val = val.slice(0,15);
            e.target.value = val;
        });
    }
    
    // Phone formatting
    const phoneInput = document.querySelector('input[name="phone"]');
    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            e.target.value = e.target.value.replace(/\D/g, '');
        });
    }
    
    // Disability logic
  document.getElementById('diseaseStatus').addEventListener('change', function () {
    let box = document.getElementById('diseaseDetailsBox');

    if (this.value === 'Yes') {
        box.style.display = 'block';
    } else {
        box.style.display = 'none';
    }
});

// Page load par bhi check
window.onload = function () {
    let status = document.getElementById('diseaseStatus').value;
    if (status === 'Yes') {
        document.getElementById('diseaseDetailsBox').style.display = 'block';
    }
};
    
    // Form validation

    
    console.log('Registration form loaded with Rest Countries API - All countries from API');
});
</script>

</body>
</html>