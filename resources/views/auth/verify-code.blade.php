<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5, user-scalable=yes">
<title>Zojah & Jorha · Verify Code</title>
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
    display: flex;
    align-items: center;
    gap: 10px;
}
.email-info i {
    color: #10B981;
    font-size: 1.1rem;
}

/* ==== CODE INPUT SPECIAL STYLING ==== */
.code-hint {
    color: rgba(255,255,255,0.5);
    font-size: 0.8rem;
    margin-top: 5px;
    margin-bottom: 15px;
    padding-left: 12px;
    display: flex;
    align-items: center;
    gap: 8px;
}
.code-hint i {
    color: #10B981;
    font-size: 0.8rem;
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

/* ==== CODE INPUT - MONOSPACE FONT FOR BETTER READABILITY ==== */
#code {
    font-family: 'Courier New', monospace;
    font-size: 1.2rem;
    letter-spacing: 2px;
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

/* ==== RESEND CODE SECTION - NEW ==== */
.resend-section {
    text-align: center;
    margin: 20px 0 10px;
    padding: 15px;
    background: rgba(255,255,255,0.02);
    border-radius: 16px;
    border: 1px solid rgba(255,255,255,0.05);
}
.timer-text {
    color: rgba(255,255,255,0.6);
    font-size: 0.9rem;
    margin-bottom: 10px;
}
.timer {
    color: #10B981;
    font-weight: 600;
}
.resend-btn {
    background: transparent;
    border: 1px solid rgba(16,185,129,0.5);
    color: #10B981;
    padding: 10px 20px;
    border-radius: 30px;
    font-size: 0.9rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}
.resend-btn:hover:not(:disabled) {
    background: rgba(16,185,129,0.1);
    border-color: #10B981;
    transform: translateY(-1px);
}
.resend-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    border-color: rgba(255,255,255,0.2);
    color: rgba(255,255,255,0.4);
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

/* ==== BACK LINK - FIXED ==== */
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
    .email-info {
        font-size: 0.85rem;
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
        <div class="brand-text">Zojah<span>Jorha</span></div>
    </div>
    
    <h2>Verify Code</h2>
    <div class="subhead">Enter the 6-digit code sent to your email</div>

    <!-- ===== ALERT CONTAINER FOR MESSAGES ===== -->
    <div id="alertContainer"></div>

    <!-- ===== EMAIL INFO (HIDDEN FIELD + DISPLAY) ===== -->
    @php
        // Try to get email from session, then from old input
        $email = session('email') ?: old('email');
    @endphp
    
    @if($email)
    <div class="email-info">
        <i class="fas fa-envelope"></i> 
        <span id="displayEmail">{{ $email }}</span>
    </div>
    @endif

    <form id="verifyCodeForm">
        @csrf
        <input type="hidden" name="email" id="email" value="{{ $email }}">

        <!-- ===== VERIFICATION CODE ===== -->
        <label class="form-label">Verification Code</label>
        <div class="input-group" id="codeGroup">
            <i class="fas fa-key"></i>
            <input type="text" name="code" id="code" placeholder="••••••" maxlength="6" required>
        </div>
        <div class="code-hint">
            <i class="fas fa-info-circle"></i> 6-digit code (e.g., 123456)
        </div>
        <div id="codeError" class="error-message"></div>

        <!-- ===== SUBMIT BUTTON ===== -->
        <button type="submit" class="btn-glass" id="submitBtn">
            <i class="fas fa-check-circle"></i> Verify Code
        </button>
    </form>

    <!-- ===== RESEND CODE SECTION ===== -->
    <div class="resend-section">
        <div class="timer-text">
            Didn't receive the code? <span class="timer" id="timer">02:00</span>
        </div>

        <button type="button" class="resend-btn" id="resendBtn" disabled>
            <i class="fas fa-redo-alt"></i> Resend Code
        </button>
    </div>

    <!-- ===== BACK TO FORGOT PASSWORD LINK ===== -->
    <div class="back-link">
        <a href="{{ route('forgot-password') }}">
            <i class="fas fa-arrow-left"></i> Back to Forgot Password
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

    const codeInput = $('#code');
    const codeGroup = $('#codeGroup');
    const codeError = $('#codeError');
    const submitBtn = $('#submitBtn');
    const alertContainer = $('#alertContainer');
    const resendBtn = $('#resendBtn');
    const timerEl = $('#timer');
    
    // Get email from PHP variable or session storage
    let email = $('#email').val();
    
    // If no email from PHP, try session storage
    if (!email) {
        email = sessionStorage.getItem('reset_email');
        if (email) {
            $('#email').val(email);
            $('#displayEmail').text(email);
        } else {
            // No email found, redirect to forgot password
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Email not found. Please start again.',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = "{{ route('forgot-password') }}";
            });
        }
    }

    // ===== CODE VALIDATION - ONLY NUMBERS =====
    codeInput.on('input', function() {
        let value = $(this).val().replace(/\D/g, ''); // Remove non-digits
        $(this).val(value);
        
        if (value.length === 0) {
            codeGroup.removeClass('valid error');
            codeError.html('');
        } else if (value.length < 6) {
            codeGroup.removeClass('valid').addClass('error');
            codeError.html('<i class="fas fa-times-circle"></i> Code must be 6 digits');
        } else if (value.length > 6) {
            codeGroup.removeClass('valid').addClass('error');
            codeError.html('<i class="fas fa-times-circle"></i> Code cannot exceed 6 digits');
        } else {
            codeGroup.removeClass('error').addClass('valid');
            codeError.html('<i class="fas fa-check-circle"></i> Valid code format').addClass('success-message');
        }
    });

    // ===== FORM SUBMIT WITH AJAX =====
    $('#verifyCodeForm').on('submit', function(e) {
        e.preventDefault();
        
        let code = codeInput.val();
        let email = $('#email').val();
        
        // Validate code
        if (!code) {
            codeGroup.addClass('error');
            codeError.html('<i class="fas fa-times-circle"></i> Verification code is required');
            return;
        }
        
        if (code.length !== 6 || !/^\d+$/.test(code)) {
            codeGroup.addClass('error');
            codeError.html('<i class="fas fa-times-circle"></i> Please enter a valid 6-digit code');
            return;
        }
        
        // Validate email
        if (!email) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Email not found. Please go back and try again.',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = "{{ route('forgot-password') }}";
            });
            return;
        }
        
        // Show loading state
        submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Verifying...');
        
        // Clear previous alerts
        alertContainer.html('');
        
        // AJAX request
        $.ajax({
            url: "{{ route('verify-code.post') }}",
            type: 'POST',
            data: {
                email: email,
                code: code
            },
            success: function(response) {
                console.log('Success response:', response);
                
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: response.message || 'Code verified successfully!',
                    timer: 1500,
                    showConfirmButton: false,
                    position: 'top-end',
                    toast: true
                });
                
                // Store in session for next page
                sessionStorage.setItem('reset_email', email);
                
                // Redirect to reset password page
                setTimeout(function() {
                    window.location.href = response.redirect || "{{ route('reset-password') }}";
                }, 1500);
            },
            error: function(xhr) {
                console.log('Error response:', xhr);
                
                // Reset button
                submitBtn.prop('disabled', false).html('<i class="fas fa-check-circle"></i> Verify Code');
                
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    
                    if (errors.code) {
                        codeGroup.addClass('error');
                        codeError.html('<i class="fas fa-times-circle"></i> ' + errors.code[0]);
                    } else if (errors.email) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: errors.email[0],
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.href = "{{ route('forgot-password') }}";
                        });
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

    // ===== RESEND CODE WITH AJAX =====
    resendBtn.on('click', function() {
        let email = $('#email').val();
        
        if (!email) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Email not found. Please go back and try again.',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = "{{ route('forgot-password') }}";
            });
            return;
        }
        
        // Show loading
        resendBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Sending...');
        
        $.ajax({
            url: "{{ route('forgot-password.post') }}",
            type: 'POST',
            data: {
                email: email
            },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'New verification code sent to your email',
                    timer: 2000,
                    showConfirmButton: false,
                    position: 'top-end',
                    toast: true
                });
                
                // Reset timer
                timeLeft = 120;
                updateTimer();
                
                // Disable resend button again
                resendBtn.prop('disabled', true).html('<i class="fas fa-redo-alt"></i> Resend Code');
                
                // Restart timer interval
                clearInterval(timerInterval);
                startTimer();
            },
            error: function(xhr) {
                resendBtn.prop('disabled', false).html('<i class="fas fa-redo-alt"></i> Resend Code');
                
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: errors.email ? errors.email[0] : 'Failed to resend code',
                        confirmButtonText: 'OK'
                    });
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

    // ===== RESEND CODE TIMER =====
    let timeLeft = 120; // 2 minutes in seconds
    let timerInterval;
    
    function updateTimer() {
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;
        timerEl.text(`${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`);
        
        if (timeLeft <= 0) {
            clearInterval(timerInterval);
            timerEl.text('00:00');
            resendBtn.prop('disabled', false);
        }
    }
    
    function startTimer() {
        timerInterval = setInterval(() => {
            if (timeLeft > 0) {
                timeLeft--;
                updateTimer();
            }
        }, 1000);
    }
    
    // Start timer
    startTimer();

    // Remove error when user starts typing
    codeInput.on('focus', function() {
        codeGroup.removeClass('error');
    });
});
</script>
</body>
</html>