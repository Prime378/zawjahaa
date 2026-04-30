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
    $bonusFields = ['children_details', 'disability_details', 'living_country'];
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
    .profile-image-container {
        position: relative;
        display: inline-block;
    }

    .profile-image-large {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #fff;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .profile-image-large:hover {
        transform: scale(1.02);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    /* Online/Offline Indicator on Image */
    .online-indicator {
        position: absolute;
        bottom: 15px;
        right: 15px;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        border: 4px solid white;
        z-index: 30;
        box-shadow: 0 2px 10px rgba(0,0,0,0.3);
    }

    .online-indicator.online {
        background: #22c55e;
        animation: pulse 2s infinite;
    }

    .online-indicator.offline {
        background: #1f2937;
    }

    /* Pulse Animation */
    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.7);
        }
        70% {
            box-shadow: 0 0 0 10px rgba(34, 197, 94, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(34, 197, 94, 0);
        }
    }

    /* Status Badge */
    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 5px 15px;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 600;
        margin-left: 15px;
    }

    .status-badge.online {
        background: rgba(34, 197, 94, 0.2);
        color: #22c55e;
        border: 1px solid #22c55e;
    }

    .status-badge.offline {
        background: rgba(31, 41, 55, 0.2);
        color: #9ca3af;
        border: 1px solid #4b5563;
    }

    .status-badge i {
        font-size: 0.7rem;
        margin-right: 6px;
    }

    /* Last Seen Card */
    .last-seen-card {
        background: #f9fafb;
        border-radius: 12px;
        padding: 15px 20px;
        margin-top: 20px;
        border: 1px solid #e9ecef;
        display: inline-block;
        width: 100%;
    }

    .last-seen-card .label {
        font-size: 0.75rem;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        margin-bottom: 5px;
    }

    .last-seen-card .time {
        font-size: 1rem;
        font-weight: 600;
        color: #1f2937;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .last-seen-card .time i {
        color: #10B981;
        font-size: 1rem;
    }

    .last-seen-card .time.online {
        color: #22c55e;
    }

    .last-seen-card .time.offline {
        color: #6b7280;
    }

/* ===== PREMIUM MODAL RESPONSIVE FIX ===== */
@media (max-width: 768px) {
    .premium-modal .modal-dialog {
        max-width: 100% !important;
        margin: 0 !important;
        padding: 10px;
    }

    .premium-modal .modal-content {
        border-radius: 12px;
    }

    .premium-modal .row {
        flex-direction: column !important;
    }

    .premium-modal .col-md-4 {
        width: 100% !important;
        max-width: 100% !important;
        flex: 0 0 100% !important;
    }

    .premium-card {
        margin-bottom: 15px;
        padding: 18px;
    }
    
    .online-indicator {
        width: 20px;
        height: 20px;
        bottom: 10px;
        right: 10px;
    }
    
    .status-badge {
        margin-left: 0;
        margin-top: 10px;
    }
}

    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .image-overlay i {
        font-size: 40px;
        margin-bottom: 10px;
    }

    .image-overlay span {
        font-size: 14px;
        font-weight: 500;
    }

    .image-overlay:hover {
        background: rgba(0, 0, 0, 0.8);
    }

    .premium-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .premium-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
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

    .premium-card .features {
        list-style: none;
        padding: 0;
        margin: 15px 0;
    }

    .premium-card .features li {
        margin: 5px 0;
    }

    .premium-card .features i {
        font-size: 16px;
        margin-right: 5px;
    }
    .premium-modal .modal-content {
        border-radius: 15px;
    }

    .premium-badge {
        position: absolute;
        top: -20px;
        right: -8px;
        background: gold;
        color: #333;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
    }
.bureau-card span {
    word-break: break-word;
    overflow-wrap: break-word;
}

.bureau-card {
    overflow: hidden;
}

