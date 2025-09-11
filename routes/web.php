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
use App\Http\Controllers\Admin\ContactInquiryController as AdminContactInquiryController;
use App\Http\Controllers\Admin\LegalDocumentController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\SectorController;
use App\Http\Controllers\ContactInquiryController;
use App\Http\Controllers\ServiceController as PublicServiceController;
use App\Http\Controllers\TestimonialController as PublicTestimonialController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', [App\Http\Controllers\ServiceController::class, 'index'])->name('services');
Route::get('/services/{service}', [App\Http\Controllers\ServiceController::class, 'show'])->name('services.details');
Route::get('/services/sub/{subService}', [App\Http\Controllers\ServiceController::class, 'showSubService'])->name('services.sub.details');

Route::get('/vessels', [App\Http\Controllers\VesselController::class, 'index'])->name('vessels');
Route::get('/vessels/inquiry', [App\Http\Controllers\VesselController::class, 'showInquiryForm'])->name('vessels.inquiry');
Route::post('/vessels/inquiry', [App\Http\Controllers\VesselController::class, 'inquiry'])->name('vessels.inquiry.store');
Route::get('/vessels/purchase-sale', [App\Http\Controllers\VesselController::class, 'showPurchaseSaleForm'])->name('vessels.purchase-sale');
Route::post('/vessels/purchase-sale', [App\Http\Controllers\VesselController::class, 'purchaseSaleInquiry'])->name('vessels.purchase-sale.submit');
Route::get('/vessels/dynamic-form', [App\Http\Controllers\VesselController::class, 'showDynamicForm'])->name('vessels.dynamic-form');
Route::post('/vessels/dynamic-form', [App\Http\Controllers\VesselController::class, 'submitDynamicForm'])->name('vessels.dynamic-form.submit');
Route::get('/vessels/database', [App\Http\Controllers\VesselController::class, 'databaseRender'])->name('vessels.database');
Route::get('/vessels/{vessel}', [App\Http\Controllers\VesselController::class, 'show'])->name('vessels.show');

// Vessel Inquiry Routes
Route::post('/vessels/sale-purchase', [App\Http\Controllers\VesselInquiryController::class, 'storeSalePurchase'])->name('vessels.sale-purchase.store');
Route::post('/vessels/chartering', [App\Http\Controllers\VesselInquiryController::class, 'storeChartering'])->name('vessels.chartering.store');

// Form data route (moved to admin)
Route::get('/admin/vessels/form-data', [App\Http\Controllers\Admin\VesselController::class, 'formData'])->name('admin.vessels.form-data');

Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/blog/{blogPost:slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/category/{category}', [App\Http\Controllers\BlogController::class, 'category'])->name('blog.category');

Route::get('/sectors', [App\Http\Controllers\SectorController::class, 'index'])->name('sectors');

Route::get('/testimonials', [PublicTestimonialController::class, 'index'])->name('testimonials');

Route::get('/careers', function () {
    return view('careers');
})->name('careers');

// Career application submission
Route::post('/careers', [App\Http\Controllers\CareerApplicationController::class, 'store'])->name('careers.store');

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');

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

    // Sub Services
    Route::resource('sub_services', SubServiceController::class);
    Route::patch('sub_services/{subService}/toggle-status', [SubServiceController::class, 'toggleStatus'])->name('sub_services.toggle-status');
    Route::get('sub_services/get-by-service', [SubServiceController::class, 'getByService'])->name('sub_services.get-by-service');

    // Sectors
    Route::resource('sectors', SectorController::class);
    Route::patch('sectors/{sector}/toggle-status', [SectorController::class, 'toggleStatus'])->name('sectors.toggle-status');

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
    Route::resource('contact-inquiries', AdminContactInquiryController::class);
    Route::patch('contact-inquiries/{contactInquiry}/respond', [AdminContactInquiryController::class, 'markAsResponded'])->name('contact-inquiries.respond');
    Route::patch('contact-inquiries/{contactInquiry}/update-status', [AdminContactInquiryController::class, 'updateStatus'])->name('contact-inquiries.update-status');
    Route::get('contact-inquiries/statistics', [AdminContactInquiryController::class, 'statistics'])->name('contact-inquiries.statistics');

    // Site settings
    Route::get('site-settings', [SiteSettingController::class, 'index'])->name('site-settings.index');
    Route::post('site-settings', [SiteSettingController::class, 'update'])->name('site-settings.update');

    // Legal Documents
    Route::resource('legal-documents', LegalDocumentController::class);
    Route::get('legal-documents/{legalDocument}/download', [LegalDocumentController::class, 'download'])->name('legal-documents.download');
    Route::patch('legal-documents/{legalDocument}/toggle-active', [LegalDocumentController::class, 'toggleActive'])->name('legal-documents.toggle-active');

});

require __DIR__.'/auth.php';

// Admin Inquiry Management Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('inquiries', App\Http\Controllers\Admin\InquiryController::class);
    Route::patch('inquiries/{inquiry}/mark-processed', [App\Http\Controllers\Admin\InquiryController::class, 'markProcessed'])->name('admin.inquiries.mark-processed');
});


