    // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Enhanced Profile Data
        const profiles = [
            {
                id: "MEP001",
                name: "Dr. Ahmed Raza",
                gender: "Male",
                age: 32,
                maritalStatus: "Never Married",
                country: "United Kingdom",
                city: "London & Lahore",
                caste: "Rajpoot",
                height: "6'1\"",
                education: "MBBS, MRCP (UK)",
                profession: "Consultant Physician",
                income: "£120,000",
                religion: "Islam",
                matchPercentage: 95,
                interests: ["Medical Research", "Charity Work", "Travel", "Reading"],
                featured: true,
                verified: true,
                premium: true,
                online: true,
                joined: "2023-06-15",
                photoUrl: "https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
            },
            {
                id: "MEP002",
                name: "Sana Khan",
                gender: "Female",
                age: 28,
                maritalStatus: "Never Married",
                country: "Pakistan",
                city: "Karachi",
                caste: "Arain",
                height: "5'5\"",
                education: "MBA (LUMS)",
                profession: "Banking Executive",
                income: "PKR 2,800,000",
                religion: "Islam",
                matchPercentage: 92,
                interests: ["Finance", "Art", "Cooking", "Travel"],
                featured: true,
                verified: true,
                premium: true,
                online: true,
                joined: "2023-07-20",
                photoUrl: "https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
            },
            {
                id: "MEP003",
                name: "Usman Malik",
                gender: "Male",
                age: 35,
                maritalStatus: "Divorced",
                country: "United Arab Emirates",
                city: "Dubai",
                caste: "Malik",
                height: "5'11\"",
                education: "MSc Engineering",
                profession: "Project Director",
                income: "AED 480,000",
                religion: "Islam",
                matchPercentage: 88,
                interests: ["Business", "Sports", "Travel", "Photography"],
                featured: true,
                verified: true,
                premium: true,
                online: false,
                joined: "2023-05-10",
                photoUrl: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
            },
            {
                id: "MEP004",
                name: "Ayesha Noor",
                gender: "Female",
                age: 30,
                maritalStatus: "Never Married",
                country: "United States",
                city: "New York",
                caste: "Jutt",
                height: "5'6\"",
                education: "PhD Computer Science",
                profession: "AI Researcher",
                income: "$150,000",
                religion: "Islam",
                matchPercentage: 90,
                interests: ["Technology", "Research", "Writing", "Travel"],
                featured: false,
                verified: true,
                premium: true,
                online: true,
                joined: "2023-08-05",
                photoUrl: "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
            },
            {
                id: "MEP005",
                name: "Zain Abbas",
                gender: "Male",
                age: 29,
                maritalStatus: "Never Married",
                country: "Pakistan",
                city: "Islamabad",
                caste: "Syed",
                height: "5'10\"",
                education: "CA, ACCA",
                profession: "Chartered Accountant",
                income: "PKR 3,500,000",
                religion: "Islam",
                matchPercentage: 85,
                interests: ["Finance", "Cricket", "Reading", "Charity"],
                featured: false,
                verified: true,
                premium: false,
                online: true,
                joined: "2023-09-12",
                photoUrl: "https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
            },
            {
                id: "MEP006",
                name: "Fatima Rizvi",
                gender: "Female",
                age: 26,
                maritalStatus: "Never Married",
                country: "Canada",
                city: "Toronto",
                caste: "Rizvi",
                height: "5'4\"",
                education: "Masters in Pharmacy",
                profession: "Clinical Pharmacist",
                income: "CAD 95,000",
                religion: "Islam",
                matchPercentage: 87,
                interests: ["Healthcare", "Cooking", "Art", "Travel"],
                featured: false,
                verified: true,
                premium: false,
                online: false,
                joined: "2023-08-30",
                photoUrl: "https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
            },
            {
                id: "MEP007",
                name: "Bilal Ahmed",
                gender: "Male",
                age: 33,
                maritalStatus: "Never Married",
                country: "United Kingdom",
                city: "Manchester",
                caste: "Ansari",
                height: "5'9\"",
                education: "LLB, Barrister",
                profession: "Corporate Lawyer",
                income: "£95,000",
                religion: "Islam",
                matchPercentage: 82,
                interests: ["Law", "Politics", "Reading", "Travel"],
                featured: false,
                verified: true,
                premium: true,
                online: true,
                joined: "2023-07-15",
                photoUrl: "https://images.unsplash.com/photo-1507591064344-4c6ce005-128?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
            },
            {
                id: "MEP008",
                name: "Mehak Ali",
                gender: "Female",
                age: 27,
                maritalStatus: "Never Married",
                country: "Pakistan",
                city: "Lahore",
                caste: "Arain",
                height: "5'3\"",
                education: "M.Arch",
                profession: "Architect",
                income: "PKR 2,200,000",
                religion: "Islam",
                matchPercentage: 89,
                interests: ["Architecture", "Design", "Art", "Travel"],
                featured: true,
                verified: true,
                premium: true,
                online: true,
                joined: "2023-09-01",
                photoUrl: "https://images.unsplash.com/photo-1534751516642-a1af1ef26a56?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
            }
        ];

        // Preloader
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.getElementById('preloader').classList.add('hidden');
                document.body.classList.add('loaded');
            }, 2000);
        });

        // Animate counter numbers with improved animation
        function animateCounters() {
            const counters = document.querySelectorAll('.hero-stat-number');
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-count'));
                const increment = target / 50;
                let current = 0;
                
                const updateCounter = () => {
                    if (current < target) {
                        current += increment;
                        counter.textContent = Math.ceil(current);
                        setTimeout(updateCounter, 30);
                    } else {
                        counter.textContent = target + '+';
                    }
                };
                
                updateCounter();
            });
        }

        // Enhanced Profile Rendering
        function renderProfiles(profilesToRender) {
            const container = document.getElementById('profilesContainer');
            container.innerHTML = '';
            
            profilesToRender.forEach(profile => {
                const matchClass = profile.matchPercentage >= 90 ? 'match-high' : 'match-medium';
                const featuredClass = profile.featured ? 'featured' : '';
                const statusClass = profile.online ? 'status-online' : 'status-offline';
                
                const profileCard = `
                    <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up">
                        <div class="profile-card ${featuredClass}">
                            <div class="match-percentage ${matchClass}">
                                ${profile.matchPercentage}%
                            </div>
                            
                            <div class="${statusClass}"></div>
                            
                            <div class="profile-header">
                                <h5 class="profile-id text-success">${profile.id}</h5>
                                <div class="profile-photo-container">
                                    <img src="${profile.photoUrl}" alt="${profile.name}" class="profile-photo">
                                </div>
                                <h4 class="mb-2">${profile.name}</h4>
                                <p class="text-muted mb-0">${profile.profession}</p>
                                ${profile.premium ? '<span class="badge-featured mt-2"><i class="fas fa-crown me-1"></i>Premium</span>' : ''}
                            </div>
                            
                            <div class="profile-body">
                                <div class="profile-detail">
                                    <i class="fas fa-user text-success"></i>
                                    <div>
                                        <strong class="text-success">${profile.gender}, ${profile.age}</strong> | ${profile.maritalStatus}
                                    </div>
                                </div>
                                
                                <div class="profile-detail">
                                    <i class="fas fa-map-marker-alt text-success"></i>
                                    <div>
                                        <strong class="text-success">Location:</strong> ${profile.city}, ${profile.country}
                                    </div>
                                </div>
                                
                                <div class="profile-detail">
                                    <i class="fas fa-graduation-cap text-success"></i>
                                    <div>
                                        <strong class="text-success">Education:</strong> ${profile.education}
                                    </div>
                                </div>
                                
                                <div class="profile-detail">
                                    <i class="fas fa-briefcase text-success"></i>
                                    <div>
                                        <strong class="text-success">Profession:</strong> ${profile.profession}
                                    </div>
                                </div>
                                
                                <div class="profile-detail">
                                    <i class="fas fa-money-bill-wave text-success"></i>
                                    <div>
                                        <strong class="text-success">Annual Income:</strong> ${profile.income}
                                    </div>
                                </div>
                                
                                <div class="d-flex justify-content-between align-items-center mt-4">
                                    <span class="badge-country">
                                        <i class="fas fa-check-circle me-1"></i> Verified
                                    </span>
                                    <div>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star-half-alt text-warning"></i>
                                    </div>
                                </div>
                                
                                <div class="compatibility-meter mt-3">
                                    <div class="compatibility-fill" style="width: ${profile.matchPercentage}%"></div>
                                </div>
                                
                                <div class="row mt-4 g-2">
                                    <div class="col-6">
                                        <button class="btn btn-primary w-100" onclick="viewProfile('${profile.id}')">
                                            <i class="fas fa-eye me-1"></i> View
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-outline-primary w-100" onclick="expressInterest('${profile.id}')">
                                            <i class="fas fa-heart me-1"></i> Interest
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                
                container.innerHTML += profileCard;
            });
        }

        // Enhanced View Profile with more details
        function viewProfile(profileId) {
            const profile = profiles.find(p => p.id === profileId);
            if (profile) {
                const modalHTML = `
                    <div class="modal fade" id="profileModal" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Complete Profile - ${profile.name}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-4 text-center">
                                            <div class="profile-photo-container mb-4" style="width: 200px; height: 200px; margin: 0 auto;">
                                                <img src="${profile.photoUrl}" alt="${profile.name}" class="profile-photo">
                                                ${profile.online ? '<div class="status-online" style="bottom: 10px; right: 10px;"></div>' : '<div class="status-offline" style="bottom: 10px; right: 10px;"></div>'}
                                            </div>
                                            <div class="match-percentage ${profile.matchPercentage >= 90 ? 'match-high' : 'match-medium'}" style="position: relative; margin: 0 auto 20px;">
                                                ${profile.matchPercentage}% Match
                                            </div>
                                            <div class="mb-4">
                                                <h6 class="text-success">Interests</h6>
                                                <div class="d-flex flex-wrap justify-content-center">
                                                    ${profile.interests.map(interest => `<span class="badge bg-success text-white me-1 mb-1">${interest}</span>`).join('')}
                                                </div>
                                            </div>
                                            <button class="btn btn-primary w-100 mb-2" onclick="expressInterest('${profile.id}')">
                                                <i class="fas fa-heart me-2"></i> Express Interest
                                            </button>
                                            <button class="btn btn-outline-primary w-100 mb-2">
                                                <i class="fas fa-comment me-2"></i> Send Message
                                            </button>
                                            <button class="btn btn-outline-success w-100">
                                                <i class="fas fa-share me-2"></i> Share Profile
                                            </button>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="d-flex justify-content-between align-items-start mb-4">
                                                <div>
                                                    <h4 class="text-success">${profile.name}</h4>
                                                    <p class="text-muted">${profile.profession}</p>
                                                </div>
                                                <div>
                                                    ${profile.premium ? '<span class="badge-featured"><i class="fas fa-crown me-1"></i>Premium Member</span>' : ''}
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-4">
                                                <div class="col-12">
                                                    <h6 class="border-bottom pb-2 text-success">Basic Information</h6>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <strong><i class="fas fa-user me-2 text-success"></i>Age & Status:</strong><br>
                                                    ${profile.age} years, ${profile.maritalStatus}
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <strong><i class="fas fa-map-marker-alt me-2 text-success"></i>Location:</strong><br>
                                                    ${profile.city}, ${profile.country}
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <strong><i class="fas fa-graduation-cap me-2 text-success"></i>Education:</strong><br>
                                                    ${profile.education}
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <strong><i class="fas fa-briefcase me-2 text-success"></i>Profession:</strong><br>
                                                    ${profile.profession}
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <strong><i class="fas fa-money-bill-wave me-2 text-success"></i>Income:</strong><br>
                                                    ${profile.income}
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <strong><i class="fas fa-users me-2 text-success"></i>Caste:</strong><br>
                                                    ${profile.caste}
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <strong><i class="fas fa-ruler-vertical me-2 text-success"></i>Height:</strong><br>
                                                    ${profile.height}
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <strong><i class="fas fa-heart me-2 text-success"></i>Religion:</strong><br>
                                                    ${profile.religion}
                                                </div>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <h6 class="border-bottom pb-2 text-success">Compatibility Analysis</h6>
                                                <div class="row">
                                                    <div class="col-6 mb-3">
                                                        <div class="progress" style="height: 10px;">
                                                            <div class="progress-bar bg-success" style="width: ${profile.matchPercentage}%"></div>
                                                        </div>
                                                        <small class="d-block mt-1 text-success">Overall Match</small>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <div class="progress" style="height: 10px;">
                                                            <div class="progress-bar bg-success" style="width: ${profile.matchPercentage - 5}%"></div>
                                                        </div>
                                                        <small class="d-block mt-1 text-success">Lifestyle Match</small>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <div class="progress" style="height: 10px;">
                                                            <div class="progress-bar bg-success" style="width: ${profile.matchPercentage - 3}%"></div>
                                                        </div>
                                                        <small class="d-block mt-1 text-success">Values Match</small>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <div class="progress" style="height: 10px;">
                                                            <div class="progress-bar bg-success" style="width: ${profile.matchPercentage - 7}%"></div>
                                                        </div>
                                                        <small class="d-block mt-1 text-success">Goals Match</small>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <h6 class="border-bottom pb-2 text-success">Member Since</h6>
                                                <p><i class="fas fa-calendar me-2 text-success"></i>${profile.joined}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                
                // Remove existing modal
                const existingModal = document.getElementById('profileModal');
                if (existingModal) existingModal.remove();
                
                // Add modal to body
                document.body.insertAdjacentHTML('beforeend', modalHTML);
                
                // Show modal
                const modal = new bootstrap.Modal(document.getElementById('profileModal'));
                modal.show();
            }
        }

        // Express interest with animation
        function expressInterest(profileId) {
            const profile = profiles.find(p => p.id === profileId);
            if (profile) {
                const interestModal = `
                    <div class="modal fade" id="interestModal" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Express Interest</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <div class="success-animation">
                                        <i class="fas fa-heart"></i>
                                    </div>
                                    <h4 class="mb-3">Express Interest in ${profile.name}?</h4>
                                    <p class="text-muted">Your interest will be sent to ${profile.name} and our matchmaker will contact you within 24 hours.</p>
                                    
                                    <div class="mt-4">
                                        <button class="btn btn-primary px-5" onclick="confirmInterest('${profile.id}')">
                                            <i class="fas fa-check me-2"></i> Confirm Interest
                                        </button>
                                        <button class="btn btn-outline-success ms-2" data-bs-dismiss="modal">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                
                // Remove existing modal
                const existingModal = document.getElementById('interestModal');
                if (existingModal) existingModal.remove();
                
                // Add modal to body
                document.body.insertAdjacentHTML('beforeend', interestModal);
                
                // Show modal
                const modal = new bootstrap.Modal(document.getElementById('interestModal'));
                modal.show();
            }
        }

        // Confirm interest with success message
        function confirmInterest(profileId) {
            const profile = profiles.find(p => p.id === profileId);
            if (profile) {
                // Show success animation
                const successHTML = `
                    <div class="text-center py-5">
                        <div class="success-animation">
                            <i class="fas fa-check"></i>
                        </div>
                        <h4 class="mt-4 text-success">Interest Sent Successfully!</h4>
                        <p class="text-muted">Your interest has been sent to ${profile.name}.</p>
                        <p class="text-muted">Our matchmaker will contact you within 24 hours to discuss next steps.</p>
                        <button class="btn btn-primary mt-3" data-bs-dismiss="modal">
                            Continue Browsing
                        </button>
                    </div>
                `;
                
                document.querySelector('#interestModal .modal-body').innerHTML = successHTML;
                
                // Update notification badge
                const badge = document.querySelector('.notification-badge');
                let count = parseInt(badge.textContent);
                badge.textContent = count + 1;
            }
        }

        // Back to top button
        // const backToTop = document.querySelector('.back-to-top');
        // window.addEventListener('scroll', function() {
        //     if (window.scrollY > 300) {
        //         backToTop.classList.add('show');
        //     } else {
        //         backToTop.classList.remove('show');
        //     }
        // });

        // backToTop.addEventListener('click', function() {
        //     window.scrollTo({
        //         top: 0,
        //         behavior: 'smooth'
        //     });
        // });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });

        // FAQ toggle with animation
        document.addEventListener('click', function(e) {
            if (e.target.closest('.faq-card')) {
                const faqCard = e.target.closest('.faq-card');
                const answer = faqCard.querySelector('.faq-answer');
                const icon = faqCard.querySelector('.fa-plus, .fa-minus');
                
                if (answer.style.display === 'block') {
                    answer.style.display = 'none';
                    icon.className = 'fas fa-plus text-success';
                    faqCard.style.transform = 'translateX(0)';
                } else {
                    answer.style.display = 'block';
                    icon.className = 'fas fa-minus text-success';
                    faqCard.style.transform = 'translateX(10px)';
                }
            }
        });

        // Search functionality
        document.getElementById('searchButton').addEventListener('click', function() {
            // Show loading animation
            this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Searching...';
            
            setTimeout(() => {
                this.innerHTML = '<i class="fas fa-search me-2"></i> Search Matches (248 Found)';
                // In real application, this would filter profiles
                renderProfiles(profiles.slice(0, 6));
                
                // Show success message
                const toast = `
                    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1050">
                        <div class="toast show" role="alert">
                            <div class="toast-header bg-success text-white">
                                <i class="fas fa-check-circle me-2"></i>
                                <strong class="me-auto">Search Complete</strong>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
                            </div>
                            <div class="toast-body">
                                Found 248 matches based on your criteria
                            </div>
                        </div>
                    </div>
                `;
                
                document.body.insertAdjacentHTML('beforeend', toast);
                
                // Remove toast after 5 seconds
                setTimeout(() => {
                    const toastElement = document.querySelector('.toast');
                    if (toastElement) {
                        toastElement.remove();
                    }
                }, 5000);
            }, 1500);
        });

        document.getElementById('resetSearch').addEventListener('click', function() {
            const selects = document.querySelectorAll('select');
            selects.forEach(select => select.value = '');
            
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(checkbox => checkbox.checked = false);
            
            // Reset to all profiles
            renderProfiles(profiles.slice(0, 6));
        });

        document.getElementById('saveSearch').addEventListener('click', function() {
            alert('Search criteria saved! You will receive notifications when new matching profiles join.');
        });

        // AI Test Button
        document.getElementById('aiTestBtn').addEventListener('click', function() {
            const aiTestModal = `
                <div class="modal fade" id="aiTestModal" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">AI Compatibility Test</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center mb-4">
                                    <i class="fas fa-robot text-success fa-4x mb-3"></i>
                                    <h4 class="text-success">Find Your Perfect Match with AI</h4>
                                    <p class="text-muted">Answer a few questions to get your personalized compatibility profile</p>
                                </div>
                                
                                <div class="mb-4">
                                    <h6 class="text-success">1. What are your core values in a relationship?</h6>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="q1">
                                        <label class="form-check-label">Trust and Honesty</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="q1">
                                        <label class="form-check-label">Communication and Understanding</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="q1">
                                        <label class="form-check-label">Shared Goals and Ambitions</label>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <h6 class="text-success">2. What lifestyle are you looking for?</h6>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="q2">
                                        <label class="form-check-label">Traditional and Family-oriented</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="q2">
                                        <label class="form-check-label">Modern and Progressive</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="q2">
                                        <label class="form-check-label">Balanced Approach</label>
                                    </div>
                                </div>
                                
                                <div class="text-center">
                                    <button class="btn btn-primary px-5" onclick="calculateAIScore()">
                                        <i class="fas fa-calculator me-2"></i> Calculate My Score
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            // Remove existing modal
            const existingModal = document.getElementById('aiTestModal');
            if (existingModal) existingModal.remove();
            
            // Add modal to body
            document.body.insertAdjacentHTML('beforeend', aiTestModal);
            
            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('aiTestModal'));
            modal.show();
        });

        // View AI Matches
        document.getElementById('viewMatchesBtn').addEventListener('click', function() {
            // Filter profiles with high match percentage
            const aiMatches = profiles.filter(p => p.matchPercentage >= 85);
            renderProfiles(aiMatches);
            
            // Scroll to profiles section
        //     document.getElementById('profiles').scrollIntoView({ behavior: 'smooth' });
        // });

        // Calculate AI Score with animation
        function calculateAIScore() {
            // Show loading
            document.querySelector('#aiTestModal .modal-body').innerHTML = `
                <div class="text-center py-5">
                    <div class="loading-spinner"></div>
                    <p class="mt-3">Analyzing your responses...</p>
                </div>
            `;
            
            setTimeout(() => {
                const resultHTML = `
                    <div class="text-center py-5">
                        <div class="success-animation">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4 class="mt-4 text-success">AI Compatibility Test Completed!</h4>
                        <p class="text-muted">Your detailed compatibility report has been generated.</p>
                        
                        <div class="mt-4">
                            <h2 class="text-success mb-2">Overall Score: 92%</h2>
                            <p class="text-muted mb-4">Excellent Match Potential</p>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-6 mb-3">
                                <h6 class="text-success">Values Match</h6>
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar bg-success" style="width: 94%"></div>
                                </div>
                                <small class="text-success">94%</small>
                            </div>
                            <div class="col-6 mb-3">
                                <h6 class="text-success">Lifestyle Match</h6>
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar bg-success" style="width: 88%"></div>
                                </div>
                                <small class="text-success">88%</small>
                            </div>
                            <div class="col-6 mb-3">
                                <h6 class="text-success">Personality Match</h6>
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar bg-success" style="width: 91%"></div>
                                </div>
                                <small class="text-success">91%</small>
                            </div>
                            <div class="col-6 mb-3">
                                <h6 class="text-success">Goals Match</h6>
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar bg-success" style="width: 95%"></div>
                                </div>
                                <small class="text-success">95%</small>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <p><strong class="text-success">We have found 15 highly compatible matches for you!</strong></p>
                            <button class="btn btn-primary mt-3" onclick="viewAIMatches()" data-bs-dismiss="modal">
                                <i class="fas fa-users me-2"></i> View AI Matches
                            </button>
                        </div>
                    </div>
                `;
                
                document.querySelector('#aiTestModal .modal-body').innerHTML = resultHTML;
            }, 2000);
        }

        function viewAIMatches() {
            // Show AI matches (profiles with high match percentage)
            const aiMatches = profiles.filter(p => p.matchPercentage >= 85);
            renderProfiles(aiMatches);
        //     document.getElementById('profiles').scrollIntoView({ behavior: 'smooth' });
        // }

        // Sort profiles
        function sortProfiles(type) {
            let sortedProfiles = [...profiles];
            
            switch(type) {
                case 'match':
                    sortedProfiles.sort((a, b) => b.matchPercentage - a.matchPercentage);
                    break;
                case 'newest':
                    sortedProfiles.sort((a, b) => new Date(b.joined) - new Date(a.joined));
                    break;
                case 'premium':
                    sortedProfiles.sort((a, b) => b.premium - a.premium);
                    break;
            }
            
            renderProfiles(sortedProfiles.slice(0, 6));
        }

        // Contact form submission
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const name = this.querySelector('input[type="text"]').value;
            
            // Show loading
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Sending...';
            submitBtn.disabled = true;
            
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                
                // Show success message
                const successHTML = `
                    <div class="text-center py-5">
                        <div class="success-animation">
                            <i class="fas fa-check"></i>
                        </div>
                        <h4 class="mt-4 text-success">Message Sent Successfully!</h4>
                        <p class="text-muted">Thank you ${name}! Our matchmaking team will contact you within 24 hours.</p>
                        <p class="text-muted">Welcome to Matrimony Elite Pro!</p>
                        <button class="btn btn-primary mt-3" onclick="this.closest('form').reset();">
                            Send Another Message
                        </button>
                    </div>
                `;
                
                this.innerHTML = successHTML;
            }, 2000);
        });

        // Login form
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Logging in...';
            submitBtn.disabled = true;
            
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                
                // Close modal and show welcome message
                bootstrap.Modal.getInstance(document.getElementById('loginModal')).hide();
                
                // Show welcome toast
                const toast = `
                    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1050">
                        <div class="toast show" role="alert">
                            <div class="toast-header bg-success text-white">
                                <i class="fas fa-check-circle me-2"></i>
                                <strong class="me-auto">Welcome Back!</strong>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
                            </div>
                            <div class="toast-body">
                                Successfully logged in. Welcome to Matrimony Elite!
                            </div>
                        </div>
                    </div>
                `;
                
                document.body.insertAdjacentHTML('beforeend', toast);
                
                // Update navbar
                const navbarNav = document.querySelector('#navbarNav .navbar-nav');
                const loginBtn = `<li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-user me-1"></i>My Profile</a></li>`;
                navbarNav.innerHTML = navbarNav.innerHTML.replace('<li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a></li>', loginBtn);
            }, 1500);
        });

        // Register form
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Creating Account...';
            submitBtn.disabled = true;
            
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                
                // Close modal and show success message
                bootstrap.Modal.getInstance(document.getElementById('registerModal')).hide();
                
                // Show success modal
                const successModal = `
                    <div class="modal fade" id="successModal" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body text-center py-5">
                                    <div class="success-animation">
                                        <i class="fas fa-heart"></i>
                                    </div>
                                    <h4 class="mt-4 text-success">Registration Successful!</h4>
                                    <p class="text-muted">Welcome to Matrimony Elite Pro!</p>
                                    <p class="text-muted">Your account has been created successfully. Please check your email for verification.</p>
                                    <button class="btn btn-primary mt-3" data-bs-dismiss="modal">
                                        Start Your Journey
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                
                document.body.insertAdjacentHTML('beforeend', successModal);
                const modal = new bootstrap.Modal(document.getElementById('successModal'));
                modal.show();
                
                // Update navbar
                const navbarNav = document.querySelector('#navbarNav .navbar-nav');
                const profileBtn = `<li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-user me-1"></i>My Profile</a></li>`;
                navbarNav.innerHTML = navbarNav.innerHTML.replace('<li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a></li>', profileBtn);
            }, 2000);
        });

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            // Render initial profiles
            renderProfiles(profiles.slice(0, 6));
            
            // Animate counters when hero section is in view
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounters();
                        observer.unobserve(entry.target);
                    }
                });
            });
            
            observer.observe(document.querySelector('.hero-section'));
            
            // Smooth scroll for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;
                    
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                        
                        // Update active nav link
                        document.querySelectorAll('.nav-link').forEach(link => {
                            link.classList.remove('active');
                        });
                        this.classList.add('active');
                    }
                });
            });
            
            // Load more profiles
            let currentProfiles = 6;
            document.getElementById('loadMoreBtn').addEventListener('click', function() {
                currentProfiles = Math.min(currentProfiles + 3, profiles.length);
                renderProfiles(profiles.slice(0, currentProfiles));
                
                if (currentProfiles >= profiles.length) {
                    this.style.display = 'none';
                }
            });
            
            // View all profiles
            document.getElementById('viewAllBtn').addEventListener('click', function() {
                renderProfiles(profiles);
                this.style.display = 'none';
                document.getElementById('loadMoreBtn').style.display = 'none';
            });
            
            // Auto-hide notifications after 5 seconds
            setTimeout(() => {
                const badges = document.querySelectorAll('.notification-badge');
                badges.forEach(badge => {
                    badge.style.opacity = '0.5';
                });
            }, 5000);
            
            // Add floating animation to elements
            const floatingElements = document.querySelectorAll('.floating-element');
            floatingElements.forEach((el, index) => {
                el.style.animationDelay = `${index * 0.5}s`;
            });
        });
        // Preloader functionality
