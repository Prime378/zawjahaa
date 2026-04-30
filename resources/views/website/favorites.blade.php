@extends('layouts.app')

@section('content')
<div class="premium-interests">
    <!-- Floating Background Elements -->
    <div class="bg-gradient-1"></div>
    <div class="bg-gradient-2"></div>
    
    <div class="container position-relative py-4">
        
        <!-- Premium Header with Glass Effect -->
       

        <!-- Premium Stats Cards with 3D Effect -->
        <div class="row g-3 mb-5">
            <div class="col-md-3 col-6">
                <div class="premium-stat-card" style="--stat-color: #10B981;">
                    <div class="stat-icon">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                    <div class="stat-content">
                        <span class="stat-value">{{ $sent->count() }}</span>
                        <span class="stat-label">Sent</span>
                    </div>
                    <div class="stat-glow"></div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="premium-stat-card" style="--stat-color: #10B981;">
                    <div class="stat-icon">
                        <i class="fas fa-inbox"></i>
                    </div>
                    <div class="stat-content">
                        <span class="stat-value">{{ $received->count() }}</span>
                        <span class="stat-label">Received</span>
                    </div>
                    <div class="stat-glow"></div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="premium-stat-card" style="--stat-color: #3B82F6;">
                    <div class="stat-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <div class="stat-content">
                        <span class="stat-value">{{ $mutual ?? 0 }}</span>
                        <span class="stat-label">Mutual</span>
                    </div>
                    <div class="stat-glow"></div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="premium-stat-card" style="--stat-color: #8B5CF6;">
                    <div class="stat-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="stat-content">
                        <span class="stat-value">{{ $sent->count() + $received->count() }}</span>
                        <span class="stat-label">Total</span>
                    </div>
                    <div class="stat-glow"></div>
                </div>
            </div>
        </div>

        <!-- Premium Tabs -->
        <div class="premium-tabs-container mb-4">
            <button class="premium-tab active" onclick="switchTab('sent')">
                <i class="fas fa-paper-plane me-2"></i>
                Sent Interests
                <span class="tab-count">{{ $sent->count() }}</span>
            </button>
            <button class="premium-tab" onclick="switchTab('received')">
                <i class="fas fa-inbox me-2"></i>
                Received Interests
                <span class="tab-count">{{ $received->count() }}</span>
            </button>
        </div>

        <!-- Sent Interests Section -->
        <div id="sent-section" class="premium-section active">
            @if($sent->count() > 0)
                <div class="premium-grid">
                    @foreach($sent as $user)
                    <div class="premium-profile-card" data-id="{{ $user->id }}">
                        <div class="card-glow"></div>
                        
                        <!-- Profile Image with Badge -->

<div class="profile-image-wrapper">
    <img src="{{ $user->profile_image ? asset($user->profile_image) : asset('assets/uploads/default.png') }}" 
         class="profile-image">

    <div class="profile-badge received">
        <i class="fas fa-heart"></i>
    </div>
</div>


                        <!-- Profile Info -->
                        <div class="profile-info">
                            <h3 class="profile-name">{{ $user->name }}</h3>
                            
                            <div class="profile-details">
                                <div class="detail-chip">
                                    <i class="far fa-calendar-alt"></i>
                                    <span>{{ $user->age ?? 'N/A' }} years</span>
                                </div>
                                
                                @if($user->city)
                                <div class="detail-chip">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>{{ $user->city }}</span>
                                </div>
                                @endif
                                
                                @if(isset($user->pivot->created_at))
                                <div class="detail-chip time-chip">
                                    <i class="far fa-clock"></i>
                                    <span>{{ $user->pivot->created_at->diffForHumans() }}</span>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="profile-actions">
                           <a href="{{ route('profile.show', $user->id) }}" class="action-btn view-profile">
    <i class="fas fa-eye"></i>
    <span>View</span>
