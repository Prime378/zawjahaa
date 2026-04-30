<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5, user-scalable=yes">
<title>Zawjahaa · Reset Password</title>
    <link rel="icon" type="image/png" href="assets/header.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
/* ==== GLOBAL STYLES - FIXED & IMPROVED ==== */
* { 
    margin: 0; 
    padding: 0; 
    box-sizing: border-box; 
    font-family: 'Inter', sans-serif; 
}

body { 
    background: radial-gradient(circle at 10% 20%, rgba(16,185,129,0.18) 0%, transparent 35%),
                radial-gradient(circle at 90% 75%, rgba(16,185,129,0.12) 0%, transparent 40%),
                linear-gradient(145deg, #0a1a1f 0%, #0c1e26 100%); 
    min-height: 100vh; 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    padding: 16px; 
    position: relative; 
}

/* ==== FLOATING ORBS - FIXED POSITIONING ==== */
.orb { 
    position: fixed; 
    width: 280px; 
    height: 280px; 
    border-radius: 50%; 
    background: radial-gradient(circle at 30% 30%, rgba(16,185,129,0.2), rgba(5,150,105,0.08)); 
    filter: blur(70px); 
    z-index: 0; 
}
.orb-1 { 
    top: -80px; 
    left: -80px; 
}
.orb-2 { 
    bottom: -80px; 
    right: -80px; 
    width: 320px; 
    height: 320px; 
    background: rgba(2,132,199,0.08); 
}

/* ==== MAIN GLASS PANEL - PERFECT CENTERING ==== */
.glass-panel { 
    width: 100%; 
    max-width: 460px; 
    background: rgba(20, 30, 35, 0.55); 
    backdrop-filter: blur(14px) saturate(180%); 
    -webkit-backdrop-filter: blur(14px); 
    border: 1px solid rgba(255,255,255,0.15); 
    border-radius: 36px; 
    padding: 40px 35px; 
    box-shadow: 0 20px 40px -10px rgba(0,0,0,0.3); 
    position: relative; 
    z-index: 10; 
    transition: all 0.3s ease;
}

.glass-panel:hover {
    border-color: rgba(16,185,129,0.3);
    box-shadow: 0 25px 50px -12px rgba(16,185,129,0.25);
}

/* ==== BRAND SECTION - FIXED ALIGNMENT ==== */
.brand { 
    display: flex; 
    align-items: center; 
    gap: 12px; 
    margin-bottom: 30px; 
}
.brand-icon { 
    width: 52px; 
    height: 52px; 
    background: linear-gradient(145deg, #10B981, #059669); 
    border-radius: 16px; 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    overflow: hidden; 
    flex-shrink: 0; 
    box-shadow: 0 8px 16px -6px rgba(16,185,129,0.3); 
}
.brand-icon img { 
    width: 100%; 
    height: 100%; 
    object-fit: cover; 
    display: block; 
}
.brand-text { 
    font-size: 1.8rem; 
    font-weight: 700; 
    letter-spacing: -0.02em; 
    color: white; 
    line-height: 1.1; 
}
.brand-text span { 
    color: #a7f3d0; 
    font-weight: 400; 
}

/* ==== TYPOGRAPHY - FIXED SPACING ==== */
h2 { 
    color: white; 
    font-weight: 600; 
    font-size: 2rem; 
    margin-bottom: 8px; 
    letter-spacing: -0.02em;
}
.subhead { 
    color: rgba(255,255,255,0.7); 
    font-size: 0.95rem; 
    margin-bottom: 32px; 
    border-left: 3px solid #10B981; 
    padding-left: 14px; 
    line-height: 1.5;
}
.email-info {
    color: rgba(255,255,255,0.6);
    font-size: 0.9rem;
    margin-bottom: 25px;
    padding: 10px 14px;
    background: rgba(16,185,129,0.08);
    border-radius: 12px;
    border: 1px dashed rgba(16,185,129,0.3);
    word-break: break-all;
}
.email-info i {
    color: #10B981;
    margin-right: 8px;
}

/* ==== FORM LABELS - FIXED ==== */
.form-label { 
    display: block; 
    color: rgba(255,255,255,0.9); 
    font-weight: 600; 
    font-size: 0.75rem; 
    text-transform: uppercase; 
    letter-spacing: 0.04em; 
    margin-bottom: 8px; 
}

/* ==== INPUT GROUPS - FIXED BORDERS & SPACING ==== */
.input-group { 
    background: rgba(255,255,255,0.04); 
    border: 1.5px solid rgba(255,255,255,0.1); 
    border-radius: 18px; 
    padding: 2px 18px; 
    display: flex; 
    align-items: center; 
    transition: all 0.2s ease; 
    width: 100%; 
    margin-bottom: 5px;
}
.input-group:focus-within { 
    border-color: #10B981; 
    background: rgba(255,255,255,0.07); 
    box-shadow: 0 0 0 3px rgba(16,185,129,0.1);
}
.input-group i { 
    color: rgba(255,255,255,0.6); 
    font-size: 1rem; 
    width: 24px; 
    flex-shrink: 0; 
}
.input-group:focus-within i { 
    color: #10B981; 
}
.input-group input { 
    width: 100%; 
    background: transparent; 
    border: none; 
    padding: 15px 0 15px 6px; 
    color: white; 
    font-size: 0.95rem; 
    outline: none; 
}
.input-group input::placeholder { 
    color: rgba(255,255,255,0.4); 
    font-weight: 300;
}

/* ==== VALIDATION STYLES - FIXED COLORS ==== */
.input-group.valid { 
    border-color: #10B981; 
    background: rgba(16, 185, 129, 0.05); 
}
.input-group.valid i { 
    color: #10B981; 
}
.input-group.error { 
    border-color: #ef4444; 
    background: rgba(239, 68, 68, 0.05); 
}
.input-group.error i { 
    color: #ef4444; 
}

/* ==== ERROR MESSAGES - FIXED POSITIONING ==== */
.error-message { 
    color: #f87171; 
    font-size: 0.75rem; 
    margin-top: 5px; 
    margin-bottom: 16px; 
    padding-left: 12px; 
    display: flex; 
    align-items: center; 
    gap: 6px; 
    min-height: 20px;
}
.success-message { 
    color: #a7f3d0; 
    font-size: 0.75rem; 
    margin-top: 5px; 
    margin-bottom: 16px; 
    padding-left: 12px; 
    display: flex; 
    align-items: center; 
    gap: 6px; 
    min-height: 20px;
}

/* ==== PASSWORD STRENGTH METER - NEW ==== */
.strength-meter {
    margin: 5px 0 15px 0;
    padding: 0 5px;
}
.strength-bars {
    display: flex;
    gap: 6px;
    margin-bottom: 5px;
}
.strength-bar {
    height: 4px;
    flex: 1;
    background: rgba(255,255,255,0.1);
    border-radius: 4px;
    transition: all 0.3s ease;
}
.strength-bar.active:nth-child(1) { background: #ef4444; }
.strength-bar.active:nth-child(2) { background: #f59e0b; }
.strength-bar.active:nth-child(3) { background: #10b981; }
.strength-bar.active:nth-child(4) { background: #10b981; }
.strength-text {
    font-size: 0.7rem;
    color: rgba(255,255,255,0.5);
    text-align: right;
}

/* ==== BUTTON - FIXED HOVER & DISABLED STATES ==== */
.btn-glass { 
    background: linear-gradient(105deg, #10B981, #059669); 
    border: none; 
    border-radius: 40px; 
    padding: 16px 20px; 
    color: white; 
    font-weight: 600; 
    font-size: 1rem; 
    width: 100%; 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    gap: 10px; 
    border: 1px solid rgba(255,255,255,0.2); 
    box-shadow: 0 8px 18px -8px rgba(0,0,0,0.4); 
    transition: all 0.2s ease; 
    cursor: pointer; 
    margin: 10px 0 16px; 
    position: relative;
    overflow: hidden;
}
.btn-glass:hover { 
    background: #0fad74; 
    transform: translateY(-2px); 
    box-shadow: 0 14px 24px -10px #10B981; 
    border-color: rgba(255,255,255,0.4); 
}
.btn-glass:active {
    transform: translateY(0);
}
.btn-glass:disabled { 
    opacity: 0.6; 
    cursor: not-allowed; 
    transform: none; 
    box-shadow: none;
}

/* ==== BACK TO LOGIN LINK - FIXED ==== */
.back-link { 
    text-align: center; 
    margin-top: 20px; 
}
.back-link a { 
    color: rgba(255,255,255,0.7); 
    text-decoration: none; 
    font-size: 0.9rem; 
    display: inline-flex; 
    align-items: center; 
    gap: 8px; 
    border-bottom: 1px solid transparent; 
    transition: all 0.15s;
}
.back-link a:hover { 
    color: #10B981; 
    border-bottom-color: #10B981; 
}

/* ==== ALERTS - FIXED STYLING ==== */
.alert { 
    padding: 14px 18px; 
    border-radius: 14px; 
    margin-bottom: 24px; 
    font-size: 0.9rem; 
    display: flex; 
    align-items: center; 
    gap: 12px; 
    backdrop-filter: blur(4px);
    animation: slideIn 0.3s ease;
}
.alert-danger { 
    background: rgba(239, 68, 68, 0.15); 
    border: 1px solid rgba(239, 68, 68, 0.3); 
    color: #fee2e2; 
}
.alert-success { 
    background: rgba(16, 185, 129, 0.15); 
    border: 1px solid rgba(16, 185, 129, 0.3); 
    color: #a7f3d0; 
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ==== RESPONSIVE DESIGN - FULLY FIXED ==== */
@media screen and (max-width: 640px) {
    .glass-panel { 
        padding: 30px 24px; 
    }
    h2 { 
        font-size: 1.8rem; 
    }
    .brand-text { 
        font-size: 1.6rem; 
    }
    .brand-icon { 
        width: 48px; 
        height: 48px; 
    }
}

@media screen and (max-width: 480px) {
    .glass-panel { 
        padding: 25px 20px; 
    }
    h2 { 
        font-size: 1.6rem; 
    }
    .subhead { 
        font-size: 0.9rem; 
    }
}

/* ==== LOADING SPINNER FIX ==== */
.fa-spinner {
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* ==== FOCUS VISIBLE ACCESSIBILITY ==== */
*:focus-visible {
    outline: 2px solid #10B981;
    outline-offset: 2px;
}

/* ==== CUSTOM SCROLLBAR ==== */
::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}
::-webkit-scrollbar-track {
    background: rgba(255,255,255,0.05);
    border-radius: 10px;
}
::-webkit-scrollbar-thumb {
    background: rgba(255,255,255,0.2);
    border-radius: 10px;
}
::-webkit-scrollbar-thumb:hover {
    background: rgba(16,185,129,0.5);
}
</style>
</head>
<body>
<div class="orb orb-1"></div>
<div class="orb orb-2"></div>

<div class="glass-panel">
    <div class="brand">
        <div class="brand-icon">
            <img src="assets/logo1.png" alt="Zawjahaa Logo">
        </div>
        <div class="brand-text">Zaw<span>jahaa</span></div>
    </div>
    
    <h2>Reset Password</h2>
    <div class="subhead">Create a new strong password</div>

    <!-- ===== ALERT CONTAINER FOR MESSAGES ===== -->
    <div id="alertContainer">
        @if($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i> {{ $errors->first() }}
            </div>
        @endif
        
        @if(session('status'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('status') }}
            </div>
        @endif
    </div>

    <!-- ===== EMAIL INFO (HIDDEN FIELD + DISPLAY) ===== -->
    @php
        $email = session('reset_email', session('email', old('email')));
    @endphp
    
    @if($email)
    <div class="email-info">
        <i class="fas fa-envelope"></i> {{ $email }}
    </div>
    @endif

    <form method="POST" action="{{ route('reset-password.post') }}" id="resetPasswordForm">
        @csrf

        <!-- Hidden email field from session -->
        <input type="hidden" name="email" value="{{ $email }}">

        <!-- ===== NEW PASSWORD ===== -->
        <label class="form-label">New Password</label>
        <div class="input-group" id="passwordGroup">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="••••••••" value="{{ old('password') }}" required>
            <i class="fas fa-eye" id="togglePassword" style="cursor: pointer; width: auto; margin-left: 10px;"></i>
        </div>
        <div id="passwordError" class="error-message">
            @error('password')
                <i class="fas fa-times-circle"></i> {{ $message }}
            @enderror
        </div>

        <!-- ===== PASSWORD STRENGTH METER ===== -->
        <div class="strength-meter" id="strengthMeter" style="display: none;">
            <div class="strength-bars">
                <div class="strength-bar" id="bar1"></div>
                <div class="strength-bar" id="bar2"></div>
                <div class="strength-bar" id="bar3"></div>
                <div class="strength-bar" id="bar4"></div>
            </div>
            <div class="strength-text" id="strengthText"></div>
        </div>

        <!-- ===== CONFIRM PASSWORD ===== -->
        <label class="form-label">Confirm Password</label>
        <div class="input-group" id="confirmGroup">
            <i class="fas fa-lock"></i>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" value="{{ old('password_confirmation') }}" required>
            <i class="fas fa-eye" id="toggleConfirm" style="cursor: pointer; width: auto; margin-left: 10px;"></i>
        </div>
        <div id="confirmError" class="error-message"></div>

        <!-- ===== SUBMIT BUTTON ===== -->
        <button type="submit" class="btn-glass" id="submitBtn">
            <i class="fas fa-key"></i> Reset Password
        </button>
    </form>

    <!-- ===== BACK TO LOGIN LINK ===== -->
    <div class="back-link">
        <a href="{{ route('login') }}">
            <i class="fas fa-arrow-left"></i> Back to Login
        </a>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('resetPasswordForm');
    const passwordInput = document.getElementById('password');
    const confirmInput = document.getElementById('password_confirmation');
    const passwordGroup = document.getElementById('passwordGroup');
    const confirmGroup = document.getElementById('confirmGroup');
    const passwordError = document.getElementById('passwordError');
    const confirmError = document.getElementById('confirmError');
    const submitBtn = document.getElementById('submitBtn');
    
    // Password strength elements
    const strengthMeter = document.getElementById('strengthMeter');
    const bar1 = document.getElementById('bar1');
    const bar2 = document.getElementById('bar2');
    const bar3 = document.getElementById('bar3');
    const bar4 = document.getElementById('bar4');
    const strengthText = document.getElementById('strengthText');

    // Toggle password visibility
    const togglePassword = document.getElementById('togglePassword');
    const toggleConfirm = document.getElementById('toggleConfirm');

    if (togglePassword) {
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    }

    if (toggleConfirm) {
        toggleConfirm.addEventListener('click', function() {
            const type = confirmInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmInput.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    }

    // ===== PASSWORD STRENGTH CHECKER =====
    function checkPasswordStrength(password) {
        let strength = 0;
        
        if (password.length >= 8) strength++;
        if (password.match(/[a-z]+/)) strength++;
        if (password.match(/[A-Z]+/)) strength++;
        if (password.match(/[0-9]+/)) strength++;
        if (password.match(/[$@#&!]+/)) strength++;
        
        return Math.min(4, Math.floor(strength / 1.25));
    }

    function updateStrengthMeter(password) {
        if (!strengthMeter) return;
        
        if (password.length === 0) {
            strengthMeter.style.display = 'none';
            return;
        }
        
        strengthMeter.style.display = 'block';
        const strength = checkPasswordStrength(password);
        
        // Reset bars
        [bar1, bar2, bar3, bar4].forEach(bar => {
            if (bar) bar.classList.remove('active');
        });
        
        // Activate bars based on strength
        if (strength >= 1 && bar1) bar1.classList.add('active');
        if (strength >= 2 && bar2) bar2.classList.add('active');
        if (strength >= 3 && bar3) bar3.classList.add('active');
        if (strength >= 4 && bar4) bar4.classList.add('active');
        
        // Set text
        const texts = ['Weak', 'Fair', 'Good', 'Strong', 'Very Strong'];
        if (strengthText) {
            strengthText.textContent = texts[strength];
            strengthText.style.color = 
                strength <= 1 ? '#ef4444' : 
                strength === 2 ? '#f59e0b' : 
                '#10b981';
        }
    }

    // ===== PASSWORD VALIDATION =====
    if (passwordInput) {
        passwordInput.addEventListener('input', function(e) {
            let value = e.target.value;
            
            updateStrengthMeter(value);
            
            if (value.length === 0) {
                passwordGroup.classList.remove('valid', 'error');
                passwordError.innerHTML = '';
            } else if (value.length < 6) {
                passwordGroup.classList.remove('valid');
                passwordGroup.classList.add('error');
                passwordError.innerHTML = '<i class="fas fa-times-circle"></i> Password must be at least 6 characters';
                passwordError.style.color = '#f87171';
            } else {
                passwordGroup.classList.remove('error');
                passwordGroup.classList.add('valid');
                passwordError.innerHTML = '<i class="fas fa-check-circle"></i> Strong password';
                passwordError.style.color = '#a7f3d0';
                
                // Check if passwords match
                if (confirmInput && confirmInput.value.length > 0) {
                    if (value === confirmInput.value) {
                        confirmGroup.classList.remove('error');
                        confirmGroup.classList.add('valid');
                        confirmError.innerHTML = '<i class="fas fa-check-circle"></i> Passwords match';
                        confirmError.style.color = '#a7f3d0';
                    } else {
                        confirmGroup.classList.remove('valid');
                        confirmGroup.classList.add('error');
                        confirmError.innerHTML = '<i class="fas fa-times-circle"></i> Passwords do not match';
                        confirmError.style.color = '#f87171';
                    }
                }
            }
        });
    }

    // ===== CONFIRM PASSWORD VALIDATION =====
    if (confirmInput) {
        confirmInput.addEventListener('input', function(e) {
            let value = e.target.value;
            let password = passwordInput ? passwordInput.value : '';
            
            if (value.length === 0) {
                confirmGroup.classList.remove('valid', 'error');
                confirmError.innerHTML = '';
            } else if (value !== password) {
                confirmGroup.classList.remove('valid');
                confirmGroup.classList.add('error');
                confirmError.innerHTML = '<i class="fas fa-times-circle"></i> Passwords do not match';
                confirmError.style.color = '#f87171';
            } else if (password.length >= 6) {
                confirmGroup.classList.remove('error');
                confirmGroup.classList.add('valid');
                confirmError.innerHTML = '<i class="fas fa-check-circle"></i> Passwords match';
                confirmError.style.color = '#a7f3d0';
            }
        });
    }

    // ===== FORM SUBMIT - SHOW LOADING =====
    if (form) {
        form.addEventListener('submit', function(e) {
    const password = passwordInput.value;
    const confirm = confirmInput.value;

    if (!password || password.length < 6) {
        e.preventDefault();
        passwordGroup.classList.add('error');
        passwordError.innerHTML = '<i class="fas fa-times-circle"></i> Password must be at least 6 characters';
        return;
    }

    if (password !== confirm) {
        e.preventDefault();
        confirmGroup.classList.add('error');
        confirmError.innerHTML = '<i class="fas fa-times-circle"></i> Passwords do not match';
        return;
    }

    // loading state
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Resetting...';
});
    }

    // ===== TRIGGER INITIAL VALIDATION IF NEEDED =====
    @if(old('password'))
        if (passwordInput) {
            passwordInput.value = "{{ old('password') }}";
            passwordInput.dispatchEvent(new Event('input'));
        }
    @endif
    
    @if(old('password_confirmation'))
        if (confirmInput) {
            confirmInput.value = "{{ old('password_confirmation') }}";
            confirmInput.dispatchEvent(new Event('input'));
        }
    @endif
});
</script>

</body>
</html>