<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// =====================
// Home
// =====================

Route::get('/', [HomeController::class, 'index'])->name('home');


// =====================
// AUTH MIDDLEWARE
// =====================

Route::middleware('auth')->group(function () {

    // Dashboard redirect
    Route::get('/dashboard', function () {
        return redirect('/');
    })->name('dashboard');

    // =====================
    // PROFILE
    // =====================

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');


    // =====================
    // BOOKING
    // =====================

    Route::get('/booking/{court}', [BookingController::class, 'create'])
        ->name('booking.create');

    Route::post('/booking/{court}', [BookingController::class, 'store'])
        ->name('booking.store');

    Route::get('/my-booking', [BookingController::class, 'myBooking'])
        ->name('booking.my');

    Route::get('/booking-schedule', [BookingController::class, 'schedule'])
        ->name('booking.schedule');

    Route::get('/booking/{booking}/pdf', [BookingController::class, 'downloadPdf'])
        ->name('booking.pdf');

});


// =====================
// AUTH ROUTES (Breeze)
// =====================

require __DIR__ . '/auth.php';