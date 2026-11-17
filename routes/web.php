<?php

use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Sign in with Google
Route::middleware('guest')->group(function () {
    Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('auth.google');
    Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('auth.google.callback');
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/footer', function () {
    return view('footer-preview');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    
])->group(function () {
    Route::get('/dashboard', function (Request $request) {
        return redirect()->route($request->user()->dashboardRoute());
    })->name('dashboard');

    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
    });

    Route::middleware('role:admin,employee')->prefix('employee')->name('employee.')->group(function () {
        Route::view('/dashboard', 'employee.dashboard')->name('dashboard');
    });

    Route::middleware('role:customer')->prefix('customer')->name('customer.')->group(function () {
        Route::view('/dashboard', 'customer.dashboard')->name('dashboard');
    });
});
