@extends('layouts.app')
@php
    // Calculate profile completion percentage
    $profileFields = [
        'name', 'email', 'phone', 'country', 'father_occupation', 'mother_occupation', 'siblings', 'city', 'cnic', 'gender', 
        'height', 'dob', 'religion', 'caste', 'on_behalf', 'marital_status', 'family_type', 'family_status', 'about_me', 
        'education', 'profession', 'profile_image', 'disability_status','children_details','living_country','disease_status','disease_detail'
    ];
    
    
    $filledFields = 0;
    $totalFields = count($profileFields);
    
    foreach ($profileFields as $field) {
        if (!empty($user->$field) && $user->$field != 'Not specified' && $user->$field != 'null') {
            $filledFields++;
        }
    }
    
    // Calculate completion percentage
    $completionPercentage = round(($filledFields / $totalFields) * 100);
    
    // Determine badge color based on percentage
    $badgeClass = 'bg-secondary';
    if ($completionPercentage >= 80) {
        $badgeClass = 'bg-success';
    } elseif ($completionPercentage >= 50) {
        $badgeClass = 'bg-warning text-dark';
    } elseif ($completionPercentage >= 30) {
        $badgeClass = 'bg-info text-dark';
    } else {
        $badgeClass = 'bg-secondary';
    }
    
    // Add bonus for extra fields
    $bonusFields = ['mother_tongue', 'children_details', 'disability_details', 'living_country'];
    $bonusCount = 0;
    foreach ($bonusFields as $bonusField) {
        if (!empty($user->$bonusField) && $user->$bonusField != 'Not specified') {
            $bonusCount++;
        }
    }
    
    // Add bonus points (max 10% extra)
    $bonusPercentage = min(10, round(($bonusCount / count($bonusFields)) * 10));
    $finalCompletionPercentage = min(100, $completionPercentage + $bonusPercentage);
@endphp
@section('content')
<style>
   /* ===== Profile Image ===== */
.profile-image-container {
    position: relative;
    display: inline-block;
    width: 180px;
    height: 180px;
    flex-shrink: 0;
    cursor: pointer;
}

.profile-image-large {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
    border: 4px solid #1f2937;
    box-shadow: 0 4px 15px rgba(0,0,0,0.5);
    transition: all 0.3s ease;
}

/* Click Hint - Image ke liye */
.click-hint {
    position: absolute;
    bottom: 5px;
    right: 5px;
    background: #10B981;
    color: white;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    border: 2px solid white;
    opacity: 0;
    transform: scale(0.8);
    transition: all 0.3s ease;
    pointer-events: none;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.profile-image-container:hover .click-hint {
    opacity: 1;
    transform: scale(1);
}

/* Image Preview Modal */
.image-preview-modal .modal-content {
    background: transparent;
    border: none;
}

.image-preview-modal .modal-body {
    padding: 0;
    position: relative;
}

.preview-close {
    position: absolute;
    top: -40px;
    right: 0;
    color: white;
    background: rgba(0, 0, 0, 0.5);
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s;
    border: 2px solid white;
    z-index: 1060;
}

.preview-close:hover {
    background: #10B981;
    transform: rotate(90deg);
}

.preview-image {
    max-width: 100%;
    max-height: 80vh;
    border-radius: 20px;
    box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3);
    border: 5px solid white;
}

