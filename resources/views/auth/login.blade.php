<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5, user-scalable=yes">
<title>Zawjahaa · Login</title>
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
/* ===== PHONE INPUT WITH COUNTRY CODE - FIXED ===== */
.phone-group {
    display: flex;
    gap: 12px;
    width: 100%;
    margin-bottom: 20px;
}

.phone-code, .phone-number {
    flex: 1;
}

.phone-code {
    max-width: 130px;
    flex-shrink: 0;
}

.input-group {
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 18px;
    padding: 0 16px;
    display: flex;
    align-items: center;
    transition: all 0.15s;
    height: 48px; /* fixed height for alignment */
    width: 100%;
}

.input-group i {
    color: rgba(255,255,255,0.6);
    font-size: 1rem;
    width: 24px;
    text-align: center;
    flex-shrink: 0;
}

.input-group:focus-within {
    border-color: #10B981;
    background: rgba(255,255,255,0.07);
}

.input-group input,
.input-group select {
    width: 100%;
    background: transparent;
    border: none;
    padding: 12px 6px;
    color: white;
    font-size: 0.95rem;
    outline: none;
}

.input-group select {
    cursor: pointer;
}

.input-group select option {
    background: #0f262c;
    color: white;
}

@media screen and (max-width: 640px) {
    .phone-group {
        flex-wrap: wrap;
    }
    .phone-code {
        max-width: 100%;
        width: 100%;
    }
    .phone-number {
        width: 100%;
    }
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
.input-group input,
.input-group select { 
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
.input-group select { 
    color: white; 
    cursor: pointer; 
}
.input-group select option { 
    background: #0f262c; 
    color: white; 
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
    margin-top: 6px; 
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
    margin-top: 6px; 
    margin-bottom: 16px; 
    padding-left: 12px; 
    display: flex; 
    align-items: center; 
    gap: 6px; 
    min-height: 20px;
}

/* ==== ROW FLEX - FIXED ALIGNMENT ==== */
.row-flex { 
    display: flex; 
    justify-content: space-between; 
    align-items: center; 
    margin: 16px 0 32px; 
    flex-wrap: wrap; 
    gap: 10px; 
}
.checkbox-label { 
    display: flex; 
    align-items: center; 
    gap: 8px; 
    color: rgba(255,255,255,0.8); 
    font-size: 0.88rem; 
    cursor: pointer; 
}
.checkbox-label input { 
    width: 16px; 
    height: 16px; 
    accent-color: #10B981; 
    cursor: pointer;
}

/* ==== FORGOT LINK - FIXED ==== */
.forgot-link { 
    color: rgba(255,255,255,0.7); 
    text-decoration: none; 
    font-size: 0.88rem; 
    border-bottom: 1px solid transparent; 
    transition: all 0.15s; 
}
.forgot-link:hover { 
    color: #10B981; 
    border-bottom-color: #10B981; 
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
    margin-top: 10px; 
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

/* ==== REGISTER LINK - FIXED ==== */
.register-link { 
    text-align: center; 
    margin-top: 30px; 
    color: rgba(255,255,255,0.65); 
    font-size: 0.95rem; 
}
.register-link a { 
    color: white; 
    font-weight: 600; 
    text-decoration: none; 
    border-bottom: 2px solid #10B981; 
    padding-bottom: 2px; 
    margin-left: 5px; 
    transition: all 0.15s;
}
.register-link a:hover { 
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
    .phone-group { 
        flex-wrap: wrap; 
    }
    .phone-code { 
        width: 100%; 
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
    .row-flex { 
        flex-direction: column; 
        align-items: flex-start; 
        gap: 12px;
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
            <img src="assets/logo1.png" alt="Zojah Jorha Logo">
        </div>
        <div class="brand-text">Zawjahaa</div>
    </div>
    <h2>Sign in</h2>
    <div class="subhead">Welcome back — continue your journey</div>

    <!-- ===== ALERT CONTAINER FOR MESSAGES ===== -->
    <div id="alertContainer"></div>

<form id="loginForm" novalidate>
        @csrf
        
        <!-- ===== PHONE WITH COUNTRY CODE ===== -->
        <label class="form-label">Phone Number</label>
        <div class="phone-group">
            <!--<div class="input-group phone-code" id="countryCodeGroup">-->
            <!--    <i class="fas fa-flag"></i>-->
            <!--    <select name="country_code" id="country_code" required>-->
            <!--        <option value="+92" selected>+92 (PK)</option>-->
            <!--        <option value="+1">+1 (US/CA)</option>-->
            <!--        <option value="+44">+44 (UK)</option>-->
            <!--        <option value="+971">+971 (UAE)</option>-->
            <!--        <option value="+966">+966 (SA)</option>-->
            <!--        <option value="+91">+91 (IN)</option>-->
            <!--    </select>-->
            <!--</div>-->
            <div class="input-group phone-number" id="phoneGroup">
                <i class="fas fa-phone"></i>
                <input type="tel" name="phone" id="phone" placeholder="0300-1234567" value="{{ old('phone') }}" required>
            </div>
        </div>
        <div id="phoneError" class="error-message"></div>

        <!-- ===== PASSWORD ===== -->
        <label class="form-label">Password</label>
        <div class="input-group" id="passwordGroup">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="••••••••" required>
        </div>
        <div id="passwordError" class="error-message"></div>

        <!-- ===== REMEMBER ME ===== -->
        <div class="row-flex">
            <label class="checkbox-label">
                <input type="checkbox" name="remember"> Remember me
            </label>
            <a href="{{ route('forgot-password') }}" class="forgot-link">Forgot password?</a>
        </div>

        <!-- ===== SUBMIT BUTTON ===== -->
        <button type="submit" class="btn-glass" id="submitBtn">
            <i class="fas fa-arrow-right-to-bracket"></i> Login
        </button>
    </form>

    <div class="register-link">
        Don't have an account?
        <a href="/?openRegister=1">Register</a>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('loginForm');
    const phoneInput = document.getElementById('phone');
    const passwordInput = document.getElementById('password');
    const phoneGroup = document.getElementById('phoneGroup');
    const passwordGroup = document.getElementById('passwordGroup');
    const phoneError = document.getElementById('phoneError');
    const passwordError = document.getElementById('passwordError');
    const submitBtn = document.getElementById('submitBtn');
    const alertContainer = document.getElementById('alertContainer');

    // ===== 1. PHONE VALIDATION - ONLY NUMBERS =====
    phoneInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        e.target.value = value;
        
        if (value.length === 0) {
            phoneGroup.classList.remove('valid', 'error');
            phoneError.innerHTML = '';
        } else if (value.length < 10) {
            phoneGroup.classList.remove('valid');
            phoneGroup.classList.add('error');
            phoneError.innerHTML = '<i class="fas fa-times-circle"></i> Phone must be 10-11 digits';
            phoneError.style.color = '#f87171';
        } else if (value.length > 11) {
            phoneGroup.classList.remove('valid');
            phoneGroup.classList.add('error');
            phoneError.innerHTML = '<i class="fas fa-times-circle"></i> Phone cannot exceed 11 digits';
            phoneError.style.color = '#f87171';
        } else {
            phoneGroup.classList.remove('error');
            phoneGroup.classList.add('valid');
            phoneError.innerHTML = '<i class="fas fa-check-circle"></i> Valid phone number';
            phoneError.style.color = '#a7f3d0';
        }
    });

    // ===== 2. PASSWORD VALIDATION =====
    passwordInput.addEventListener('input', function(e) {
        let value = e.target.value;
        
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
            passwordError.innerHTML = '<i class="fas fa-check-circle"></i> ✓';
            passwordError.style.color = '#a7f3d0';
        }
    });

    // ===== 3. FORM SUBMIT - AJAX (NO PAGE RELOAD) =====
   form.addEventListener('submit', async function(e) {
    e.preventDefault();

    alertContainer.innerHTML = '';

    let phone = phoneInput.value.trim();
    let password = passwordInput.value.trim();
    // let countryCode = document.getElementById('country_code').value;

    let isValid = true;

    // Reset previous errors
    phoneGroup.classList.remove('error');
    passwordGroup.classList.remove('error');
    phoneError.innerHTML = '';
    passwordError.innerHTML = '';

    // ===== REQUIRED FIELD CHECK =====
    if (!phone) {
        phoneGroup.classList.add('error');
        phoneError.innerHTML = '<i class="fas fa-times-circle"></i> Please fill this field';
        phoneError.style.color = '#f87171';
        isValid = false;
    } 
    else if (phone.length < 10 || phone.length > 11) {
        phoneGroup.classList.add('error');
        phoneError.innerHTML = '<i class="fas fa-times-circle"></i> Phone must be 10-11 digits';
        phoneError.style.color = '#f87171';
        isValid = false;
    }

    if (!password) {
        passwordGroup.classList.add('error');
        passwordError.innerHTML = '<i class="fas fa-times-circle"></i> Please fill this field';
        passwordError.style.color = '#f87171';
        isValid = false;
    } 
    else if (password.length < 6) {
        passwordGroup.classList.add('error');
        passwordError.innerHTML = '<i class="fas fa-times-circle"></i> Password must be at least 6 characters';
        passwordError.style.color = '#f87171';
        isValid = false;
    }

    if (!isValid) return;

    // ===== LOADING STATE =====
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Logging in...';

    // (Rest of your existing AJAX code stays same below this)

        
        // Prepare form data
        const formData = new FormData();
        formData.append('_token', document.querySelector('input[name="_token"]').value);
        // formData.append('country_code', countryCode);
        formData.append('phone', phone);
        formData.append('password', password);
        formData.append('remember', document.querySelector('input[name="remember"]').checked ? 'on' : '');

        try {
            const response = await fetch("{{ route('login') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await response.json();

            if (response.ok) {
                // SUCCESS - Redirect to dashboard
                window.location.href = data.redirect;
            } else {
                // ERROR - Show validation errors
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-arrow-right-to-bracket"></i> Login';
                
                if (data.errors) {
                    // Validation errors
                    if (data.errors.phone) {
                        phoneGroup.classList.add('error');
                        phoneError.innerHTML = '<i class="fas fa-times-circle"></i> ' + data.errors.phone[0];
                        phoneError.style.color = '#f87171';
                    }
                    if (data.errors.password) {
                        passwordGroup.classList.add('error');
                        passwordError.innerHTML = '<i class="fas fa-times-circle"></i> ' + data.errors.password[0];
                        passwordError.style.color = '#f87171';
                    }
                    if (data.errors.country_code) {
                        showAlert('danger', data.errors.country_code[0]);
                    }
                } else if (data.message) {
                    // General error message
                    showAlert('danger', data.message);
                    
                    // Highlight fields
                    phoneGroup.classList.add('error');
                    passwordGroup.classList.add('error');
                    phoneError.innerHTML = '<i class="fas fa-times-circle"></i> Invalid credentials';
                    phoneError.style.color = '#f87171';
                }
            }
        } catch (err) {
            console.error('Login error:', err);
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fas fa-arrow-right-to-bracket"></i> Login';
            showAlert('danger', 'Connection error. Please try again.');
        }
    });

    // ===== 4. HELPER FUNCTION TO SHOW ALERTS =====
    function showAlert(type, message) {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type}`;
        alertDiv.innerHTML = `<i class="fas fa-exclamation-circle"></i> ${message}`;
        alertContainer.appendChild(alertDiv);
        
        // Auto hide after 5 seconds
        setTimeout(() => {
            alertDiv.remove();
        }, 5000);
    }

    // ===== 5. TRIGGER INITIAL VALIDATION FOR OLD VALUES =====
    @if(old('phone'))
        phoneInput.value = "{{ old('phone') }}";
        phoneInput.dispatchEvent(new Event('input'));
    @endif
});
</script>

</body>
</html>