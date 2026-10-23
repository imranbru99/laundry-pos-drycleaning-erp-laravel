<?php

use App\Http\Controllers\PublicPageController;
use Illuminate\Support\Facades\Route;

// Public Pages
Route::get('/', [PublicPageController::class, 'home'])->name('public.home');
Route::get('/services', [PublicPageController::class, 'services'])->name('public.services');
Route::get('/track', [PublicPageController::class, 'track'])->name('public.track');
Route::get('/book-pickup', [PublicPageController::class, 'bookPickup'])->name('public.book-pickup');
Route::post('/book-pickup', [PublicPageController::class, 'submitBooking'])->name('public.submit-booking');
Route::get('/branches', [PublicPageController::class, 'branches'])->name('public.branches');
Route::get('/fabric-care', [PublicPageController::class, 'fabricCare'])->name('public.fabric-care');
Route::get('/about', [PublicPageController::class, 'about'])->name('public.about');
Route::get('/contact', [PublicPageController::class, 'contact'])->name('public.contact');