window.addEventListener('load', function() {
    const preloader = document.getElementById('preloader');
    
    // Hide preloader after 2 seconds
    setTimeout(function() {
        preloader.style.opacity = '0';
        preloader.style.visibility = 'hidden';
        preloader.style.transition = 'opacity 0.5s, visibility 0.5s';
        
        // Remove from DOM after animation completes
        setTimeout(function() {
            preloader.style.display = 'none';
        }, 500);
        
        // Initialize AOS after preloader
        if(typeof AOS !== 'undefined') {
            AOS.init({
                duration: 1000,
                once: true,
                offset: 100
            });
        }
        
    }, 2000);
    
    // Hero stats counter animation
    const counters = document.querySelectorAll('.hero-stat-number');
    if(counters.length > 0) {
        counters.forEach(counter => {
            const updateCount = () => {
                const target = +counter.getAttribute('data-count');
                const count = +counter.innerText;
                const increment = target / 200;
                
                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(updateCount, 10);
                } else {
                    counter.innerText = target;
                }
            };
            
            updateCount();
        });
    }
});

// Floating elements animation
document.addEventListener('DOMContentLoaded', function() {
    const floatingElements = document.querySelectorAll('.floating-element');
    
    floatingElements.forEach(element => {
        // Randomize animation duration and delay
        const duration = 5 + Math.random() * 5;
        const delay = Math.random() * 2;
        
        element.style.animationDuration = `${duration}s`;
        element.style.animationDelay = `${delay}s`;
    });
});
window.addEventListener("load", function () {
    const loader = document.getElementById("page-loader");

    setTimeout(() => {
        loader.classList.add("hidden");

        // Optional: DOM se hata bhi de
        setTimeout(() => {
            loader.style.display = "none";
        }, 500);

    }, 800); // thora smooth delay
});