</a>

                            <button onclick="removeInterest({{ $user->id }})" class="action-btn remove-interest">
                                <i class="fas fa-times"></i>
                                <span>Remove</span>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
                
            @else
                <div class="premium-empty-state">
                    <div class="empty-glow"></div>
                    <div class="empty-icon">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                    <h3>No Sent Interests Yet</h3>
                    <p>Start your journey to find the perfect match</p>
                    <a href="{{ route('search') }}" class="premium-btn">
                        <i class="fas fa-search me-2"></i>
                        Explore Profiles
                    </a>
                </div>
            @endif
        </div>
        <div id="received-section" class="premium-section">
            @if($received->count() > 0)
                <div class="premium-grid">
                    @foreach($received as $user)
                    <div class="premium-profile-card received" data-id="{{ $user->id }}">
                        <div class="card-glow"></div>
                        
                        <!-- Profile Image with Badge -->
                <div class="profile-image-wrapper">
    @php
        $isApproved = $user->admin_approved ?? false; // ya $hasAdminApproval agar controller se pass ho raha ho
    @endphp

    <img src="{{ $user->profile_image ? asset($user->profile_image) : asset('assets/uploads/default.png') }}" 
         class="profile-image {{ !$isApproved ? 'locked-image' : '' }}">

    @if(!$isApproved)
        <div class="lock-overlay">
            <i class="fas fa-lock"></i>
            <span>Admin Approval Required</span>
        </div>
    @else
        <div class="profile-badge received">
            <i class="fas fa-heart"></i>
        </div>
    @endif
</div>

                        <!-- Profile Info -->
                        <div class="profile-info">
                            <h3 class="profile-name">{{ $user->name }}</h3>
                            
                            <div class="profile-details">
                                <div class="detail-chip">
                                    <i class="far fa-calendar-alt"></i>
                                    <span>{{ $user->age ?? 'N/A' }} years</span>
                                </div>
                                
                                @if($user->city)
                                <div class="detail-chip">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>{{ $user->city }}</span>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Interest Badge -->
                        <div class="interest-badge">
                            <i class="fas fa-heart"></i>
                            <span>Interested</span>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                @if($received->hasPages())
                <div class="premium-pagination">
                    {{ $received->links('pagination::bootstrap-5') }}
                </div>
                @endif
            @else
                <div class="premium-empty-state">
                    <div class="empty-glow"></div>
                    <div class="empty-icon">
                        <i class="fas fa-inbox"></i>
                    </div>
                    <h3>No Received Interests</h3>
                    <p>Someone will show interest in you soon</p>
                </div>
            @endif
        </div>

    </div>
</div>

<!-- Premium Styles -->
<style>
*{margin:0;padding:0;box-sizing:border-box;}
.premium-interests{
    position:relative;
    background: linear-gradient(135deg, #0B1120 0%, #192132 100%);
    min-height:100vh;
    overflow:hidden;
    font-family: 'Poppins', sans-serif;
}

/* Floating Backgrounds */
.bg-gradient-1{
    position:absolute;
    top:-50%;
    right:-20%;
    width:800px;
    height:800px;
    background:radial-gradient(circle, rgba(16,185,129,0.15) 0%, transparent 70%);
    border-radius:50%;
    animation: float 20s infinite;
}
.bg-gradient-2{
    position:absolute;
    bottom:-30%;
    left:-10%;
    width:600px;
    height:600px;
    background:radial-gradient(circle, rgba(139,92,246,0.1) 0%, transparent 70%);
    border-radius:50%;
    animation: float 15s infinite reverse;
}
@keyframes float{0%,100%{transform:translate(0,0);}50%{transform:translate(-30px,30px);}}

/* Glass Header */
.premium-glass-header{
    background: rgba(255,255,255,0.03);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border: 1px solid rgba(16,185,129,0.1);
    border-radius: 30px;
    padding: 20px 30px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.4);
}
.premium-logo{
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #10B981, #8B5CF6);
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
    color: white;
    box-shadow: 0 10px 20px rgba(16,185,129,0.3);
}
/* Locked Image */
.locked-image {
    filter: blur(6px);
    opacity: 0.8;
}

/* Lock Overlay */
.lock-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.6);
    border-radius: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    backdrop-filter: blur(2px);
}

