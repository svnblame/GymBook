<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduledClassController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', DashboardController::class)
    ->name('dashboard');

// Instructor routes
Route::middleware(['auth', 'role:instructor'])->group(function () {
    Route::resource('/instructor/schedule', ScheduledClassController::class)
        ->only(['index', 'create', 'store', 'destroy']);

    Route::get('/instructor/dashboard', function () {
        return view('instructor.dashboard');
    })->name('instructor.dashboard');
});

// Member routes
Route::middleware(['auth', 'role:member'])->group(function () {
    Route::get('/member/dashboard', function () {
        return view('member.dashboard');
    })->name('member.dashboard');

    Route::get('/member/book', [BookingController::class, 'create'] )
        ->name('booking.create');
    Route::post('/member/bookings', [BookingController::class, 'store'] )
        ->name('booking.store');
    Route::get('/member/bookings', [BookingController::class, 'index'] )
        ->name('booking.index');
    Route::delete('/member/bookings/{id}', [BookingController::class, 'destroy'] )
        ->name('booking.destroy');
});


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
