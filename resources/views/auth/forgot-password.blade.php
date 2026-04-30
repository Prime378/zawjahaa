<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5, user-scalable=yes">
<title>Zawjahaa · Forgot Password</title>
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
    margin-bottom: 8px;
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
    margin-bottom: 16px; 
    padding-left: 12px; 
    display: flex; 
    align-items: center; 
    gap: 6px; 
    min-height: 20px;
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
    margin: 8px 0 16px; 
    position: relative;
    overflow: hidden;
}
.btn-glass:hover:not(:disabled) { 
    background: #0fad74; 
    transform: translateY(-2px); 
    box-shadow: 0 14px 24px -10px #10B981; 
    border-color: rgba(255,255,255,0.4); 
}
.btn-glass:active:not(:disabled) {
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
    margin-top: 10px; 
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
.fa-spinner, .fa-spin {
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
    
    <h2>Forgot Password</h2>
    <div class="subhead">Enter your email to receive verification code</div>

    <!-- ===== ALERT CONTAINER FOR MESSAGES ===== -->
    <div id="alertContainer"></div>

    <form id="forgotPasswordForm">
        @csrf
        
        <!-- ===== EMAIL INPUT ===== -->
        <label class="form-label">Email Address</label>
        <div class="input-group" id="emailGroup">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="your@email.com" value="" required>
        </div>
        <div id="emailError" class="error-message"></div>

        <!-- ===== SUBMIT BUTTON ===== -->
        <button type="submit" class="btn-glass" id="submitBtn">
            <i class="fas fa-paper-plane"></i> Send Verification Code
        </button>
    </form>

    <!-- ===== BACK TO LOGIN LINK ===== -->
    <div class="back-link">
        <a href="{{ route('login') }}">
            <i class="fas fa-arrow-left"></i> Back to Login
        </a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {
    // CSRF Token setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const emailInput = $('#email');
    const emailGroup = $('#emailGroup');
    const emailError = $('#emailError');
    const submitBtn = $('#submitBtn');
    const alertContainer = $('#alertContainer');

    // Email validation function
    function isValidEmail(email) {
        let pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return pattern.test(email);
    }

    // Real-time email validation
    emailInput.on('input', function() {
        let value = $(this).val().trim();
        
        if (value.length === 0) {
            emailGroup.removeClass('valid error');
            emailError.html('');
        } else if (!isValidEmail(value)) {
            emailGroup.removeClass('valid').addClass('error');
            emailError.html('<i class="fas fa-times-circle"></i> Please enter a valid email address');
        } else {
            emailGroup.removeClass('error').addClass('valid');
            emailError.html('<i class="fas fa-check-circle"></i> Valid email format').removeClass('error-message').addClass('success-message');
        }
    });

    // Form submission with AJAX
    $('#forgotPasswordForm').on('submit', function(e) {
        e.preventDefault();
        
        let email = emailInput.val().trim();
        
        // Frontend validation
        if (!email) {
            emailGroup.addClass('error');
            emailError.html('<i class="fas fa-times-circle"></i> Email address is required');
            return;
        }
        
        if (!isValidEmail(email)) {
            emailGroup.addClass('error');
            emailError.html('<i class="fas fa-times-circle"></i> Please enter a valid email address');
            return;
        }
        
        // Show loading state
        submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Sending...');
        
        // Clear previous alerts
        alertContainer.html('');
        
        // AJAX request
        $.ajax({
            url: "{{ route('forgot-password.post') }}",
            type: 'POST',
            data: {
                email: email
            },
            success: function(response) {
                console.log('Success response:', response);
                
                // Show success message
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: response.message || 'Verification code sent to your email',
                    timer: 1500,
                    showConfirmButton: false,
                    position: 'top-end',
                    toast: true
                });
                
                // Store email in session storage for next page
                sessionStorage.setItem('reset_email', email);
                
                // Redirect to verify code page
                setTimeout(function() {
                    window.location.href = "{{ route('verify-code') }}";
                }, 1500);
            },
            error: function(xhr) {
                console.log('Error response:', xhr);
                
                // Reset button
                submitBtn.prop('disabled', false).html('<i class="fas fa-paper-plane"></i> Send Verification Code');
                
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    
                    if (errors.email) {
                        emailGroup.addClass('error');
                        emailError.html('<i class="fas fa-times-circle"></i> ' + errors.email[0]);
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: xhr.responseJSON?.message || 'Something went wrong!',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    });

    // Remove error when user starts typing
    emailInput.on('focus', function() {
        emailGroup.removeClass('error');
    });

    // Check for stored email on page load
    let storedEmail = sessionStorage.getItem('reset_email');
    if (storedEmail) {
        emailInput.val(storedEmail);
        emailInput.trigger('input');
    }
});
</script>
</body>
</html>