@media (max-width: 576px) {
    .bureau-card .d-flex {
        flex-direction: column;
        align-items: flex-start !important;
    }

    .bureau-card span {
        display: block;
        margin-bottom: 5px;
    }
}
@media (max-width: 768px) {

    .profile-header .row {
        text-align: center;
    }

    .profile-main-info {
        margin-top: 20px;
    }

    .profile-main-info h1 {
        font-size: 1.6rem !important;
    }

    .action-buttons {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .action-buttons .btn {
        width: 100%;
    }
}
.compatibility-embed .row {
    flex-wrap: wrap;
}

.compatibility-embed .col-md-4 {
    margin-top: 20px;
}
@media (max-width: 768px) {
    .profile-image-large {
        width: 120px;
        height: 120px;
    }
}
@media (max-width: 768px) {

    .profile-header .row {
        text-align: left;
    }

    .profile-image-container {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .profile-main-info {
        margin-top: 10px;
    }

    .profile-main-info h1 {
        text-align: left;
        font-size: 1.5rem !important;
    }

}
@media (max-width: 768px) {

    .profile-image-large {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        object-fit: cover;
        display: block;
        margin: 0 auto;
    }

    .profile-image-container {
        width: 100%;
        text-align: center;
        margin-bottom: 15px;
    }

    /* Overlay ko circle ke andar hi rakhe */
    .image-overlay {
        border-radius: 50%;
    }

}

.profile-image-container {
    width: 180px;
    height: 180px;
    flex-shrink: 0;
}

.profile-image-container img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
}
@media (max-width: 768px) {

    .profile-main-wrapper {
        flex-direction: column;
        align-items: center;
        text-align: left;
    }

    .profile-image-container {
        margin-bottom: 20px;
    }

}
.hi{
    margin-top:1.5rem;
}

/* Form Styles */
.form-section {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
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
    color: #374151;
    margin-bottom: 5px;
}

.form-control, .form-select {
    border: 2px solid #E5E7EB;
    border-radius: 8px;
    padding: 10px;
    transition: all 0.3s;
}

.form-control:focus, .form-select:focus {
    border-color: #10B981;
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
}

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
    box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
}

/* Progress Bar Styles */
.compatibility-meter {
    background: #e9ecef;
    border-radius: 10px;
    height: 10px;
    overflow: hidden;
    margin: 15px 0;
}