/* ===== AI Score Badge ===== */
.ai-score-badge {
    background: linear-gradient(135deg, #10B981 0%, #10B981 100%);
    color: #fff;
    padding: 8px 20px;
    border-radius: 50px;
    display: inline-block;
    font-weight: 600;
    font-size: 14px;
    margin-bottom: 15px;
}

/* ===== Compatibility Card ===== */
.compatibility-card {
    background: linear-gradient(135deg, #fff 0%, #fff 100%);
    border-radius: 15px;
    padding: 20px;
    border: 1px solid rgba(255,255,255,0.1);
    color: #000;
}

.compatibility-meter {
    width: 100%;
    height: 10px;
    background: #374151;
    border-radius: 10px;
    margin-top: 10px;
}

.compatibility-fill {
    height: 100%;
    background: linear-gradient(90deg, #10B981, #34D399);
    border-radius: 10px;
    width: 0%;
    transition: width 1s ease;
}

/* ===== Info Grid ===== */
.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.info-card {
    background: #1e2937;
    padding: 15px;
    border-radius: 10px;
    border: 1px solid #374151;
    color: #f1f5f9;
}

.info-card h4 {
    font-size: 14px;
    color: #9ca3af;
    margin-bottom: 5px;
}

.info-card p {
    font-size: 16px;
    font-weight: 600;
    color: #f1f5f9;
}

/* ===== Bureau Card ===== */
.bureau-card {
    background: linear-gradient(135deg, #111827 0%, #1f2937 100%);
    color: #f1f5f9;
    border-radius: 15px;
    padding: 25px;
    margin-top: 30px;
}

.bureau-card .btn-outline-light {
    border: 2px solid #fff;
    border-radius: 50px;
    padding: 10px 25px;
    font-weight: 600;
    transition: all 0.3s;
}

.bureau-card .btn-outline-light:hover {
    background: #fff;
    color: #111827;
    transform: translateY(-2px);
}

/* ===== Premium Cards ===== */
.premium-card {
    background: linear-gradient(135deg, #4f46e5 0%, #9333ea 100%);
    color: #fff;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.premium-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.4);
}

.premium-card i {
    font-size: 40px;
    margin-bottom: 15px;
}

.premium-card .price {
    font-size: 24px;
    font-weight: bold;
    margin: 10px 0;
}

.premium-badge {
    position: absolute;
    top: -10px;
    right: -10px;
    background: gold;
    color: #111827;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: bold;
}

/* ===== Forms ===== */
.form-section {
    background: #111827;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    color: #f1f5f9;
}

.form-section-title {
    color: #10B981;
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 15px;
    padding-bottom: 10px;
    border-bottom: 2px solid #10B981;
}

.form-label {
    font-weight: 600;
    color: #9ca3af;
    margin-bottom: 5px;
}

.form-control, .form-select {
    border: 2px solid #374151;
    border-radius: 8px;
    padding: 10px;
    background: #1f2937;
    color: #f1f5f9;
}

.form-control:focus, .form-select:focus {
    border-color: #10B981;
    box-shadow: 0 0 0 3px rgba(16,185,129,0.2);
    background: #1f2937;
    color: #f1f5f9;
}

/* ===== Buttons ===== */
.btn-primary {
    background: linear-gradient(135deg, #10B981 0%, #059669 100%);
    border: none;
    padding: 12px 30px;
    border-radius: 50px;
    font-weight: 600;
    transition: all 0.3s;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(16,185,129,0.3);
}

/* ===== Profile Header ===== */
.profile-header {
    background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
    padding: 8rem 0;
    border-bottom: 1px solid #374151;
}

.profile-main-info h1 {
    font-size: 2rem;
    font-weight: 700;
    color: #f1f5f9;
}

.profile-main-info p {
    color: #9ca3af;
    font-size: 0.95rem;
}

/* ===== Section Titles ===== */
.section-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #000;
    margin-top: 1rem;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 3px solid #10B981;
    display: inline-block;
}

/* ===== Info Items ===== */
.info-item {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    padding: 15px;
    background: #fff;
    border-radius: 10px;
    border: 1px solid #374151;
    transition: all 0.3s;
    margin-bottom: 15px;
    color: #f1f5f9;
}

.info-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
}

.info-item i {
    font-size: 24px;
    color: #10B981;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(16,185,129,0.1);
    border-radius: 10px;
}

.info-item h6 {
    font-size: 0.9rem;
    color: #9ca3af;
    margin-bottom: 5px;
}

.info-item p {
    font-size: 1rem;
    color: #f1f5f9;
    margin-bottom: 0;
    font-weight: 500;
}

/* ===== Responsive ===== */
@media (max-width: 768px) {
    .profile-image-container { width: 140px; height: 140px; }
    .bureau-card { text-align: center; }
    .bureau-card .btn-outline-light { width: 100%; margin-top: 15px; }
    .info-grid { grid-template-columns: 1fr; gap: 10px; }
}

@media (max-width: 576px) {
    .profile-image-container { width: 120px; height: 120px; }
    .compatibility-card { padding: 15px; }
    .bureau-card { padding: 20px; }
}
.profile-status-badge {
    position: absolute;
    bottom: 5px;
    right: 5px;
    background-color: #10B981; /* green for online */
    color: white;
    padding: 5px 10px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
    border: 2px solid white;
    box-shadow: 0 2px 6px rgba(0,0,0,0.3);
}
.profile-status-badge.offline {
    background-color: #6c757d; /* gray for offline */
}
.profile-status-badge {
    position: relative;
    bottom: auto;
    right: auto;
    margin-left: 10px;
}
</style>

<div class="profile-header">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-12 col-md-3 text-center">
                <div class="profile-image-container" onclick="openImagePreview()">
                    <img src="{{ $user->profile_image ? asset($user->profile_image) : asset('assets/images/dummy.jpg') }}"
                         alt="Profile" class="profile-image-large" id="headerProfileImage">
                    <div class="click-hint">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-9 profile-main-info">

                <div class="d-flex flex-wrap align-items-center mb-3">
                    <h1 class="me-3 mb-2 text-white" id="headerName">
                        ZAW1232{{ $user->id }}ygf676tyg
                    </h1>

                    @php
                        $isOnline = $user->last_seen && $user->last_seen->gt(now()->subMinutes(5));
                    @endphp

                    <span id="profileStatusBadge" 
                          class="profile-status-badge {{ $isOnline ? '' : 'offline' }}">
                        {{ $isOnline ? 'Online' : 'Last seen ' . ($user->last_seen ? $user->last_seen->diffForHumans() : 'Not available') }}
                    </span>
                </div>


                <div class="row mb-4">
                    <div class="col-12 col-md-6">
                        <p class="mb-2">
                           <i class="fas fa-user"></i>
                            ZWJ{{ str_pad($user->id, 5, '0', STR_PAD_LEFT) }}
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-envelope me-2"></i>
                            {{ substr($user->email, 0, 1) }}-*****-{{ substr($user->email, -9) }}
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-phone me-2"></i>
                            {{ substr($user->phone, 0, 1) }}-*****{{ substr($user->phone, -1) }}
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            <span id="headerCity">{{ $user->city }}</span>, <span id="headerCountry">{{ $user->country }}</span>
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-id-card me-2"></i>
                            CNIC: {{ substr($user->cnic, 0, 2) }}-{{ str_repeat('*', strlen($user->cnic) - 2) }}
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-user me-2"></i>
                            Marital Status: {{ ucfirst(str_replace('_', ' ', $user->marital_status)) ?? 'Not specified' }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-2">
                            <i class="fas fa-venus-mars me-2"></i>
                            Gender: <span id="headerGender">{{ ucfirst($user->gender) }}</span>
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-ruler me-2"></i>
                            Height: {{ $user->height ?? 'Not specified' }}
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-calendar-alt me-2"></i>
                            Date of Birth: <span id="headerDob">{{ $user->dob ? date('d M Y', strtotime($user->dob)) : 'Not specified' }}</span>
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-pray me-2"></i>
                            Religion: {{ $user->religion ?? 'Not specified' }}
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-users me-2"></i>
                            Caste: {{ $user->caste ?? 'Not specified' }}
                        </p>
                    </div>
                </div>


                <!-- ✅ SEND MESSAGE BUTTON (same place like Edit Profile) -->

                <div class="action-buttons mt-3 d-flex align-items-center gap-2">

    @auth
        @if(Auth::id() != $user->id)

            @php
                $sentMessagesCount = \App\Models\Message::where('sender_id', Auth::id())
                    ->where('receiver_id', $user->id)
                    ->count();

                $canSendMessage = $sentMessagesCount < 2;

                $zawId = 'ZAW1232' . $user->id . 'ygf676tyg';

                // Check if this user is already in favorites
                $isFavorite = DB::table('favorites')
                                ->where('user_id', Auth::id())
                                ->where('favorite_user_id', $user->id)
                                ->exists();
            @endphp

            {{-- Send Message Button --}}
            @if($canSendMessage)
                <a href="{{ route('messages.index') }}#chat-{{ $zawId }}"
                   class="btn btn-success btn-lg px-4 py-2 rounded-pill">
                    <i class="fas fa-paper-plane me-2"></i> Send Message
                </a>
            @else
                <button onclick="showMessageLimitAlert()"
                        class="btn btn-secondary btn-lg px-4 py-2 rounded-pill">
                    <i class="fas fa-lock me-2"></i> Send Message
                </button>
            @endif

            {{-- Favorite / Unfavorite Button --}}
            <button id="favorite-btn" 
                    class="btn btn-{{ $isFavorite ? 'danger' : 'outline-danger' }} btn-lg px-4 py-2 rounded-pill"
                    onclick="toggleFavorite({{ $user->id }})">
                <i class="fas fa-heart me-2"></i>
                {{ $isFavorite ? 'Remove Favorite' : 'Add to Favorite' }}
            </button>

        @endif
    @endauth

</div>


            </div>
        </div>
    </div>
</div>
<!-- Image Preview Modal -->
<div class="modal fade image-preview-modal" id="imagePreviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body text-center position-relative">
                <div class="preview-close" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i>
                </div>
                <img src="" alt="Profile Preview" class="preview-image" id="previewImage">
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="profile-content">
                 
                <!-- ===== COMPATIBILITY SCORE ===== -->
                <div class="compatibility-embed">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h4 class="fw-bold mb-2" style="color: var(--primary-dark);">
                <i class="fas fa-chart-line me-2"></i>Profile Completion Score
            </h4>
            <p class="mb-3">
                {{ $user->about_me  }}
            </p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="fw-bold">Profile Completion</span>
               <span class="badge {{ $badgeClass }} fs-6 px-4 py-2"
      id="completionPercentage"
      style="background-color: green !important; color: white !important;">
    {{ $finalCompletionPercentage }}% Complete
</span>
            </div>
            <div class="compatibility-meter mt-2">
                <div class="compatibility-fill" id="completionFill" style="width: {{ $finalCompletionPercentage }}%;"></div>
            </div>
            
            <!--@if($finalCompletionPercentage < 100)-->
            <!--<div class="alert alert-warning mt-3 mb-0 py-2" style="font-size: 0.85rem;">-->
            <!--    <i class="fas fa-exclamation-triangle me-2"></i>-->
            <!--    <strong>{{ 100 - $finalCompletionPercentage }}%</strong> missing - -->
            <!--    <a href="#" data-bs-toggle="modal" data-bs-target="#editProfileModal" class="alert-link">-->
            <!--        Complete your profile-->
            <!--    </a>-->
            <!--    to get better matches-->
            <!--</div>-->
            <!--@endif-->
        </div>
        <div class="col-md-4 text-center mt-3 mt-md-0">
            <div class="display-4 fw-bold" id="completionScore" style="color: var(--primary);">
                {{ $finalCompletionPercentage }}%
            </div>
            <p class="mb-2">Profile Complete</p>
<!--           <button -->
<!--    class="btn btn-outline-success btn-sm px-4" -->
<!--    id="viewDetailsBtn">-->
<!--    <i class="fas fa-chart-simple me-2"></i>View Details-->
<!--</button>-->
        </div>
    </div>
</div>


                <!-- Basic Information Section -->
                <div class="profile-section" id="basicInfoSection">
                    <h3 class="section-title"><i class="fas fa-info-circle me-2"></i> Basic Information</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                 <tr>
                                    <td><strong>Name:</strong></td>
                                    <td id="display_name">ZAW1232{{ $user->id }}ygf676tyg</td>
                                </tr>
                                <tr>
                                    <td><strong>Age:</strong></td>
                                    <td id="display_age">{{ $user->dob ? \Carbon\Carbon::parse($user->dob)->age . ' years' : 'Not specified' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Country:</strong></td>
                                    <td id="display_country">{{ $user->country }}</td>
                                </tr>
                                <tr>
                                    <td><strong>City:</strong></td>
                                    <td id="display_city">{{ $user->city }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Height:</strong></td>
                                    <td id="display_height">{{ $user->height ?? 'Not specified' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Date of Birth:</strong></td>
                                    <td id="display_dob">{{ $user->dob ? date('d M Y', strtotime($user->dob)) : 'Not specified' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Gender:</strong></td>
                                    <td id="display_gender">{{ ucfirst($user->gender) }}</td>
                                </tr>
                             <tr>
                                    <td><strong>Income:</strong></td>
                                    <td id="display_income">{{ $user->income ?? 'Not Specified' }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <td><strong>Ownership:</strong></td>
                                    <td id="display_ownership">{{ $user->ownership ?? 'Not Specified'  }}</td>
                                </tr>
                               
                                <tr>
                                    <td><strong>Marital Status:</strong></td>
                                    <td id="display_marital_status">{{ ucfirst(str_replace('_', ' ', $user->marital_status)) ?? 'Not specified' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Children:</strong></td>
                                    <td id="display_children">{{ $user->children_details ?? 'Not specified' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Religion:</strong></td>
                                    <td id="display_religion">{{ $user->religion ?? 'Not specified' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Caste:</strong></td>
                                    <td id="display_caste">{{ $user->caste ?? 'Not specified' }}</td>
                                </tr>
                                <tr>
    <td><strong>Disease Status:</strong></td>
    <td id="disability_status">
        @if($user->disease_status == 'Yes')
            Yes
        @elseif($user->disease_status == 'No')
            No
        @else
            Not specified
        @endif
    </td>
</tr>

<tr>
    <td><strong>Detail:</strong></td>
    <td id="disability_details">
        @if($user->disease_status == 'Yes')
            {{ $user->disease_detail ?? 'No details provided' }}
        @else
            Not specified
        @endif
    </td>
</tr>

                            </table>
                        </div>
                    </div>
                </div>

                <!-- Education & Career -->
                <div class="profile-section">
                    <h3 class="section-title"><i class="fas fa-graduation-cap me-2"></i> Education & Career</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-item">
                                <i class="fas fa-university"></i>
                                <div>
                                    <h6 class="mb-1">Education</h6>
                                    <p class="text-muted mb-0" id="display_education">{{ $user->education ?? 'Not specified' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <i class="fas fa-briefcase"></i>
                                <div>
                                    <h6 class="mb-1">Profession</h6>
                                    <p class="text-muted mb-0" id="display_profession">{{ $user->profession ?? 'Not specified' }}</p>
                                </div>
                            </div>
                        </div>
                        @if($user->annual_income)
                        <div class="col-md-6">
                            <div class="info-item">
                                <i class="fas fa-money-bill-wave"></i>
                                <div>
                                    <h6 class="mb-1">Annual Income</h6>
                                    <p class="text-muted mb-0" id="display_annual_income">{{ $user->annual_income }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($user->employed_in)
                        <div class="col-md-6">
                            <div class="info-item">
                                <i class="fas fa-building"></i>
                                <div>
                                    <h6 class="mb-1">Employed In</h6>
                                    <p class="text-muted mb-0" id="display_employed_in">{{ ucfirst($user->employed_in) }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Family Details -->
              <div class="profile-section">
    <h3 class="section-title"><i class="fas fa-users me-2"></i> Family Details</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="info-item">
                <i class="fas fa-male"></i>
                <div>
                    <h6 class="mb-1">Father's Occupation</h6>
                    <p class="text-muted mb-0">{{ $user->father_occupation ?? 'Not specified'  }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-item">
                <i class="fas fa-female"></i>
                <div>
                    <h6 class="mb-1">Mother's Occupation</h6>
                    <p class="text-muted mb-0">{{ $user->mother_occupation ?? 'Not specified'  }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="info-item">
                <i class="fas fa-child"></i>
                <div>
                    <h6 class="mb-1">Siblings</h6>
                    <p class="text-muted mb-0">{{ $user->siblings ?? 'Not specified'  }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="info-item">
                <i class="fas fa-home"></i>
                <div>
                    <h6 class="mb-1">Family Type</h6>
                    <p class="text-muted mb-0">{{ $user->family_type ? ucfirst($user->family_type) : 'Not specified' }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="info-item">
                <i class="fas fa-chart-line"></i>
                <div>
                    <h6 class="mb-1">Family Status</h6>
                    <p class="text-muted mb-0">{{ $user->family_status ? ucfirst(str_replace('_', ' ', $user->family_status)) : 'Not specified' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>


                <!-- About Me -->
                <!--@if($user->about_me)-->
                <!--<div class="profile-section">-->
                <!--    <h3 class="section-title"><i class="fas fa-info-circle me-2"></i> About Me</h3>-->
                <!--    <div class="info-item">-->
                <!--        <i class="fas fa-quote-right"></i>-->
                <!--        <div>-->
                <!--            <p class="text-muted mb-0" id="display_about_me">{{ $user->about_me }}</p>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--@endif-->

                <!-- Additional Details -->
                @if($user->additional_details)
                <div class="profile-section">
                    <h3 class="section-title"><i class="fas fa-plus-circle me-2"></i> Additional Details</h3>
                    <div class="info-item">
                        <i class="fas fa-file-alt"></i>
                        <div>
                            <p class="text-muted mb-0" id="display_additional_details">{{ $user->additional_details }}</p>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>


<!-- Agar user logged in nahi hai to -->
@guest
    <div class="container mt-4 mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="bg-dark p-4 rounded-4 text-center" style="border: 1px solid #374151;">
                    <p class="mb-3 text-secondary">
                        <i class="fas fa-lock me-2"></i>Please login to send messages
                    </p>
                    <a href="{{ route('login') }}" class="btn btn-success px-5 py-2 rounded-pill">
                        <i class="fas fa-sign-in-alt me-2"></i>Login Now
                    </a>
                </div>
            </div>
        </div>
    </div>
@endguest

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
function updateOnlineStatus(isOnline, lastSeen) {
    let badge = document.getElementById('profileStatusBadge');
    if(isOnline) {
        badge.classList.remove('offline');
        badge.textContent = 'Online';
    } else {
        badge.classList.add('offline');
        badge.textContent = 'Last seen ' + lastSeen;
    }
}

// ===== IMAGE PREVIEW FUNCTION =====
function openImagePreview() {
    let imgSrc = document.getElementById('headerProfileImage').src;
    document.getElementById('previewImage').src = imgSrc;
    
    let modal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
    modal.show();
}

// ===== KEYBOARD SUPPORT =====
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        let modal = bootstrap.Modal.getInstance(document.getElementById('imagePreviewModal'));
        if (modal) {
            modal.hide();
        }
    }
});

// ===== IMAGE ERROR HANDLING =====
document.getElementById('headerProfileImage').onerror = function() {
    this.src = 'https://via.placeholder.com/200?text=No+Image';
};

// ===== MESSAGE LIMIT ALERT =====
function showMessageLimitAlert() {
    Swal.fire({
        title: 'Message Limit Reached!',
        text: 'You have already sent 2 messages to this user.',
        icon: 'warning',
        confirmButtonColor: '#10B981',
        confirmButtonText: 'OK',
        background: '#1f2937',
        color: '#fff',
        showCloseButton: true,
        customClass: {
            popup: 'rounded-4'
        }
    });
}

$(document).ready(function () {
    console.log('Profile page loaded');
});
 function toggleFavorite(userId) {
        fetch("{{ url('/favorites/toggle') }}/" + userId, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
            }
        })
        .then(res => res.json())
        .then(data => {
            if(data.success) {
                let btn = document.getElementById('favorite-btn');

                // SweetAlert2 Toast configuration
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',  // top-right
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true
                });
                if(data.added) {
                    btn.classList.remove('btn-outline-danger');
                    btn.classList.add('btn-danger');
                    btn.innerHTML = '<i class="fas fa-heart me-2"></i> Remove Favorite';

                    Toast.fire({
                        icon: 'success',
                        title: 'Added to Favorites!'
                    });

                } else {
                    btn.classList.remove('btn-danger');
                    btn.classList.add('btn-outline-danger');
                    btn.innerHTML = '<i class="fas fa-heart me-2"></i> Add to Favorite';

                    Toast.fire({
                        icon: 'info',
                        title: 'Removed from Favorites!'
                    });
                }
            } else if(data.message){
                Swal.fire({
                    icon: 'error',
                    title: data.message,
                });
            }
        })
        .catch(err => console.error(err));
    }
</script>
@endsection