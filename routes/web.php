<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AIController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\OnlineStatusController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FeedbackController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::view('/coming', 'website.home');


// Public routes
Route::view('/', 'website.index')->name('website');
Route::view('/betasearch', 'website.newsearch');
Route::post('/chatbot/message', [ChatbotController::class, 'sendMessage'])->name('chatbot.message');


// Guest-only routes
Route::middleware('guest')->group(function () {
    
  Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/check-email', [AuthController::class, 'checkEmail'])->name('check.email');
 Route::post('/check-phone', [AuthController::class, 'checkPhone'])->name('check.phone');
    Route::post('/check-cnic', [AuthController::class, 'checkCnic'])->name('check.cnic');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    // Forgot Password Routes
    
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->name('forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendVerificationCode'])->name('forgot-password.post');
Route::get('/verify-code', [ForgotPasswordController::class, 'showVerifyForm'])->name('verify-code');
Route::post('/verify-code', [ForgotPasswordController::class, 'verifyCode'])->name('verify-code.post');
Route::get('/reset-password', [ForgotPasswordController::class, 'showResetForm'])->name('reset-password');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('reset-password.post');
});

// Authenticated routes
Route::middleware('auth')->group(function () {
   Route::get('/ai-match', [ProfileController::class, 'aiMatch'])->name('ai-match');
Route::get('/ai-matches/load-more', [ProfileController::class, 'loadMoreMatches'])->name('ai-matches.load-more');
    // Dashboard & Profil
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    // web.php
Route::post('/heartbeat', [ProfileController::class, 'heartbeat'])->name('heartbeat');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/upload-image', [ProfileController::class, 'uploadImage'])->name('profile.upload-image');
   Route::get('/profile/ZAW1232{id}ygf676tyg', [ProfileController::class, 'show'])->name('profile.show');

       Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/ZAW1232{user}ygf676tyg', [MessageController::class, 'show'])->name('messages.show');
    Route::post('/messages/send', [MessageController::class, 'send'])->name('messages.send');
    Route::get('/messages/get-new/{userId}', [MessageController::class, 'getNewMessages'])->name('messages.get-new');
    
    // Mark as seen route
    Route::post('/messages/mark-seen', [MessageController::class, 'markAsSeen'])->name('messages.mark-seen');
    Route::get('/messages/load-chat/{userId}', [MessageController::class, 'loadChat'])->name('messages.load-chat');
    
    // Update status route
    Route::post('/messages/update-status', [MessageController::class, 'updateStatus'])->name('messages.update-status');
    Route::post('/favorites/toggle/{id}', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/logout', function () {
    return redirect()->route('login'); // login page pe redirect
});
Route::post('/feedback-store', [FeedbackController::class,'store'])->name('feedback.store');
    // Favorites / Interests
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites');
    Route::post('/send-interest/ZAW1232{id}ygf676tyg', [FavoriteController::class, 'send'])->name('send-interest');
    Route::post('/remove-interest/ZAW1232{id}ygf676tyg', [FavoriteController::class, 'remove'])->name('remove-interest');
    Route::get('/my-favorites', [FavoriteController::class, 'myFavorites'])->name('my-favorites');
    Route::get('/received-favorites', [FavoriteController::class, 'receivedFavorites'])->name('received-favorites');
    Route::get('/ai-matchmaking', [AIController::class, 'index'])->name('ai.matchmaking');
Route::post('/ai/calculate', [AIController::class, 'calculate'])->name('ai.calculate');
Route::get('/get-recommended-profiles', [AIController::class, 'getRecommendedProfiles'])->name('get.recommended.profiles');
    // Payments
    Route::get('/checkout/{userId}/{package}', [PaymentController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [PaymentController::class, 'storeCheckout'])->name('checkout.store');
Route::get('/privacy-policy', function () {
    return view('website.privacy-policy');
})->name('privacy.policy');

Route::get('/terms-of-service', function () {
    return view('website.terms-of-service');
})->name('terms.service');
Route::get('/faq', function () {
    return view('website.faq');
})->name('faq');
    // Contact form
    Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/search/profiles', [SearchController::class, 'search'])->name('search.profiles');
// Route::view('/ai-match', 'website.ai-match')->name('ai-match');
Route::view('/services', 'website.services')->name('services');
Route::view('/contact', 'website.contact')->name('contact');
});