.compatibility-fill {
    background: linear-gradient(90deg, #10B981 0%, #059669 100%);
    height: 100%;
    border-radius: 10px;
    transition: width 0.5s ease;
}
</style>

@php
    $isOnline = $user->is_online == 1;
    $statusClass = $isOnline ? 'online' : 'offline';
    $statusIcon = $isOnline ? 'fa-circle' : 'fa-clock';
@endphp

<div class="profile-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-3 text-center">
                <div class="profile-image-container">
                    <img src="{{ !empty($user->profile_image) && file_exists(public_path($user->profile_image)) 
                        ? asset($user->profile_image) 
                        : asset('assets/images/dummy.jpg') }}"
                         alt="Profile"
                         class="profile-image-large mb-3"
                         id="headerProfileImage">
                    
                    <div class="online-indicator {{ $isOnline ? 'online' : 'offline' }}" 
                         title="{{ $isOnline ? 'Online' : 'Offline' }}" id="onlineIndicator">
                    </div>
                </div>
                <!-- Image Preview Modal -->
                <div class="modal fade" id="imagePreviewModal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content bg-transparent border-0 text-center">
                            <div class="modal-body p-0">
                                <img id="previewImage"
                                     src=""
                                     class="img-fluid rounded"
                                     style="max-height: 80vh;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-9 profile-main-info">
                <div class="d-flex flex-wrap align-items-center mb-3">
                    <h1 class="me-3 mb-2" style="font-size: 2.2rem; font-weight: 700;" id="headerName">
                        {{ $user->name }}
                    </h1>
                    
                    <span class="status-badge {{ $statusClass }}" id="statusBadge">
                        <i class="fas {{ $statusIcon }}" id="statusIcon"></i> 
                        <span id="statusText">@if($isOnline) Online @else Offline @endif</span>
                    </span>
                    
                    @if(auth()->user()->premium_status === 'paid' && auth()->user()->premium_expires_at > now())
                        <span class="badge bg-warning text-dark ms-2">
                            <i class="fas fa-crown"></i> Premium Member
                        </span>
                    @endif
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
            
                
                <div class="action-buttons mt-3">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                        <i class="fas fa-edit me-2"></i> Edit Profile
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile Modal - COMPLETE WITH ALL FIELDS -->
<div class="modal fade" id="editProfileModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Profile - Complete All Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="closeModalBtn"></button>
            </div>

            <div class="modal-body">
                <form id="editProfileForm" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Personal Information Section -->
                    <div class="form-section">
                        <h6 class="form-section-title"><i class="fas fa-user me-2"></i> Personal Information</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                                <div class="invalid-feedback name-error"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                <div class="invalid-feedback email-error"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone <span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" required>
                                <div class="invalid-feedback phone-error"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" name="dob" class="form-control" value="{{ $user->dob }}">
                                <div class="invalid-feedback dob-error"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-control">
                                    <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                <div class="invalid-feedback gender-error"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Height (feet)</label>
                                <input type="text" name="height" class="form-control" value="{{ $user->height }}" placeholder="e.g., 5.7">
                                <div class="invalid-feedback height-error"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Location Section -->
                    <div class="form-section">
                        <h6 class="form-section-title"><i class="fas fa-map-marker-alt me-2"></i> Location</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Country</label>
                                <input type="text" name="country" class="form-control" value="{{ $user->country }}">
                                <div class="invalid-feedback country-error"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">City</label>
                                <input type="text" name="city" class="form-control" value="{{ $user->city }}">
                                <div class="invalid-feedback city-error"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Living Country</label>
                                <input type="text" name="living_country" class="form-control" value="{{ $user->living_country }}" placeholder="Current country of residence">
                                <div class="invalid-feedback living_country-error"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Identity Section -->
                    <div class="form-section">
                        <h6 class="form-section-title"><i class="fas fa-id-card me-2"></i> Identity</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">CNIC</label>
                                <input type="text" name="cnic" class="form-control" value="{{ $user->cnic }}" placeholder="12345-1234567-1">
                                <div class="invalid-feedback cnic-error"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">On Behalf Of</label>
                                <select name="on_behalf" class="form-control">
                                    <option value="self" {{ $user->on_behalf == 'self' ? 'selected' : '' }}>Self</option>
                                    <option value="son" {{ $user->on_behalf == 'son' ? 'selected' : '' }}>Son</option>
                                    <option value="daughter" {{ $user->on_behalf == 'daughter' ? 'selected' : '' }}>Daughter</option>
                                    <option value="brother" {{ $user->on_behalf == 'brother' ? 'selected' : '' }}>Brother</option>
                                    <option value="sister" {{ $user->on_behalf == 'sister' ? 'selected' : '' }}>Sister</option>
                                    <option value="friend" {{ $user->on_behalf == 'friend' ? 'selected' : '' }}>Friend</option>
                                </select>
                                <div class="invalid-feedback on_behalf-error"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Religious & Social Section -->
                    <div class="form-section">
                        <h6 class="form-section-title"><i class="fas fa-pray me-2"></i> Religious & Social</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Religion</label>
                                <input type="text" name="religion" class="form-control" value="{{ $user->religion }}">
                                <div class="invalid-feedback religion-error"></div>
                            </div>
                            <div class="col-md-6 mb-3">
    <label class="form-label">Sect (Firqa)</label>
    <select name="religious_sect" class="form-control">
    <option value="">Select Sect</option>
    <option value="All" {{ $user->religious_sect == 'All' ? 'selected' : '' }}>All</option>
    <option value="sunni" {{ $user->religious_sect == 'sunni' ? 'selected' : '' }}>Sunni</option>
    <option value="shia" {{ $user->religious_sect == 'shia' ? 'selected' : '' }}>Shia</option>
    <option value="deobandi" {{ $user->religious_sect == 'deobandi' ? 'selected' : '' }}>Deobandi</option>
    <option value="barelvi" {{ $user->religious_sect == 'barelvi' ? 'selected' : '' }}>Barelvi</option>
    <option value="ahl_e_hadith" {{ $user->religious_sect == 'ahl_e_hadith' ? 'selected' : '' }}>Ahl-e-Hadith</option>
    <option value="other">Other</option>
</select>
    <div class="invalid-feedback sect-error"></div>
</div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Caste</label>
                                <input type="text" name="caste" class="form-control" value="{{ $user->caste }}">
                                <div class="invalid-feedback caste-error"></div>
                            </div>
                            <!--<div class="col-md-6 mb-3">-->
                            <!--    <label class="form-label">Mother Tongue</label>-->
                            <!--    <input type="text" name="mother_tongue" class="form-control" value="{{ $user->mother_tongue }}" placeholder="e.g., Urdu, Punjabi, Pashto">-->
                            <!--    <div class="invalid-feedback mother_tongue-error"></div>-->
                            <!--</div>-->
                           <div class="col-md-6 mb-3">
    <label class="form-label">Marital Status</label>
    <select name="marital_status" class="form-control">
        <option value="Unmarried" {{ $user->marital_status == 'Unmarried' ? 'selected' : '' }}>Unmarried</option>
 <option value="Nikah_Only" {{ $user->marital_status == 'Nikah_Only' ? 'selected' : '' }}>
    Nikah Only
