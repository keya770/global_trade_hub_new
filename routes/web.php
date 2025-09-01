<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SubServiceController;
use App\Http\Controllers\Admin\VesselController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\ContactInquiryController;
use App\Http\Controllers\Admin\LegalDocumentController;
use App\Http\Controllers\Admin\SiteSettingController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/vessels', function () {
    return view('vessels');
})->name('vessels');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/sectors', function () {
    return view('sectors');
})->name('sectors');

Route::get('/testimonials', function () {
    return view('testimonials');
})->name('testimonials');

Route::get('/careers', function () {
    return view('careers');
})->name('careers');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/legal', function () {
    return view('legal');
})->name('legal');

// Public contact form submission
Route::post('/contact', [ContactInquiryController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Hero Sections
    Route::resource('hero-sections', HeroSectionController::class);
    Route::patch('hero-sections/{heroSection}/toggle-status', [HeroSectionController::class, 'toggleStatus'])->name('hero-sections.toggle-status');

    // Services
    Route::resource('services', ServiceController::class);
    Route::patch('services/{service}/toggle-status', [ServiceController::class, 'toggleStatus'])->name('services.toggle-status');
    Route::resource('sub_services', SubServiceController::class);

    // Vessels
    Route::resource('vessels', VesselController::class);
    Route::patch('vessels/{vessel}/toggle-availability', [VesselController::class, 'toggleAvailability'])->name('vessels.toggle-availability');
    Route::patch('vessels/{vessel}/toggle-featured', [VesselController::class, 'toggleFeatured'])->name('vessels.toggle-featured');

    // Blog Posts
    Route::resource('blog-posts', BlogPostController::class);
    Route::patch('blog-posts/{blogPost}/toggle-published', [BlogPostController::class, 'togglePublished'])->name('blog-posts.toggle-published');
    Route::patch('blog-posts/{blogPost}/increment-views', [BlogPostController::class, 'incrementViews'])->name('blog-posts.increment-views');

    // Testimonials
    Route::resource('testimonials', TestimonialController::class);
    Route::patch('testimonials/{testimonial}/toggle-active', [TestimonialController::class, 'toggleActive'])->name('testimonials.toggle-active');
    Route::patch('testimonials/{testimonial}/toggle-featured', [TestimonialController::class, 'toggleFeatured'])->name('testimonials.toggle-featured');

    // Jobs
    Route::resource('jobs', JobController::class);
    Route::patch('jobs/{job}/toggle-active', [JobController::class, 'toggleActive'])->name('jobs.toggle-active');
    Route::patch('jobs/{job}/toggle-remote', [JobController::class, 'toggleRemote'])->name('jobs.toggle-remote');
    Route::patch('jobs/{job}/increment-applications', [JobController::class, 'incrementApplications'])->name('jobs.increment-applications');

    // Contact Inquiries
    Route::resource('contact-inquiries', ContactInquiryController::class);
    Route::patch('contact-inquiries/{contactInquiry}/respond', [ContactInquiryController::class, 'markAsResponded'])->name('contact-inquiries.respond');
    Route::patch('contact-inquiries/{contactInquiry}/update-status', [ContactInquiryController::class, 'updateStatus'])->name('contact-inquiries.update-status');
    Route::get('contact-inquiries/statistics', [ContactInquiryController::class, 'statistics'])->name('contact-inquiries.statistics');

    // Site settings
    Route::get('site-settings', [SiteSettingController::class, 'index'])->name('site-settings.index');
    Route::post('site-settings', [SiteSettingController::class, 'update'])->name('site-settings.update');

    // Legal Documents
    Route::resource('legal-documents', LegalDocumentController::class);
    Route::get('legal-documents/{legalDocument}/download', [LegalDocumentController::class, 'download'])->name('legal-documents.download');
    Route::patch('legal-documents/{legalDocument}/toggle-active', [LegalDocumentController::class, 'toggleActive'])->name('legal-documents.toggle-active');
    Route::patch('legal-documents/{legalDocument}/toggle-consent', [LegalDocumentController::class, 'toggleConsent'])->name('legal-documents.toggle-consent');
});

/*
|--------------------------------------------------------------------------
| Profile & Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
