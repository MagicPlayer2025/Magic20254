<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\AdminController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/reviews', [PageController::class, 'reviews'])->name('reviews');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');

Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment');
Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');

Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/notifications/read', [ProfileController::class, 'markNotifications'])->name('profile.notifications.read');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/services', [AdminController::class, 'services'])->name('services');
    Route::post('/services', [AdminController::class, 'storeService'])->name('services.store');
    Route::put('/services/{service}', [AdminController::class, 'updateService'])->name('services.update');
    Route::delete('/services/{service}', [AdminController::class, 'deleteService'])->name('services.delete');

    Route::get('/appointments', [AdminController::class, 'appointments'])->name('appointments');
    Route::put('/appointments/{appointment}', [AdminController::class, 'updateAppointment'])->name('appointments.update');

    Route::get('/gallery', [AdminController::class, 'gallery'])->name('gallery');
    Route::post('/gallery', [AdminController::class, 'storeGallery'])->name('gallery.store');
    Route::put('/gallery/{galleryItem}', [AdminController::class, 'updateGallery'])->name('gallery.update');
    Route::delete('/gallery/{galleryItem}', [AdminController::class, 'deleteGallery'])->name('gallery.delete');

    Route::get('/reviews', [AdminController::class, 'reviews'])->name('reviews');
    Route::put('/reviews/{review}', [AdminController::class, 'updateReview'])->name('reviews.update');
    Route::delete('/reviews/{review}', [AdminController::class, 'deleteReview'])->name('reviews.delete');

    Route::get('/contacts', [AdminController::class, 'contacts'])->name('contacts');
    Route::put('/settings', [AdminController::class, 'updateSettings'])->name('settings.update');
});