</option>
        <option value="married_has_children" {{ $user->marital_status == 'married_has_children' ? 'selected' : '' }}>
            Married (Has Children)
        </option>
        <option value="married_no_children" {{ $user->marital_status == 'married_no_children' ? 'selected' : '' }}>
            Married (No Children)
        </option>

        <option value="divorced_has_children" {{ $user->marital_status == 'divorced_has_children' ? 'selected' : '' }}>
            Divorced (Has Children)
        </option>
        <option value="divorced_no_children" {{ $user->marital_status == 'divorced_no_children' ? 'selected' : '' }}>
            Divorced (No Children)
        </option>

        <option value="widowed_has_children" {{ $user->marital_status == 'widowed_has_children' ? 'selected' : '' }}>
            Widowed (Has Children)
        </option>
        <option value="widowed_no_children" {{ $user->marital_status == 'widowed_no_children' ? 'selected' : '' }}>
            Widowed (No Children)
        </option>

        <option value="separated_has_children" {{ $user->marital_status == 'separated_has_children' ? 'selected' : '' }}>
            Separated (Has Children)
        </option>
        <option value="separated_no_children" {{ $user->marital_status == 'separated_no_children' ? 'selected' : '' }}>
            Separated (No Children)
        </option>
        <option value="Infertile" {{ $user->marital_status == 'Infertile' ? 'selected' : '' }}>
            Infertile
        </option>
    </select>
</div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Children Details</label>
                                <input type="text" name="children_details" class="form-control" value="{{ $user->children_details }}" placeholder="e.g., 1 son, 1 daughter">
                                <div class="invalid-feedback children_details-error"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Disability Section -->
                    <div class="form-section">
    <h6 class="form-section-title">
        <i class="fas fa-notes-medical me-2"></i> Disease / Disability
    </h6>
    <div class="row">

        <!-- Yes / No -->
        <div class="col-md-6 mb-3">
            <label class="form-label">Any Disease / Disability?</label>
            <select name="disease_status" id="diseaseStatus" class="form-control">
                <option value="No" {{ $user->disease_status == 'No' ? 'selected' : '' }}>No</option>
                <option value="Yes" {{ $user->disease_status == 'Yes' ? 'selected' : '' }}>Yes</option>
            </select>
        </div>

        <!-- Detail -->
        <div class="col-md-6 mb-3" id="diseaseDetailBox" style="display: none;">
            <label class="form-label">Details</label>
            <input type="text" name="disease_detail" class="form-control"
                   value="{{ $user->disease_detail }}"
                   placeholder="Enter disease or disability details">
        </div>

    </div>
</div>

                    <!-- Education & Career Section -->
                    <div class="form-section">
                        <h6 class="form-section-title"><i class="fas fa-graduation-cap me-2"></i> Education & Career</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
    <label class="form-label">Income</label>
    <input type="text" name="income" class="form-control" 
        value="{{ old('income', $user->income ?? '') }}">
</div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Education</label>
                                <input type="text" name="education" class="form-control" value="{{ $user->education }}" placeholder="e.g., Bachelor's in Computer Science">
                                <div class="invalid-feedback education-error"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Profession</label>
                                <input type="text" name="profession" class="form-control" value="{{ $user->profession }}" placeholder="e.g., Software Engineer">
                                <div class="invalid-feedback profession-error"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Family Details Section -->
                    <div class="form-section">
                        <h6 class="form-section-title"><i class="fas fa-users me-2"></i> Family Details</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Father's Occupation</label>
                                <input type="text" name="father_occupation" class="form-control" value="{{ $user->father_occupation }}">
                                <div class="invalid-feedback father_occupation-error"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Mother's Occupation</label>
                                <input type="text" name="mother_occupation" class="form-control" value="{{ $user->mother_occupation }}">
                                <div class="invalid-feedback mother_occupation-error"></div>
                            </div>
                            <div class="col-md-6 mb-3">
    <label class="form-label">Ownership</label>
    <input type="text" name="ownership" class="form-control" 
        value="{{ old('ownership', $user->ownership ?? '') }}">
