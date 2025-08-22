<?php

use Illuminate\Support\Facades\Route;

// Home page
Route::get('/', function () {
    return view('home');
})->name('home');

// About Us page
Route::get('/about', function () {
    return view('about');
})->name('about');

// Services page
Route::get('/services', function () {
    return view('services');
})->name('services');

// Vessel Listings page
Route::get('/vessels', function () {
    return view('vessels');
})->name('vessels');

// Blog page
Route::get('/blog', function () {
    return view('blog');
})->name('blog');

// Sectors page
Route::get('/sectors', function () {
    return view('sectors');
})->name('sectors');

// Testimonials page
Route::get('/testimonials', function () {
    return view('testimonials');
})->name('testimonials');

// Careers page
Route::get('/careers', function () {
    return view('careers');
})->name('careers');

// Contact Us page
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Legal & Resources page
Route::get('/legal', function () {
    return view('legal');
})->name('legal');

// Admin Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    require __DIR__.'/admin.php';
});
