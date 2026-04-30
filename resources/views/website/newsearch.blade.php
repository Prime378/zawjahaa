<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shaadi Premium - Marriage Bureau</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        body {
            background: #f8fafc;
        }
        
        /* Premium Animations */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        
        @keyframes pulse-glow {
            0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
            70% { box-shadow: 0 0 0 10px rgba(16, 185, 129, 0); }
            100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
        }
        
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
        
        .pulse-glow {
            animation: pulse-glow 2s infinite;
        }
        
        /* Premium Card Styles */
        .premium-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(16, 185, 129, 0.1);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .premium-card:hover {
            transform: translateY(-8px) scale(1.02);
            border-color: #10b981;
            box-shadow: 0 30px 40px -20px rgba(16, 185, 129, 0.5);
        }
        
        /* Gradient Text */
        .gradient-text {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #10b981, #059669);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #059669;
        }
        
        /* Glassmorphism Effect */
        .glass-effect {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        
        /* Loading Skeleton */
        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }
        
        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
        
        /* Ripple Effect */
        .ripple-btn {
            position: relative;
            overflow: hidden;
        }
        
        .ripple-btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }
        
        .ripple-btn:focus:not(:active)::after {
            animation: ripple 1s ease-out;
        }
        
        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 0.5;
            }
            100% {
                transform: scale(100, 100);
                opacity: 0;
            }
        }
    </style>