</div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Siblings</label>
                                <input type="text" name="siblings" class="form-control" value="{{ $user->siblings }}" placeholder="e.g., 2 brothers, 1 sister">
                                <div class="invalid-feedback siblings-error"></div>
                            </div>
                           <div class="col-md-6 mb-3">
    <label class="form-label">Family Type</label>
    <select name="family_type" class="form-control">
        <option value="">Select Family Type</option>
        <option value="joint" {{ $user->family_type == 'joint' ? 'selected' : '' }}>Joint Family</option>
        <option value="extended" {{ $user->family_type == 'extended' ? 'selected' : '' }}>Extended Family</option>
        <option value="single_parent" {{ $user->family_type == 'single_parent' ? 'selected' : '' }}>Single Parent Family</option>
        <option value="blended" {{ $user->family_type == 'blended' ? 'selected' : '' }}>Blended Family</option>
    </select>
    <div class="invalid-feedback family_type-error"></div>
</div>
                           <div class="col-md-6 mb-3">
    <label class="form-label">Family Status</label>
    <select name="family_status" class="form-control">
        <option value="">Select Family Status</option>
        <option value="upper_class" {{ $user->family_status == 'upper_class' ? 'selected' : '' }}>Upper Class</option>
        <option value="upper_middle" {{ $user->family_status == 'upper_middle' ? 'selected' : '' }}>Upper Middle Class</option>
        <option value="middle" {{ $user->family_status == 'middle' ? 'selected' : '' }}>Middle Class</option>
        <option value="lower_middle" {{ $user->family_status == 'lower_middle' ? 'selected' : '' }}>Lower Middle Class</option>
        <option value="lower_class" {{ $user->family_status == 'lower_class' ? 'selected' : '' }}>Lower Class</option>
    </select>
    <div class="invalid-feedback family_status-error"></div>
</div>
                        </div>
                    </div>

                    <!-- About Me Section -->
                    <div class="form-section">
                        <h6 class="form-section-title"><i class="fas fa-edit me-2"></i> About Me</h6>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label">About Me</label>
                                <textarea name="about_me" class="form-control" rows="5" placeholder="Tell us about yourself, your interests, hobbies, values, and what you're looking for in a partner...">{{ $user->about_me }}</textarea>
                                <small class="text-muted">Share your personality, interests, and what makes you unique</small>
                                <div class="invalid-feedback about_me-error"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Image Section -->
                    <div class="form-section">
                        <h6 class="form-section-title"><i class="fas fa-image me-2"></i> Profile Image</h6>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label">Profile Image</label>
                                <input type="file" name="profile_image" class="form-control" id="profileImageInput" accept="image/jpeg,image/png,image/jpg,image/gif">
                                <small class="text-muted">Allowed: JPG, JPEG, PNG, GIF (Max: 5MB). Recommended: Square image 500x500px</small>
                                <div class="invalid-feedback profile_image-error"></div>
                                @if($user->profile_image)
                                <div class="mt-2">
                                    <img src="{{ asset($user->profile_image) }}" alt="Current Profile" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 3px solid #10B981;" id="currentProfilePreview">
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary w-100" id="updateProfileBtn">
                        <i class="fas fa-save me-2"></i> Update Profile
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Main Content - FULL WIDTH -->
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
                <span class="badge {{ $badgeClass }} fs-6 px-4 py-2" id="completionPercentage">
                    {{ $finalCompletionPercentage }}% Complete
                </span>
            </div>
            <div class="compatibility-meter mt-2">
                <div class="compatibility-fill" id="completionFill" style="width: {{ $finalCompletionPercentage }}%;"></div>
            </div>
            
            @if($finalCompletionPercentage < 100)
            <div class="alert alert-warning mt-3 mb-0 py-2" style="font-size: 0.85rem;">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <strong>{{ 100 - $finalCompletionPercentage }}%</strong> missing - 
                <a href="#" data-bs-toggle="modal" data-bs-target="#editProfileModal" class="alert-link">
                    Complete your profile
                </a>
                to get better matches
            </div>
            @endif
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