// Search & Matchmaking (public)
// last_seen update
Route::post('/update-online-status', [OnlineStatusController::class, 'updateOnlineStatus'])->name('update.online.status');
    Route::post('/update-offline-status', [OnlineStatusController::class, 'setOffline']);
// Special Services (public)
Route::view('/personal-matchmaking', 'website.personal_match')->name('personal.matchmaking');
Route::view('/international-match', 'website.international_match')->name('international.match');
Route::view('/family-match', 'website.family_mediation')->name('family.match');
Route::view('/background-verify', 'website.background_verification')->name('bg.verify');
Route::view('/wedding-plan', 'website.wedding_plan')->name('wedding.plan');
Route::view('/vip-concierge', 'website.vip_concierge')->name('vip.concierge');

// ========== ADMIN ROUTES ==========
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    // Users Management
    Route::get('/users', [App\Http\Controllers\Admin\DashboardController::class, 'users'])->name('users');
    Route::post('/users', [App\Http\Controllers\Admin\DashboardController::class, 'storeUser'])->name('users.store');
    Route::get('/users/{id}/edit-data', [App\Http\Controllers\Admin\DashboardController::class, 'editUserData'])->name('users.edit-data');
    Route::put('/users/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'destroyUser'])->name('users.destroy');
    Route::put('/users/{id}/role', [App\Http\Controllers\Admin\DashboardController::class, 'updateRole'])->name('users.updateRole');
    
    // Feedbacks
    Route::get('/feedbacks', [App\Http\Controllers\Admin\DashboardController::class, 'feedbacks'])->name('feedbacks');
    Route::delete('/feedbacks/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'destroyFeedback'])->name('feedbacks.destroy');
    
    // Contact Queries
    Route::get('/contacts', [App\Http\Controllers\Admin\DashboardController::class, 'contacts'])->name('contacts');
    Route::delete('/contacts/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'destroyContact'])->name('contacts.destroy');
    
    // Activity Logs
    Route::get('/activity-logs', [App\Http\Controllers\Admin\DashboardController::class, 'activityLogs'])->name('activity-logs');
    Route::delete('/activity-logs/clear', [App\Http\Controllers\Admin\DashboardController::class, 'clearActivityLogs'])->name('activity-logs.clear');
    
    // Settings
    Route::get('/settings', [App\Http\Controllers\Admin\DashboardController::class, 'settings'])->name('settings');
    
    // Profile
    Route::get('/profile', [App\Http\Controllers\Admin\DashboardController::class, 'profile'])->name('profile');
    
    // ========== AGENT MANAGEMENT (ADMIN) ==========
    Route::get('/agents', [App\Http\Controllers\Admin\AgentController::class, 'index'])->name('agents');
    Route::post('/agents', [App\Http\Controllers\Admin\AgentController::class, 'store'])->name('agents.store');
    Route::get('/agents/{id}', [App\Http\Controllers\Admin\AgentController::class, 'getAgent'])->name('agents.get');
    Route::put('/agents/{id}', [App\Http\Controllers\Admin\AgentController::class, 'update'])->name('agents.update');
    Route::delete('/agents/{id}', [App\Http\Controllers\Admin\AgentController::class, 'destroy'])->name('agents.destroy');
});

// ========== AGENT ROUTES ==========
Route::middleware(['auth', 'agent'])->prefix('agent')->name('agent.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\AgentController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [App\Http\Controllers\Admin\AgentController::class, 'profile'])->name('profile');
    Route::get('/users', [App\Http\Controllers\Admin\AgentController::class, 'users'])->name('users');
    Route::get('/create-user', [App\Http\Controllers\Admin\AgentController::class, 'createUser'])->name('create-user');
    Route::post('/users', [App\Http\Controllers\Admin\AgentController::class, 'storeUser'])->name('store-user');
    Route::get('/users/{id}/edit-data', [App\Http\Controllers\Admin\AgentController::class, 'editUserData'])->name('users.edit-data');
    Route::put('/users/{id}', [App\Http\Controllers\Admin\AgentController::class, 'updateUser'])->name('update-user');
    Route::delete('/users/{id}', [App\Http\Controllers\Admin\AgentController::class, 'destroyUser'])->name('destroy-user');
});
