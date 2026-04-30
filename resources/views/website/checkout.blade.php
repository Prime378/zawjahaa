@extends('layouts.app')

@section('content')
<style>
    /* Custom Styles */
    .gradient-header {
       background: linear-gradient(135deg, #11998e, #38ef7d);
    }
    
    .payment-card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    
    .payment-card:hover {
        transform: translateY(-5px);
    }
    
    .package-card {
        background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
        border-radius: 15px;
        padding: 20px;
        border: 1px solid rgba(0,0,0,0.05);
    }
    
    .amount-badge {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        padding: 8px 20px;
        border-radius: 30px;
        font-weight: bold;
        font-size: 1.2rem;
        display: inline-block;
    }
    
    .form-control-custom {
        border: 2px solid #e0e0e0;
        border-radius: 12px;
        padding: 12px 15px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    
    .form-control-custom:focus {
        border-color: #28a745;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.15);
    }
    
    .form-label-custom {
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .payment-btn {
        background: linear-gradient(135deg, #28a745, #20c997);
        border: none;
        border-radius: 12px;
        padding: 15px;
        font-weight: 700;
        font-size: 1.2rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: white;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .payment-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(40, 167, 69, 0.4);
    }
    
    .payment-btn:active {
        transform: translateY(0);
    }
    
    .payment-btn:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }
    
    .security-badge {
        background: #f8f9fa;
        border-radius: 30px;
        padding: 8px 15px;
        font-size: 0.85rem;
        color: #666;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        border: 1px solid #e0e0e0;
    }
    
    .icon-circle {
        width: 50px;
        height: 50px;
        background: rgba(40, 167, 69, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
    }
    
    .icon-circle i {
        font-size: 24px;
        color: #28a745;
    }
    
    .alert-custom {
        border-radius: 12px;
        border-left: 4px solid;
        padding: 15px 20px;
    }
    
    .alert-success-custom {
        background: #d4edda;
        border-left-color: #28a745;
    }
    
    .alert-warning-custom {
        background: #fff3cd;
        border-left-color: #ffc107;
    }
    
    .alert-danger-custom {
        background: #f8d7da;
        border-left-color: #dc3545;
    }
    
    .alert-info-custom {
        background: #d1ecf1;
        border-left-color: #17a2b8;
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
    
    .animated {
        animation: slideIn 0.3s ease forwards;
    }
    
    .feature-list {
        display: flex;
        gap: 15px;
        justify-content: center;
        margin-top: 20px;
    }
    
    .feature-item {
        text-align: center;
        font-size: 0.85rem;
        color: #666;
    }
    
    .feature-item i {
        display: block;
        font-size: 1.2rem;
        color: #28a745;
        margin-bottom: 5px;
    }
</style>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card payment-card">
                <!-- Header with Icon -->
                <div class="gradient-header text-white p-4">
                    <div class="d-flex align-items-center">
                        <div class="icon-circle bg-white bg-opacity-25">
                            <i class="fas fa-crown text-warning"></i>
                        </div>
                        <div>
                            <h3 class="mb-1 fw-bold">Complete Payment</h3>
                            <p class="mb-0 opacity-75">Unlock premium access for <strong class="text-warning">{{ $profileUser->name }}</strong></p>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4">
                    <!-- Order Summary with Icons -->
                    <div class="package-card mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-shopping-cart text-success me-2 fs-5"></i>
                            <h5 class="mb-0 fw-bold">Order Summary</h5>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <span class="text-muted">Package:</span>
                                <span class="fw-bold ms-2">{{ $package }}</span>
                            </div>
                            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">
                                <i class="fas fa-clock me-1"></i>Instant
                            </span>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Total Amount:</span>
                            <span class="amount-badge">
                                <i class="fas fa-tag me-2"></i>PKR {{ number_format($amount) }}
                            </span>
                        </div>
                    </div>

                    <!-- Response Message -->
                    <div id="responseMessage" class="mb-4"></div>

                    <!-- Form with Icons -->
                    <form id="checkoutForm" method="POST" action="javascript:void(0);">
                        @csrf
                        <input type="hidden" name="buy_id" value="{{ $profileUser->id }}">
                        <input type="hidden" name="package" value="{{ $package }}">
                        <input type="hidden" name="amount" value="{{ $amount }}">

                        <!-- Payment Method -->
                        <div class="mb-4">
                            <label class="form-label-custom">
                                <i class="fas fa-credit-card text-success me-2"></i>Payment Method
                            </label>
                            <select name="payment_method" id="payment_method" class="form-control-custom w-100" required>
                                <option value="" disabled selected>Select Payment Method</option>
                                <option value="JazzCash">📱 JazzCash</option>
                                <option value="EasyPaisa">💳 EasyPaisa</option>
                            </select>
                        </div>

                        <!-- Mobile Number -->
                        <div class="mb-4">
                            <label class="form-label-custom">
                                <i class="fas fa-mobile-alt text-success me-2"></i>Mobile Number
                            </label>
                            <input type="text" name="payment_number" id="payment_number" 
                                   class="form-control-custom w-100" 
                                   placeholder="0300-1234567" required>
                            <small class="text-muted mt-2 d-block">
                                <i class="fas fa-info-circle text-success me-1"></i>
                                Enter the number you'll pay from
                            </small>
                        </div>

                        <!-- Pay Button -->
                        <button type="button" id="payButton" class="payment-btn w-100">
                            <span class="btn-text">
                                <i class="fas fa-lock me-2"></i>Pay PKR {{ number_format($amount) }}
                            </span>
                            <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                        </button>
                    </form>

                    <!-- Security Features -->
                    <div class="mt-4">
                        <div class="feature-list">
                            <div class="feature-item">
                                <i class="fas fa-shield-alt"></i>
                                <span>Secure</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-bolt"></i>
                                <span>Instant</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-headset"></i>
                                <span>24/7 Support</span>
                            </div>
                        </div>
                        
                        <div class="text-center mt-3">
                            <span class="security-badge">
                                <i class="fas fa-lock text-success me-1"></i>
                                SSL Encrypted Payment
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {

    console.log('✅ Page loaded');

    const payBtn = document.getElementById('payButton');
    const form = document.getElementById('checkoutForm');
    const responseDiv = document.getElementById('responseMessage');
    const btnText = payBtn.querySelector('.btn-text');
    const btnSpinner = payBtn.querySelector('.spinner-border');

    if (!payBtn) {
        console.error('❌ Button not found!');
        return;
    }

    // ✅ ENTER KEY FIX (YAHAN RAKHNA HAI)
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        payBtn.click();
    });

    // Phone formatting
    document.getElementById('payment_number').addEventListener('input', function() {
        let value = this.value.replace(/\D/g, '');
        if (value.length > 11) value = value.slice(0, 11);

        if (value.length > 4) {
            value = value.slice(0, 4) + '-' + value.slice(4);
        }
        this.value = value;
    });

    payBtn.addEventListener('click', function() {

        const method = document.querySelector('select[name="payment_method"]').value;
        const number = document.querySelector('input[name="payment_number"]').value;
        const token = document.querySelector('input[name="_token"]').value;
        const rawNumber = number.replace(/\D/g, '');

        if (!method) {
            showMessage('danger', '❌ Please select a payment method');
            return;
        }

        if (!number) {
            showMessage('danger', '❌ Please enter your mobile number');
            return;
        }

        if (rawNumber.length < 10) {
            showMessage('danger', '❌ Please enter valid number');
            return;
        }

        payBtn.disabled = true;
        btnText.classList.add('d-none');
        btnSpinner.classList.remove('d-none');

        const formData = new FormData(form);

        fetch('{{ route("checkout.store") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            showMessage('success', data.message);
            form.reset();
        })
        .catch(err => {
            showMessage('danger', 'Error occurred');
        })
        .finally(() => {
            payBtn.disabled = false;
            btnText.classList.remove('d-none');
            btnSpinner.classList.add('d-none');
        });
    });

    function showMessage(type, text) {
        responseDiv.innerHTML = `
            <div class="alert alert-${type} alert-dismissible fade show">
                ${text}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;
    }

});
</script>
@endsection