.premium-title{
    font-size: 2rem;
    font-weight: 800;
    background: linear-gradient(135deg, #fff, #94A3B8);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin: 0;
}
.premium-subtitle{
    color: #94A3B8;
    margin: 0;
    font-size: 0.9rem;
}
.premium-badge-vip{
    background: rgba(16,185,129,0.1);
    border: 1px solid rgba(16,185,129,0.3);
    padding: 10px 20px;
    border-radius: 50px;
    color: #10B981;
    font-weight: 600;
    font-size: 0.9rem;
}

/* Premium Stat Cards */
.premium-stat-card{
    position:relative;
    background: rgba(255,255,255,0.02);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.05);
    border-radius: 24px;
    padding: 25px 20px;
    display: flex;
    align-items: center;
    gap: 15px;
    overflow: hidden;
    transition: all 0.3s;
}
.premium-stat-card:hover{
    transform: translateY(-5px);
    border-color: var(--stat-color);
    box-shadow: 0 20px 30px rgba(0,0,0,0.3);
}
.stat-icon{
    width: 50px;
    height: 50px;
    background: rgba(255,255,255,0.03);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: var(--stat-color);
    border: 1px solid rgba(255,255,255,0.05);
}
.stat-content{
    flex:1;
}
.stat-value{
    display:block;
    font-size: 2rem;
    font-weight: 800;
    color: white;
    line-height:1.2;
}
.stat-label{
    color: #94A3B8;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}
.stat-glow{
    position:absolute;
    top:0;
    right:0;
    width:150px;
    height:150px;
    background: radial-gradient(circle, var(--stat-color) 0%, transparent 70%);
    opacity:0.1;
    pointer-events:none;
}

/* Premium Tabs */
.premium-tabs-container{
    display: flex;
    gap: 15px;
    padding: 5px;
    background: rgba(255,255,255,0.02);
    border-radius: 60px;
    border: 1px solid rgba(255,255,255,0.05);
    max-width: 500px;
}
.premium-tab{
    flex:1;
    padding: 15px 25px;
    border: none;
    border-radius: 50px;
    background: transparent;
    color: #94A3B8;
    font-weight: 600;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}
.premium-tab.active{
    background: linear-gradient(135deg, #10B981, #059669);
    color: white;
    box-shadow: 0 10px 20px rgba(16,185,129,0.3);
}
.tab-count{
    background: rgba(255,255,255,0.1);
    padding: 2px 8px;
    border-radius: 30px;
    font-size: 0.8rem;
}

/* Premium Grid */
.premium-grid{
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}
.premium-section{display:none;}
.premium-section.active{display:block;}

/* Premium Profile Card */
.premium-profile-card{
    position:relative;
    background: rgba(255,255,255,0.02);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.05);
    border-radius: 30px;
    padding: 25px;
    overflow: hidden;
    transition: all 0.3s;
    margin-bottom:20px;
}
.premium-profile-card:hover{
    transform: translateY(-5px) scale(1.02);
    border-color: #10B981;
    box-shadow: 0 30px 40px rgba(0,0,0,0.4);
}
.card-glow{
    position:absolute;
    top:0;
    right:0;
    width:200px;
    height:200px;
    background: radial-gradient(circle, #10B981 0%, transparent 70%);
    opacity:0.1;
    pointer-events:none;
}
.premium-profile-card.received:hover{border-color:#10B981;}
.premium-profile-card.received .card-glow{background:radial-gradient(circle, #10B981 0%, transparent 70%);}

/* Profile Image */
.profile-image-wrapper{
    position:relative;
    width:100px;
    height:100px;
    margin-bottom:20px;
}
.profile-image{
    width:100%;
    height:100%;
    border-radius:30px;
    object-fit:cover;
    border:3px solid #10B981;
    box-shadow:0 10px 20px rgba(16,185,129,0.3);
}
.received .profile-image{border-color:#10B981;}
.profile-badge{
    position:absolute;
    bottom:0;
    right:0;
    width:30px;
    height:30px;
    background:#10B981;
    border-radius:10px;
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    border:2px solid rgba(255,255,255,0.2);
}
.profile-badge.received{background:#10B981;}

/* Profile Info */
.profile-name{
    font-size:1.3rem;
    font-weight:700;
    color:white;
    margin-bottom:10px;
}
.profile-details{
    display:flex;
    flex-wrap:wrap;
    gap:8px;
    margin-bottom:20px;
}
.detail-chip{
    background:rgba(255,255,255,0.03);
    border:1px solid rgba(255,255,255,0.05);
    padding:6px 12px;
    border-radius:30px;
    display:flex;
    align-items:center;
    gap:6px;
    color:#94A3B8;
    font-size:0.8rem;
}
.detail-chip i{color:#10B981;}
.time-chip i{color:#10B981;}

/* Action Buttons */
.profile-actions{
    display:flex;
    gap:10px;
}
.action-btn{
    flex:1;
    padding:12px;
    border:none;
    border-radius:16px;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    font-weight:600;
    transition:all0.3s;
    text-decoration:none;
}
.view-profile{
    background:rgba(16,185,129,0.1);
    color:#10B981;
    border:1px solid rgba(16,185,129,0.2);
}
.view-profile:hover{
    background:#10B981;
    color:white;
    transform:scale(1.05);
}
.remove-interest{
    background:rgba(239,68,68,0.1);
    color:#EF4444;
    border:1px solid rgba(239,68,68,0.2);
}
.remove-interest:hover{
    background:#EF4444;
    color:white;
    transform:scale(1.05);
}

/* Interest Badge */
.interest-badge{
    position:absolute;
    top:20px;
    right:20px;
    background:rgba(245,158,11,0.1);
    border:1px solid rgba(245,158,11,0.2);
    padding:8px 15px;
    border-radius:30px;
    display:flex;
    align-items:center;
    gap:5px;
    color:#10B981;
    font-size:0.8rem;
    font-weight:600;
}

/* Empty State */
.premium-empty-state{
    text-align:center;
    padding:80px 20px;
    background:rgba(255,255,255,0.02);
    border-radius:40px;
    border:1px solid rgba(255,255,255,0.05);
    position:relative;
    overflow:hidden;
}
.empty-glow{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    width:400px;
    height:400px;
    background:radial-gradient(circle, #10B981 0%, transparent 70%);
    opacity:0.1;
}
.empty-icon{
    width:100px;
    height:100px;
    background:rgba(255,255,255,0.03);
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    margin:0 auto 20px;
    font-size:3rem;
    color:#10B981;
}
.premium-empty-state h3{
    color:white;
    font-weight:700;
    margin-bottom:10px;
}
.premium-empty-state p{
    color:#94A3B8;
    margin-bottom:25px;
}
.premium-btn{
    display:inline-flex;
    align-items:center;
    padding:15px 40px;
    background:linear-gradient(135deg,#10B981,#059669);
    color:white;
    text-decoration:none;
    border-radius:50px;
    font-weight:600;
    box-shadow:0 10px 20px rgba(16,185,129,0.3);
}

.premium-footer-banner{
    margin-top:40px;
    background:linear-gradient(135deg, rgba(16,185,129,0.1), rgba(139,92,246,0.1));
    border:1px solid rgba(255,255,255,0.05);
    border-radius:30px;
    padding:25px;
    backdrop-filter:blur(10px);
}
.banner-content{
    display:flex;
    align-items:center;
    gap:20px;
}
.banner-icon{
    width:60px;
    height:60px;
    background:linear-gradient(135deg,#10B981,#8B5CF6);
    border-radius:20px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:2rem;
    color:white;
}
.banner-text h4{
    color:white;
    font-weight:700;
    margin-bottom:5px;
}
.banner-text p{
    color:#94A3B8;
    margin:0;
}
.banner-btn{
    margin-left:auto;
    width:50px;
    height:50px;
    border:none;
    border-radius:15px;
    background:rgba(255,255,255,0.05);
    color:white;
    transition:all0.3s;
}
.banner-btn:hover{
    background:#10B981;
    transform:scale(1.1);
}

/* Responsive */
@media(max-width:768px){
    .premium-grid{grid-template-columns:1fr;}
    .premium-tabs-container{flex-direction:column;}
    .banner-content{flex-wrap:wrap;}
}
</style>

<script>
function switchTab(tab){
    document.querySelectorAll('.premium-tab').forEach(t=>t.classList.remove('active'));
    document.querySelectorAll('.premium-section').forEach(s=>s.classList.remove('active'));
    
    if(tab==='sent'){
        document.querySelector('.premium-tab').classList.add('active');
        document.getElementById('sent-section').classList.add('active');
    }else{
        document.querySelectorAll('.premium-tab')[1].classList.add('active');
        document.getElementById('received-section').classList.add('active');
    }
}

function removeInterest(userId) {
    if (!confirm('Remove interest?')) return;

    const btn = event.target.closest('button');
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
    btn.disabled = true;

    fetch('/remove-interest/' + userId, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            const card = btn.closest('.premium-profile-card');
            // Smooth hide animation
            card.style.transition = 'all 0.5s ease';
            card.style.opacity = '0';
            card.style.transform = 'scale(0.8)';
            
            setTimeout(() => {
                card.remove(); // Card DOM se hata denge
            }, 500);
        } else {
            btn.innerHTML = '<i class="fas fa-times"></i><span>Remove</span>';
            btn.disabled = false;
            alert('Failed to remove interest.');
        }
    })
    .catch(() => {
        btn.innerHTML = '<i class="fas fa-times"></i><span>Remove</span>';
        btn.disabled = false;
        alert('Something went wrong!');
    });
}

</script>
@endsection