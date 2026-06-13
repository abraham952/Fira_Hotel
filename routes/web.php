<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Admin\BookingAdminController;
use Illuminate\Support\Facades\Route;

// Language Switcher
Route::get('/locale/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dining', [HomeController::class, 'dining'])->name('dining');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Rooms
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::get('/rooms/search', [RoomController::class, 'search'])->name('rooms.search');
Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('rooms.show');

// Experiences
Route::get('/experiences', [ExperienceController::class, 'index'])->name('experiences.index');
Route::get('/experiences/{experience}', [ExperienceController::class, 'show'])->name('experiences.show');

// Booking
Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/{booking}/confirmation', [BookingController::class, 'confirmation'])->name('booking.confirmation');
Route::get('/booking/{booking}/edit', [BookingController::class, 'edit'])->name('booking.edit');
Route::patch('/booking/{booking}', [BookingController::class, 'update'])->name('booking.update');
Route::delete('/booking/{booking}/cancel', [BookingController::class, 'cancel'])->name('booking.cancel');

// Room Availability API
Route::get('/api/rooms/{room}/availability', [RoomController::class, 'availability'])->name('api.rooms.availability');

// Image Management (Admin)
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::post('/rooms/{room}/images', [ImageController::class, 'upload'])->name('admin.images.upload');
    Route::delete('/rooms/{room}/images', [ImageController::class, 'delete'])->name('admin.images.delete');
    Route::post('/images/optimize', [ImageController::class, 'optimize'])->name('admin.images.optimize');
});

// Admin - Login
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

// Admin - Bookings
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/bookings', [BookingAdminController::class, 'index'])->name('bookings.index');
    Route::patch('/bookings/{booking}', [BookingAdminController::class, 'update'])->name('bookings.update');
});
