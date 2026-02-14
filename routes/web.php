<?php

use Illuminate\Support\Facades\Route;

// Controllers - Frontend
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;

// Controllers - Admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectMilestoneController;
use App\Http\Controllers\Admin\ProjectDocumentController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\SettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ====================================================
// 1. PUBLIC ROUTES (Frontend)
// ====================================================

// Home & Static Pages
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');

// Services
Route::get('/services', [FrontendController::class, 'services'])->name('services');
Route::get('/services/{slug}', [FrontendController::class, 'serviceShow'])->name('services.show');

// Portfolio
Route::get('/portfolio', [FrontendController::class, 'portfolio'])->name('portfolio');
Route::get('/portfolio/{slug}', [FrontendController::class, 'portfolioShow'])->name('portfolio.show');

// Blog
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [FrontendController::class, 'blogShow'])->name('blog.show');

// Contact Us
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact', [FrontendController::class, 'contactStore'])->name('contact.store');


// ====================================================
// 2. USER DASHBOARD (Breeze Default)
// ====================================================
// Route::get('/admin/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('/admin/dashboard');


// ====================================================
// 3. ADMIN PANEL ROUTES
// ====================================================
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    // --- Admin Dashboard ---
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // --- Core Modules ---
    Route::resource('services', ServiceController::class);
    Route::resource('portfolios', PortfolioController::class);
    Route::resource('pages', PageController::class);

    // Blog (dengan parameter binding fix)
    Route::resource('blog', BlogPostController::class)->parameters([
        'blog' => 'blog'
    ]);

    // Team (dengan parameter binding fix)
    Route::resource('team', TeamMemberController::class)->parameters([
        'team' => 'team'
    ]);

    // --- Project Management System ---
    Route::resource('projects', ProjectController::class);

    // Nested: Milestones
    Route::post('projects/{project}/milestones', [ProjectMilestoneController::class, 'store'])->name('projects.milestones.store');
    Route::put('projects/{project}/milestones/{milestone}', [ProjectMilestoneController::class, 'update'])->name('projects.milestones.update');
    Route::delete('projects/{project}/milestones/{milestone}', [ProjectMilestoneController::class, 'destroy'])->name('projects.milestones.destroy');

    // Nested: Documents
    Route::post('projects/{project}/documents', [ProjectDocumentController::class, 'store'])->name('projects.documents.store');
    Route::delete('projects/{project}/documents/{document}', [ProjectDocumentController::class, 'destroy'])->name('projects.documents.destroy');
    Route::get('projects/{project}/documents/{document}/download', [ProjectDocumentController::class, 'download'])->name('projects.documents.download');

    // --- System & Settings ---

    // Inbox Messages (SOLUSI ERROR: Pakai Resource ini saja)
    // Otomatis membuat route: admin.messages.index, admin.messages.show, admin.messages.destroy
    Route::resource('messages', ContactMessageController::class)->only(['index', 'show', 'destroy']);

    // Site Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
});


// ====================================================
// 4. PROFILE & AUTH ROUTES
// ====================================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