<!-- Completion Details Modal -->
<div class="modal fade" id="completionDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-chart-line me-2 text-success"></i>
                    Profile Completion Details
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-4 text-center">
                    <div class="display-4 fw-bold text-success">{{ $finalCompletionPercentage }}%</div>
                    <p class="text-muted">Profile Completion Rate</p>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-success" style="width: {{ $finalCompletionPercentage }}%"></div>
                    </div>
                </div>
                
                <h6 class="fw-bold mb-3">Completed Fields ({{ $filledFields + $bonusCount }}/{{ $totalFields + count($bonusFields) }})</h6>
                <div class="row">
                    @php
                        $allFields = array_merge($profileFields, $bonusFields);
                    @endphp
                    @foreach($allFields as $field)
                        @php
                            $isCompleted = !empty($user->$field) && $user->$field != 'Not specified' && $user->$field != 'null';
                            $fieldLabel = ucfirst(str_replace('_', ' ', $field));
                        @endphp
                        <div class="col-md-6 mb-2">
                            <div class="d-flex align-items-center">
                                <i class="fas {{ $isCompleted ? 'fa-check-circle text-success' : 'fa-times-circle text-danger' }} me-2"></i>
                                <span class="{{ $isCompleted ? 'text-success' : 'text-muted' }}">{{ $fieldLabel }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                @if($finalCompletionPercentage < 100)
                <div class="alert alert-info mt-3 mb-0">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Tip:</strong> Complete your profile to increase visibility and get better matches!
                    <button class="btn btn-sm btn-success mt-2 w-100" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                        <i class="fas fa-edit me-2"></i>Complete Profile Now
                    </button>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

                <!-- Basic Information Section -->
                <div class="profile-section" id="basicInfoSection">
                    <h3 class="hiii section-title"><i class="fas fa-info-circle me-2"></i> Basic Information</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                 <tr>
                                    <td><strong>Name:</strong></td>
                                    <td id="display_name">{{ $user->name }}</td>
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
                                    <td id="display_income">{{ $user->income  ?? 'Not Specified' }}</td>
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
                                    <td><strong>Religious Sect:</strong></td>
                                    <td id="display_religious">{{ $user->religious_sect ?? 'Not specified' }}</td>
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
                    <h3 class="hii section-title"><i class="fas fa-graduation-cap me-2"></i> Education & Career</h3>
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

                <!-- Account Information -->
                <div class="hhi profile-section">
                    <h3 class="hii section-title"><i class="fas fa-cog me-2"></i> Account Information</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-item">
                                <i class="fas fa-user"></i>
                                <div>
                                    <h6 class="mb-1">Profile ID</h6>
                                    <p class="text-muted mb-0">{{ $user->id }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <i class="fas fa-envelope"></i>
                                <div>
                                    <h6 class="mb-1">Email Verified</h6>
                                    <p class="text-muted mb-0">{{ $user->email_verified_at ? 'Yes' : 'No' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <i class="fas fa-clock"></i>
                                <div>
                                    <h6 class="mb-1">Member Since</h6>
                                    <p class="text-muted mb-0">{{ $user->created_at ? date('d M Y', strtotime($user->created_at)) : 'Not specified' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <i class="fas fa-edit"></i>
                                <div>
                                    <h6 class="mb-1">Last Updated</h6>
                                    <p class="text-muted mb-0" id="display_updated_at">{{ $user->updated_at ? date('d M Y', strtotime($user->updated_at)) : 'Not specified' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Marriage Bureau Contact Card -->
                <div class="bureau-card">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h5 class="hi fw-bold mb-2">
                                <i class="fas fa-user-tie me-2" style="color: var(--primary);"></i>
                                Zawjahaa Matchmaker
                            </h5>
                            <p class="mb-2">Interested in this rishta? Our senior matchmaker can arrange a family meeting.</p>
                            <div class="d-flex flex-wrap align-items-center mt-2">
                                <i class="fas fa-envelope me-2" style="color: var(--primary);"></i>
                                <span>info@Zawjahaa.com</span>
                            </div>
                        </div>
                        <div class="col-md-4 text-center mt-3 mt-md-0">
                            <button class="btn btn-outline-light" id="contactCounselorBtn">
                                <i class="fas fa-calendar me-2"></i>Schedule Call
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Report & Save -->
                <div class="d-flex justify-content-between align-items-center mt-4 pt-2">
                    <div>
                        <p class="small text-muted mb-0">
                            <i class="fas fa-clock me-1"></i> Last updated: <span id="footer_last_updated">{{ $user->updated_at ? date('F Y', strtotime($user->updated_at)) : 'Not specified' }}</span>
                        </p>
                    </div>
                    <div>
                        <a href="#" class="text-decoration-none text-muted me-3" id="reportBtn">
                            <i class="fas fa-flag me-1"></i> Report
                        </a>
                        <a href="#" class="text-decoration-none text-muted">
                            <i class="fas fa-bookmark me-1"></i> Save
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Auto-refresh online status for this profile -->
@if(auth()->check() && auth()->id() == $user->id)
<script>
// Function to update online status via AJAX
function updateOnlineStatus() {
    fetch('/update-online-status', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('Online status updated:', data.last_seen);
            
            // Update UI if needed
            if (data.is_online) {
                document.getElementById('onlineIndicator').className = 'online-indicator online';
                document.getElementById('statusBadge').className = 'status-badge online';
                document.getElementById('statusIcon').className = 'fas fa-circle';
                document.getElementById('statusText').innerText = 'Online';
                document.getElementById('lastSeenTime').className = 'time online';
                document.getElementById('lastSeenText').innerText = 'Online';
            }
        }
    })
    .catch(error => console.error('Error:', error));
}

// Update online status immediately on page load
document.addEventListener('DOMContentLoaded', function() {
    updateOnlineStatus();
});

// Update online status every 20 seconds
setInterval(function() {
    if (document.visibilityState === 'visible') {
        updateOnlineStatus();
    }
}, 20000);

// Update on page unload
window.addEventListener('beforeunload', function() {
    navigator.sendBeacon('/update-online-status', JSON.stringify({
        _token: '{{ csrf_token() }}'
    }));
});

// Update when tab becomes visible again
document.addEventListener('visibilitychange', function() {
    if (document.visibilityState === 'visible') {
        updateOnlineStatus();
    }
});

</script>
@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

function sendHeartbeat() {
        fetch("{{ route('heartbeat') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Accept": "application/json"
            }
        });
    }

    // Send heartbeat every 30 seconds
    setInterval(sendHeartbeat, 30000);

    // Send immediately on page load
    sendHeartbeat();
    
// Profile image click preview
$('#headerProfileImage').on('click', function () {
    let imgSrc = $(this).attr('src');
    $('#previewImage').attr('src', imgSrc);
    $('#imagePreviewModal').modal('show');
});

$(document).ready(function () {
    // CSRF Token setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#updateProfileBtn').on('click', function() {
        $('#editProfileForm').submit();
    });

    // Function to format date
    function formatDate(dateString) {
        if (!dateString) return 'Not specified';
        let date = new Date(dateString);
        return date.toLocaleDateString('en-GB', {
            day: '2-digit',
            month: 'short',
            year: 'numeric'
        }).replace(/ /g, ' ');
    }

    // Function to format month year
    function formatMonthYear(dateString) {
        if (!dateString) return 'Not specified';
        let date = new Date(dateString);
        return date.toLocaleDateString('en-GB', {
            month: 'long',
            year: 'numeric'
        });
    }

    // Function to capitalize first letter
    function capitalize(str) {
        if (!str) return '';
        return str.charAt(0).toUpperCase() + str.slice(1);
    }

    // Function to update UI with new user data
    function updateProfileUI(user) {
        // Update header info
        $('#headerName').text(user.name);
        $('#headerCity').text(user.city || 'Not specified');
        $('#headerCountry').text(user.country || 'Not specified');
        $('#headerGender').text(capitalize(user.gender || 'Not specified'));
        $('#headerDob').text(formatDate(user.dob));
        
        // Update description section
        $('#descName').text(user.name);
        $('#descGender').text(user.gender ? (user.gender === 'male' ? 'a male' : 'a female') : 'a');
        
        // Update basic info section
        $('#display_name').text(user.name);
        $('#display_country').text(user.country || 'Not specified');
        $('#display_city').text(user.city || 'Not specified');
        $('#display_gender').text(capitalize(user.gender || 'Not specified'));
        $('#display_dob').text(formatDate(user.dob));
        $('#display_religion').text(user.religion || 'Not specified');
        $('#display_caste').text(user.caste || 'Not specified');
        $('#display_marital_status').text(user.marital_status ? user.marital_status.replace(/_/g, ' ') : 'Not specified');
        $('#display_height').text(user.height || 'Not specified');
        
        // Update education & career
        $('#display_education').text(user.education || 'Not specified');
        $('#display_profession').text(user.profession || 'Not specified');
        
        // Update family details
        if (user.father_occupation) $('#display_father_occupation').text(user.father_occupation);
        if (user.mother_occupation) $('#display_mother_occupation').text(user.mother_occupation);
        if (user.siblings) $('#display_siblings').text(user.siblings);
        if (user.family_type) $('#display_family_type').text(capitalize(user.family_type));
        if (user.family_status) $('#display_family_status').text(user.family_status.replace(/_/g, ' '));
        
        // Update about me
        if (user.about_me) $('#display_about_me').text(user.about_me);
        
        // Update last updated fields
        $('#display_updated_at').text(formatDate(user.updated_at));
        $('#footer_last_updated').text(formatMonthYear(user.updated_at));
        
        // Update profile image if changed
        if (user.profile_image) {
            let timestamp = new Date().getTime();
            let imageUrl = user.profile_image;
            
            if (!imageUrl.startsWith('http')) {
                imageUrl = '/' + imageUrl;
            }
            
            imageUrl = imageUrl.split('?')[0] + '?v=' + timestamp;
            $('#headerProfileImage, #previewImage').attr('src', imageUrl);
            $('.mt-2 img[alt="Current Profile"]').attr('src', imageUrl);
        }
        
        // Update completion score if needed (reload page to update PHP calculations)
        // location.reload();
    }
$('#viewDetailsBtn').on('click', function () {
    // Pehla modal close karo
    $('#editProfileModal').modal('hide');

    // Thoda delay do phir dusra open karo
    setTimeout(function () {
        $('#completionDetailsModal').modal('show');
    }, 300);
});
    // Handle form submission
    $('#editProfileForm').on('submit', function (e) {
        e.preventDefault();

        let form = this;
        let formData = new FormData(form);
        let submitBtn = $('#updateProfileBtn');

        // Clear old errors
        $('.invalid-feedback').text('');
        $('.form-control, .form-select').removeClass('is-invalid');

        // Disable button and show loading
        submitBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Updating...');

        $.ajax({
            url: "{{ route('profile.update') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            
            success: function (response) {
                submitBtn.prop('disabled', false).html('<i class="fas fa-save me-2"></i> Update Profile');

                Swal.fire({
                    icon: 'success',
                    title: 'Profile updated successfully!',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true
                });

                $('#editProfileModal').modal('hide');

                if (response.user) {
                    updateProfileUI(response.user);
                }
                
                if (window.location.hash) {
                    history.replaceState(null, null, window.location.pathname);
                }
            },
            
            error: function (xhr) {
                submitBtn.prop('disabled', false).html('<i class="fas fa-save me-2"></i> Update Profile');

                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessage = '';
                    
                    $.each(errors, function (key, value) {
                        errorMessage += '• ' + value[0] + '\n';
                        $('.' + key + '-error').text(value[0]);
                        $('[name="' + key + '"]').addClass('is-invalid');
                    });
                    
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        text: errorMessage,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true
                    });
                    
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: xhr.responseJSON?.message || 'Something went wrong!',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true
                    });
                }
            }
        });

        return false;
    });

    // Image validation
    $('#profileImageInput').on('change', function() {
        let file = this.files[0];
        let $input = $(this);
        
        if (!file) return;
        
        if (file.size > 5 * 1024 * 1024) {
            Swal.fire({
                icon: 'error',
                title: 'File size must not exceed 5MB',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000
            });
            $input.val('');
            return;
        }
        
        let validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
        if (!validTypes.includes(file.type)) {
            Swal.fire({
                icon: 'error',
                title: 'Only JPG, JPEG, PNG & GIF allowed',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000
            });
            $input.val('');
            return;
        }
    });

    // Reset form when modal is closed
    $('#editProfileModal').on('hidden.bs.modal', function () {
        $('#editProfileForm')[0].reset();
        $('.invalid-feedback').text('');
        $('.form-control').removeClass('is-invalid');
    });

});
document.getElementById('diseaseStatus').addEventListener('change', function () {
    let box = document.getElementById('diseaseDetailBox');
    box.style.display = this.value === 'Yes' ? 'block' : 'none';
});

$('#diseaseStatus').change(function () {
    if ($(this).val() === 'Yes') {
        $('#diseaseDetailBox').show();
    } else {
        $('#diseaseDetailBox').hide();
    }
}).trigger('change');

// page load par bhi check
window.onload = function () {
    let status = document.getElementById('diseaseStatus').value;
    if (status === 'Yes') {
        document.getElementById('diseaseDetailBox').style.display = 'block';
    }
};
$('select[name="marital_status"]').change(function () {
    let val = $(this).val();

    if (val.includes('has_children')) {
        $('input[name="children_details"]').closest('.col-md-6').show();
    } else {
        $('input[name="children_details"]').closest('.col-md-6').hide();
    }
}).trigger('change');
</script>
@endsection