<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-logged-in" content="{{ Auth::check() ? 'true' : 'false' }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5, user-scalable=yes">
    <title>Zawjahaa | Matchmaking Since 2010</title>
    <link rel="icon" type="image/png" href="{{asset('assets/header.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700;800;900&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #10B981;
            --primary-dark: #059669;
            --secondary: #F59E0B;
            --dark: #111827;
            --light: #F9FAFB;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f8fafc;
            color: #334155;
            padding-top: 50px;
            font-size: 14px;
        }

        /* ===== NAVBAR FIXED ===== */
        .navbar {
            background: white;
            padding: 0.75rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1040;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            border-bottom: 3px solid var(--primary);
            font-size: 14px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 700;
        }

        .header-logo {
            height: 42px;
            width: auto;
            object-fit: contain;
        }

        .hero-subtitle {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            min-height: 50px;
            overflow: hidden;
            /* ðŸ‘ˆ important */
        }

        .hero-line {
            width: 45%;
            overflow: hidden;
            /* ðŸ‘ˆ prevents cut issue */
        }


        /* Mobile */
        @media (max-width: 768px) {

            .hero-subtitle {
                flex-direction: column;
                gap: 8px;
            }

            .hero-line {
                width: 100%;
            }

            .hero-divider {
                display: none;
            }
        }


        .text-success {
            color: #10B981 !important;
        }

        .marquee-text {
            white-space: nowrap;
            overflow: hidden;
            display: block;
            animation: marquee 30s linear infinite;
        }

        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .nav-link {
            color: #4b5563 !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            border-radius: 6px;
            transition: all 0.3s;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #10B981 !important;
            background: rgba(16, 185, 129, 0.1);
        }

        /* DROPDOWN - FIXED */
        .dropdown-menu {
            border-radius: 12px;
            border: 1px solid #edf2f7;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.06);
            margin-top: 6px;
            padding: 0.5rem 0;
            display: none;
        }

        .dropdown-menu.show {
            display: block;
        }

        .dropdown-item {
            padding: 0.6rem 1.5rem;
            font-weight: 500;
        }

        .dropdown-item:hover {
            background-color: rgba(16, 185, 129, 0.08);
            color: #10B981;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ef4444;
            color: white;
            font-size: 0.7rem;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }



        /* Mobile Navbar Fix */
        @media (max-width: 991px) {
            .navbar-collapse {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                width: 100%;
                background: white;
                padding: 0 1.2rem;
                border-radius: 0 0 18px 18px;
                box-shadow: 0 14px 20px rgba(0, 0, 0, 0.08);
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.35s ease, padding 0.25s ease;
                z-index: 1030;
            }

            .navbar-collapse.show {
                max-height: 600px;
                padding: 1.2rem 1.2rem 1.8rem;
            }

            .navbar-nav {
                width: 100%;
            }

            .nav-item {
                width: 100%;
                margin: 2px 0;
            }

            .nav-link {
                display: block;
                padding: 12px 16px !important;
            }

            .dropdown-menu {
                background: #f8fafc;
                border: none;
                padding: 0.5rem;
                margin-top: 0;
                box-shadow: none;
                width: 100%;
            }
        }

        @media (min-width: 992px) {
            .navbar-collapse {
                display: flex !important;
                flex-basis: auto;
                position: static;
                max-height: none !important;
                overflow: visible;
                padding: 0 !important;
                box-shadow: none;
            }
        }

        /* ===== PAGE LOADER ===== */
        #page-loader {
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        .loader-wrapper {
            position: relative;
            width: 120px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .loader-ring {
            border: 6px solid transparent;
            border-top: 6px solid #00a157;
            border-bottom: 6px solid #00a157;
            animation: spin 1s linear infinite;
            z-index: 1;
        }

        #loader-img {
            width: 100px;
            height: 100px;
            animation: blink 1s infinite;
            object-fit: contain;
        }

        h1 {
            font-size: 28px;
        }

        h2 {
            font-size: 24px;
        }

        h3 {
            font-size: 20px;
        }

        h4 {
            font-size: 18px;
        }

        html {
            font-size: 85%;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.3;
            }
        }

        #page-loader.hidden {
            opacity: 0;
            visibility: hidden;
        }

        /* ===== FOOTER ===== */
        footer {
            background: linear-gradient(135deg, #111827 0%, #1F2937 100%);
            color: white;
            padding: 80px 0 30px;
        }

        .footer-logo {
            font-size: 2rem;
            font-weight: 800;
            color: white;
            margin-bottom: 25px;
        }

        .footer-logo i {
            color: #34D399;
        }

        .footer-links h5 {
            color: white;
            margin-bottom: 25px;
            border-bottom: 2px solid var(--primary);
            display: inline-block;
            padding-bottom: 10px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            display: block;
            margin-bottom: 12px;
            transition: 0.3s;
        }

        .footer-links a:hover {
            color: white;
            padding-left: 20px;
        }

        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-icons a {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: 0.3s;
        }

        .social-icons a:hover {
            background: var(--primary);
            transform: translateY(-5px);
        }

        .copyright {
            text-align: center;
            padding-top: 40px;
            margin-top: 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.6);
        }

        .text-green-light {
            color: #34D399 !important;
        }

        /* ===== BACK TO TOP & WHATSAPP ===== */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 55px;
            height: 55px;
            background: linear-gradient(135deg, #10B981, #059669);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: 0.4s;
            z-index: 1000;
            border: 2px solid white;
            box-shadow: 0 5px 15px rgba(16, 185, 129, 0.4);
        }

        .back-to-top.show {
            opacity: 1;
            visibility: visible;
        }

        .whatsapp-float {
            position: fixed;
            bottom: 95px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #25D366, #128C7E);
            color: white;
            border-radius: 50%;
            font-size: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            text-decoration: none;
            border: 2px solid white;
            box-shadow: 0 5px 15px rgba(37, 211, 102, 0.4);
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
        }

        /* Modal Styles */
        .modal-content {
            border-radius: 20px;
            border: 3px solid var(--primary);
        }

        .modal-header {
            background: linear-gradient(135deg, #10B981, #059669);
            color: white;
            border: none;
        }

        .btn-close {
            filter: invert(1);
        }

        .register-modal-content {
            display: flex;
            min-height: 600px;
            border-radius: 15px;
            overflow: hidden;
        }

        .register-left-col {
            flex: 0 0 40%;
            background: linear-gradient(135deg, #10B981, #059669);
            color: white;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .register-heart-box {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            border: 3px solid rgba(255, 255, 255, 0.3);
        }

        .register-left-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .register-right-col {
            flex: 0 0 60%;
            background: white;
            display: flex;
            flex-direction: column;
        }

        .register-form-header {
            padding: 1.5rem 2rem 1rem;
            border-bottom: 1px solid #dee2e6;
            position: relative;
        }

        .register-form-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #10B981;
        }

        /*.register-form-scroll { flex: 1; overflow-y: auto; padding: 1.5rem 2rem; }*/
        .form-row-two {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .form-group-two {
            flex: 1;
        }

        .form-group-full {
            width: 100%;
            margin-bottom: 1rem;
        }

        .form-label-two {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.375rem;
        }

        .form-control-two {
            width: 100%;
            padding: 0.625rem 0.75rem;
            font-size: 0.9rem;
            border: 1px solid #ced4da;
            border-radius: 6px;
        }

        .form-control-two:focus {
            border-color: #10B981;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(16, 185, 129, 0.25);
        }

        .file-input-wrapper {
            position: relative;
            display: flex;
        }

        .file-input {
            opacity: 0;
            position: absolute;
            width: 100%;
            height: 100%;
            cursor: pointer;
            z-index: 2;
        }

        .file-label {
            width: 100%;
            padding: 0.625rem 0.75rem;
            background: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 6px;
            color: #6c757d;
            text-align: center;
            cursor: pointer;
        }

        .textarea-two {
            resize: vertical;
            min-height: 60px;
        }

        .terms-checkbox {
            display: flex;
            align-items: flex-start;
            margin: 1rem 0;
        }

        .terms-checkbox input {
            margin-right: 0.75rem;
            margin-top: 0.25rem;
            width: 1rem;
            height: 1rem;
            accent-color: #10B981;
        }

        .register-submit-btn {
            background: linear-gradient(135deg, #10B981, #059669);
            color: white;
            border: none;
            padding: 0.875rem;
            border-radius: 8px;
            font-weight: 600;
            width: 100%;
            cursor: pointer;
            transition: 0.3s;
        }

        .register-submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }

        .login-link {
            text-align: center;
            font-size: 0.9rem;
            color: #6c757d;
            margin-top: 1rem;
        }

        .login-link a {
            color: #10B981;
            font-weight: 600;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .register-modal-content {
                flex-direction: column;
            }

            .register-left-col,
            .register-right-col {
                flex: 0 0 100%;
            }

            .form-row-two {
                flex-direction: column;
                gap: 0.5rem;
            }
        }

        /* ===== USER NAV LINK ===== */
        .user-nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            padding: 6px 14px;
            border-radius: 50px;
            background: rgba(16, 185, 129, 0.08);
            border: 1px solid rgba(16, 185, 129, 0.2);
            transition: all 0.3s ease;
        }

        /* Hover Effect */
        .user-nav-link:hover {
            background: #10B981;
            border-color: #10B981;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(16, 185, 129, 0.3);
        }

        /* Avatar Circle */
        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #10B981;
            color: #fff;
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Name Text */
        .user-name {
            color: #10B981;
            font-weight: 600;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        /* Change name color on hover */
        .user-nav-link:hover .user-name {
            color: #fff;
        }

        /* Logout Icon Button */
        .logout-icon-btn {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            border: 1px solid rgba(239, 68, 68, 0.3);
            background: rgba(239, 68, 68, 0.08);
            color: #10B981;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        /* Hover Effect */
        .logout-icon-btn:hover {
            background: #ef4444;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(239, 68, 68, 0.3);
        }

        /* Remove default button styling */
        .logout-icon-btn:focus {
            outline: none;
            box-shadow: none;
        }

        /* ===== CHATBOT BUTTON & POPUP - YEH CODE ADD KARO ===== */
        .chatbot-toggle {
            position: fixed;

            bottom: 28px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #10B981, #059669);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            cursor: pointer;
            z-index: 998;
            border: 2px solid white;
            box-shadow: 0 5px 15px rgba(16, 185, 129, 0.4);
            transition: all 0.3s ease;
        }

        .chatbot-toggle:hover {
            transform: scale(1.1);
        }

        .chatbot-popup {
            position: fixed;
            bottom: 89px;
            right: 92px;
            width: 350px;
            height: 500px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            display: none;
            flex-direction: column;
            overflow: hidden;
            z-index: 999;
            border: 2px solid #10B981;
        }

        .chatbot-popup.open {
            display: flex;
        }

        .chatbot-header {
            background: linear-gradient(135deg, #10B981, #059669);
            color: white;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: move;
        }

        .chatbot-header-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .chatbot-avatar {
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #10B981;
            font-size: 1.5rem;
        }

        .chatbot-title h4 {
            font-size: 16px;
            font-weight: 600;
            margin: 0;
        }

        .chatbot-title p {
            font-size: 12px;
            opacity: 0.9;
            margin: 0;
        }

        .chatbot-close {
            background: rgba(255, 255, 255, 0.2);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .chatbot-close:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .chatbot-messages {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
            background: #f8fafc;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .chatbot-message {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            max-width: 85%;
        }

        .chatbot-message.user {
            align-self: flex-end;
            flex-direction: row-reverse;
        }

        .chatbot-message-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        .chatbot-message.bot .chatbot-message-avatar {
            background: linear-gradient(135deg, #10B981, #059669);
            color: white;
        }

        .chatbot-message.user .chatbot-message-avatar {
            background: #1e293b;
            color: white;
        }

        .chatbot-message-content {
            background: white;
            padding: 10px 12px;
            border-radius: 15px;
            font-size: 13px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            word-wrap: break-word;
            line-height: 1.4;
        }

        .chatbot-message.user .chatbot-message-content {
            background: #10B981;
            color: white;
            border-bottom-right-radius: 5px;
        }

        .chatbot-message.bot .chatbot-message-content {
            background: white;
            border-bottom-left-radius: 5px;
        }

        .chatbot-message-time {
            font-size: 9px;
            margin-top: 4px;
            opacity: 0.7;
            display: block;
        }

        .chatbot-input-area {
            padding: 15px;
            background: white;
            border-top: 1px solid #e2e8f0;
            display: flex;
            gap: 10px;
        }

        .chatbot-input-area input {
            flex: 1;
            padding: 10px 12px;
            border: 1px solid #e2e8f0;
            border-radius: 25px;
            font-size: 13px;
            outline: none;
        }

        .chatbot-input-area input:focus {
            border-color: #10B981;
        }

        .chatbot-input-area button {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #10B981, #059669);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .chatbot-input-area button:hover {
            transform: scale(1.05);
        }

        .chatbot-quick-replies {
            display: flex;
            gap: 8px;
            padding: 10px 15px;
            background: white;
            border-top: 1px solid #e2e8f0;
            overflow-x: auto;
        }

        .chatbot-quick-reply {
            background: #f1f5f9;
            border: none;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            color: #1e293b;
            cursor: pointer;
            white-space: nowrap;
            transition: all 0.3s;
        }

        .chatbot-quick-reply:hover {
            background: #10B981;
            color: white;
        }

        .chatbot-typing {
            display: flex;
            gap: 4px;
            padding: 10px 12px;
            background: white;
            border-radius: 15px;
            width: fit-content;
        }

        .chatbot-typing-dot {
            width: 6px;
            height: 6px;
            background: #94a3b8;
            border-radius: 50%;
            animation: typingBounce 1.4s infinite ease-in-out;
        }

        .chatbot-typing-dot:nth-child(1) {
            animation-delay: 0s;
        }

        .chatbot-typing-dot:nth-child(2) {
            animation-delay: 0.2s;
        }

        .chatbot-typing-dot:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes typingBounce {

            0%,
            60%,
            100% {
                transform: translateY(0);
            }

            30% {
                transform: translateY(-6px);
            }
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .chatbot-popup {
                width: 300px;
                height: 450px;
                bottom: 150px;
                right: 15px;
            }

            .chatbot-toggle {
                bottom: 35px;
                right: 35px;
                width: 50px;
                height: 50px;
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- Page Loader -->
    <div id="page-loader" class="position-fixed top-0 start-0 w-100 h-100 bg-white d-flex justify-content-center align-items-center" style="z-index: 9999;">
        <div class="loader-wrapper position-relative" style="width: 120px; height: 120px;">
            <div class="loader-ring position-absolute top-0 start-0 w-100 h-100 rounded-circle"></div>
            <img src="{{ asset('assets/zawjahaa_logo.png')}}" alt="Loading..." id="loader-img" class="position-absolute top-50 start-50 translate-middle" />
        </div>
    </div>

    <div class="floating-element" style="top: 10%; left: 5%;"></div>
    <div class="floating-element" style="top: 60%; right: 5%; animation-delay: 2s;"></div>
    <div class="floating-element" style="top: 30%; right: 15%; width: 200px; height: 20px; animation-delay: 1s;"></div>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('website') }}">
                <img src="{{ asset('assets/zawjahaa_logo.png')}}" alt="Zawjahaa Logo" class="header-logo">
                <span class="fw-bold text-dark"> </span>
                <span class="fw-bold text-success">زوجھا</span>
            </a>

            <div class="d-flex align-items-center d-lg-none">
                <!--<span class="notification-badge">3</span>-->
                <button class="navbar-toggler border-success" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <!-- Navigation Links -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('website') ? 'active' : '' }}" href="{{ route('website') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('search') ? 'active' : '' }}" href="{{ route('search') }}">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('ai-match') ? 'active' : '' }}" href="{{ route('ai-match') }}">AI Match</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('website') }}#feedback">
                            Feedback
                        </a>
                    </li>
                    <!--<li class="nav-item">-->
                    <!--    <a class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}">Profiles</a>-->
                    <!--</li>-->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                    </li>

                    @guest
                    <!-- Login & Register Buttons for Guest Users -->
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-outline-success nav-btn login-btn" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </a>
                    </li>
                    <li class="nav-item ms-lg-2">
                       <a class="btn btn-success nav-btn register-btn" id="ctaRegisterBtn" href="#">
                            <i class="fas fa-user-plus me-2"></i>Register
                        </a>
                    </li>
                    @endguest

                    @auth
                    <!--Simple User Info & Logout Button for Authenticated Users -->
                    <li class="nav-item ms-lg-3">
                        <a href="{{ route('profile') }}" class="user-greeting me-2 d-none d-lg-inline text-decoration-none text-success">
                            <i class="fas fa-user-circle me-1"></i>
                            {{ Auth::user()->name ?? 'User' }}
                        </a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="logout-icon-btn">
        <i class="fas fa-sign-out-alt"></i>
    </button>
</form>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

<!--<div class="modal fade" id="profileForModal" tabindex="-1" aria-labelledby="profileForModalLabel" aria-hidden="true">-->
<!--    <div class="modal-dialog modal-dialog-centered modal-lg">-->
<!--        <div class="modal-content premium-modal">-->
<!--            <div class="modal-header premium-modal-header">-->
<!--                <div class="modal-icon">-->
<!--                    <i class="fas fa-heart"></i>-->
<!--                </div>-->
<!--                <h5 class="modal-title" id="profileForModalLabel">Create Your Profile</h5>-->
<!--                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--            </div>-->
<!--            <div class="modal-body premium-modal-body">-->
                
                <!-- Profile For Options -->
<!--                <div class="selection-section" id="profileSection">-->
<!--                    <h6 class="selection-title">-->
<!--                        <i class="fas fa-user-circle me-2"></i>-->
<!--                        Who is this profile for?-->
<!--                    </h6>-->
<!--                    <div class="row g-3" id="profileForOptions">-->
<!--                        <div class="col-md-3 col-6">-->
<!--                            <button type="button" class="premium-option-btn profile-option" data-profile="self">-->
<!--                                <div class="option-icon">-->
<!--                                    <i class="fas fa-user"></i>-->
<!--                                </div>-->
<!--                                <span>Myself</span>-->
<!--                            </button>-->
<!--                        </div>-->
<!--                        <div class="col-md-3 col-6">-->
<!--                            <button type="button" class="premium-option-btn profile-option" data-profile="son">-->
<!--                                <div class="option-icon">-->
<!--                                    <i class="fas fa-male"></i>-->
<!--                                </div>-->
<!--                                <span>My Son</span>-->
<!--                            </button>-->
<!--                        </div>-->
<!--                        <div class="col-md-3 col-6">-->
<!--                            <button type="button" class="premium-option-btn profile-option" data-profile="daughter">-->
<!--                                <div class="option-icon">-->
<!--                                    <i class="fas fa-female"></i>-->
<!--                                </div>-->
<!--                                <span>My Daughter</span>-->
<!--                            </button>-->
<!--                        </div>-->
<!--                        <div class="col-md-3 col-6">-->
<!--                            <button type="button" class="premium-option-btn profile-option" data-profile="brother">-->
<!--                                <div class="option-icon">-->
<!--                                    <i class="fas fa-user-friends"></i>-->
<!--                                </div>-->
<!--                                <span>My Brother</span>-->
<!--                            </button>-->
<!--                        </div>-->
<!--                        <div class="col-md-3 col-6">-->
<!--                            <button type="button" class="premium-option-btn profile-option" data-profile="sister">-->
<!--                                <div class="option-icon">-->
<!--                                    <i class="fas fa-user-friends"></i>-->
<!--                                </div>-->
<!--                                <span>My Sister</span>-->
<!--                            </button>-->
<!--                        </div>-->
<!--                        <div class="col-md-3 col-6">-->
<!--                            <button type="button" class="premium-option-btn profile-option" data-profile="friend">-->
<!--                                <div class="option-icon">-->
<!--                                    <i class="fas fa-handshake"></i>-->
<!--                                </div>-->
<!--                                <span>My Friend</span>-->
<!--                            </button>-->
<!--                        </div>-->
<!--                        <div class="col-md-3 col-6">-->
<!--                            <button type="button" class="premium-option-btn profile-option" data-profile="relative">-->
<!--                                <div class="option-icon">-->
<!--                                    <i class="fas fa-users"></i>-->
<!--                                </div>-->
<!--                                <span>My Relative</span>-->
<!--                            </button>-->
<!--                        </div>-->
<!--                        <div class="col-md-3 col-6">-->
<!--                            <button type="button" class="premium-option-btn profile-option" data-profile="other">-->
<!--                                <div class="option-icon">-->
<!--                                    <i class="fas fa-user-plus"></i>-->
<!--                                </div>-->
<!--                                <span>Other</span>-->
<!--                            </button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

                <!-- Gender Options (hidden initially) -->
<!--                <div class="selection-section d-none" id="genderSection">-->
<!--                    <h6 class="selection-title" id="genderQuestion">-->
<!--                        <i class="fas fa-venus-mars me-2"></i>-->
<!--                        Select Gender:-->
<!--                    </h6>-->
<!--                    <div class="row g-3">-->
<!--                        <div class="col-md-6">-->
<!--                            <button type="button" class="premium-option-btn gender-option" data-gender="male">-->
<!--                                <div class="option-icon male-icon">-->
<!--                                    <i class="fas fa-mars"></i>-->
<!--                                </div>-->
<!--                                <span>Male</span>-->
<!--                                <small class="option-desc">Bridegroom</small>-->
<!--                            </button>-->
<!--                        </div>-->
<!--                        <div class="col-md-6">-->
<!--                            <button type="button" class="premium-option-btn gender-option" data-gender="female">-->
<!--                                <div class="option-icon female-icon">-->
<!--                                    <i class="fas fa-venus"></i>-->
<!--                                </div>-->
<!--                                <span>Female</span>-->
<!--                                <small class="option-desc">Bride</small>-->
<!--                            </button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="text-center mt-4">-->
<!--                        <button type="button" class="btn-back" id="backToProfileBtn">-->
<!--                            <i class="fas fa-arrow-left me-2"></i>Back to Selection-->
<!--                        </button>-->
<!--                    </div>-->
<!--                </div>-->

<!--            </div>-->
<!--            <div class="modal-footer premium-modal-footer">-->
<!--                <button type="button" class="btn-cancel" data-bs-dismiss="modal">-->
<!--                    <i class="fas fa-times me-2"></i>Cancel-->
<!--                </button>-->
<!--                <button type="button" class="btn-continue" id="continueBtn" disabled>-->
<!--                    <i class="fas fa-arrow-right me-2"></i>Continue to Registration-->
<!--                </button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

    <!-- MAIN CONTENT YIELD -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5">
                    <div class="footer-logo">
                        <i class="fas fa-heart"></i>
                        <span></span><span class="text-green-light">Zawjahaa</span>
                    </div>
                    <p class="opacity-75 mb-4">Pakistan's Most Trusted Marriage Bureau since 2010. Connecting hearts across the globe with integrity, excellence, and care.</p>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/zawjahaa" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/zawjahaa.official/" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 mb-5">
                    <div class="footer-links">
                        <h5>Quick Links</h5>
                        <a href="{{ route('website') }}">Home</a>
                        <a href="{{ route('search') }}">Search</a>
                        <a href="{{ route('profile') }}">Profiles</a>
                        <a href="{{ route('ai-match') }}">AI Match</a>
                        <a href="{{ route('services') }}">Services</a>
                        <a href="{{ route('contact') }}">Contact</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 mb-5">
                    <div class="footer-links">
                        <h5>Our Services</h5>
                        <a href="{{ route('personal.matchmaking') }}" target="_blank">Personal Matchmaking</a>
                        <a href="{{ route('international.match') }}" target="_blank">International Rishta</a>
                        <a href="{{ route('family.match') }}" target="_blank">Family Mediation</a>
                        <a href="{{ route('bg.verify') }}" target="_blank">Background Verification</a>
                        <a href="{{ route('wedding.plan') }}" target="_blank">Wedding Planning</a>
                        <a href="{{ route('vip.concierge') }}" target="_blank">VIP Concierge</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 mb-5">
                    <div class="footer-links">
                        <h5>Contact Info</h5>
                        <!--<p><i class="fas fa-phone me-2 text-green-light"></i> +92 317 6065004</p>-->
                        <p><i class="fas fa-envelope me-2 text-green-light"></i> info@Zawjahaa.com</p>
                        <p><i class="fas fa-map-marker-alt me-2 text-green-light"></i> Punjab Pakistan</p>
                        <p><i class="fas fa-clock me-2 text-green-light"></i> Mon-Sat: 10AM - 8PM</p>
                    </div>
                </div>
            </div>

            <div class="copyright">
                <p>&copy; 2026 Zawjahaa Marriage Bureau. All rights reserved. | Since 2010 | <a href="{{ route('privacy.policy') }}" class="text-green-light">Privacy Policy</a> | <a href="{{ route('terms.service') }}" class="text-green-light">Terms of Service</a> | <a class="text-green-light" href="{{ route('faq') }}">FAQ</a></p>
                <p class="mt-2">Designed with <i class="fas fa-heart text-danger"></i> Zawjahaa</p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <div class="back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- WhatsApp Button -->
    <a href="{{ route('contact') }}" class="whatsapp-float">
        <i class="fab fa-whatsapp"></i>
    </a>
    <div class="chatbot-toggle" id="chatbotToggle">
        <i class="fas fa-robot"></i>
    </div>
    <div class="chatbot-popup" id="chatbotPopup">
        <div class="chatbot-header" id="chatbotHeader">
            <div class="chatbot-header-left">
                <div class="chatbot-avatar">
                    <i class="fas fa-robot"></i>
                </div>
                <div class="chatbot-title">
                    <h4>AI Dost</h4>
                    <p>Online • 24/7</p>
                </div>
            </div>
            <div class="chatbot-close" id="chatbotClose">
                <i class="fas fa-times"></i>
            </div>
        </div>

        <div class="chatbot-messages" id="chatbotMessages">
            <div class="chatbot-message bot">
                <div class="chatbot-message-avatar">
                    <i class="fas fa-robot"></i>
                </div>
                <div class="chatbot-message-content">
                    👋 Assalam-o-Alaikum! Main AI Dost hoon. Aapki kya madad kar sakta hoon?
                    <span class="chatbot-message-time">Just now</span>
                </div>
            </div>
        </div>

        <div class="chatbot-quick-replies" id="chatbotQuickReplies">
            <button class="chatbot-quick-reply" onclick="useQuickReply('Assalam-o-Alaikum')">👋 Salam</button>
            <button class="chatbot-quick-reply" onclick="useQuickReply('Apka naam kya hai?')">🤖 Apna naam</button>
            <!--<button class="chatbot-quick-reply" onclick="useQuickReply('rishta chie muhjay')">Kis ap ko rista Chie ?</button>-->
            <button class="chatbot-quick-reply" onclick="useQuickReply('Services kya hain?')">📋 Services</button>
            <button class="chatbot-quick-reply" onclick="useQuickReply('Contact number')">📞 Contact</button>
            <button class="chatbot-quick-reply" onclick="useQuickReply('Allah Hafiz')">👋 Bye</button>
        </div>

        <div class="chatbot-input-area">
            <input type="text" id="chatbotInput" placeholder="Apna message likhein..." onkeypress="handleChatbotKeyPress(event)">
            <button onclick="sendChatbotMessage()" id="chatbotSendBtn">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>
    <!-- ===== LOGIN MODAL ===== -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login to Zawjahaa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('login') }}" id="loginForm">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label text-success fw-semibold">Phone Number</label>
                            <div class="d-flex gap-2">
                                <select name="country_code" class="form-control" style="width: 100px;" required>
                                    <option value="+92">+92</option>
                                    <option value="+1">+1</option>
                                    <option value="+44">+44</option>
                                    <option value="+971">+971</option>
                                </select>
                                <input type="tel" name="phone" class="form-control" placeholder="3001234567" required style="flex:1;">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-success fw-semibold">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                        </div>
                        <div class="mb-3 form-check d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                            <a href="#" class="text-success">Forgot Password?</a>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-3">Login</button>
                    </form>
                    <div class="text-center mt-3">
                        <p>Don't have an account? <a href="#" class="text-success" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">Register here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // ===== CHATBOT FUNCTIONALITY =====
        document.addEventListener('DOMContentLoaded', function() {
            const chatbotToggle = document.getElementById('chatbotToggle');
            const chatbotPopup = document.getElementById('chatbotPopup');
            const chatbotClose = document.getElementById('chatbotClose');
            const chatbotHeader = document.getElementById('chatbotHeader');
            const chatbotMessages = document.getElementById('chatbotMessages');
            const chatbotInput = document.getElementById('chatbotInput');
            const chatbotSendBtn = document.getElementById('chatbotSendBtn');

            let isChatbotTyping = false;
            let isDragging = false;
            let offsetX, offsetY;

            if (chatbotToggle) {
                chatbotToggle.addEventListener('click', function() {
                    chatbotPopup.classList.toggle('open');
                    if (chatbotPopup.classList.contains('open')) {
                        chatbotInput.focus();
                    }
                });
            }

            if (chatbotClose) {
                chatbotClose.addEventListener('click', function() {
                    chatbotPopup.classList.remove('open');
                });
            }

            if (chatbotHeader) {
                chatbotHeader.addEventListener('mousedown', startDrag);
                document.addEventListener('mousemove', drag);
                document.addEventListener('mouseup', stopDrag);
            }

            function startDrag(e) {
                isDragging = true;
                offsetX = e.clientX - chatbotPopup.offsetLeft;
                offsetY = e.clientY - chatbotPopup.offsetTop;
                chatbotPopup.style.cursor = 'grabbing';
            }

            function drag(e) {
                if (!isDragging) return;
                e.preventDefault();

                let left = e.clientX - offsetX;
                let top = e.clientY - offsetY;

                left = Math.max(0, Math.min(left, window.innerWidth - chatbotPopup.offsetWidth));
                top = Math.max(0, Math.min(top, window.innerHeight - chatbotPopup.offsetHeight));

                chatbotPopup.style.left = left + 'px';
                chatbotPopup.style.bottom = 'auto';
                chatbotPopup.style.right = 'auto';
                chatbotPopup.style.top = top + 'px';
            }

            function stopDrag() {
                isDragging = false;
                chatbotPopup.style.cursor = 'default';
            }

            // ===== FIXED: CONTROLLER CALL =====
            window.sendChatbotMessage = function() {
                const message = chatbotInput.value.trim();
                if (!message || isChatbotTyping) return;

                addChatbotMessage(message, true);
                chatbotInput.value = '';

                showChatbotTyping();

                // Get CSRF token
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                // Send to Laravel controller
                fetch('/chatbot/message', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            message: message,
                            session_id: Date.now().toString()
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        hideChatbotTyping();
                        if (data.success) {
                            addChatbotMessage(data.response, false);
                        } else {
                            addChatbotMessage('Sorry yaar, koi masla aa gaya! 😅', false);
                        }
                    })
                    .catch(error => {
                        hideChatbotTyping();
                        console.error('Error:', error);
                        addChatbotMessage('Network error! Dobara try karo. 📶', false);
                    });
            };

            window.handleChatbotKeyPress = function(event) {
                if (event.key === 'Enter') {
                    sendChatbotMessage();
                }
            };

            window.useQuickReply = function(text) {
                chatbotInput.value = text;
                sendChatbotMessage();
            };

            function addChatbotMessage(message, isUser = false) {
                const messageDiv = document.createElement('div');
                messageDiv.className = `chatbot-message ${isUser ? 'user' : 'bot'}`;

                const time = new Date().toLocaleTimeString('en-US', {
                    hour: '2-digit',
                    minute: '2-digit'
                });

                if (isUser) {
                    messageDiv.innerHTML = `
                <div class="chatbot-message-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <div class="chatbot-message-content">
                    ${message}
                    <span class="chatbot-message-time">${time}</span>
                </div>
            `;
                } else {
                    messageDiv.innerHTML = `
                <div class="chatbot-message-avatar">
                    <i class="fas fa-robot"></i>
                </div>
                <div class="chatbot-message-content">
                    ${message}
                    <span class="chatbot-message-time">${time}</span>
                </div>
            `;
                }

                chatbotMessages.appendChild(messageDiv);
                chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
            }

            function showChatbotTyping() {
                isChatbotTyping = true;
                chatbotInput.disabled = true;
                chatbotSendBtn.disabled = true;

                const typingDiv = document.createElement('div');
                typingDiv.className = 'chatbot-message bot';
                typingDiv.id = 'chatbotTypingIndicator';
                typingDiv.innerHTML = `
            <div class="chatbot-message-avatar">
                <i class="fas fa-robot"></i>
            </div>
            <div class="chatbot-typing">
                <span class="chatbot-typing-dot"></span>
                <span class="chatbot-typing-dot"></span>
                <span class="chatbot-typing-dot"></span>
            </div>
        `;
                chatbotMessages.appendChild(typingDiv);
                chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
            }

            function hideChatbotTyping() {
                isChatbotTyping = false;
                chatbotInput.disabled = false;
                chatbotSendBtn.disabled = false;
                chatbotInput.focus();

                const typingDiv = document.getElementById('chatbotTypingIndicator');
                if (typingDiv) {
                    typingDiv.remove();
                }
            }
        });

        // ===== PAGE LOADER =====

        window.addEventListener('load', function() {
            const loader = document.getElementById('page-loader');
            if (loader) {
                setTimeout(function() {
                    loader.classList.add('hidden');
                    setTimeout(function() {
                        loader.style.display = 'none';
                    }, 500);
                }, 800);
            }
        });

        function updateOnlineStatus() {
            $.ajax({
                url: '{{ route("search") }}', // aapka search AJAX route
                type: 'GET',
                data: {
                    // optional: filters
                    education: $('#filter-education').val(),
                    religion: $('#filter-religion').val(),
                    country: $('#filter-country').val(),
                    city: $('#filter-city').val(),
                    marital_status: $('#filter-marital_status').val(),
                    photo_only: $('#filter-photo_only').is(':checked') ? 1 : 0,
                    premium_only: $('#filter-premium_only').is(':checked') ? 1 : 0,
                },
                success: function(response) {
                    if (response.success) {
                        $('#search-results').html(response.html); // update the HTML
                    }
                },
                error: function(err) {
                    console.error('Failed to update online status', err);
                }
            });
        }

        // Call every 10 seconds
        setInterval(updateOnlineStatus, 10000); // 10000ms = 10 sec
        // ===== BACK TO TOP =====
        // const backToTop = document.getElementById('backToTop');
        // if (backToTop) {
        //     window.addEventListener('scroll', function() {
        //         if (window.scrollY > 300) {
        //             backToTop.classList.add('show');
        //         } else {
        //             backToTop.classList.remove('show');
        //         }
        //     });

        //     backToTop.addEventListener('click', function() {
        //         window.scrollTo({ top: 0, behavior: 'smooth' });
        //     });
        // }

        // ===== FILE INPUT LABEL UPDATE =====
        document.addEventListener('DOMContentLoaded', function() {
            const fileInputs = document.querySelectorAll('.file-input');
            fileInputs.forEach(input => {
                input.addEventListener('change', function(e) {
                    const fileName = e.target.files[0]?.name || 'Choose File';
                    const label = this.nextElementSibling;
                    if (label) {
                        label.textContent = fileName;
                    }
                });
            });

            // CNIC Formatting
            const cnicField = document.getElementById('cnicField');
            if (cnicField) {
                cnicField.addEventListener('input', function(e) {
                    let val = e.target.value.replace(/\D/g, '');
                    if (val.length > 13) val = val.slice(0, 13);
                    if (val.length > 5) {
                        val = val.slice(0, 5) + '-' + val.slice(5);
                    }
                    if (val.length > 13) {
                        val = val.slice(0, 13) + '-' + val.slice(13, 14);
                    }
                    e.target.value = val;
                });
            }
        });

        // ===== PROFILE FORM SUBMIT (AGAR FORM EXIST KARE TO) =====
        const editProfileForm = document.getElementById('editProfileForm');
        if (editProfileForm) {
            editProfileForm.addEventListener('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                fetch("{{ route('profile.update') }}", {
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            alert("Profile updated successfully!");
                            location.reload();
                        } else {
                            alert("Error updating profile");
                        }
                    })
                    .catch(error => console.log(error));
            });
        }


        // public/js/app.js ya resources/js/app.js
        document.addEventListener("DOMContentLoaded", function() {

            function sendHeartbeat() {
                fetch("/heartbeat", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        "Accept": "application/json"
                    }
                }).catch(err => console.error("Heartbeat error:", err));
            }

            // First ping immediately
            sendHeartbeat();

            // Ping every 30 seconds
            setInterval(sendHeartbeat, 30000);
        });
        // ===== LOGIN FORM SUBMIT =====
        const loginForm = document.getElementById('loginForm');
        if (loginForm) {
            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                fetch("{{ route('login') }}", {
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            window.location.href = data.redirect;
                        } else if (data.errors) {
                            alert('Validation error!');
                            console.log(data.errors);
                        } else if (data.message) {
                            alert(data.message);
                        }
                    })
                    .catch(error => console.log(error));
            });
        }
        document.addEventListener('DOMContentLoaded', function() {
    let selectedProfile = null;
    let selectedGender = null;
    
    // Handle profile option selection
    const profileOptions = document.querySelectorAll('.profile-option');
    const genderOptions = document.querySelectorAll('.gender-option');
    const continueBtn = document.getElementById('continueBtn');
    const backToProfileBtn = document.getElementById('backToProfileBtn');
    const profileSection = document.getElementById('profileSection');
    const genderSection = document.getElementById('genderSection');
    const genderQuestion = document.getElementById('genderQuestion');
    
    profileOptions.forEach(option => {
        option.addEventListener('click', function() {
            // Remove active class from all profile options
            profileOptions.forEach(opt => opt.classList.remove('active'));
            // Add active class to clicked option
            this.classList.add('active');
            
            selectedProfile = this.getAttribute('data-profile');
            
            // Update gender question based on selection
            let questionText = '';
            switch(selectedProfile) {
                case 'self':
                    questionText = 'Select your gender:';
                    break;
                case 'son':
                    questionText = 'Select gender for your son:';
                    break;
                case 'daughter':
                    questionText = 'Select gender for your daughter:';
                    break;
                case 'brother':
                    questionText = 'Select gender for your brother:';
                    break;
                case 'sister':
                    questionText = 'Select gender for your sister:';
                    break;
                case 'friend':
                    questionText = 'Select gender for your friend:';
                    break;
                case 'relative':
                    questionText = 'Select gender for your relative:';
                    break;
                default:
                    questionText = 'Select gender:';
            }
            
            genderQuestion.innerHTML = '<i class="fas fa-venus-mars me-2"></i>' + questionText;
            
            // Hide profile options, show gender options
            profileSection.style.display = 'none';
            genderSection.classList.remove('d-none');
            genderSection.style.display = 'block';
            
            // Enable continue button
            continueBtn.disabled = false;
        });
    });
    
    // Handle gender option selection
    genderOptions.forEach(option => {
        option.addEventListener('click', function() {
            // Remove active class from all gender options
            genderOptions.forEach(opt => opt.classList.remove('active'));
            // Add active class to clicked option
            this.classList.add('active');
            
            selectedGender = this.getAttribute('data-gender');
            
            // Enable continue button
            continueBtn.disabled = false;
        });
    });
    
    // Handle continue button click
    continueBtn.addEventListener('click', function() {
        if (!selectedProfile) {
            alert('Please select who this profile is for');
            return;
        }
        
        if (!selectedGender) {
            alert('Please select gender');
            return;
        }
        
        // Store selections in localStorage
        localStorage.setItem('profile_for', selectedProfile);
        localStorage.setItem('profile_gender', selectedGender);
        
        // Redirect to registration page
        window.location.href = "/register";
    });
    
    // Handle back button
    if (backToProfileBtn) {
        backToProfileBtn.addEventListener('click', function() {
            genderSection.classList.add('d-none');
            genderSection.style.display = 'none';
            profileSection.style.display = 'block';
            selectedGender = null;
            genderOptions.forEach(opt => opt.classList.remove('active'));
            continueBtn.disabled = true;
        });
    }
    
    // Reset modal when closed
    const modal = document.getElementById('profileForModal');
    modal.addEventListener('hidden.bs.modal', function() {
        selectedProfile = null;
        selectedGender = null;
        profileOptions.forEach(opt => opt.classList.remove('active'));
        genderOptions.forEach(opt => opt.classList.remove('active'));
        profileSection.style.display = 'block';
        genderSection.classList.add('d-none');
        genderSection.style.display = 'none';
        continueBtn.disabled = true;
    });
});

document.querySelectorAll('.registerBtn').forEach(btn => {
    btn.addEventListener('click', function(e){
        e.preventDefault();

        let modal = new bootstrap.Modal(document.getElementById('profileForModal'));
        modal.show();
    });
});
    </script>
    <script src="assets/script.js"></script>
</body>

</html>