<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Verification Code - Zawjahaa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }
        
        body {
            background: linear-gradient(145deg, #0a1a1f 0%, #0c1e26 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .email-container {
            max-width: 560px;
            width: 100%;
            margin: 0 auto;
        }
        
        .email-card {
            background: rgba(20, 30, 35, 0.95);
            backdrop-filter: blur(14px);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 36px;
            padding: 45px 40px;
            box-shadow: 0 30px 60px -15px rgba(0,0,0,0.6);
            position: relative;
            overflow: hidden;
        }
        
        /* Decorative orbs - improved */
        .email-card::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: radial-gradient(circle at 30% 30%, rgba(16,185,129,0.2), rgba(5,150,105,0.05));
            filter: blur(80px);
            top: -100px;
            left: -100px;
            z-index: 0;
        }
        
        .email-card::after {
            content: '';
            position: absolute;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: radial-gradient(circle at 70% 70%, rgba(2,132,199,0.1), transparent 70%);
            filter: blur(80px);
            bottom: -120px;
            right: -120px;
            z-index: 0;
        }
        
        .content {
            position: relative;
            z-index: 10;
        }
        
        /* Brand section - improved with actual logo */
        .brand {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 35px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        
        .brand-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(145deg, #10B981, #059669);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 20px -8px rgba(16,185,129,0.4);
            overflow: hidden;
        }
        
        .brand-icon img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        
        .brand-text {
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: white;
            line-height: 1.1;
        }
        
        .brand-text span {
            color: #a7f3d0;
            font-weight: 400;
        }
        
        /* Typography - improved */
        h1 {
            color: white;
            font-weight: 700;
            font-size: 2.2rem;
            margin-bottom: 10px;
            letter-spacing: -0.02em;
            background: linear-gradient(135deg, #fff 0%, #e2e8f0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .greeting {
            color: rgba(255,255,255,0.8);
            font-size: 1.1rem;
            margin-bottom: 30px;
            border-left: 4px solid #10B981;
            padding-left: 18px;
            line-height: 1.5;
            font-weight: 400;
        }
        
        .message {
            color: rgba(255,255,255,0.7);
            font-size: 1rem;
            margin-bottom: 30px;
            line-height: 1.7;
        }
        
        /* Code box - improved */
        .code-container {
            background: linear-gradient(145deg, rgba(16,185,129,0.12), rgba(16,185,129,0.05));
            border: 2px solid rgba(16,185,129,0.25);
            border-radius: 28px;
            padding: 30px 25px;
            margin: 30px 0;
            text-align: center;
            box-shadow: 0 15px 30px -15px rgba(16,185,129,0.3);
        }
        
        .code-label {
            color: rgba(255,255,255,0.5);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 15px;
            font-weight: 500;
        }
        
        .verification-code {
            font-family: 'Courier New', 'Fira Code', monospace;
            font-size: 3.5rem;
            font-weight: 700;
            letter-spacing: 12px;
            color: #10B981;
            background: rgba(0,0,0,0.25);
            padding: 18px 25px;
            border-radius: 20px;
            display: inline-block;
            text-shadow: 0 0 20px rgba(16,185,129,0.5);
            border: 1px solid rgba(16,185,129,0.3);
            word-break: break-all;
        }
        
        /* Timer - improved */
        .timer-info {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin: 20px 0 10px;
            color: rgba(255,255,255,0.7);
            font-size: 1rem;
            background: rgba(0,0,0,0.2);
            padding: 10px 20px;
            border-radius: 40px;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }
        
        .timer-info i {
            color: #10B981;
            font-size: 1.1rem;
        }
        
        .validity-badge {
            text-align: center;
            margin: 25px 0 20px;
        }
        
        .validity {
            background: rgba(16,185,129,0.15);
            border: 1px solid rgba(16,185,129,0.3);
            border-radius: 40px;
            padding: 10px 22px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #a7f3d0;
            font-size: 0.95rem;
            font-weight: 500;
        }
        
        .validity i {
            color: #10B981;
        }
        
        /* Divider - improved */
        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.15), rgba(16,185,129,0.3), rgba(255,255,255,0.15), transparent);
            margin: 30px 0;
        }
        
        /* Footer - improved */
        .footer-note {
            color: rgba(255,255,255,0.55);
            font-size: 0.95rem;
            line-height: 1.7;
            margin-bottom: 25px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }
        
        .footer-note i {
            color: #10B981;
            font-size: 1.1rem;
            margin-top: 2px;
        }
        
        .warning {
            background: rgba(239, 68, 68, 0.12);
            border: 1px solid rgba(239, 68, 68, 0.25);
            border-radius: 16px;
            padding: 16px 20px;
            color: #fee2e2;
            font-size: 0.95rem;
            display: flex;
            align-items: flex-start;
            gap: 14px;
            margin-top: 25px;
            backdrop-filter: blur(5px);
        }
        
        .warning i {
            color: #ef4444;
            font-size: 1.2rem;
            margin-top: 1px;
        }
        
        .copyright {
            color: rgba(255,255,255,0.25);
            font-size: 0.75rem;
            text-align: center;
            margin-top: 30px;
            letter-spacing: 0.3px;
        }
        
        /* Responsive improvements */
        @media screen and (max-width: 480px) {
            .email-card {
                padding: 30px 20px;
            }
            
            .brand-text {
                font-size: 1.6rem;
            }
            
            .brand-icon {
                width: 50px;
                height: 50px;
            }
            
            h1 {
                font-size: 1.8rem;
            }
            
            .greeting {
                font-size: 1rem;
                padding-left: 12px;
            }
            
            .verification-code {
                font-size: 2.2rem;
                letter-spacing: 6px;
                padding: 15px 20px;
            }
            
            .code-container {
                padding: 20px 15px;
            }
        }

        /* Dark mode optimizations */
        @media (prefers-color-scheme: dark) {
            body {
                background: #0a1a1f;
            }
        }

        /* Email client fallbacks */
        .fallback-text {
            display: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-card">
            <div class="content">
                <!-- Brand with actual logo -->
                <div class="brand">
                    <div class="brand-icon">
                        <img src="{{ asset('assets/header.png') }}" alt="Zawjahaa Logo" width="60" height="60">
                    </div>
                    <div class="brand-text">Zaw<span>jahaa</span></div>
                </div>

                <!-- Greeting - dynamic with user name -->
                <h1>Password Reset</h1>
                <div class="greeting">
                    👋 Hi {{ $user->name }}, we received your reset request
                </div>

                <!-- Main message -->
                <div class="message">
                    Use the verification code below to complete your password reset. 
                    This security code ensures it's really you trying to access your account.
                </div>

                <!-- Verification Code Box - prominent display -->
                <div class="code-container">
                    <div class="code-label">🔐 Verification Code</div>
                    <div class="verification-code">{{ $otp }}</div>
                    
                    <div class="timer-info">
                        <i class="fa-regular fa-clock"></i>
                        <span>Valid for 15 minutes only</span>
                    </div>
                </div>

                <!-- Validity Badge -->
                <div class="validity-badge">
                    <span class="validity">
                        <i class="fa-regular fa-circle-check"></i>
                        Code expires at {{ date('h:i A', strtotime('+15 minutes')) }}
                    </span>
                </div>

                <!-- Decorative Divider -->
                <div class="divider"></div>

                <!-- Footer Note - helpful information -->
                <div class="footer-note">
                    <i class="fa-regular fa-lightbulb"></i>
                    <span>
                        <strong>Didn't request this?</strong> No action needed — your password won't change 
                        until you enter this verification code. If you didn't request a password reset, 
                        you can safely ignore this email.
                    </span>
                </div>

                <!-- Security Warning - important -->
                <div class="warning">
                    <i class="fa-regular fa-shield-halved"></i>
                    <span>
                        <strong>Never share this code!</strong> Our team will never ask for your 
                        verification code or password. Please keep it confidential.
                    </span>
                </div>

                <!-- Footer with year -->
                <div class="copyright">
                    © {{ date('Y') }} Zawjahaa. All rights reserved. | Secure Password Reset
                </div>
            </div>
        </div>
    </div>

    <!-- Font Awesome for email compatibility -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</body>
</html>