</head>
<body class="min-h-screen">
    <!-- Premium Loading Screen -->
    <div id="loading-screen" class="fixed inset-0 bg-white z-50 flex items-center justify-center hidden">
        <div class="text-center">
            <div class="w-24 h-24 border-4 border-green-200 border-t-green-600 rounded-full animate-spin mb-4"></div>
            <h2 class="text-2xl font-bold gradient-text">Loading Premium Matches...</h2>
        </div>
    </div>

    <!-- Navigation Bar with Mega Menu -->
    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-gray-200">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <!-- Logo with Animation -->
                <div class="flex items-center space-x-3 group cursor-pointer">
                    <div class="w-14 h-14 bg-gradient-to-br from-green-400 to-green-600 rounded-2xl flex items-center justify-center transform group-hover:rotate-12 transition-all duration-300 shadow-lg">
                        <i class="fas fa-heart text-white text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-extrabold">
                            <span class="text-gray-800">Premium</span>
                            <span class="gradient-text">Shaadi</span>
                        </h1>
                        <p class="text-xs text-gray-500">Where Hearts Meet ❤️</p>
                    </div>
                </div>
                
                <!-- Mega Menu -->
                <div class="hidden lg:flex items-center space-x-1">
                    <div class="relative group">
                        <button class="px-4 py-2 text-gray-700 hover:text-green-600 font-medium flex items-center">
                            <span>Browse</span>
                            <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                        <div class="absolute top-full left-0 w-64 bg-white rounded-2xl shadow-2xl p-4 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 border border-gray-100">
                            <div class="space-y-2">
                                <a href="#" class="block p-3 hover:bg-green-50 rounded-xl transition-all">
                                    <i class="fas fa-fire text-green-600 w-6"></i>
                                    <span class="font-medium">New Matches</span>
                                </a>
                                <a href="#" class="block p-3 hover:bg-green-50 rounded-xl transition-all">
                                    <i class="fas fa-star text-green-600 w-6"></i>
                                    <span class="font-medium">Premium Members</span>
                                </a>
                                <a href="#" class="block p-3 hover:bg-green-50 rounded-xl transition-all">
                                    <i class="fas fa-check-circle text-green-600 w-6"></i>
                                    <span class="font-medium">Verified Profiles</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <a href="#" class="px-4 py-2 text-gray-700 hover:text-green-600 font-medium">Matches</a>
                    <a href="#" class="px-4 py-2 text-gray-700 hover:text-green-600 font-medium">Search</a>
                    
                    <div class="relative group">
                        <button class="px-4 py-2 text-gray-700 hover:text-green-600 font-medium flex items-center">
                            <span>Premium</span>
                            <i class="fas fa-crown ml-1 text-yellow-500"></i>
                        </button>
                        <div class="absolute top-full left-0 w-80 bg-white rounded-2xl shadow-2xl p-6 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <h3 class="font-bold text-lg mb-3">Premium Plans</h3>
                            <div class="space-y-3">
                                <div class="p-3 border-2 border-green-100 rounded-xl hover:border-green-500 cursor-pointer">
                                    <div class="flex justify-between">
                                        <span class="font-bold">Gold</span>
                                        <span class="text-green-600 font-bold">Rs 5,000</span>
                                    </div>
                                    <p class="text-sm text-gray-600">3 months premium access</p>
                                </div>
                                <div class="p-3 border-2 border-green-100 rounded-xl hover:border-green-500 cursor-pointer">
                                    <div class="flex justify-between">
                                        <span class="font-bold">Platinum</span>
                                        <span class="text-green-600 font-bold">Rs 12,000</span>
                                    </div>
                                    <p class="text-sm text-gray-600">1 year premium + AI matchmaking</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Side Icons -->
                <div class="flex items-center space-x-4">
                    <button class="relative p-2 hover:bg-gray-100 rounded-full transition-all">
                        <i class="fas fa-search text-gray-600 text-xl"></i>
                    </button>
                    <button class="relative p-2 hover:bg-gray-100 rounded-full transition-all">
                        <i class="far fa-heart text-gray-600 text-xl"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">12</span>
                    </button>
                    <button class="relative p-2 hover:bg-gray-100 rounded-full transition-all">
                        <i class="far fa-bell text-gray-600 text-xl"></i>
                        <span class="absolute -top-1 -right-1 bg-green-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">5</span>
                    </button>
                    <div class="relative group">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Profile" class="w-12 h-12 rounded-full border-2 border-green-500 cursor-pointer">
                        <div class="absolute top-full right-0 w-64 bg-white rounded-2xl shadow-2xl p-4 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 mt-2">
                            <div class="text-center mb-3">
                                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Profile" class="w-16 h-16 rounded-full mx-auto mb-2">
                                <h4 class="font-bold">Fatima Khan</h4>
                                <p class="text-sm text-gray-600">Premium Member</p>
                            </div>
                            <hr class="my-2">
                            <a href="#" class="block p-2 hover:bg-gray-50 rounded-lg"><i class="fas fa-user mr-2"></i>My Profile</a>
                            <a href="#" class="block p-2 hover:bg-gray-50 rounded-lg"><i class="fas fa-cog mr-2"></i>Settings</a>
                            <a href="#" class="block p-2 hover:bg-gray-50 rounded-lg text-red-500"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Advanced Search -->
    <div class="bg-gradient-to-r from-green-50 to-white py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-4xl font-extrabold text-center mb-4">
                    Find Your <span class="gradient-text">Perfect Life Partner</span>
                </h2>
                <p class="text-gray-600 text-center mb-8">Join 1M+ happy couples who found their soulmate on Premium Shaadi</p>
                
                <!-- Advanced Search Bar -->
                <div class="bg-white rounded-3xl shadow-2xl p-2">
                    <div class="flex flex-col lg:flex-row">
                        <div class="flex-1 relative">
                            <i class="fas fa-search absolute left-4 top-4 text-gray-400"></i>
                            <input type="text" placeholder="Search by name, email, phone, or profile ID..." 
                                   class="w-full pl-12 pr-4 py-4 rounded-2xl lg:rounded-r-none focus:outline-none">
                        </div>
                        <div class="flex">
                            <select class="px-4 py-4 border-l border-gray-200 bg-white focus:outline-none">
                                <option>All Categories</option>
                                <option>Premium Only</option>
                                <option>Verified Only</option>
                                <option>With Photos</option>
                            </select>
                            <button class="bg-gradient-to-r from-green-600 to-green-700 text-white px-8 py-4 rounded-2xl lg:rounded-l-none font-semibold hover:from-green-700 hover:to-green-800 transition-all flex items-center">
                                <i class="fas fa-search mr-2"></i>
                                Search
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Popular Searches -->
                <div class="flex flex-wrap gap-2 mt-4 justify-center">
                    <span class="text-sm text-gray-500">Popular:</span>
                    <a href="#" class="text-sm bg-white px-3 py-1 rounded-full hover:bg-green-600 hover:text-white transition-all">Doctors</a>
                    <a href="#" class="text-sm bg-white px-3 py-1 rounded-full hover:bg-green-600 hover:text-white transition-all">Engineers</a>
                    <a href="#" class="text-sm bg-white px-3 py-1 rounded-full hover:bg-green-600 hover:text-white transition-all">24-28 years</a>
                    <a href="#" class="text-sm bg-white px-3 py-1 rounded-full hover:bg-green-600 hover:text-white transition-all">Karachi</a>
                    <a href="#" class="text-sm bg-white px-3 py-1 rounded-full hover:bg-green-600 hover:text-white transition-all">Lahore</a>
                    <a href="#" class="text-sm bg-white px-3 py-1 rounded-full hover:bg-green-600 hover:text-white transition-all">Islamabad</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content with Filters and Profiles -->
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Filters -->
            <div class="lg:w-1/4">
                <div class="bg-white rounded-3xl shadow-xl p-6 sticky top-24">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold flex items-center">
                            <i class="fas fa-sliders-h text-green-600 mr-2"></i>
                            Filters
                        </h3>
                        <button class="text-sm text-green-600 hover:text-green-700">Clear All</button>
                    </div>
                    
                    <!-- Accordion Filters -->
                    <div class="space-y-4">
                        <!-- Basic Info -->
                        <div class="border border-gray-200 rounded-xl overflow-hidden">
                            <button class="w-full p-4 text-left font-semibold bg-gray-50 hover:bg-gray-100 flex justify-between items-center" onclick="toggleFilter('basic')">
                                Basic Information
                                <i class="fas fa-chevron-down transition-transform" id="basic-icon"></i>
                            </button>
                            <div class="p-4 space-y-3" id="basic-filters">
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Looking for</label>
                                    <select class="w-full p-2 border border-gray-200 rounded-lg focus:border-green-500 focus:outline-none">
                                        <option>Bride</option>
                                        <option>Groom</option>
                                        <option>Both</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Age Range</label>
                                    <div class="flex items-center space-x-2">
                                        <input type="number" placeholder="18" class="w-1/2 p-2 border border-gray-200 rounded-lg">
                                        <span>-</span>
                                        <input type="number" placeholder="60" class="w-1/2 p-2 border border-gray-200 rounded-lg">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Height</label>
                                    <div class="flex items-center space-x-2">
                                        <select class="w-1/2 p-2 border border-gray-200 rounded-lg">
                                            <option>4'0"</option>
                                            <option>4'5"</option>
                                            <option>5'0"</option>
                                        </select>
                                        <span>to</span>
                                        <select class="w-1/2 p-2 border border-gray-200 rounded-lg">
                                            <option>6'0"</option>
                                            <option>6'5"</option>
                                            <option>7'0"</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Religion & Community -->
                        <div class="border border-gray-200 rounded-xl overflow-hidden">
                            <button class="w-full p-4 text-left font-semibold bg-gray-50 hover:bg-gray-100 flex justify-between items-center" onclick="toggleFilter('religion')">
                                Religion & Community
                                <i class="fas fa-chevron-down transition-transform" id="religion-icon"></i>
                            </button>
                            <div class="p-4 space-y-3 hidden" id="religion-filters">
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Religion</label>
                                    <select class="w-full p-2 border border-gray-200 rounded-lg">
                                        <option>Islam</option>
                                        <option>Christianity</option>
                                        <option>Hinduism</option>
                                        <option>Sikhism</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Sect/Caste</label>
                                    <input type="text" placeholder="e.g., Sunni, Shia" class="w-full p-2 border border-gray-200 rounded-lg">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Mother Tongue</label>
                                    <select class="w-full p-2 border border-gray-200 rounded-lg">
                                        <option>Urdu</option>
                                        <option>Punjabi</option>
                                        <option>Sindhi</option>
                                        <option>Pashto</option>
                                        <option>Balochi</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Location -->
                        <div class="border border-gray-200 rounded-xl overflow-hidden">
                            <button class="w-full p-4 text-left font-semibold bg-gray-50 hover:bg-gray-100 flex justify-between items-center" onclick="toggleFilter('location')">
                                Location
                                <i class="fas fa-chevron-down transition-transform" id="location-icon"></i>
                            </button>
                            <div class="p-4 space-y-3 hidden" id="location-filters">
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Country</label>
                                    <select class="w-full p-2 border border-gray-200 rounded-lg">
                                        <option>Pakistan</option>
                                        <option>India</option>
                                        <option>UAE</option>
                                        <option>USA</option>
                                        <option>UK</option>
                                        <option>Canada</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">City</label>
                                    <input type="text" placeholder="Enter city" class="w-full p-2 border border-gray-200 rounded-lg">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Within (km)</label>
                                    <input type="range" min="0" max="500" class="w-full">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Professional -->
                        <div class="border border-gray-200 rounded-xl overflow-hidden">
                            <button class="w-full p-4 text-left font-semibold bg-gray-50 hover:bg-gray-100 flex justify-between items-center" onclick="toggleFilter('professional')">
                                Professional
                                <i class="fas fa-chevron-down transition-transform" id="professional-icon"></i>
                            </button>
                            <div class="p-4 space-y-3 hidden" id="professional-filters">
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Education</label>
                                    <select class="w-full p-2 border border-gray-200 rounded-lg">
                                        <option>High School</option>
                                        <option>Bachelor's</option>
                                        <option>Master's</option>
                                        <option>PhD</option>
                                        <option>Medical</option>
                                        <option>Engineering</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Profession</label>
                                    <input type="text" placeholder="e.g., Doctor, Engineer" class="w-full p-2 border border-gray-200 rounded-lg">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Annual Income</label>
                                    <select class="w-full p-2 border border-gray-200 rounded-lg">
                                        <option>Less than 5 Lakhs</option>
                                        <option>5-10 Lakhs</option>
                                        <option>10-20 Lakhs</option>
                                        <option>20-50 Lakhs</option>
                                        <option>50 Lakhs+</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Lifestyle -->
                        <div class="border border-gray-200 rounded-xl overflow-hidden">
                            <button class="w-full p-4 text-left font-semibold bg-gray-50 hover:bg-gray-100 flex justify-between items-center" onclick="toggleFilter('lifestyle')">
                                Lifestyle
                                <i class="fas fa-chevron-down transition-transform" id="lifestyle-icon"></i>
                            </button>
                            <div class="p-4 space-y-3 hidden" id="lifestyle-filters">
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Diet</label>
                                    <select class="w-full p-2 border border-gray-200 rounded-lg">
                                        <option>Any</option>
                                        <option>Vegetarian</option>
                                        <option>Non-Vegetarian</option>
                                        <option>Eggetarian</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Smoking</label>
                                    <select class="w-full p-2 border border-gray-200 rounded-lg">
                                        <option>Any</option>
                                        <option>Never</option>
                                        <option>Occasionally</option>
                                        <option>Regularly</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Drinking</label>
                                    <select class="w-full p-2 border border-gray-200 rounded-lg">
                                        <option>Any</option>
                                        <option>Never</option>
                                        <option>Occasionally</option>
                                        <option>Regularly</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Premium Filters -->
                        <div class="border-2 border-green-200 rounded-xl overflow-hidden bg-green-50">
                            <button class="w-full p-4 text-left font-semibold text-green-700 flex justify-between items-center" onclick="toggleFilter('premium')">
                                <span><i class="fas fa-crown text-yellow-500 mr-2"></i>Premium Filters</span>
                                <i class="fas fa-chevron-down transition-transform" id="premium-icon"></i>
                            </button>
                            <div class="p-4 space-y-3 hidden" id="premium-filters">
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" class="form-checkbox text-green-600 rounded">
                                    <span class="text-sm">Online Now</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" class="form-checkbox text-green-600 rounded">
                                    <span class="text-sm">Verified Profiles</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" class="form-checkbox text-green-600 rounded">
                                    <span class="text-sm">With Photo</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" class="form-checkbox text-green-600 rounded">
                                    <span class="text-sm">With Horoscope</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" class="form-checkbox text-green-600 rounded">
                                    <span class="text-sm">AI Recommendations</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" class="form-checkbox text-green-600 rounded">
                                    <span class="text-sm">Recently Active</span>
                                </label>
                            </div>
                        </div>
                        
                        <!-- On Behalf -->
                        <div>
                            <label class="block text-sm text-gray-600 mb-1">Profile created by</label>
                            <select class="w-full p-2 border border-gray-200 rounded-lg">
                                <option>Self</option>
                                <option>Parent</option>
                                <option>Sibling</option>
                                <option>Relative</option>
                                <option>Friend</option>
                            </select>
                        </div>
                        
                        <!-- Apply Filters Button -->
                        <button class="w-full bg-gradient-to-r from-green-600 to-green-700 text-white py-3 rounded-xl font-semibold hover:from-green-700 hover:to-green-800 transition-all mt-4">
                            <i class="fas fa-magic mr-2"></i>
                            Apply Filters (128 matches)
                        </button>
                        
                        <!-- Save Search -->
                        <button class="w-full border-2 border-green-600 text-green-600 py-3 rounded-xl font-semibold hover:bg-green-50 transition-all">
                            <i class="far fa-bookmark mr-2"></i>
                            Save this Search
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Profiles Grid -->
            <div class="lg:w-3/4">
                <!-- Sort and View Options -->
                <div class="bg-white rounded-2xl shadow-lg p-4 mb-6 flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-600">Showing 1-12 of 1,234 matches</span>
                        <select class="border border-gray-200 rounded-lg px-3 py-1 focus:outline-none focus:border-green-500">
                            <option>Sort by: Newest</option>
                            <option>Sort by: Relevance</option>
                            <option>Sort by: Age (Low to High)</option>
                            <option>Sort by: Age (High to Low)</option>
                        </select>
                    </div>
                    <div class="flex space-x-2">
                        <button class="p-2 bg-green-600 text-white rounded-lg"><i class="fas fa-th-large"></i></button>
                        <button class="p-2 border border-gray-200 rounded-lg hover:bg-gray-50"><i class="fas fa-list"></i></button>
                    </div>
                </div>
                
                <!-- Premium Profiles Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                    <!-- Profile Card 1 - Premium -->
                    <div class="premium-card bg-white rounded-3xl shadow-xl overflow-hidden relative group">
                        <!-- Premium Badge -->
                        <div class="absolute top-4 right-4 z-10">
                            <span class="bg-gradient-to-r from-yellow-400 to-yellow-600 text-white text-xs px-3 py-1.5 rounded-full flex items-center shadow-lg">
                                <i class="fas fa-crown mr-1 text-xs"></i>
                                Premium
                            </span>
                        </div>
                        
                        <!-- Verification Badge -->
                        <div class="absolute top-4 left-4 z-10">
                            <span class="bg-blue-500 text-white text-xs px-3 py-1.5 rounded-full flex items-center shadow-lg">
                                <i class="fas fa-check-circle mr-1"></i>
                                Verified
                            </span>
                        </div>
                        
                        <!-- Profile Image with Overlay -->
                        <div class="relative overflow-hidden h-72">
                            <img src="https://images.unsplash.com/photo-1494790108777-2867c5a5e0b9?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" 
                                 alt="Profile" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                            
                            <!-- Online Status -->
                            <div class="absolute bottom-4 left-4 flex items-center space-x-2">
                                <span class="flex items-center">
                                    <span class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></span>
                                    <span class="text-white text-sm ml-1">Online</span>
                                </span>
                                <span class="text-white text-sm bg-black/30 px-2 py-1 rounded-full">
                                    <i class="far fa-clock mr-1"></i>Last seen 2 min ago
                                </span>
                            </div>
                            
                            <!-- Like Button -->
                            <button class="absolute bottom-4 right-4 w-10 h-10 bg-white/20 backdrop-blur rounded-full flex items-center justify-center hover:bg-red-500 transition-all group">
                                <i class="far fa-heart text-white group-hover:text-white text-lg"></i>
                            </button>
                        </div>
                        
                        <!-- Profile Info -->
                        <div class="p-5">
                            <div class="flex justify-between items-start mb-3">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800">Ayesha Khan</h3>
                                    <p class="text-sm text-gray-500">ID: #P12345 • Member since 2024</p>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                                </div>
                            </div>
                            
                            <!-- Details Grid -->
                            <div class="grid grid-cols-2 gap-3 mb-4">
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-venus w-5 text-green-600"></i>
                                    <span>Female, 26 yrs</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-arrows-alt-v w-5 text-green-600"></i>
                                    <span>5'4"</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-map-marker-alt w-5 text-green-600"></i>
                                    <span>Karachi</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-graduation-cap w-5 text-green-600"></i>
                                    <span>MBBS</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-briefcase w-5 text-green-600"></i>
                                    <span>Doctor</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-pray w-5 text-green-600"></i>
                                    <span>Islam/Sunni</span>
                                </div>
                            </div>
                            
                            <!-- AI Compatibility Score -->
                            <div class="bg-green-50 rounded-xl p-3 mb-4">
                                <div class="flex justify-between items-center mb-1">
                                    <span class="text-sm font-semibold text-green-700">
                                        <i class="fas fa-robot mr-1"></i>AI Compatibility
                                    </span>
                                    <span class="text-lg font-bold text-green-600">95%</span>
                                </div>
                                <div class="w-full bg-green-200 rounded-full h-2">
                                    <div class="bg-green-600 h-2 rounded-full" style="width: 95%"></div>
                                </div>
                                <p class="text-xs text-green-600 mt-1">Excellent match based on your preferences</p>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-gradient-to-r from-green-600 to-green-700 text-white py-3 rounded-xl hover:from-green-700 hover:to-green-800 transition-all font-medium text-sm shadow-lg shadow-green-200">
                                    <i class="fas fa-eye mr-1"></i>
                                    View Profile
                                </button>
                                <button class="w-12 h-12 border-2 border-green-600 text-green-600 rounded-xl hover:bg-green-50 transition-all flex items-center justify-center">
                                    <i class="far fa-envelope"></i>
                                </button>
                                <button class="w-12 h-12 border-2 border-green-600 text-green-600 rounded-xl hover:bg-green-50 transition-all flex items-center justify-center">
                                    <i class="fas fa-phone-alt"></i>
                                </button>
                            </div>
                            
                            <!-- Express Interest Button -->
                            <button class="w-full mt-2 border-2 border-pink-500 text-pink-500 py-2 rounded-xl hover:bg-pink-50 transition-all font-medium text-sm">
                                <i class="far fa-heart mr-1"></i>
                                Express Interest
                            </button>
                        </div>
                    </div>
                    
                    <!-- Profile Card 2 - Premium with AI Answers -->
                    <div class="premium-card bg-white rounded-3xl shadow-xl overflow-hidden relative group">
                        <div class="absolute top-4 right-4 z-10">
                            <span class="bg-gradient-to-r from-purple-500 to-purple-700 text-white text-xs px-3 py-1.5 rounded-full flex items-center shadow-lg">
                                <i class="fas fa-robot mr-1"></i>
                                AI Answers
                            </span>
                        </div>
                        
                        <div class="absolute top-4 left-4 z-10">
                            <span class="bg-green-500 text-white text-xs px-3 py-1.5 rounded-full flex items-center shadow-lg">
                                <i class="fas fa-check-circle mr-1"></i>
                                Premium
                            </span>
                        </div>
                        
                        <div class="relative overflow-hidden h-72">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" 
                                 alt="Profile" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                            
                            <div class="absolute bottom-4 left-4">
                                <span class="text-white text-sm bg-black/30 px-2 py-1 rounded-full">
                                    <i class="far fa-clock mr-1"></i>Last seen 1 hour ago
                                </span>
                            </div>
                            
                            <button class="absolute bottom-4 right-4 w-10 h-10 bg-white/20 backdrop-blur rounded-full flex items-center justify-center hover:bg-red-500 transition-all">
                                <i class="far fa-heart text-white text-lg"></i>
                            </button>
                        </div>
                        
                        <div class="p-5">
                            <div class="flex justify-between items-start mb-3">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800">Bilal Ahmed</h3>
                                    <p class="text-sm text-gray-500">ID: #P12346 • Member since 2023</p>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-3 mb-4">
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-mars w-5 text-green-600"></i>
                                    <span>Male, 28 yrs</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-arrows-alt-v w-5 text-green-600"></i>
                                    <span>5'10"</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-map-marker-alt w-5 text-green-600"></i>
                                    <span>Lahore</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-briefcase w-5 text-green-600"></i>
                                    <span>Software Eng</span>
                                </div>
                            </div>
                            
                            <!-- AI Answers Preview -->
                            <div class="bg-purple-50 rounded-xl p-3 mb-4">
                                <p class="text-sm text-purple-700 mb-2">
                                    <i class="fas fa-robot mr-1"></i>
                                    "Looking for a kind, educated partner who values family..."
                                </p>
                                <button class="text-xs text-purple-600 hover:text-purple-700 font-semibold">
                                    Read more AI answers →
                                </button>
                            </div>
                            
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-gradient-to-r from-green-600 to-green-700 text-white py-3 rounded-xl hover:from-green-700 hover:to-green-800 transition-all font-medium text-sm">
                                    View Profile
                                </button>
                                <button class="w-12 h-12 border-2 border-green-600 text-green-600 rounded-xl hover:bg-green-50 transition-all">
                                    <i class="far fa-envelope"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Profile Card 3 - Premium Female -->
                    <div class="premium-card bg-white rounded-3xl shadow-xl overflow-hidden relative group">
                        <div class="absolute top-4 right-4 z-10">
                            <span class="bg-gradient-to-r from-yellow-400 to-yellow-600 text-white text-xs px-3 py-1.5 rounded-full flex items-center">
                                <i class="fas fa-crown mr-1"></i>
                                Premium
                            </span>
                        </div>
                        
                        <div class="relative overflow-hidden h-72">
                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" 
                                 alt="Profile" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                            
                            <div class="absolute bottom-4 left-4 flex items-center space-x-2">
                                <span class="flex items-center">
                                    <span class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></span>
                                    <span class="text-white text-sm ml-1">Online</span>
                                </span>
                            </div>
                            
                            <button class="absolute bottom-4 right-4 w-10 h-10 bg-white/20 backdrop-blur rounded-full flex items-center justify-center hover:bg-red-500 transition-all">
                                <i class="far fa-heart text-white text-lg"></i>
                            </button>
                        </div>
                        
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-gray-800">Fatima Zaidi</h3>
                            <p class="text-sm text-gray-500 mb-3">ID: #P12347</p>
                            
                            <div class="space-y-2 mb-4">
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-female w-5 text-green-600"></i>
                                    <span>Female, 25 yrs, 5'2"</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-map-marker-alt w-5 text-green-600"></i>
                                    <span>Islamabad, Pakistan</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-briefcase w-5 text-green-600"></i>
                                    <span>Graphic Designer</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-graduation-cap w-5 text-green-600"></i>
                                    <span>B.Des, NCA</span>
                                </div>
                            </div>
                            
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-gradient-to-r from-green-600 to-green-700 text-white py-3 rounded-xl hover:from-green-700 hover:to-green-800 transition-all font-medium text-sm">
                                    View Profile
                                </button>
                                <button class="w-12 h-12 border-2 border-green-600 text-green-600 rounded-xl hover:bg-green-50 transition-all">
                                    <i class="far fa-envelope"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Profile Card 4 - Premium Male -->
                    <div class="premium-card bg-white rounded-3xl shadow-xl overflow-hidden relative group">
                        <div class="absolute top-4 right-4 z-10">
                            <span class="bg-gradient-to-r from-yellow-400 to-yellow-600 text-white text-xs px-3 py-1.5 rounded-full flex items-center">
                                <i class="fas fa-crown mr-1"></i>
                                Premium
                            </span>
                        </div>
                        
                        <div class="absolute top-4 left-4 z-10">
                            <span class="bg-blue-500 text-white text-xs px-3 py-1.5 rounded-full">
                                Verified
                            </span>
                        </div>
                        
                        <div class="relative overflow-hidden h-72">
                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" 
                                 alt="Profile" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                            
                            <div class="absolute bottom-4 left-4">
                                <span class="text-white text-sm bg-black/30 px-2 py-1 rounded-full">
                                    Last seen 3 hours ago
                                </span>
                            </div>
                        </div>
                        
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-gray-800">Dr. Usman Malik</h3>
                            <p class="text-sm text-gray-500 mb-3">ID: #P12348</p>
                            
                            <div class="grid grid-cols-2 gap-2 mb-4">
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-mars w-5 text-green-600"></i>
                                    <span>Male, 30 yrs</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-arrows-alt-v w-5 text-green-600"></i>
                                    <span>5'11"</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-map-marker-alt w-5 text-green-600"></i>
                                    <span>Rawalpindi</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-briefcase w-5 text-green-600"></i>
                                    <span>Cardiologist</span>
                                </div>
                            </div>
                            
                            <div class="bg-green-50 rounded-lg p-2 mb-3">
                                <div class="flex justify-between text-sm">
                                    <span>AI Match:</span>
                                    <span class="font-bold text-green-600">92%</span>
                                </div>
                            </div>
                            
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-gradient-to-r from-green-600 to-green-700 text-white py-2 rounded-xl text-sm">
                                    View Profile
                                </button>
                                <button class="w-10 h-10 border-2 border-green-600 text-green-600 rounded-xl">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Profile Card 5 - Premium with AI -->
                    <div class="premium-card bg-white rounded-3xl shadow-xl overflow-hidden relative group">
                        <div class="absolute top-4 right-4 z-10">
                            <span class="bg-gradient-to-r from-purple-500 to-purple-700 text-white text-xs px-3 py-1.5 rounded-full">
                                <i class="fas fa-robot mr-1"></i>AI
                            </span>
                        </div>
                        
                        <div class="relative overflow-hidden h-72">
                            <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" 
                                 alt="Profile" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                        </div>
                        
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-gray-800">Sana Mirza</h3>
                            <p class="text-sm text-gray-500 mb-3">ID: #P12349</p>
                            
                            <div class="space-y-2 mb-3">
                                <p class="text-sm"><i class="fas fa-female text-green-600 w-6"></i>Female, 27 yrs, 5'5"</p>
                                <p class="text-sm"><i class="fas fa-map-marker-alt text-green-600 w-6"></i>Karachi, Pakistan</p>
                                <p class="text-sm"><i class="fas fa-briefcase text-green-600 w-6"></i>Marketing Manager</p>
                            </div>
                            
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-gradient-to-r from-green-600 to-green-700 text-white py-2 rounded-xl text-sm">
                                    View Profile
                                </button>
                                <button class="w-10 h-10 border-2 border-green-600 text-green-600 rounded-xl">
                                    <i class="far fa-envelope"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Profile Card 6 - Premium Male -->
                    <div class="premium-card bg-white rounded-3xl shadow-xl overflow-hidden relative group">
                        <div class="absolute top-4 right-4 z-10">
                            <span class="bg-gradient-to-r from-yellow-400 to-yellow-600 text-white text-xs px-3 py-1.5 rounded-full">
                                <i class="fas fa-crown mr-1"></i>Premium
                            </span>
                        </div>
                        
                        <div class="relative overflow-hidden h-72">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" 
                                 alt="Profile" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                        </div>
                        
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-gray-800">Ahmed Raza</h3>
                            <p class="text-sm text-gray-500 mb-3">ID: #P12350</p>
                            
                            <div class="space-y-2 mb-3">
                                <p class="text-sm"><i class="fas fa-mars text-green-600 w-6"></i>Male, 29 yrs, 5'9"</p>
                                <p class="text-sm"><i class="fas fa-map-marker-alt text-green-600 w-6"></i>Multan, Pakistan</p>
                                <p class="text-sm"><i class="fas fa-briefcase text-green-600 w-6"></i>Businessman</p>
                            </div>
                            
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-gradient-to-r from-green-600 to-green-700 text-white py-2 rounded-xl text-sm">
                                    View Profile
                                </button>
                                <button class="w-10 h-10 border-2 border-green-600 text-green-600 rounded-xl">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Pagination -->
                <div class="flex justify-center mt-12">
                    <nav class="flex items-center space-x-2">
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 hover:bg-green-600 hover:text-white hover:border-green-600 transition-all">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-lg bg-green-600 text-white">1</a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 hover:bg-green-600 hover:text-white">2</a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 hover:bg-green-600 hover:text-white">3</a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 hover:bg-green-600 hover:text-white">4</a>
                        <span>...</span>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 hover:bg-green-600 hover:text-white">10</a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 hover:bg-green-600 hover:text-white hover:border-green-600 transition-all">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Premium Features Banner -->
    <div class="bg-gradient-to-r from-green-600 to-green-800 py-16 mt-16">
        <div class="container mx-auto px-4">
            <div class="text-center text-white mb-12">
                <h2 class="text-4xl font-extrabold mb-4">Why Go Premium?</h2>
                <p class="text-xl opacity-90">Unlock exclusive features to find your perfect match faster</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center text-white">
                    <div class="w-20 h-20 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-4 backdrop-blur">
                        <i class="fas fa-robot text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">AI Matchmaking</h3>
                    <p class="text-sm opacity-80">Get intelligent matches based on personality analysis</p>
                </div>
                
                <div class="text-center text-white">
                    <div class="w-20 h-20 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-4 backdrop-blur">
                        <i class="fas fa-check-circle text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Verified Profiles</h3>
                    <p class="text-sm opacity-80">100% genuine profiles with document verification</p>
                </div>
                
                <div class="text-center text-white">
                    <div class="w-20 h-20 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-4 backdrop-blur">
                        <i class="fas fa-video text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Video Introduction</h3>
                    <p class="text-sm opacity-80">See and hear your matches before connecting</p>
                </div>
                
                <div class="text-center text-white">
                    <div class="w-20 h-20 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-4 backdrop-blur">
                        <i class="fas fa-shield-alt text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Privacy Control</h3>
                    <p class="text-sm opacity-80">Complete control over who sees your information</p>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <button class="bg-white text-green-700 px-8 py-4 rounded-xl font-bold text-lg hover:shadow-2xl transition-all pulse-glow">
                    Upgrade to Premium - Just Rs 999/month
                </button>
            </div>
        </div>
    </div>

    <!-- Success Stories -->
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-3xl font-extrabold text-center mb-4">10,000+ Success Stories</h2>
        <p class="text-gray-600 text-center mb-12">Real couples who found love on Premium Shaadi</p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-3xl shadow-xl p-6 text-center">
                <div class="relative -mt-12 mb-4">
                    <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Couple" class="w-24 h-24 rounded-full mx-auto border-4 border-green-500">
                </div>
                <h3 class="text-xl font-bold">Ali & Sara</h3>
                <p class="text-green-600 mb-3">Married since 2023</p>
                <p class="text-gray-600">"Found each other through Premium Shaadi. The AI matching was spot on!"</p>
            </div>
            
            <div class="bg-white rounded-3xl shadow-xl p-6 text-center">
                <div class="relative -mt-12 mb-4">
                    <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Couple" class="w-24 h-24 rounded-full mx-auto border-4 border-green-500">
                </div>
                <h3 class="text-xl font-bold">Usman & Fatima</h3>
                <p class="text-green-600 mb-3">Married since 2024</p>
                <p class="text-gray-600">"Premium features helped us connect instantly. Best decision ever!"</p>
            </div>
            
            <div class="bg-white rounded-3xl shadow-xl p-6 text-center">
                <div class="relative -mt-12 mb-4">
                    <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Couple" class="w-24 h-24 rounded-full mx-auto border-4 border-green-500">
                </div>
                <h3 class="text-xl font-bold">Bilal & Hira</h3>
                <p class="text-green-600 mb-3">Engaged 2024</p>
                <p class="text-gray-600">"The verification system gave us peace of mind. Thank you!"</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <i class="fas fa-heart text-green-500 text-2xl"></i>
                        <span class="text-xl font-bold">Premium Shaadi</span>
                    </div>
                    <p class="text-gray-400 text-sm">Pakistan's most trusted matrimony service with premium features and AI-powered matchmaking.</p>
                </div>
                
                <div>
                    <h4 class="font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-green-500">About Us</a></li>
                        <li><a href="#" class="hover:text-green-500">Success Stories</a></li>
                        <li><a href="#" class="hover:text-green-500">Premium Plans</a></li>
                        <li><a href="#" class="hover:text-green-500">Safety Tips</a></li>
                        <li><a href="#" class="hover:text-green-500">Blog</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-bold mb-4">Support</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-green-500">Help Center</a></li>
                        <li><a href="#" class="hover:text-green-500">Contact Us</a></li>
                        <li><a href="#" class="hover:text-green-500">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-green-500">Terms of Use</a></li>
                        <li><a href="#" class="hover:text-green-500">FAQs</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-bold mb-4">Contact Info</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><i class="fas fa-phone text-green-500 w-6"></i> +92 300 1234567</li>
                        <li><i class="fas fa-envelope text-green-500 w-6"></i> support@premiumshaadi.com</li>
                        <li><i class="fas fa-map-marker-alt text-green-500 w-6"></i> Karachi, Pakistan</li>
                    </ul>
                    
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-600 transition-all">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-600 transition-all">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-600 transition-all">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-600 transition-all">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400 text-sm">
                <p>&copy; 2024 Premium Shaadi. All rights reserved. Made with <i class="fas fa-heart text-red-500"></i> in Pakistan</p>
            </div>
        </div>
    </footer>

    <!-- Chat Widget -->
    <div class="fixed bottom-6 right-6 z-50">
        <div class="relative">
            <div class="absolute bottom-16 right-0 w-80 bg-white rounded-2xl shadow-2xl mb-2 hidden" id="chat-window">
                <div class="bg-gradient-to-r from-green-600 to-green-700 text-white p-4 rounded-t-2xl">
                    <h4 class="font-bold">Customer Support</h4>
                    <p class="text-xs opacity-90">We usually reply within minutes</p>
                </div>
                <div class="h-64 p-4 overflow-y-auto">
                    <div class="flex items-start mb-4">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" class="w-8 h-8 rounded-full mr-2">
                        <div class="bg-gray-100 rounded-lg p-2 max-w-xs">
                            <p class="text-sm">Assalam-o-Alaikum! How can we help you today?</p>
                        </div>
                    </div>
                </div>
                <div class="p-4 border-t">
                    <div class="flex">
                        <input type="text" placeholder="Type your message..." class="flex-1 p-2 border rounded-l-lg focus:outline-none">
                        <button class="bg-green-600 text-white px-4 rounded-r-lg hover:bg-green-700">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <button onclick="toggleChat()" class="w-14 h-14 bg-gradient-to-r from-green-600 to-green-700 rounded-full flex items-center justify-center text-white text-2xl shadow-2xl hover:shadow-green-500/50 pulse-glow">
                <i class="fas fa-comment"></i>
            </button>
        </div>
    </div>

    <script>
        // Toggle filter sections
        function toggleFilter(filterId) {
            const filterDiv = document.getElementById(`${filterId}-filters`);
            const icon = document.getElementById(`${filterId}-icon`);
            
            if (filterDiv.classList.contains('hidden')) {
                filterDiv.classList.remove('hidden');
                icon.style.transform = 'rotate(180deg)';
            } else {
                filterDiv.classList.add('hidden');
                icon.style.transform = 'rotate(0deg)';
            }
        }
        
        // Toggle chat window
        function toggleChat() {
            const chatWindow = document.getElementById('chat-window');
            chatWindow.classList.toggle('hidden');
        }
        
        // Show loading screen
        function showLoading() {
            document.getElementById('loading-screen').classList.remove('hidden');
            setTimeout(() => {
                document.getElementById('loading-screen').classList.add('hidden');
            }, 2000);
        }
        
        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            // Show loading on page load
            showLoading();
            
            // Auto-hide chat after 5 seconds if open
            setInterval(() => {
                const chatWindow = document.getElementById('chat-window');
                if (!chatWindow.classList.contains('hidden')) {
                    chatWindow.classList.add('hidden');
                }
            }, 30000);
        });
    </script>
</body>
</html>